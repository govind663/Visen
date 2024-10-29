<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\InnovationDetailsRequest;
use App\Models\InnovationDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InnovationDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $innovationDetails = InnovationDetails::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.innovationDetails.index', [
            'innovationDetails' => $innovationDetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.innovationDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InnovationDetailsRequest $request)
    {
        $request->validated();
        try {

            $innovationDetails = new InnovationDetails();

            // ==== Upload (banner_image or banner_video)
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/innovation_details/banner_image/'), $new_name);

                $image_path = "/visen/innovation_details/banner_image/" . $new_name;
                $innovationDetails->banner_image = $new_name;
                $innovationDetails->banner_video = null; // Clear the video if an image is uploaded
            }

            if ($request->hasFile('banner_video')) {
                $video = $request->file('banner_video');
                $extension = $video->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $video->move(public_path('/visen/innovation_details/banner_video/'), $new_name);

                $video_path = "/visen/innovation_details/banner_video/" . $new_name;
                $innovationDetails->banner_video = $new_name;
                $innovationDetails->banner_image = null; // Clear the image if a video is uploaded
            }

            $innovationDetails->title = $request->title;
            $innovationDetails->description = $request->description;
            $innovationDetails->inserted_at = Carbon::now();
            $innovationDetails->inserted_by = Auth::user()->id;
            $innovationDetails->save();

            return redirect()->route('innovation-details.index')->with('message','Innovation Details has been successfully created.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
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
        $innovationDetails = InnovationDetails::find($id);

        return view('backend.innovationDetails.edit', [
            'innovationDetails' => $innovationDetails
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InnovationDetailsRequest $request, string $id)
    {
        $request->validated();
        try {
            // Find the existing Banner record
            $innovationDetails = InnovationDetails::findOrFail($id);

            // Check and upload the banner image
            if ($request->hasFile('banner_image')) {
                // Delete the old image if it exists
                if ($innovationDetails->banner_image) {
                    $oldImagePath = public_path('/visen/innovation_details/banner_image/' . $innovationDetails->banner_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                // Process the new image
                $image = $request->file('banner_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/innovation_details/banner_image/'), $new_name);

                // Update the banner object with the new image path
                $innovationDetails->banner_image = $new_name;
                $innovationDetails->banner_video = null; // Clear the video if an image is uploaded
            }

            // Check and upload the banner video
            if ($request->hasFile('banner_video')) {
                // Delete the old video if it exists
                if ($innovationDetails->banner_video) {
                    $oldVideoPath = public_path('/visen/innovation_details/banner_video/' . $innovationDetails->banner_video);
                    if (file_exists($oldVideoPath)) {
                        unlink($oldVideoPath); // Delete the old video file
                    }
                }

                // Process the new video
                $video = $request->file('banner_video');
                $extension = $video->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $video->move(public_path('/visen/innovation_details/banner_video/'), $new_name);

                // Update the banner object with the new video path
                $innovationDetails->banner_video = $new_name;
                $innovationDetails->banner_image = null; // Clear the image if a video is uploaded
            }

            // Update other banner details
            $innovationDetails->title = $request->title;
            $innovationDetails->description = $request->description;
            $innovationDetails->modified_at = Carbon::now();
            $innovationDetails->modified_by = Auth::user()->id;
            $innovationDetails->save();

            return redirect()->route('innovation-details.index')->with('message', 'Innovation Details has been successfully updated.');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong while updating the Innovation Details. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();

        try{

            $innovationDetails = InnovationDetails::findOrFail($id);
            $innovationDetails->update($data);

            return redirect()->route('innovation-details.index')->with('message','Innovation Details has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
