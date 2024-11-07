<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EventsRequest;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.events.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventsRequest $request)
    {
        $request->validated();

        try {
            
            $events = new Events();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/events/image/'), $new_name);

                $image_path = "/visen/events/image/" . $new_name;
                $events->image = $new_name;
            }

            $events->title = $request->title;
            $events->location = $request->location;
            $events->description = $request->description;
            $events->inserted_at = Carbon::now();
            $events->inserted_by = Auth::user()->id;
            $events->save();

            return redirect()->route('events.index')->with('message', 'Events has been successfully added.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $events = Events::findOrFail($id);
        return view('backend.events.edit', [
            'events' => $events
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventsRequest $request, string $id)
    {
        $request->validated();

        try {
            $events = Events::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete the old image if it exists
                if ($events->image) {
                    $oldImagePath = public_path($events->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/events/image/'), $new_name);

                // Update the events object with the new image path
                $events->image = "/visen/events/image/" . $new_name; // Update the path for the database
                $events->image = $new_name;
            }

            // Update other fields
            $events->title = $request->title;
            $events->location = $request->location;
            $events->description = $request->description;
            $events->modified_by = Auth::user()->id;
            $events->modified_at = Carbon::now();
            $events->save();

            return redirect()->route('events.index')->with('message', 'Events has been successfully updated.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {

            $events = Events::findOrFail($id);
            $events->update($data);

            return redirect()->route('events.index')->with('message', 'Events has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
