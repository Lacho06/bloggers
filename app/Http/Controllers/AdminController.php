<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function show(){
        return view('admin.show');
    }
    public function edit(){
        return view('admin.edit');
    }
    public function store(){
        //return view('admin.index');
    }
    public function create(){
        return view('admin.create');
    }
    public function update(){
        //return view('admin.index');
    }
    public function destroy(){
        //return view('admin.index');
    }
}
