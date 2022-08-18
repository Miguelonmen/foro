<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function create(){
       return view('posts.create');
    }
    public function store(Request $request){
        $post = Post::create($request->all());
        return $post->title;
    }
}
