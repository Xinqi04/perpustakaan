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
        return view('profileUser', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Ambil user yang sedang login
        $user = $request->user();

        // Perbarui atribut yang diperbolehkan
        $user->fill([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
        ]);

        // Simpan perubahan ke database
        $user->save();

        // Redirect ke halaman edit profil dengan pesan sukses
        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully!');
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
