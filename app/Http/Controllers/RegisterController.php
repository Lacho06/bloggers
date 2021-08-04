<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('login.register');
    }

    public function store(){
        //
    }
}
