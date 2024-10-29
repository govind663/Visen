<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FeaturesRequest;
use App\Models\Features;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Features::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view("backend.features.index", [
            'features' => $features
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.features.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeaturesRequest $request)
    {
        $request->validated();

        try {

            $feature = new Features();
            $feature->title = $request->title;
            $feature->inserted_at = Carbon::now();
            $feature->inserted_by = Auth::user()->id;
            $feature->save();

            return redirect()->route('features.index')->with('message', 'Features has been successfully created.');

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
        $feature = Features::findOrFail($id);

        return view("backend.features.edit", [
            'feature' => $feature
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeaturesRequest $request, string $id)
    {
        $request->validated();

        try {

            $feature = Features::findOrFail($id);

            $feature->title = $request->title;
            $feature->modified_by = Auth::user()->id;
            $feature->modified_at = Carbon::now();
            $feature->save();

            return redirect()->route('features.index')->with('message', 'Features has been successfully updated.');

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

            $feature = Features::findOrFail($id);
            $feature->update($data);

            return redirect()->route('features.index')->with('success', 'Features has been successfully deleted');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
