<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Container\BindingResolutionException; 

class CreatePostController extends Controller
{
    public function create(){
       return view('posts.create');
    }
    
    public function store(Request $request){
        
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required'
        ]);
        //@todo: add validation!
        $post = new Post($request->all());
        auth()->user()->posts()->save($post);
        return "Post: ".$post->title;
    }
}
