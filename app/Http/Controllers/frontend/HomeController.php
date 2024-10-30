<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // === Home
    public function home(Request $request)
    {
        return view("frontend.home");
    }

    // ==== Innovation
    public function innovation(Request $request){
        return view("frontend.innovation");
    }

    // ==== Contact Us
    public function contactUs(Request $request){
        return view("frontend.contact-us");
    }
}
