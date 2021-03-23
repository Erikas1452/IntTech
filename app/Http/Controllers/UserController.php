<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\EmailController;
use PharIo\Manifest\Email;

class UserController extends Controller
{

    // public $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // private function generate_string($input, $strength = 16) {
    //     $input_length = strlen($input);
    //     $random_string = '';
    //     for($i = 0; $i < $strength; $i++) {
    //         $random_character = $input[mt_rand(0, $input_length - 1)];
    //         $random_string .= $random_character;
    //     }
    //     return $random_string;
    // }

    function createUser(Request $request)
    {
        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user != null) {
            return response('E-mail is already in use', 409);
        }


        $verification_code = Str::random(25);

        $user = User::create([

            'email' => $request->input('email'),

            'verification_code' => $verification_code,

            'email_veridied_at' => null,

            'password' => Hash::make($request->input('password')),
        ]);

        $mailer = new EmailController();
        $mailer->sendVerificationEmail($request->input('email'),$verification_code);
        return response()->noContent(201);
    }

    function verifyUser(Request $request)
    {
        $matchThese = ['email' => $request->input('email'), 'verification_code' => $request->input('code')];

        $current_timestamp = Carbon::now()->timestamp;
        $user = User::where($matchThese)->first();
        $user->email_verified_at = $current_timestamp;
        $user->save();

        return $request->input('email').' '.$request->input('code');
    }

    function getUser()
    {
        return ["name"=>"Erikas","email"=>"erikastumanovas@gmail.com"];
    }

    function testRequest(Request $req)
    {
        $response = $req->input();
        return response($response, 200);
    }
}
