<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class EmailController extends Controller
{
    function sendTestEmail()
    {
        Mail::to('jitih99223@gameqo.com')->send(new TestMail);
        return response("", 200);
    }
}
