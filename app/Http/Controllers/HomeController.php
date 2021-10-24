<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Image;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::select('*')->orderBy('created_at', 'desc')->get();
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
}
