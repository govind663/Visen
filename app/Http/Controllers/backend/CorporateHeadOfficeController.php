<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CorporateHeadOfficeRequest;
use App\Models\CorporateHeadOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CorporateHeadOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corporateHeadOffices = CorporateHeadOffice::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.corporate_head_offices.index', [
            'corporateHeadOffices' => $corporateHeadOffices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.corporate_head_offices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CorporateHeadOfficeRequest $request)
    {
        $request->validated();
        try {
            $corporateHeadOffice = new CorporateHeadOffice();

            // Initialize an array to store image paths
            $bannerImages = [];

            // Check if there are any images in the request
            if ($request->hasFile('bannerImage')) {
                foreach ($request->file('bannerImage') as $image) {
                    if ($image->isValid()) {
                        $extension = $image->getClientOriginalExtension();
                        $new_name = time() . rand(10, 999) . '.' . $extension;
                        $image->move(public_path('/visen/corporate_head_office/bannerImage'), $new_name);

                        // Store the bannerImage name in the array
                        $bannerImages[] = $new_name;
                        // $bannerImages[] = "/visen/corporate_head_office/bannerImage/" . $new_name;
                    }
                }
            }

            // Save the images as JSON
            $corporateHeadOffice->bannerImage = json_encode($bannerImages);

            // Assign other fields
            $corporateHeadOffice->title = $request->title;
            $corporateHeadOffice->description = $request->description;
            $corporateHeadOffice->address = $request->address;
            $corporateHeadOffice->mapLink = $request->mapLink;
            $corporateHeadOffice->phoneNo = $request->phoneNo;
            $corporateHeadOffice->whatsAppNo = $request->whatsAppNo;
            $corporateHeadOffice->emailId = $request->emailId;
            $corporateHeadOffice->websiteLink = $request->websiteLink;
            $corporateHeadOffice->inserted_at = Carbon::now();
            $corporateHeadOffice->inserted_by = Auth::user()->id;
            $corporateHeadOffice->save();

            return redirect()->route('corporate-head-office.index')->with('message', 'Corporate Head Office has been successfully created.');

        } catch(\Exception $ex) {
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
        $corporateHeadOffice = CorporateHeadOffice::findOrFail($id);

        $emailIds = explode(',', $corporateHeadOffice->emailId);

        // Decode the banner images from JSON format
        $bannerImages = json_decode($corporateHeadOffice->bannerImage) ?? [];

        return view('backend.corporate_head_offices.edit', [
            'corporateHeadOffice' => $corporateHeadOffice,
            'emailIds' => $emailIds,
            'bannerImages' => $bannerImages
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CorporateHeadOfficeRequest $request, string $id)
    {
        $request->validated();
        try {
            // Find the existing Corporate Head Office record
            $corporateHeadOffice = CorporateHeadOffice::findOrFail($id);

            // Decode existing images
            $existingImages = json_decode($corporateHeadOffice->bannerImage) ?? [];

            // Handle new images if uploaded
            if ($request->hasFile('bannerImage')) {
                foreach ($request->file('bannerImage') as $image) {
                    if ($image->isValid()) {
                        $extension = $image->getClientOriginalExtension();
                        $new_name = time() . rand(10, 999) . '.' . $extension;
                        $image->move(public_path('/visen/corporate_head_office/bannerImage'), $new_name);

                        // Store the bannerImage name in the array
                        $existingImages[] = $new_name;
                        // $existingImages[] = "/visen/corporate_head_office/bannerImage/" . $new_name;
                    }
                }
            }

            // Handle removed images (if there's a list of images to remove from the request)
            if ($request->has('removeImages')) {
                $removeImages = $request->input('removeImages'); // Array of images to remove

                foreach ($removeImages as $removeImage) {
                    // Remove from the existing images array
                    if (($key = array_search($removeImage, $existingImages)) !== false) {
                        unset($existingImages[$key]);

                        // Delete the image file from the server
                        $filePath = public_path($removeImage);
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                    }
                }
            }

            // Reindex array and save as JSON
            $corporateHeadOffice->bannerImage = json_encode(array_values($existingImages));

            // Update other fields
            $corporateHeadOffice->title = $request->title;
            $corporateHeadOffice->description = $request->description;
            $corporateHeadOffice->address = $request->address;
            $corporateHeadOffice->mapLink = $request->mapLink;
            $corporateHeadOffice->phoneNo = $request->phoneNo;
            $corporateHeadOffice->whatsAppNo = $request->whatsAppNo;
            $corporateHeadOffice->emailId = $request->emailId;
            $corporateHeadOffice->websiteLink = $request->websiteLink;
            $corporateHeadOffice->modified_at = Carbon::now();
            $corporateHeadOffice->modified_by = Auth::user()->id;
            $corporateHeadOffice->save();

            return redirect()->route('corporate-head-office.index')->with('message', 'Corporate Head Office has been successfully updated.');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong while updating the Corporate Head Office. Please try again.');
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

            $corporateHeadOffice = CorporateHeadOffice::findOrFail($id);
            $corporateHeadOffice->update($data);

            return redirect()->route('corporate-head-office.index')->with('message','Corporate Head Office has been successfully deleted.');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());

        }
    }
}
