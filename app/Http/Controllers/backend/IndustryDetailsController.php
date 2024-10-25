<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\IndustryDetailsRequest;
use App\Models\Industry;
use App\Models\IndustryDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IndustryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industryDetails = IndustryDetails::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.industryDetails.index', [
            'industryDetails' => $industryDetails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // === Fetch industries_name
        $industriesName = Industry::orderBy("id","asc")->whereNull('deleted_at')->get([
            'industries_name',
            'id'
        ]);

        return view('backend.industryDetails.create', [
            'industriesName' => $industriesName
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndustryDetailsRequest $request)
    {
        $request->validated();

        try {

            $industryDetails = new IndustryDetails();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/industry_details/image/'), $new_name);

                $image_path = "/visen/industry_details/image/" . $new_name;
                $industryDetails->image = $new_name;
            }

            $industryDetails->industry_id = $request->industry_id;
            $industryDetails->categoryName = $request->categoryName;
            $industryDetails->description = $request->description;
            $industryDetails->inserted_at = Carbon::now();
            $industryDetails->inserted_by = Auth::user()->id;
            $industryDetails->save();

            return redirect()->route('industryDetails.index')->with('message', 'Industry Details has been successfully created.');

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
        $industryDetails = IndustryDetails::findOrFail($id);

        // Fetch industries_name
        $industriesName = Industry::orderBy("id", "asc")
                                    ->whereNull('deleted_at')
                                    ->get(['industries_name', 'id']);
                                    
        // Fetch and decode industry_category JSON
        $industriesCategoryName = Industry::orderBy("id", "asc")
                                            ->whereNull('deleted_at')
                                            ->get(['industry_category'])
                                            ->map(function ($industry) {
                                                // Decode the JSON and return as an array
                                                return json_decode($industry->industry_category, true);
                                            });

        return view('backend.industryDetails.edit', [
            'industryDetails' => $industryDetails,
            'industriesName' => $industriesName,
            'industriesCategoryName' => $industriesCategoryName
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndustryDetailsRequest $request, string $id)
    {
        $request->validated();

        try {

            $industryDetails = IndustryDetails::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete the old image if it exists
                if ($industryDetails->image) {
                    $oldImagePath = public_path($industryDetails->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/industry_details/image/'), $new_name);

                // Update the Industry Details object with the new image path
                $industryDetails->image = "/visen/industry_details/image/" . $new_name; // Update the path for the database
            }

            $industryDetails->industry_id = $request->industry_id;
            $industryDetails->categoryName = $request->categoryName;
            $industryDetails->description = $request->description;
            $industryDetails->modified_by = Auth::user()->id;
            $industryDetails->modified_at = Carbon::now();
            $industryDetails->save();

            return redirect()->route('industryDetails.index')->with('message', 'Industry Details has been successfully updated.');

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

            $industryDetails = IndustryDetails::findOrFail($id);
            $industryDetails->update($data);

            return redirect()->route('industryDetails.index')->with('message', 'Industry Details has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
