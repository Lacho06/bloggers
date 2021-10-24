<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function create(){
        return view('login.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'alias' => 'required',
            'file' => 'image',
            'password' => 'required|min:8'
        ]);

        //guardamos en la base de datos los datos del usuario
        $user = new User();
        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->email = $request->email;
        $user->role = 'blogger';
        $user->alias = $request->alias;
        $user->password = Hash::make($request->password);
        $user->save();

        $image = new Image();

        if($request->file('file')){
            //subimos la imagen al servidor
            $name = time().'_'.$request->file->getClientOriginalName();
            $route = $request->file('file')->storeAs('images', $name, 'public');
            //guardamos en la base de datos la ruta de la imagen
            $image->url = 'storage/'.$route;

        }else{
            //TODO:
            //seteamos como null la img xq en el modelo tenemos un metodo q verifica si esta o no
            //vacio ese campo y en caso d estarlo en la vista colocamos la img default
            $image->url = null;
        }
        $image->imageable_id = $user->id;
        $image->imageable_type = User::class;
        $image->save();
        // mandamos un mensaje a la vista principal indicando q se creo con exito
        $mensaje = "Usuario creado con éxito";
        session(['img' => $image->url]);
        Auth::login($user);
        return redirect()->route('home', compact('mensaje', 'user', 'image'));
    }
}
