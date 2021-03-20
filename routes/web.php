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

Route::get('/email',function ()
{
    Mail::to('erikastumanovas@gmail.com')->send(new TestMail);
    return new TestMail();
});

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/post', function () {
    return view('pages.index');
});

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');
