<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return view('login.login');
    }

    public function store(){
        //
    }

    public function destroy(){
        //
    }


    //metodos para el forget password
    public function edit(){
        return view('login.forget-pass');
    }

    public function update(){
        //
    }
}
