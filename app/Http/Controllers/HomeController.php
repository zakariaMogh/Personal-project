<?php

namespace App\Http\Controllers;

use App\Contracts\PostContract;

class HomeController extends Controller
{
    protected $post;

    public function __construct(PostContract $post)
    {
        $this->post = $post;

    }
    public function index()
    {
        $posts = $this->post->findByFilter(6);
        return view('front.home', compact('posts'));
    }
}
