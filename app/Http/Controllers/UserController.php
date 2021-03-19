<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
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
