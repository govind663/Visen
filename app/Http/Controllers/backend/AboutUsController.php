<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AboutUsRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = About::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.about-us.index', [
            'aboutUs' => $aboutUs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request)
    {
        $request->validated();

        try {

            $aboutUs = About::where('description', $request->description)->first();

            if ($aboutUs) {
                return redirect()->back()->with('error', 'About Us already exists.');
            }

            // Create a new About instance
            $aboutUs = new About();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/about_us/image'), $new_name);

                $image_path = "/visen/about_us/image/" . $new_name;
                $aboutUs->image = $new_name;
            }

            $aboutUs->description = $request->description;
            $aboutUs->inserted_at = Carbon::now();
            $aboutUs->inserted_by = Auth::user()->id;
            $aboutUs->save();

            return redirect()->route('about-us.index')->with('message', 'About Us has been successfully created.');
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
        $aboutUs = About::findOrFail($id);

        return view('backend.about-us.edit', [
            'aboutUs' => $aboutUs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request, string $id)
    {
        $request->validated();
        try {

            $aboutUs = About::findOrFail($id);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/about_us/image'), $new_name);

                $image_path = "/visen/about_us/image/" . $new_name;
                $aboutUs->image = $new_name;
            }

            $aboutUs->description = $request->description;
            $aboutUs->modified_by = Auth::user()->id;
            $aboutUs->modified_at = Carbon::now();
            $aboutUs->save();

            return redirect()->route('about-us.index')->with('message', 'About Us has been successfully updated.');

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
            $aboutUs = About::findOrFail($id);
            $aboutUs->update($data);

            return redirect()->route('about-us.index')->with('success', 'About Us has been successfully deleted');
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
