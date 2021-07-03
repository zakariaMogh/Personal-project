<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PostContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostContract $post)
    {
        $this->post = $post;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->findByFilter(10, ['user']);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->findOneById($id, ['user']);
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->findOneById($id, ['user']);
        return view('admin.posts.edit',compact('post'));
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
            return redirect()->route('admin.posts.index');
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
            return redirect()->route('admin.posts.index');
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
            return redirect()->back();
        }
    }
}
