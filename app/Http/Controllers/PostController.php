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

    public function search(Request $request){
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->orderBy('created_at', 'desc')->get();
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


    public function create($id=null){
        if($id != null){
            $post = Post::find($id);
            return view('post.create', compact('post'));
        }
        return view('post.create');
    }

    public function store(Request $request){
        //TODO: hay q eliminar el componente de vue y trabajar todo en blade
        //tamb hay q poner un condicional a los formularios excepto al del titulo
        //q sea if($id == null) no deje procesar el formulario y envie un mensaje
        //para q el usuario primero escriba el titulo y si se envia el id xq ya puso
        //el titulo entonces el formulario del titulo se inhabilite
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
            $id = $post->id;
            return redirect()->route('post.create', compact('id'));
        }else if($request->formType == 2){
            //le pasamos el estracto al post
            return $request;
        }else if($request->formType == 3){
            //creamos un registro en la tabla textos y le ponemos el id del post
            return $request;
        }else if($request->formType == 4){
            //creamos un registro en la tabla images y le ponemos el id del post y la clase post
            return $request;
        }else if($request->formType == 5){
            //establecemos el post de borrador a publicado
            return $request;
        }
        //redireccionar al home y mandar un mensaje de error inesperado
        return null;
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }


    public function show(Post $post){
        //TODO: para controlar el orden d los textos y las imagenes a la hora d colocarlos necesito crear
        //una tabla llamada orden_posts o algo asi q va a guardar el post_id, text_id, image_id y order

        $imgAutor = Image::where('imageable_id', $post->user_id)->where('imageable_type', 'LIKE', User::class)->first();
        $imgs = Image::where('imageable_id', $post->id)->where('imageable_type', 'LIKE', Post::class)->get();
        // falta enviar a la vista los post relacionados
        $totalImgs = Image::select('*')->get();
        foreach($totalImgs as $item){
            if($item->imageable_id == $post->id && $item->imageable_type == Post::class){
                $imgs[] = $item;
            }else if($item->imageable_id == $post->user_id && $item->imageable_type == User::class){
                $imgAutor = $item;
            }
        }
        return view('post.show', compact('post', 'imgAutor', 'imgs'));
    }


    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

}
