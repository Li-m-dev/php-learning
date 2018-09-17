<?php

namespace App\Http\Controllers;

use App\Posts;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()

    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){

        $posts = Posts::latest()
        ->filter(request()->only(['month', 'year']))
        ->get();


        $archives = Posts::archives();



        return view('posts.index', compact('posts'));
    }


    public function show(Posts $post){

        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create'); 
    }

    public function store(){

        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

            auth()->user()->publish(
                new Posts(request(['title','body']))
            );

 
        return redirect('/');
    }
}
   