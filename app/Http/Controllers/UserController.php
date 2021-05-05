<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\EmailController;
use JsonException;
use PharIo\Manifest\Email;

class UserController extends Controller
{
    function createUser(Request $request)
    {
        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user != null) {
            return response(json_encode('E-mail is already in use'), 409);
        }

        $verification_code = Str::random(25);

        if(strcmp($request->input('psw'),$request->input('pswRepeat')) !== 0)
        {
            return response(json_encode("Passwords do not match"), 401);
        }

        $user = User::create([

            'email' => $request->input('email'),

            'verification_code' => $verification_code,

            'email_veridied_at' => null,

            'password' => Hash::make($request->input('psw')),
        ]);

        $mailer = new EmailController();
        $mailer->sendVerificationEmail($request->input('email'),$verification_code);
        return response(json_encode("user created"),200);
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

    function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if($user === null)
        {
            return response(json_encode("Email is not registered"),404);
        }
        else
        {
            $hash = $user->password;

            if(Hash::check($password, $hash))
            {
                $verification_date = $user->email_verified_at;
                if(is_null($verification_date))
                {
                    return response(json_encode("Not verified"), 401);
                }
                else
                {
                $data = $user->toArray();
                return response(json_encode($data['id']), 200);
                }
            }
            else return response(json_encode("Wrong password"), 401);
        }



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
