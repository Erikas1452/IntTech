<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class EmailController extends Controller
{

    function sendVerificationEmail($email,$verificationCode)
    {
        Mail::to($email)->send(new TestMail($email,$verificationCode));
        return response("", 200);
    }

    function sendTestEmail($email)
    {
        Mail::to('jitih99223@gameqo.com')->send(new TestMail($email,"TEST CODE"));
        return response("", 200);
    }
}
