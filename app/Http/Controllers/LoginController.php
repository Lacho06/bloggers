<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('login.login');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();

            $user = User::where('email', $request->email)->first();
            //guardamos la foto de perfil en una variable de session
            session(['img' => $user->image->url]);

            return redirect()->intended('/');
        }
        return redirect()->route('login.create');
    }

    public function destroy(){
        Auth::logout();
        return back();
    }


    //metodos para el forget password
    public function edit(){
        return view('login.forget-pass');
    }

    public function update(){
        //
    }
}
