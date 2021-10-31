<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Image;
use App\Models\OrderPost;
use App\Models\User;
use App\Models\Text;
use App\Models\Tag;

class PostController extends Controller
{

    public function index(){
        $posts = Post::where('user_id', auth()->user()->id)->get();

        return view('post.index', compact('posts'));
    }

    public function borrador(){
        $posts = Post::where('user_id', auth()->user()->id)->where('borrador', 1)->get();

        return view('post.borrador', compact('posts'));
    }

    public function search(Request $request){
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->where('borrador', 0)->orderBy('created_at', 'desc')->get();
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
        $tags = Tag::select('*')->orderBy('name', 'asc')->get();
        if($id != null){
            $post = Post::find($id);
            $imgAutor = Image::where('imageable_id', $post->user_id)->where('imageable_type', User::class)->first();
            $orderPost = OrderPost::where('post_id', $post->id)->orderBy('order', 'asc')->get();
            $images = [];
            $texts = [];
            foreach($orderPost as $order){
                if($order->itemable_type == Image::class){
                    $images[] = Image::where('id', $order->itemable_id)->where('imageable_type', Post::class)->first();
                }else{
                    $texts[] = Text::where('id', $order->itemable_id)->first();
                }
            }
            $img = Image::class;
            return view('post.create', compact('post', 'tags', 'orderPost', 'imgAutor', 'img', 'images', 'texts'));
        }
        return view('post.create', compact('tags'));
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
            $id = $post->id;
            return redirect()->route('post.create', compact('id'));
        }else if($request->formType == 2){
            //le pasamos el estracto al post
            $request->validate([
                'estracto' => 'required'
            ]);
            $post = Post::find($request->post_id);
            $post->summary = $request->estracto;
            $post->save();
            $id = $post->id;
            return redirect()->route('post.create', compact('id'));
        }else if($request->formType == 3){
            //creamos un registro en la tabla textos y le ponemos el id del post
            $request->validate([
                'descripcion' => 'required'
            ]);
            $id = $request->post_id;
            $order = 0;
            $text = new Text();
            $text->text = $request->descripcion;
            $text->post_id = $id;
            $text->save();
            //buscamos en la db si hay un orden con el id del post q estamos trabajando
            $orderPost = OrderPost::where('post_id', $id)->get();
            //si encuentra entonces contamos la cantidad y colocamos d id la cantidad mas 1
            foreach($orderPost as $item){
                $order++;
            }
            //si no encuentra le colocamos el id 1
            $orden = new OrderPost();
            $orden->post_id = $id;
            $orden->itemable_id = $text->id;
            $orden->itemable_type = Text::class;
            $orden->order = $order+1;
            $orden->save();

            return redirect()->route('post.create', compact('id'));
        }else if($request->formType == 4){
            //creamos un registro en la tabla images y le ponemos el id del post y la clase post
            $request->validate([
                'multimediaCreate' => 'required|image'
            ]);
            $id = $request->post_id;
            $img = new Image();
            $orderPost = OrderPost::where('post_id', $id)->get();
            $order = 0;

            if($request->file('multimediaCreate')){
                //subimos la imagen al servidor
                $name = time().'_'.Str::slug($request->multimediaCreate->getClientOriginalName());
                $route = $request->file('multimediaCreate')->storeAs('images', $name, 'public');
                //guardamos en la base de datos la ruta de la imagen
                $img->url = 'storage/'.$route;

            }else{
                //TODO: lo correcto es redireccionar a la vista create y mandar un mensaje diciendo q ocurrio un error
                //y q vuelva a subir la img
                $img->url = null;
                return redirect()->route('post.create', compact('id'));
            }
            $img->imageable_id = $request->post_id;
            $img->imageable_type = Post::class;
            $img->save();
            //si encuentra entonces contamos la cantidad y colocamos d id la cantidad mas 1
            foreach($orderPost as $item){
                $order++;
            }
            //si no encuentra le colocamos el id 1
            $orden = new OrderPost();
            $orden->post_id = $id;
            $orden->itemable_id = $img->id;
            $orden->itemable_type = Image::class;
            $orden->order = $order+1;
            $orden->save();

            return redirect()->route('post.create', compact('id'));
        }else if($request->formType == 5){
            //establecemos los tags del post
            $contador = 0;
            $tag_selected = Tag::find($request->tag);
            $post = Post::find($request->post_id);
            $id = $request->post_id;
            //validamos si el post ya tiene ese tag asociado
            foreach($post->tags as $item){
                if($item->name == $tag_selected->name && $item->id == $tag_selected->id){
                    //TODO: mandamos un sms indicando q el post ya tiene asociado ese tag
                    return redirect()->route('post.create', compact('id'));
                }
            }
            foreach($post->tags as $item){
                $contador++;
            }
            if($contador>=2){
                //TODO: mandamos un mensaje d error xq solo se pueden agregar hasta dos tags a un post
                return redirect()->route('post.create', compact('id'));
            }else{
                $post->tags()->attach([
                    $tag_selected->id
                ]);
                // TODO: mandamos un mensaje de tag agregado
                return redirect()->route('post.create', compact('id'));
            }
        }else if($request->formType == 6){
            //establecemos el post de borrador a publicado
            $post = Post::find($request->post_id);
            $post->borrador = 0;
            $post->save();
            return redirect()->route('post.index');
        }
        //redireccionar al home y mandar un mensaje de error inesperado usando sesiones
        return null;
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function show(Post $post){
        $orderPost = OrderPost::where('post_id', $post->id)->orderBy('order', 'asc')->get();
        $images = [];
        $texts = [];
        foreach($orderPost as $order){
            if($order->itemable_type == Image::class){
                $images[] = Image::where('id', $order->itemable_id)->where('imageable_type', Post::class)->first();
            }else{
                $texts[] = Text::where('id', $order->itemable_id)->first();
            }
        }
        $imgAutor = Image::where('imageable_id', $post->user->id)->where('imageable_type', User::class)->first();
        //analizamos cada tag
        foreach($post->tags as $tag){
            //capturamos todos los posts asociados a los tags
            $totalPosts[] = $tag->posts;
        }
        //creamos un array para filtrar los posts y no poner posts repetidos
        $relacionados = [];

        //usamos una variable booleana para guardar siempre el primer post en el arreglo d relacionados
        $first = true;
        //recorremos el total de posts y vamos filtrando
        foreach($totalPosts as $posts){
            foreach($posts as $post){
                if($first == true){
                    $relacionados[] = $post;
                    $first = false;
                }
                //usamos una variable booleana para saber si hay algun post con el mismo id en el arreglo de relacionados
                $isRepeat = false;
                //recorremos el arreglo de los relacionados
                foreach($relacionados as $relacionado){
                    if($post->id == $relacionado->id){
                        $isRepeat = true;
                    }
                }

                //preguntamos si la variable esta en falso significa q no se repite y lo guardamos
                if($isRepeat == false){
                    $relacionados[] = $post;
                }
            }
        }
        $img = Image::class;
        // falta enviar a la vista los post relacionados
        return view('post.show', compact('post', 'orderPost', 'images', 'texts', 'imgAutor', 'img', 'relacionados'));
    }


    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
    }

}
