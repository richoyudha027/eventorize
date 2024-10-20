<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan daftar organizer dari tabel users dengan role 'organizer'
        $search = $request->input('search');
        $limit = $request->input('limit', 10);

        $organizers = User::where('role', 'organizer')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate($limit);

        return view('admin-page.organizer.index', compact('organizers', 'search', 'limit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-page.organizer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input termasuk phone dan photo
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);

        // Upload photo jika ada
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoName = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('img', $photoName, 'public');
        }

        // Buat organizer baru
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'photo' => $photoName, // Simpan nama file photo
            'role' => 'organizer',
        ]);

        return redirect()->route('organizers.index')->with('success', 'Organizer created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $organizer)
    {
        return view('admin-page.organizer.edit', compact('organizer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $organizer)
    {
        // Validasi input termasuk phone dan photo
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $organizer->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);

        // Update photo jika ada file baru
        if ($request->hasFile('photo')) {
            // Hapus photo lama jika ada
            if ($organizer->photo) {
                Storage::delete('public/img/' . $organizer->photo);
            }
            $photoName = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('img', $photoName, 'public');
            $validated['photo'] = $photoName;
        }

        // Update organizer
        $organizer->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'photo' => $validated['photo'] ?? $organizer->photo, // Tetap gunakan photo lama jika tidak ada yang baru
            'password' => $validated['password'] ? bcrypt($validated['password']) : $organizer->password,
        ]);

        return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $organizer)
    {
        // Hapus file photo jika ada
        if ($organizer->photo) {
            Storage::delete('public/img/' . $organizer->photo);
        }

        $organizer->delete();

        return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully.');
    }
}
