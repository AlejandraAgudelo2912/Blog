<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use \Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
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
        $posts=Post::where('publish_at','<=', now() )->get();
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
        return view('posts.create', ['post' => new Post]);

    }

        public function store(StorePostRequest $request)
    {
        /*$validated= $request->validate([
            'title' => 'required|min:5',
            'body' => 'required',
        ]);*/
        auth()->user()->posts()->create($request->validated());

        /*$post = new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();*/

        return redirect()->route('posts.index')->with('status', 'El post se ha creado correctamente');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update( $request->validated());

        return redirect()->route('posts.show', $post)->with('status', 'El post se ha actualizado correctamente');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'El post se ha eliminado correctamente');
    }

    public function userPosts()
    {
        $posts=auth()->user()->posts;
        return view('posts.index', compact(var_name: 'posts'));

    }
}
