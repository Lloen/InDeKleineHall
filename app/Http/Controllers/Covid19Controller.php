<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Covid19Controller extends Controller
{
    public function show(){
        return view("covid19");
    }
}
