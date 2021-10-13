<?php

namespace App\Http\Controllers\User;

use App\Contracts\CategoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Contracts\Support\Renderable;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryContract $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Renderable
    {
        $categories = $this->category->findByFilter();
        return view('user.categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Renderable
    {
        return view('user.categories.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $this->category->new($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('user.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Renderable
    {
        $category = $this->category->findOneById($id);
        return view('user.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): Renderable
    {
        $category = $this->category->findOneById($id);
        return view('user.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->category->update($id, $request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('user.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->category->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('user.categories.index');
    }
}
