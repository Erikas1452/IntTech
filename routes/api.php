<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\NotesController;
use App\Models\Note;
use App\Models\User;

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

//API
Route::post("user/create",[UserController::class,'createUser']);
Route::get('verify',[UserController::class,'verifyUser']);
Route::post('user/login',[UserController::class,'login']);
Route::post('note/create',[NotesController::class,'createNote']);
Route::put('note/update/title/{id}',[NotesController::class,'updateTitle']);
Route::put('note/update/content/{id}',[NotesController::class,'updateContent']);
Route::delete('note/delete/{id}',[NotesController::class,'deleteNote']);
Route::get('notes/{id}',[NotesController::class,'getAllNotes']);
//tests
Route::get("getuser",[UserController::class,'getUser']);
Route::get("data",[UserController::class,'getUser']);
// Route::post("user/create",[UserController::class,'testRequest']);
Route::get('/email',[EmailController::class,'sendTestEmail']);
