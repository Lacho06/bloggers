<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use App\Models\User;
use App\Models\Text;
use App\Models\Tag;

class PostController extends Controller
{
    public function show(Post $post){
        $imgAutor = Image::where('imageable_id', $post->user_id)->where('imageable_type', 'LIKE', User::class)->first();
        $imgs = Image::where('imageable_id', $post->id)->where('imageable_type', 'LIKE', Post::class)->get();
        return view('post.show', compact('post', 'imgAutor', 'imgs'));
    }
}
