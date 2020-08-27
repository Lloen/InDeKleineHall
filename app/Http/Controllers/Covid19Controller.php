<?php

namespace App\Http\Controllers;

use App\Covid19Registration;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Covid19Controller extends Controller
{
    public function show()
    {
        return view("covid19");
    }

    public function register(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            //'email' => 'required_without:phone',
            //'phone' => 'required_without:email',
            'numberOfPeople' => 'required'
        ]);

        $firstName = explode(' ', trim($request->input('firstName')))[0];
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $numberOfPeople = $request->input('numberOfPeople');

        $covidRegistration = new Covid19Registration();
        $covidRegistration->first_name = $firstName;
        $covidRegistration->last_name = $lastName;
        $covidRegistration->email = $email;
        $covidRegistration->phone = $phone;
        $covidRegistration->number_of_people = $numberOfPeople;

        $covidRegistration->save();

        if ($request->has('rememberMe')) {
            $covid19Profile = json_encode($covidRegistration);
            $cookieProfile = cookie()->forever('covid19Profile', $covid19Profile);
        } else {
            $cookieProfile = cookie()->forget('covid19Profile');
        }

        $now = new DateTime('now');
        $midnight = new DateTime(date('Y-m-d H:i:s', strtotime('11.59pm')));
        $diff = $now->diff($midnight);
        $mins = (intval($diff->format('%h')) * 60) + intval($diff->format('%i'));

        return redirect()->action('Covid19Controller@show')
            ->withCookie($cookieProfile)
            ->withCookie(cookie('covid19Register', $firstName, $mins));
    }

    public function signOut(Request $request)
    {
        //$profile = json_decode($request->cookie('covid19Profile'));

        $cookie = cookie()->forget('covid19Register');
        return redirect()->action('Covid19Controller@show')
            ->withCookie($cookie);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['covid19Registrations'] = Covid19Registration::whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('created_at', 'desc')->get();

        return view('covid19.list', $data);
    }


    public function getListRegistrations(String $date)
    {
        $date = strtotime($date);

        $data = Covid19Registration::whereDate('created_at', '=', date('Y-m-d H:i:s', $date))->orderBy('created_at', 'desc')->get();

        return (json_encode($data));
    }

    public function getDateList(Request $request)
    {
        $jsonList = $this->getListRegistrations($request->date);

        return ($jsonList);
    }

    public function getDownloadList(Request $request)
    {
        $date = $request->date;
        $jsonList = $this->getListRegistrations($date);
        $filename = $date . '_InDeKleineHal_Covid19_Registraties.txt';

        $jsonList = json_decode($jsonList);
        $content = "<b><u>Covid19 Registraties $date In De Kleine Hal:</u></b>";
        $content .= "\n";
        $content .= "Aantal registraties online: ";
        $content .= count($jsonList);
        $content .= "\n";
        $content .= "<i>JSON-bestand hieronder.</i>";
        $content .= "\n";
        $content .= "\n";
        foreach ($jsonList as $key => $value) {
            $key++;
            $content .= "<b>$key:</b>";
            $content .= "\n";
            $content .= "\t <u>Naam</u>: $value->first_name $value->last_name";
            $content .= "\n";
            $content .= "\t <u>Tijd</u>: ";
            $content .= date("d/m/Y H:i:s", strtotime($value->created_at));
            $content .= "\n";
            $content .= "\t <u>Email</u>: $value->email";
            $content .= "\n";
            $content .= "\t <u>Telefoon</u>: $value->phone";
            $content .= "\n";
            $content .= "\t <u>Aantal mensen</u>: $value->number_of_people";
            $content .= "\n";
            $content .= "\n";
        }
        $content .= "\n";
        $content .= "\n";
        $content .= "<b><u>JSON:</b></u>";
        $content .= "\n";
        $content .= json_encode($jsonList);

        return response()->streamDownload(function () use ($content) {
            echo strip_tags($content);
        }, $filename, [
            'Content-Type' => 'text/plain'
        ]);
    }
}
