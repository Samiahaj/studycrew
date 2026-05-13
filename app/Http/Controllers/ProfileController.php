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


public function show(\App\Models\User $user)
{
    return view('profile.show', compact('user'));
}





    /**
     * Update the user's profile information.
     */
   public function update(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'username' => 'nullable|string|max:255|unique:users,username,' . $request->user()->id,
        'birthday' => 'nullable|date',
        'bio' => 'nullable|string',
        'profile_photo' => 'nullable|image|max:2048',
    ]);

    $user = $request->user();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->birthday = $request->birthday;
    $user->bio = $request->bio;

    if ($request->hasFile('profile_photo')) {

        $photoPath = $request->file('profile_photo')
            ->store('profile-photos', 'public');

        $user->profile_photo = $photoPath;
    }

    $user->save();

    return Redirect::route('profile.show', $user)
        ->with('success', 'Profiel succesvol bijgewerkt.');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
