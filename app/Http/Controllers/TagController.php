<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::select('*')->get();
        return view('tag.index', compact('tags'));
    }
    public function userTags(){
        $tags = Tag::where('user_id', auth()->user()->id)->get();
        return view('tag.userTags', compact('tags'));
    }
    public function show(){
        return view('tag.show');
    }
    public function edit(){
        return view('tag.edit');
    }
    public function store(){
        //return view('tag.index');
    }
    public function create(){
        return view('tag.create');
    }
    public function update(){
        //return view('tag.index');
    }
    public function destroy(){
        //return view('tag.index');
    }
}
