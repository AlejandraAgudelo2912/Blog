<?php

namespace App\Http\Controllers;

use App\Models\Post;
use \Illuminate\Http\Request;

class PostController extends Controller
{
    //un controlador invocable solo puede hacer una unica accion, este es un controlador invocable
    /*public function __invoke()//pf y tabulador
    {
        $posts=[
            ['title' =>  'Post 1'],
            ['title' => 'Post 2'],
            ['title' =>  'Post 3'],
            ['title' => 'Post 4'],
        ];
        return view('blog', compact(var_name: 'posts'));
    }*/

    public function index(){
        $posts= Post::all();
        return view('posts.index', compact(var_name: 'posts'));
    }
    public function show(Post $post)
    {
        //como la variable y el nombre es el mismo se usa compact que e suna funcion integrada de php
        return view('posts.show', compact('post'));
        //return 'Detalle del post '.$post->title;
    }

    public function create()
    {
        return view('posts.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();

        session()->flash('status', 'El post se ha creado correctamente');

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
}
