<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed', // Opsional, jika user ingin mengubah password
        ]);

        // Jika user mengupload gambar baru, simpan gambarnya
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete('profile_images/' . $user->image);
            }

            // Simpan gambar baru
            $imageName = $request->file('image')->hashName();
            $request->file('image')->storeAs('profile_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        // Update password jika ada input password baru
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->input('password'));
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
