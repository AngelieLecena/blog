<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
        // $posts = $posts->all();
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

    	return view('post.index', compact('posts'));
    }

    public function show(Post $post)
    {
    	return view('post.show', compact('post'));
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

        auth()->user()->publish(new Post(request(['title', 'body'])));

        return redirect('/');
    }

}
