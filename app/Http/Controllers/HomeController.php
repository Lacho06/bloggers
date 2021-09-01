<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::select('*')->orderBy('created_at', 'desc')->get();
        $imgsAutor = Image::select('*')->where('imageable_type', 'LIKE', User::class)->get();
        $imgs = Image::select('*')->where('imageable_type', 'LIKE', Post::class)->get();

        return view('home.home', compact('posts', 'imgsAutor', 'imgs'));
    }
}
