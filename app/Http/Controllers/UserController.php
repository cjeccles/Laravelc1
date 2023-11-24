<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\UserDetailsRequest;



class UserController extends Controller
{
    public function register(UserDetailsRequest $request)
    {
        $validatedData = $request->validated();

        //create
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);

        //sql
        //insert into table 'users' values (email, password) ....

        return redirect()->back();
    }

    public function login(UserLoginRequest $request)
    {
        $validatedData = $request->validated();

        // $user = User::where('email', $validatedData['email'])->first();
        // $isSamePassword = Hash::check($validatedData['password'], $user->password);

        // if ($user && $isSamePassword)
        // {
        //     return true
        // }

        $isCorrectUser = Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']]);

        if ($isCorrectUser) {
            return redirect('/dashboard');
        }
        else {
            return redirect()->back();
        }
    }


    public function createBlogArticle(BlogCreateRequest $request)
    {
        $validatedData = $request->validated();
        
        $user = User::where('email', $validatedData['email'])->first();
        

        Blog::create([
            'title' => $validatedData['title'],
            'article' => $validatedData['article'],
            'user_id' => $user->id
        ]);

        return redirect()->back();
    }
}
