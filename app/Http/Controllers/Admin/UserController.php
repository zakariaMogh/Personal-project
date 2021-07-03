<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PostContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;

class UserController extends Controller
{
    protected $user;

    public function __construct(PostContract $user)
    {
        $this->user = $user;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->findByFilter(10, ['user']);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->findOneById($id, ['user']);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findOneById($id, ['user']);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $this->user->update($id, $request->validated());
            session()->flash('success',__('messages.update',['name' => __('messages.user')]));
            return redirect()->route('admin.users.index');
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
            $this->user->destroy($id);
            session()->flash('success',__('messages.delete',['name' => __('messages.user')]));
            return redirect()->route('admin.users.index');
        }catch (\Exception $exception)
        {
            session()->flash('error',__('messages.fails'));
            return redirect()->back();
        }
    }
}
