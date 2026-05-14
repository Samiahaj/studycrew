<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}
