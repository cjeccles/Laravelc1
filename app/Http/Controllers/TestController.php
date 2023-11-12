<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function showAboutPage(Request $request) {
        return "Hello via Controller>Function";
    }

    function showAboutDetails($user) { 
        $person = [
            "name" => $user,
            "email" => "cjeccles@me.com"
        ];

        return response()->json($person);
    }
}
