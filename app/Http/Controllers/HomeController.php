<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Image;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $results = Post::select('*')->where('borrador', 0)->orderBy('created_at', 'desc')->get();
        //algoritmo para priorizar los posts d los admin
        foreach($results as $result){
            if($result->user->role == 'admin'){
                $posts[] = $result;
            }else{
                $secondary[] = $result;
            }
        }
        foreach($secondary as $i){
            $posts[] = $i;
        }
        $totalImgs = Image::select('*')->get();
        foreach($totalImgs as $item){
            if($item->imageable_type == User::class){
                $imgsAutor[] = $item;
            }else{
                $imgs[] = $item;
            }
        }
        return view('home.home', compact('posts', 'imgsAutor', 'imgs'));
    }

    public function profile(){
        return view('user.profile');
    }
}
