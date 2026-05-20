<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

/**
 * Toont de publieke profielpagina
 * van een gebruiker.
 *
 * Deze pagina is toegankelijk
 * voor alle bezoekers.
 */
public function show(\App\Models\User $user)
{
    return view('profile.show', compact('user'));
}





    
   public function update(Request $request): RedirectResponse
{
    /**
 * Valideert de profielgegevens
 * van de gebruiker.
 *
 * Extra velden werden toegevoegd:
 * - username
 * - verjaardag
 * - bio
 * - profielfoto
 */
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'username' => 'nullable|string|max:255|unique:users,username,' . $request->user()->id,
        'birthday' => 'nullable|date',
        'bio' => 'nullable|string',
        'profile_photo' => 'nullable|image|max:2048',
    ]);

    /**
 * Werkt de profielgegevens
 * van de gebruiker bij.
 */
    $user = $request->user();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->birthday = $request->birthday;
    $user->bio = $request->bio;


    /**
 * Controleert of een profielfoto
 * werd geüpload.
 *
 * De afbeelding wordt opgeslagen
 * op de server.
 */
    if ($request->hasFile('profile_photo')) {

        $photoPath = $request->file('profile_photo')
            ->store('profile-photos', 'public');

        $user->profile_photo = $photoPath;
    }
/**
 * Slaat alle gewijzigde
 * profielgegevens op
 * in de database.
 */
    $user->save();

    return Redirect::route('profile.show', $user)
        ->with('success', 'Profiel succesvol bijgewerkt.');
}

    /**
 * Verwijdert het account
 * van de gebruiker.
 *
 * De gebruiker moet eerst
 * het wachtwoord bevestigen.
 *
 * Daarna wordt de gebruiker
 * uitgelogd en verwijderd
 * uit de database.
 */
    public function destroy(Request $request): RedirectResponse
    {

    /**
 * Controleert of het correcte
 * wachtwoord werd ingegeven
 * voor accountverwijdering.
 */
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
/**
 * Logt de gebruiker uit
 * voordat het account
 * verwijderd wordt.
 */
        Auth::logout();
/**
 * Verwijdert de gebruiker
 * permanent uit de database.
 */
        $user->delete();
/**
 * Maakt de sessie ongeldig
 * en genereert een nieuwe
 * CSRF token voor veiligheid.
 */
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
