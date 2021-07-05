<?php

namespace App\Http\Controllers\User;

use App\Contracts\CategoryContract;
use App\Contracts\PostContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    protected $post;
    protected $category;

    public function __construct(PostContract $post, CategoryContract $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->findByFilter(10, [], ['*'], ['authUser']);
        return view('user.posts.index',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->findByFilter();
        return view('user.posts.create', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $this->post->new($request->validated());

        try {
            session()->flash('success',__('messages.create',['name' => __('messages.post')]));
            return redirect()->route('user.posts.index');
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->findOneById($id, [], ['*'], ['authUser']);
        return view('user.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->findOneById($id, [], ['*'], ['authUser']);
        $categories = $this->category->findByFilter();
        return view('user.posts.edit',compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try {
            $this->post->update($id, $request->validated());
            session()->flash('success',__('messages.update',['name' => __('messages.post')]));
            return redirect()->route('user.posts.index');
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->post->destroy($id);
            session()->flash('success',__('messages.delete',['name' => __('messages.post')]));
            return redirect()->route('user.posts.index');
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
            return redirect()->back();
        }
    }
}
