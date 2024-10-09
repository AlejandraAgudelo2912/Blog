<?php

namespace App\Http\Controllers;

use App\Models\Post;

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
        return view('blog', compact(var_name: 'posts'));
    }
}
