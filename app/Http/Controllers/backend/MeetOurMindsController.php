<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MeetOurMindsRequest;
use App\Models\MeetOurMinds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MeetOurMindsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meetOurMinds = MeetOurMinds::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.meet-our-minds.index', [
            'meetOurMinds' => $meetOurMinds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.meet-our-minds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeetOurMindsRequest $request)
    {
        $request->validated();

        try {

            $meetOurMinds = new MeetOurMinds();

            $meetOurMinds->title = $request->title;
            $meetOurMinds->description = $request->description;
            $meetOurMinds->inserted_at = Carbon::now();
            $meetOurMinds->inserted_by = Auth::user()->id;
            $meetOurMinds->save();

            return redirect()->route('meet-our-minds.index')->with('message', 'Meet Our Minds has been successfully created.');

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
        $meetOurMinds = MeetOurMinds::findOrFail($id);

        return view('backend.meet-our-minds.edit', [
            'meetOurMinds' => $meetOurMinds
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MeetOurMindsRequest $request, string $id)
    {
        $request->validated();

        try {

            $meetOurMinds = MeetOurMinds::findOrFail($id);

            $meetOurMinds->title = $request->title;
            $meetOurMinds->description = $request->description;
            $meetOurMinds->modified_by = Auth::user()->id;
            $meetOurMinds->modified_at = Carbon::now();
            $meetOurMinds->save();

            return redirect()->route('meet-our-minds.index')->with('message', 'Meet Our Minds has been successfully updated.');

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

            $meetOurMinds = MeetOurMinds::findOrFail($id);
            $meetOurMinds->update($data);

            return redirect()->route('meet-our-minds.index')->with('message', 'Meet Our Minds has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
