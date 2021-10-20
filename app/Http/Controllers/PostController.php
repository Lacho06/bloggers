<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function store(Request $request){
        if($request->formType == 1){
            //creamos el post y le establecemos un titulo, su slug y lo colocamos como borrador
            $request->validate([
                'titulo' => 'required|min:3|max:30'
            ]);
            $post = new Post();
            $post->title = $request->titulo;
            $post->slug = Str::slug($request->titulo);
            $post->borrador = 1;
            $post->user_id = auth()->user()->id;
            $post->save();

            return back();
        }else if($request->formType == 2){
            //le pasamos el estracto al post
            return $request;
        }else if($request->formType == 3){
            //creamos un registro en la tabla textos y le ponemos el id del post

        }else if($request->formType == 4){
            //creamos un registro en la tabla images y le ponemos el id del post y la clase post

        }else if($request->formType == 5){
            //establecemos el post de borrador a publicado

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
