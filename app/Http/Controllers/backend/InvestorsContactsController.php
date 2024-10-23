<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\InvestorsContactsRequest;
use App\Models\InvestorsContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InvestorsContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investorsContacts = InvestorsContacts::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.investors-contacts.index', [
            'investorsContacts' => $investorsContacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.investors-contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvestorsContactsRequest $request)
    {
        $request->validated();

        try {

            $investorsContact = InvestorsContacts::where('investor_name', $request->investor_name)->first();

            if ($investorsContact) {
                return redirect()->back()->with('error', 'Investors Contact already exists.');
            }

            // Create a new Investors Contact
            $investorsContact = new InvestorsContacts();

            if ($request->hasFile('investor_image')) {
                $image = $request->file('investor_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/annual_report/investor_image'), $new_name);

                $image_path = "/visen/annual_report/investor_image/" . $new_name;
                $investorsContact->investor_image = $new_name;
            }

            $investorsContact->investor_designation = $request->investor_designation;
            $investorsContact->investor_address = $request->investor_address;
            $investorsContact->investor_name = $request->investor_name;
            $investorsContact->investor_email = $request->investor_email;
            $investorsContact->investor_tel = $request->investor_tel;
            $investorsContact->investor_fax = $request->investor_fax;
            $investorsContact->investor_website = $request->investor_website;
            $investorsContact->status = $request->status;
            $investorsContact->inserted_at = Carbon::now();
            $investorsContact->inserted_by = Auth::user()->id;
            $investorsContact->save();

            return redirect()->route('investors-contacts.index')->with('message', 'Investors Contact has been successfully created.');

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
        $investorsContact = InvestorsContacts::findOrFail($id);

        return view('backend.investors-contacts.edit', [
            'investorsContact' => $investorsContact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvestorsContactsRequest $request, string $id)
    {
        $request->validated();
        try {
            $investorsContact = InvestorsContacts::findOrFail($id);

            // Check if the request contains an investor_image file
            if ($request->hasFile('investor_image') && $request->file('investor_image')->isValid()) {
                // Delete the old image if it exists
                if ($investorsContact->investor_image) {
                    $oldImagePath = public_path($investorsContact->investor_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('investor_image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/annual_report/investor_image'), $new_name);

                // Update the investor_contact object with the new image path
                $investorsContact->investor_image = "/visen/annual_report/investor_image/" . $new_name; // Update the path for the database
            }

            // Update other fields
            $investorsContact->investor_designation = $request->investor_designation;
            $investorsContact->investor_address = $request->investor_address;
            $investorsContact->investor_name = $request->investor_name;
            $investorsContact->investor_email = $request->investor_email;
            $investorsContact->investor_tel = $request->investor_tel;
            $investorsContact->investor_fax = $request->investor_fax;
            $investorsContact->investor_website = $request->investor_website;
            $investorsContact->status = $request->status;
            $investorsContact->modified_by = Auth::user()->id;
            $investorsContact->modified_at = Carbon::now();
            $investorsContact->save();

            return redirect()->route('investors-contacts.index')->with('message', 'Investors Contact has been successfully updated.');

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
            InvestorsContacts::where('id', $id)->update($data);

            return redirect()->route('investors-contacts.index')->with('success', 'Investors Contact successfully deleted.');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
