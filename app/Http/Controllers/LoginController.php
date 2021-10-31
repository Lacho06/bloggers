<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create(){
        return view('login.login');
    }
    public function forgetPassword(Request $request){
        $request->validate([
            'emailchange' => 'required',
            'aliaschange' => 'required',
            'contrasenachange' => 'required|min:8'
        ]);
        $user = User::where('email', $request->emailchange)->first();
        if($request->emailchange == $user->email && $request->aliaschange == $user->alias){
            $user->password = Hash::make($request->contrasenachange);
            $user->save();
        }else{
            //TODO: mensaje de error inesperado
            return $request;
        }
        //TODO: mensaje de exito
        return redirect()->route('login.create');
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
}
