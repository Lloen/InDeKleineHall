<?php

namespace App\Http\Controllers;

use App\Covid19Registration;
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
            // 'email' => 'required_without:phone|email',
            // 'phone' => 'required_without:email|regex:/^([0-9\s\-\+\(\)]*)$/',
            'numberOfPeople' => 'required'
        ]);

        $firstName = $request->input('firstName');
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
        $profile = json_decode($request->cookie('covid19Profile'));

        $cookie = cookie()->forget('covid19Register');
        return redirect()->action('Covid19Controller@show')
            ->withCookie($cookie);
    }
}
