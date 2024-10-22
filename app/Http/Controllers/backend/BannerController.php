<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Backend\BannerRequest;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.banners.index', [
            'banners' => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $request->validated();
        try {

            $banner = new Banner();

            // ==== Upload (banner_image or banner_video)
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/banner/banner_image'), $new_name);

                $image_path = "/visen/banner/banner_image/" . $new_name;
                $banner->banner_image = $new_name;
                $banner->banner_video = null; // Clear the video if an image is uploaded
            }

            if ($request->hasFile('banner_video')) {
                $video = $request->file('banner_video');
                $extension = $video->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $video->move(public_path('/visen/banner/banner_video'), $new_name);

                $video_path = "/visen/banner/banner_video/" . $new_name;
                $banner->banner_video = $new_name;
                $banner->banner_image = null; // Clear the image if a video is uploaded
            }

            $banner->status = $request->status;
            $banner->inserted_at = Carbon::now();
            $banner->inserted_by = Auth::user()->id;
            $banner->save();

            return redirect()->route('banner.index')->with('message','Banner has been successfully created.');

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
        $banner = Banner::findOrFail($id);

        return view('backend.banners.edit', [
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        $request->validated();
        try {

            $banner = Banner::findOrFail($id);

            // ==== Upload (banner_image or banner_video)
            if ($request->hasFile('banner_image')) {
                $image = $request->file('banner_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/banner/banner_image'), $new_name);

                $image_path = "/visen/banner/banner_image/" . $new_name;
                $banner->banner_image = $new_name;
                $banner->banner_video = null; // Clear the video if an image is uploaded
            }

            if ($request->hasFile('banner_video')) {
                $video = $request->file('banner_video');
                $extension = $video->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $video->move(public_path('/visen/banner/banner_video'), $new_name);

                $video_path = "/visen/banner/banner_video/" . $new_name;
                $banner->banner_video = $new_name;
                $banner->banner_image = null; // Clear the image if a video is uploaded
            }

            $banner->status = $request->status;
            $banner->modified_at = Carbon::now();
            $banner->modified_by = Auth::user()->id;
            $banner->save();

            return redirect()->route('banner.index')->with('message','Banner has been successfully updated.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something went wrong while updating the banner. Please try again.');
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

            $banner = Banner::findOrFail($id);
            $banner->update($data);

            return redirect()->route('banner.index')->with('message','Banner has been successfully deleted.');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}