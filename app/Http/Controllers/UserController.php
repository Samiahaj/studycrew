<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

/**
 * Haalt alle gebruikers op
 * voor het admin dashboard.
 *
 * Admins kunnen gebruikers
 * bekijken en beheren.
 */
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }
 /**
 * Toont het formulier
 * om een nieuwe gebruiker
 * aan te maken.
 */

public function create()
{
    return view('admin.users.create');
}


public function store(Request $request)
{ 
    /**
 * Valideert de gegevens
 * van een nieuwe gebruiker.
 *
 * De admin kan kiezen tussen
 * een gewone gebruiker
 * of admin rol.
 */
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'role' => 'required|in:user,admin',
    ]);
  /**
 * Maakt een nieuwe gebruiker aan
 * en slaat deze op in de database.
 *
 * Het wachtwoord wordt beveiligd
 * met hashing.
 */
    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Gebruiker succesvol aangemaakt.');
}

/**
 * Verwijdert een gebruiker
 * uit de database.
 *
 * Een admin kan zichzelf
 * niet verwijderen.
 */

    public function destroy(User $user)
    {
        /**
 * Controleert of de admin
 * zichzelf probeert te verwijderen.
 *
 * Dit wordt geblokkeerd
 * voor veiligheid.
 */
        if ($user->id === auth()->id()) {

            return back()
                ->with('error', 'Je kan jezelf niet verwijderen.');
        }

        $user->delete();

        return back()
            ->with('success', 'Gebruiker verwijderd.');
    }

/**
 * Past de rol van een gebruiker aan.
 *
 * Een gebruiker kan admin worden
 * of adminrechten verliezen.
 */
    public function toggleAdmin(User $user)
    {
        /**
 * Controleert of de admin
 * zijn eigen rechten probeert
 * te wijzigen.
 *
 * Dit is niet toegestaan.
 */
        if ($user->id === auth()->id()) {

            return back()
                ->with('error', 'Je kan je eigen rechten niet aanpassen.');
        }
 /**
 * Beschermt de hoofdadmin.
 *
 * De standaard admin account
 * kan niet aangepast worden.
 */
        
        if ($user->email === 'admin@ehb.be') {

            return back()
                ->with('error', 'De hoofdadmin kan niet gewijzigd worden.');
        }

        $user->role =
            $user->role === 'admin'
                ? 'user'
                : 'admin';

        $user->save();

        return back()
            ->with('success', 'Rol succesvol aangepast.');
    }
}