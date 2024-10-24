<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\IndustryRequest;
use App\Models\Industry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industry::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.industries.index', [
            'industries' => $industries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.industries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndustryRequest $request)
    {
        $request->validated();

        try {
            // === check if exist or not
            $industries = Industry::where('industries_name', $request->industries_name)->first();

            if ($industries) {
                return redirect()->back()->with('error', 'Industry already exists.');
            }

            // Create a new Industry instance
            $industries = new Industry();

            // ==== Store industries_image
            if ($request->hasFile('industries_image')) {
                $image = $request->file('industries_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/industries/industries_image'), $new_name);

                $image_path = "/visen/industries/industries_image/" . $new_name;
                $industries->industries_image = $new_name;
            }

            $industries->industries_name = $request->industries_name;
            $industries->description = $request->description;
            $industries->industry_category = json_encode($request->industry_category);
            $industries->status = $request->status;
            $industries->inserted_at = Carbon::now();
            $industries->inserted_by = Auth::user()->id;
            $industries->save();

            return redirect()->route('industry.index')->with('message', 'Industry has been successfully created.');
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
        $industries = Industry::findOrFail($id);

        $industryCategory = json_decode($industries->industry_category, true);

        return view('backend.industries.edit', [
            'industries' => $industries,
            'industryCategory' => $industryCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndustryRequest $request, string $id)
    {
        $request->validated();
        try {
            // Find the existing Industry record
            $industry = Industry::findOrFail($id);

            // Check if the request contains an industries_image file
            if ($request->hasFile('industries_image') && $request->file('industries_image')->isValid()) {
                // Delete the old image if it exists
                if ($industry->industries_image) {
                    $oldImagePath = public_path($industry->industries_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('industries_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/industries/industries_image'), $new_name);

                // Update the industry object with the new image path
                $industry->industries_image = "/visen/industries/industries_image/" . $new_name; // Store the new image path
            }

            // Update other fields
            $industry->industries_name = $request->industries_name;
            $industry->description = $request->description;
            $industry->industry_category = json_encode($request->industry_category);
            $industry->status = $request->status;
            $industry->modified_at = Carbon::now();
            $industry->modified_by = Auth::user()->id;
            $industry->save();

            return redirect()->route('industry.index')->with('message', 'Industry has been successfully updated.');
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
            $industries = Industry::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.industry.index')->with('success', 'Industry has been successfully deleted');
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
