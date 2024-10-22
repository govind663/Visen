<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SustainabilityRequest;
use App\Models\Sustainability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SustainabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sustainability = Sustainability::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.sustainability.index', [
            'sustainability' => $sustainability
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sustainability.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SustainabilityRequest $request)
    {
        $request->validated();

        try {

            $sustainability = Sustainability::where('description', $request->description)->first();

            if ($sustainability) {
                return redirect()->back()->with('error', 'Sustainability already exists.');
            }

            // Create a new Sustainability instance
            $sustainability = new Sustainability();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/sustainability/image'), $new_name);

                $image_path = "/visen/sustainability/image/" . $new_name;
                $sustainability->image = $new_name;
            }

            $sustainability->title = $request->title;
            $sustainability->description = $request->description;
            $sustainability->inserted_at = Carbon::now();
            $sustainability->inserted_by = Auth::user()->id;
            $sustainability->save();

            return redirect()->route('sustainability.index')->with('message', 'Sustainability has been successfully added.');

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
        $sustainability = Sustainability::findOrFail($id);

        return view('backend.sustainability.edit', [
            'sustainability' => $sustainability
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SustainabilityRequest $request, string $id)
    {
        $request->validated();

        try {

            $sustainability = Sustainability::findOrFail($id);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/sustainability/image'), $new_name);

                $image_path = "/visen/sustainability/image/" . $new_name;
                $sustainability->image = $new_name;
            }

            $sustainability->title = $request->title;
            $sustainability->description = $request->description;
            $sustainability->modified_by = Auth::user()->id;
            $sustainability->modified_at = Carbon::now();
            $sustainability->save();

            return redirect()->route('sustainability.index')->with('message', 'Sustainability has been successfully updated.');

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
            $sustainability = Sustainability::findOrFail($id);
            $sustainability->update($data);

            return redirect()->route('sustainability.index')->with('success', 'Sustainability has been successfully deleted');
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
