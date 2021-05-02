<?php

use Illuminate\Support\Facades\Route;

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

use App\Mail\TestMail;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.login');
})->name("home");

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/notes', function (){
    return view('pages.notes');
})->name('notes');
