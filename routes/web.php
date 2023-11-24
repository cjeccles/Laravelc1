<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RegisterController::class, 'show']);
Route::post('/register', [UserController::class, 'register']);


//Route::get('/login', [RegisterController::class, 'showLoginPage']);
Route::inertia('/login', 'Login');
Route::post('/login', [UserController::class, 'login']);

Route::inertia('/dashboard', 'Dashboard');

Route::get('/blog', function () {
    return view('blog');
});


Route::get('/about_us', [TestController::class, 'showAboutPage'])->name('about');
Route::get('/about/{user}', [TestController::class, 'showAboutDetails']);


Route::post('/create-blog', [UserController::class, 'createBlogArticle']);

Route::resource('user', AuthController::class);
