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

    public function index(){
        $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('post.index', compact('posts'));
    }


    public function create(){
        return view('post.create');
    }

    public function store(Request $request, $formType){
        if($formType<1 || $formType>4){
            //error
        }
        switch($formType){
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
        }
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }


    public function show(Post $post){
        $imgAutor = Image::where('imageable_id', $post->user_id)->where('imageable_type', 'LIKE', User::class)->first();
        $imgs = Image::where('imageable_id', $post->id)->where('imageable_type', 'LIKE', Post::class)->get();
        // falta enviar a la vista los post relacionados

        return view('post.show', compact('post', 'imgAutor', 'imgs'));
    }


    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

}
