<?php

namespace App\Http\Controllers\User;

use App\Contracts\CategoryContract;
use App\Contracts\PostContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
    public function index(): Renderable
    {
        $posts = $this->post->setScopes(['authUser'])->findByFilter();
        return view('user.posts.index',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Renderable
    {
        $categories = $this->category->findByFilter();
        return view('user.posts.create', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $this->post->new($request->validated());

        session()->flash('success',__('messages.create'));
        return redirect()->route('user.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Renderable
    {
        $post = $this->post->setScopes(['authUser'])->findOneById();
        return view('user.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): Renderable
    {
        $post = $this->post->setScopes(['authUser'])->findOneById();
        $categories = $this->category->setPerPage(-1)->findByFilter();
        return view('user.posts.edit',compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $this->post->update($id, $request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('user.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->post->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('user.posts.index');
    }
}
