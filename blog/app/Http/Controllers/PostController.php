<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
    	return view('post.index', compact('posts'));
    }

    public function show()
    {
    	return view('post.show');
    }

    public function create()
    {
    	return view('post.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        Post::create(request(['title','body']));
        return redirect('/');
    }

}
