<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserDetailsRequest;

class UserController extends Controller
{
    public function register(UserDetailsRequest $request)
    {
        return "User created with email: {$request->email}";
    }
}
