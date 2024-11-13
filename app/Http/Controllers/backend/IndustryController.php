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

            if ($request->hasFile('industries_image')) {
                $images = []; // Array to hold paths of each uploaded image

                foreach ($request->file('industries_image') as $image) {
                    if ($image->isValid()) {
                        $extension = $image->getClientOriginalExtension();
                        $new_name = time() . rand(10, 999) . '.' . $extension;
                        $image->move(public_path('/visen/industries/industries_image'), $new_name);

                        $image_path = "/visen/industries/industries_image/" . $new_name;
                        // Add the image name to the array
                        $images[] = $new_name;
                    }
                }

                // Convert the array to JSON format and store it in the database
                $industries->industries_image = json_encode($images);
            }

            // Check if the request contains an image file
            if ($request->hasFile('industryBannerImage') && $request->file('industryBannerImage')->isValid()) {

                $image = $request->file('industryBannerImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/industries/industryBannerImage/'), $new_name);

                $image_path = "/visen/industries/industryBannerImage/" . $new_name;
                $industries->industryBannerImage = $new_name;
            }

            $industries->industries_name = $request->industries_name;
            $industries->industryTitle = $request->industryTitle;
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

        // Decode the industry_category JSON to get an array
        $industryCategory = json_decode($industries->industry_category, true);

        // Decode the industries_image JSON to get an array
        $industries_image = json_decode($industries->industries_image, true);
        // dd($industries_image);

        return view('backend.industries.edit', [
            'industries' => $industries,
            'industryCategory' => $industryCategory,
            'industries_image' => $industries_image,
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
                // Decode the current industries_image JSON to retrieve the existing images array
                $existingImages = json_decode($industry->industries_image, true) ?? [];

                // Delete the old image(s) if they exist
                foreach ($existingImages as $oldImagePath) {
                    $fullOldImagePath = public_path($oldImagePath);
                    if (file_exists($fullOldImagePath)) {
                        unlink($fullOldImagePath); // Delete each old image file
                    }
                }

                // Initialize an array to store the new image paths
                $newImages = [];

                // Process the new image file(s)
                foreach ($request->file('industries_image') as $image) {
                    if ($image->isValid()) {
                        $extension = $image->getClientOriginalExtension();
                        $new_name = time() . rand(10, 999) . '.' . $extension;
                        $image->move(public_path('/visen/industries/industries_image'), $new_name);

                        // Add the new image path to the array
                        $newImages[] = $new_name; // Add the new image name to the array

                    }
                }

                // Store the new images array in JSON format
                $industry->industries_image = json_encode($newImages);
            }

            // Check if the request contains an image file
            if ($request->hasFile('industryBannerImage') && $request->file('industryBannerImage')->isValid()) {
                // Delete the old image if it exists
                if ($industry->industryBannerImage) {
                    $oldImagePath = public_path($industry->industryBannerImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('industryBannerImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/industries/industryBannerImage/'), $new_name);

                // Update the media object with the new image path
                // $industry->industryBannerImage = "/visen/industries/industryBannerImage/" . $new_name; // Update the path for the database
                $industry->industryBannerImage = $new_name;
            }

            // Update other fields
            $industry->industries_name = $request->industries_name;
            $industry->industryTitle = $request->industryTitle;
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
