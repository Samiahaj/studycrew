<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }


public function create()
{
    return view('admin.users.create');
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'role' => 'required|in:user,admin',
    ]);

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






    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {

            return back()
                ->with('success', 'Je kan jezelf niet verwijderen.');
        }

        $user->delete();

        return back()
            ->with('success', 'Gebruiker verwijderd.');
    }


    public function toggleAdmin(User $user)
    {
        
        if ($user->id === auth()->id()) {

            return back()
                ->with('success', 'Je kan je eigen rechten niet aanpassen.');
        }

        
        if ($user->email === 'admin@ehb.be') {

            return back()
                ->with('success', 'De hoofdadmin kan niet gewijzigd worden.');
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