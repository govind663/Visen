<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CounterRequest;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counters = Counter::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view("backend.counter.index", [
            'counters' => $counters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.counter.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CounterRequest $request)
    {
        $request->validated();

        try {

            $counter = Counter::where('title', $request->title)->first();

            if ($counter) {
                return redirect()->back()->with('error', 'Counter already exists.');
            }

            // Create a new About instance
            $counter = new Counter();
            $counter->title = $request->title;
            $counter->description = $request->description;
            $counter->inserted_at = Carbon::now();
            $counter->inserted_by = Auth::user()->id;
            $counter->save();

            return redirect()->route('counter.index')->with('message', 'Counter has been successfully created.');
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
        $counters = Counter::findOrFail($id);
        return view("backend.counter.edit", [
            'counters' => $counters
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CounterRequest $request, string $id)
    {
        $request->validated();

        try {

            $counters = Counter::findOrFail($id);

            $counters->title = $request->title;
            $counters->description = $request->description;
            $counters->modified_by = Auth::user()->id;
            $counters->modified_at = Carbon::now();
            $counters->save();

            return redirect()->route('counter.index')->with('message', 'Counter has been successfully updated.');

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

            $counter = Counter::findOrFail($id);
            $counter->update($data);

            return redirect()->route('counter.index')->with('success', 'Counter has been successfully deleted');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
