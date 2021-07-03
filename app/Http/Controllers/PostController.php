<?php

namespace App\Http\Controllers;

use App\Contracts\PostContract;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostContract $post)
    {
        $this->post = $post;

    }
    public function show($id)
    {
        $post = $this->post->findOneById($id);
        return view('front.posts.show', compact('post'));
    }
}
