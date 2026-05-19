<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;

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

    ContactMessage::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    Mail::to('admin@ehb.be')
        ->send(new ContactMessageMail($request->all()));

    return back()
        ->with('success', 'Bericht succesvol verzonden.');
}

public function adminIndex()
{
    $messages = ContactMessage::latest()->get();

    return view(
        'admin.messages.index',
        compact('messages')
    );
}


public function destroy(ContactMessage $message)
{
    $message->delete();

    return back()
        ->with('success', 'Bericht verwijderd.');
}
}
