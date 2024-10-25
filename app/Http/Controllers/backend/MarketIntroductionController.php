<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MarketIntroductionRequest;
use App\Models\MarketIntroduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MarketIntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marketIntroduction = MarketIntroduction::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view("backend.marketIntroduction.index",["marketIntroduction"=>$marketIntroduction]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.marketIntroduction.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarketIntroductionRequest $request)
    {
        $request->validated();

        try {

            $marketIntroduction = MarketIntroduction::where('introduction', $request->introduction)->first();

            if ($marketIntroduction) {
                return redirect()->back()->with('error', 'Market Introduction already exists.');
            }

            // Create a new Market Introduction instance
            $marketIntroduction = new MarketIntroduction();

            $marketIntroduction->introduction = $request->introduction;
            $marketIntroduction->inserted_at = Carbon::now();
            $marketIntroduction->inserted_by = Auth::user()->id;
            $marketIntroduction->save();

            return redirect()->route('market-introduction.index')->with('message', 'Market Introduction has been successfully created.');
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
        $marketIntroduction = MarketIntroduction::findOrFail($id);

        return view("backend.marketIntroduction.edit",["marketIntroduction"=>$marketIntroduction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarketIntroductionRequest $request, string $id)
    {
        $request->validated();
        try {

            $marketIntroduction = MarketIntroduction::findOrFail($id);

            $marketIntroduction->introduction = $request->introduction;
            $marketIntroduction->modified_by = Auth::user()->id;
            $marketIntroduction->modified_at = Carbon::now();
            $marketIntroduction->save();

            return redirect()->route('market-introduction.index')->with('message', 'Market Introduction has been successfully updated.');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong - ' . $ex->getMessage());
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

            $marketIntroduction = MarketIntroduction::findOrFail($id);
            $marketIntroduction->delete();

            return redirect()->route('market-introduction.index')->with('message', 'Market Introduction has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something went wrong - ' . $ex->getMessage());

        }
    }
}