<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ContactInformationRequest;
use App\Models\ContactInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ContactInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInformation = ContactInformation::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.contactInformation.index', [
            'contactInformation' => $contactInformation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contactInformation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactInformationRequest $request)
    {
        $request->validated();

        try {

            $contactInformation = new ContactInformation();

            // Check if the request contains an image file
            if ($request->hasFile('contactUsImage') && $request->file('contactUsImage')->isValid()) {
                $image = $request->file('contactUsImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/contact_information/contactUsImage/'), $new_name);

                $image_path = "/visen/contact_information/contactUsImage/" . $new_name;
                $contactInformation->contactUsImage = $new_name;
            }

            $contactInformation->title = $request->title;
            $contactInformation->description = $request->description;
            $contactInformation->inserted_at = Carbon::now();
            $contactInformation->inserted_by = Auth::user()->id;
            $contactInformation->save();

            return redirect()->route('contact-information.index')->with('message', 'Contact Information has been successfully added.');

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
        $contactInformation = ContactInformation::findOrFail($id);

        return view('backend.contactInformation.edit', [
            'contactInformation' => $contactInformation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactInformationRequest $request, string $id)
    {
        $request->validated();
        try {

            $contactInformation = ContactInformation::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('contactUsImage') && $request->file('contactUsImage')->isValid()) {
                // Delete the old image if it exists
                if ($contactInformation->contactUsImage) {
                    $oldImagePath = public_path($contactInformation->contactUsImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('contactUsImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/contact_information/contactUsImage/'), $new_name);

                // Update the contactUsImage object with the new image path
                $contactInformation->contactUsImage = "/visen/contact_information/contactUsImage/" . $new_name; // Update the path for the database
                $contactInformation->contactUsImage = $new_name;
            }

            $contactInformation->title = $request->title;
            $contactInformation->description = $request->description;
            $contactInformation->modified_by = Auth::user()->id;
            $contactInformation->modified_at = Carbon::now();
            $contactInformation->save();

            return redirect()->route('contact-information.index')->with('message', 'Contact Information has been successfully updated.');

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
            $contactInformation = ContactInformation::findOrFail($id);
            $contactInformation->update($data);

            return redirect()->route('contact-information.index')->with('message', 'Contact Information has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
