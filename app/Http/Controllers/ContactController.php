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

/**
 * Valideert de gegevens
 * van het contactformulier.
 *
 * Naam, email en bericht
 * zijn verplicht.
 */
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'message' => 'required|max:1000',
    ]);

    /**
 * Slaat het contactbericht op
 * in de database zodat admins
 * het later kunnen bekijken.
 */

    ContactMessage::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);


    /**
 * Verstuurt een email naar
 * de admin met de inhoud
 * van het contactformulier.
 *
 * Tijdens development wordt
 * MAIL_MAILER=log gebruikt.
 */
    Mail::to('admin@ehb.be')
        ->send(new ContactMessageMail($request->all()));

    return back()
        ->with('success', 'Bericht succesvol verzonden.');
}


/**
 * Haalt alle contactberichten op
 * voor de admin pagina.
 *
 * Berichten worden gesorteerd
 * van nieuw naar oud.
 */
public function adminIndex()
{
    $messages = ContactMessage::latest()->get();

    return view(
        'admin.messages.index',
        compact('messages')
    );
}

/**
 * Verwijdert een contactbericht.
 *
 * Admins kunnen berichten beheren
 * en verwijderen via het dashboard.
 */
public function destroy(ContactMessage $message)
{
    $message->delete();

    return back()
        ->with('success', 'Bericht verwijderd.');
}
}
