<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'message' => 'required|max:1000',
    ]);

    Mail::to('admin@ehb.be')
        ->send(new ContactMessageMail($request->all()));

    return back()
        ->with('success', 'Bericht succesvol verzonden.');
}
}
