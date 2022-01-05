<?php

namespace App\Http\Controllers;

use App\Post;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()
            ->take(5)
            ->get();
        return view('welcome',['posts' => $posts]);
    }

    public function indexPost()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('index-post',['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('/show-post',['post' => $post]);
    }
}
