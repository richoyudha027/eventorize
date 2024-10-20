<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit', 10);
        $users = User::where('role', 'user')
                ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%")
                            ->orWhere('address', 'LIKE', "%$search%");
                }
                })
                ->paginate(10); 

        return view('admin-page.user.index', compact('users', 'search', 'limit'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('admin-page.user.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,organizer,user',
        ]);

        // Menyimpan user baru dengan password yang sudah di-hash
        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User "' . $validatedData['name'] . '" successfully added.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin-page.user.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'dob' => 'nullable|date',
            'password' => 'nullable|string|min:6|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada input password baru, update password
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']); // Hapus password dari validasi jika tidak diubah
        }

        // Jika ada file gambar baru, update
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/img/' . $user->photo); // Hapus foto lama
            }
            $photoName = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('img', $photoName, 'public'); // Simpan foto baru
            $validatedData['photo'] = $photoName;
        }

        // Update data user
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User "' . $user->name . '" successfully updated.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User "' . $user->name . '" successfully deleted.');
    }
}
