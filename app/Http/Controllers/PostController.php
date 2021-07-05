<?php

namespace App\Http\Controllers;

use App\Contracts\CommentContract;
use App\Contracts\PostContract;
use App\Http\Requests\CommentRequest;

class PostController extends Controller
{
    protected $post;
    protected $comment;


    public function __construct(PostContract $post, CommentContract $comment)
    {
        $this->post = $post;
        $this->comment = $comment;


    }
    public function show($slug)
    {
        $post = $this->post->findOneBySlug($slug, ['categories', 'users']);
        return view('front.posts.show', compact('post'));
    }

    public function storeComment(CommentRequest $request)
    {
        try {
            $this->comment->new($request->validated());
            session()->flash('success',__('messages.create',['name' => __('messages.comment')]));
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyComment($id)
    {
        $this->comment->destroy($id);

        try {
            session()->flash('success',__('messages.delete',['name' => __('messages.comment')]));
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
        }
        return redirect()->back();
    }
}
