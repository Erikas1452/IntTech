<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("user/create",[UserController::class,'createUser']);

Route::post('verify',[UserController::class,'verifyUser']);

Route::get("data",[UserController::class,'getUser']);
// Route::post("user/create",[UserController::class,'testRequest']);
Route::get('/email',[EmailController::class,'sendTestEmail']);
