<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('front.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:100',
            'email' => 'required|string|email',
            'description' => 'required|string|max:200',
        ]);

        try {
            Mail::to('zakaria.dehaba@gmail.com')->send(new ContactMail($data));
            session()->flash('success','Email send successfully !');
        }catch (Exception $exception){
            session()->flash('error','Oops ! Something went wrong !');
        }
        return redirect()->back();
    }
}
