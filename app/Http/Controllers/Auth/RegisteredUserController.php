<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

    /**
 * Valideert de registratiegegevens van een nieuwe gebruiker.
 *
 * Extra validatie werd toegevoegd voor username zodat elke gebruiker een unieke gebruikersnaam heeft.
 */

        $request->validate([
    'name' => ['required', 'string', 'max:255'],

    'username' => [
        'required',
        'string',
        'max:255',
        'unique:users'
    ],

    'email' => [
        'required',
        'string',
        'lowercase',
        'email',
        'max:255',
        'unique:'.User::class
    ],

    'password' => [
        'required',
        'confirmed',
        Rules\Password::defaults()
    ],
]);

/**
 * Maakt een nieuwe gebruiker aan.
 *
 * Extra velden werden toegevoegd:
 * - username
 * - role
 *
 * Elke nieuwe gebruiker krijgt
 * standaard de rol "user".
 */
        $user = User::create([
    'name' => $request->name,
    'username' => $request->username,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role' => 'user',
]);

        event(new Registered($user));

        Auth::login($user);



        /**
 * Controleert de rol van de gebruiker
 * na registratie.
 *
 * Admins worden doorgestuurd naar
 * het dashboard.
 *
 * Gewone gebruikers worden doorgestuurd
 * naar de homepagina.
 */
       if ($user->isAdmin()) {

    return redirect()->route('dashboard');
}

return redirect()->route('home');
    }
}
