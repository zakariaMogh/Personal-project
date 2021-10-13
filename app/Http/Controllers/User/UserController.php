<?php

namespace App\Http\Controllers\User;

use App\Contracts\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserContract $user)
    {
        $this->user = $user;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Renderable
    {
        $users = $this->user->findByFilter();
        return view('user.users.index',compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Renderable
    {
        return view('user.users.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->user->new($request->validated());
        session()->flash('success',__('messages.create'));
        return redirect()->route('user.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Renderable
    {
        $user = $this->user->findOneById($id);
        return view('user.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): Renderable
    {
        $user = $this->user->findOneById($id);
        return view('user.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $this->user->update($id, $request->validated());
        session()->flash('success',__('messages.update'));
        return redirect()->route('user.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->user->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('user.users.index');
    }
}
