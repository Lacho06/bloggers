<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{

    //TODO: falta la funcionalidad del asociar tag q debe abrir un modal con la lista de posts del usuario

    public function index(){
        $tags = Tag::select('*')->get();
        return view('tag.index', compact('tags'));
    }
    public function userTags(){
        $tags = Tag::where('user_id', auth()->user()->id)->get();
        return view('tag.userTags', compact('tags'));
    }
    public function edit(Tag $tag){
        return view('tag.edit', compact('tag'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:20',
            'color' => 'required'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->color = $request->color;
        $tag->user_id = $request->user_id;
        $tag->save();
        //TODO: falta enviar un sms de exito
        return redirect()->route('tag.userTags');
    }
    public function show(Tag $tag){
        $postsRelacionados = $tag->posts()->where('tag_id', $tag->id)->get();
        foreach($postsRelacionados as $post){
            $userIds[] = $post->user_id;
        }
        foreach($userIds as $userId){
            $users[] = User::where('id', $userId)->first();
        }
        return view('tag.show', compact('tag', 'postsRelacionados', 'users'));
    }
    public function create(){
        return view('tag.create');
    }
    public function update(Request $request, Tag $tag){
        $request->validate([
            'name' => 'required|min:3|max:20',
            'color' => 'required'
        ]);
        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->save();
        //TODO: falta mandar un mensaje de actualizado con exito
        return redirect()->route('tag.userTags');
    }
    public function destroy(Tag $tag){
        $tag->delete();
        //TODO: falta enviar un mensaje de eliminado con exito
        return redirect()->route('tag.userTags');
    }
}
