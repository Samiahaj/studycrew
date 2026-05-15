<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
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