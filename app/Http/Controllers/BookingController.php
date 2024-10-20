<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of all bookings.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit', 10);

        $user = Auth::user();
        if ($user->role === 'organizer') {
            $bookings = Booking::whereHas('event', function ($query) use ($user) {
                $query->where('organizer_u_id', $user->id);
            })->with('event', 'user')
              ->where('name', 'LIKE', "%$search%")
              ->paginate($limit);
        } elseif ($user->role === 'user') {
            $bookings = Booking::where('u_id', $user->id)
                ->with('event', 'user')
                ->where('name', 'LIKE', "%$search%")
                ->paginate($limit);
        } else {
            $bookings = Booking::with('event', 'user')
                ->where('name', 'LIKE', "%$search%")
                ->paginate($limit);
        }

        return view('booking.index', compact('bookings', 'search', 'limit'));
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create($event_id)
    {
        $event = Event::findOrFail($event_id);
        $users = User::where('role', 'user')->get();
        return view('booking.create', compact('event', 'users'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request, $event_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'total' => 'required|integer|min:1',
        ]);

        Booking::create([
            'name' => $validatedData['name'],
            'time' => now(),
            'total' => $validatedData['total'],
            'u_id' => Auth::id(), // Gunakan Auth::id() untuk ID pengguna yang sedang login
            'e_id' => $event_id,
            'verified' => false,
        ]);

        return redirect()->route('crud-event.index')->with('success', 'Booking successfully created.');
    }

    /**
     * Display the specified booking.
     */
    public function show($id)
    {
        $booking = Booking::with('event')->findOrFail($id);
        return view('booking.show', compact('booking'));
    }

    /**
     * Verify a booking.
     */
    public function verify(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->verified = true;
        $booking->save();

        return response()->json(['verified' => $booking->verified]);
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking successfully deleted.');
    }
}

