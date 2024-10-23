<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MediaRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.media.index', [
            'media' => $media
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaRequest $request)
    {
        $request->validated();

        try {

            $media = Media::where('title', $request->title)->first();

            if ($media) {
                return redirect()->back()->with('error', 'Media already exists.');
            }

            // Create a new Media instance
            $media = new Media();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/media/image/'), $new_name);

                $image_path = "/visen/media/image/" . $new_name;
                $media->image = $new_name;
            }

            $media->title = $request->title;
            $media->description = $request->description;
            $media->inserted_at = Carbon::now();
            $media->inserted_by = Auth::user()->id;
            $media->save();

            return redirect()->route('media.index')->with('message', 'Media has been successfully added.');

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
        $media = Media::findOrFail($id);
        return view('backend.media.edit', [
            'media' => $media
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MediaRequest $request, string $id)
    {
        $request->validated();
        try {
            $media = Media::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete the old image if it exists
                if ($media->image) {
                    $oldImagePath = public_path($media->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/media/image/'), $new_name);

                // Update the media object with the new image path
                $media->image = "/visen/media/image/" . $new_name; // Update the path for the database
            }

            // Update other fields
            $media->title = $request->title;
            $media->description = $request->description;
            $media->modified_by = Auth::user()->id;
            $media->modified_at = Carbon::now();
            $media->save();

            return redirect()->route('media.index')->with('message', 'Media has been successfully updated.');

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
            Media::where('id', $id)->update($data);
            return redirect()->route('media.index')->with('message', 'Media has been successfully deleted.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
