<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use \Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
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

    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Post::where('publish_at', '<=', now());

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }
        if ($request->has('sort')) {
            $sort = $request->sort;

            if ($sort == 'date') {
                $query->orderBy('publish_at', 'desc');
            } elseif ($sort == 'name') {
                $query->orderBy('title', 'asc');
            }elseif ($sort=='date-asc'){
                $query->orderBy('publish_at', 'asc');
            }
        } else {
            $query->orderBy('publish_at', 'desc');
        }
        $posts = $query->paginate(5);

        return view('posts.index', compact('posts', 'categories'));
    }
    public function show(Post $post)
    {
        //como la variable y el nombre es el mismo se usa compact que e suna funcion integrada de php
        $category = $post->category;
        return view('posts.show', compact('post', 'category'));
        //return 'Detalle del post '.$post->title;
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ['post' => new Post,'categories' => $categories]);

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
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
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
        $categories = Category::all();
        $posts=auth()->user()->posts()->paginate(5);
        return view('posts.my-posts', compact( 'posts', 'categories'));

    }
}
