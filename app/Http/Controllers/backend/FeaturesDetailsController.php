<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FeaturesDetailsRequest;
use App\Models\Features;
use App\Models\FeaturesDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FeaturesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features_details = FeaturesDetails::with('features')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.features_details.index', [
            'features_details' => $features_details
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ==== Fetch Features and get only ('id', 'title')
        $features = Features::select('id', 'title')->orderBy("id","asc")->whereNull('deleted_at')->get();

        return view('backend.features_details.create', [
            'features' => $features
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeaturesDetailsRequest $request)
    {
        $request->validated();

        try {

            $features_details = new FeaturesDetails();

            // Check if the request contains an image file
            if ($request->hasFile('featureImage') && $request->file('featureImage')->isValid()) {

                $image = $request->file('featureImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/features_details/featureImage/'), $new_name);

                $image_path = "/visen/features_details/featureImage/" . $new_name;
                $features_details->featureImage = $new_name;
            }

            $features_details->features_id = $request->features_id;
            $features_details->title = $request->title;
            $features_details->description = $request->description;
            $features_details->inserted_at = Carbon::now();
            $features_details->inserted_by = Auth::user()->id;
            $features_details->save();

            return redirect()->route('features-details.index')->with('message', 'Features Details has been successfully added.');

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
        $features_details = FeaturesDetails::findOrFail($id);
        $features = Features::select('id', 'title')->orderBy("id","asc")->whereNull('deleted_at')->get();

        return view('backend.features_details.edit', [
            'features_details' => $features_details,
            'features' => $features
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeaturesDetailsRequest $request, string $id)
    {
        $request->validated();

        try {

            $features_details = FeaturesDetails::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('featureImage') && $request->file('featureImage')->isValid()) {
                // Delete the old image if it exists
                if ($features_details->featureImage) {
                    $oldImagePath = public_path($features_details->featureImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('featureImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/features_details/featureImage/'), $new_name);

                // Update the media object with the new image path
                $features_details->image = "/visen/features_details/featureImage/" . $new_name; // Update the path for the database
                $features_details->image = $new_name;
            }

            $features_details->features_id = $request->features_id;
            $features_details->title = $request->title;
            $features_details->description = $request->description;
            $features_details->modified_by = Auth::user()->id;
            $features_details->modified_at = Carbon::now();
            $features_details->save();

            return redirect()->route('features-details.index')->with('message', 'Features Details has been successfully updated.');

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

            $features_details = FeaturesDetails::findOrFail($id);
            $features_details->update($data);

            return redirect()->route('features-details.index')->with('message', 'Features Details has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
