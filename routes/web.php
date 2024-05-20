<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/SignUp', [AuthController::class, 'showSignUpForm'])->name('SignUp');
 Route::post('/signup-post', [AuthController::class, 'register'])->name('signup-post');



 Route::get('/Login', [AuthController::class, 'showLoginForm'])->name('Login');
 Route::post('Login-post', [AuthController::class, 'login'])->name('login-post');



Route::get('/upload', [UserController::class, 'showUploadForm'])->name('upload-form');
Route::post('/upload', [UserController::class, 'uploadCSV'])->name('upload');
Route::get('/user', [UserController::class, 'showUploadedData'])->name('uploaded.data');
// Route::post('/signup', [UserController::class, 'signup'])->name('signup');



