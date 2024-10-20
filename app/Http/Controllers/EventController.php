<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit', 8);
        $status = $request->input('status', true); 

        $events = Event::where('name', 'LIKE', "%$search%")
                        ->orWhere('location', 'LIKE', "%$search%")
                        ->orWhere('category', 'LIKE', "%$search%")
                        ->where('status', $status)
                        ->paginate($limit);

        return view('admin-page.event.index', compact('events', 'search', 'limit', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $organizers = User::where('role', 'organizer')->get();
        return view('admin-page.event.create', compact('organizers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'organizer_u_id' => 'required|exists:users,id', 
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'fee' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'description' => 'nullable|string',
            'status' => 'boolean', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->hashName();
            $request->file('image')->storeAs('img', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        Event::create($validatedData);
        return redirect()->route('crud-event.index')->with('success', 'Event "' . $validatedData['name'] . '" successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($crud_event)
    {
        $event = Event::findOrFail($crud_event);
        return view('admin-page.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($crud_event)
    {
        $event = Event::findOrFail($crud_event);
        $organizers = User::where('role', 'organizer')->get();
        return view('admin-page.event.edit', compact('event', 'organizers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $crud_event)
    {
        $event = Event::findOrFail($crud_event);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'organizer_u_id' => 'required|exists:users,id', 
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'fee' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'description' => 'nullable|string',
            'status' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:1,0',
        ]);

        // Jika ada gambar baru, hapus gambar lama dan simpan gambar baru
        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::delete('public/img/' . $event->image);
            }

            $imageName = $request->file('image')->hashName();
            $request->file('image')->storeAs('img', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $event->fill($validatedData);
        $event->save();

        return redirect()->route('crud-event.index')->with('success', 'Event "' . $event->name . '" successfully updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($crud_event)
    {
        $event = Event::findOrFail($crud_event);

        if ($event->image) {
            Storage::delete('public/img/' . $event->image);
        }

        $event->delete();
        return redirect()->route('crud-event.index')->with('success', 'Event "' . $event->name . '" successfully deleted.');
    }
}
