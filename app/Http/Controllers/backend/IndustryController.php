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
            // Create a new Industry instance
            $industries = new Industry();
            $industries->title = $request->title;
            $industries->status = $request->status;

            // Collect industry details dynamically
            $industryDetails = [];
            if ($request->has('industries_name') && $request->has('industries_description')) {
                foreach ($request->industries_name as $index => $industryName) {
                    if (!empty($industryName) && !empty($request->industries_description[$index])) {
                        $detail = [
                            'name' => $industryName,
                            'description' => $request->industries_description[$index]
                        ];

                        // Handle file upload if present
                        if ($request->hasFile('industries_image.' . $index)) {
                            $image = $request->file('industries_image.' . $index);
                            $newName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                            $image->move(public_path('/industries/images'), $newName);
                            $detail['image'] = $newName;
                        }

                        $industryDetails[] = $detail;
                    }
                }
            }

            // Save details as JSON in the 'industry_details' column
            $industries->industry_details = json_encode($industryDetails);
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

        return view('backend.industries.edit', [
            'industries' => $industries
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
            $industries = Industry::findOrFail($id);
            $industries->title = $request->title;
            $industries->status = $request->status;

            // Fetch existing industry details
            $existingIndustryDetails = json_decode($industries->industry_details, true);

            // Prepare updated industry details
            $updatedIndustryDetails = [];
            if ($request->has('industries_name') && $request->has('industries_description')) {
                foreach ($request->industries_name as $index => $industryName) {
                    if (!empty($industryName) && !empty($request->industries_description[$index])) {
                        $detail = [
                            'name' => $industryName,
                            'description' => $request->industries_description[$index]
                        ];

                        // Check if a new image file is uploaded for this index
                        if ($request->hasFile('industries_image.' . $index)) {
                            // Upload the new image
                            $image = $request->file('industries_image.' . $index);
                            $newName = time() . rand(10, 999) . '.' . $image->getClientOriginalExtension();
                            $image->move(public_path('/industries/images'), $newName);

                            // If an old image exists, delete it
                            if (isset($existingIndustryDetails[$index]['image']) && file_exists(public_path('/industries/images/' . $existingIndustryDetails[$index]['image']))) {
                                unlink(public_path('/industries/images/' . $existingIndustryDetails[$index]['image']));
                            }

                            $detail['image'] = $newName;
                        } else {
                            // If no new image, keep the existing image if available
                            if (isset($existingIndustryDetails[$index]['image'])) {
                                $detail['image'] = $existingIndustryDetails[$index]['image'];
                            }
                        }

                        $updatedIndustryDetails[] = $detail;
                    }
                }
            }

            // Save updated details as JSON in the 'industry_details' column
            $industries->industry_details = json_encode($updatedIndustryDetails);
            $industries->save();

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
