<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

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
    public function index()
    {
        $categories = $this->category->findByFilter(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $this->category->new($request->validated());
            session()->flash('success',__('messages.create',['name' => __('messages.category')]));
            return redirect()->route('admin.categories.index');
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
        $category = $this->category->findOneById($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->findOneById($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->category->update($id, $request->validated());
            session()->flash('success',__('messages.update',['name' => __('messages.category')]));
            return redirect()->route('admin.categories.index');
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
            $this->category->destroy($id);
            session()->flash('success',__('messages.delete',['name' => __('messages.category')]));
            return redirect()->route('admin.categories.index');
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
            return redirect()->back();
        }
    }
}
