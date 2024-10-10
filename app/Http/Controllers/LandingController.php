<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('pages.landing.index');
    }

    public function evaluation(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'message' => 'required',
        //     'captcha' => 'required|captcha'
        // ]);

        // $name = $request->name;
        // $email = $request->email;
        // $phone = $request->phone;
        // $message = $request->message;

        return view('pages.landing.evaluation');
    }
}
