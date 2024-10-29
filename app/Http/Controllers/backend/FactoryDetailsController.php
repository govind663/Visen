<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\FactoryDetailsRequest;
use App\Models\FactoryDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FactoryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factoryDetails = FactoryDetails::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.factory-details.index', [
            'factoryDetails' => $factoryDetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.factory-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FactoryDetailsRequest $request)
    {
        $request->validated();

        try {

            $factoryDetail = new FactoryDetails();

            // Check if the request contains an image file
            if ($request->hasFile('factoryImage') && $request->file('factoryImage')->isValid()) {
                $image = $request->file('factoryImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/factory_detail/factoryImage/'), $new_name);

                $image_path = "/visen/factory_detail/factoryImage/" . $new_name;
                $factoryDetail->factoryImage = $new_name;
            }

            $factoryDetail->factoryName = $request->factoryName;
            $factoryDetail->factoryLocationName = $request->factoryLocationName;
            $factoryDetail->factoryLocationLink = $request->factoryLocationLink;
            $factoryDetail->factoryAddress = $request->factoryAddress;
            $factoryDetail->status = $request->status;
            $factoryDetail->inserted_at = Carbon::now();
            $factoryDetail->inserted_by = Auth::user()->id;
            $factoryDetail->save();

            return redirect()->route('factory-details.index')->with('message', 'Factory Details has been successfully added.');

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
        $factoryDetails = FactoryDetails::findOrFail($id);

        return view('backend.factory-details.edit', [
            'factoryDetails' => $factoryDetails
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FactoryDetailsRequest $request, string $id)
    {
        $request->validated();

        try {
            $factoryDetail = FactoryDetails::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('factoryImage') && $request->file('factoryImage')->isValid()) {
                // Delete the old image if it exists
                if ($factoryDetail->factoryImage) {
                    $oldImagePath = public_path($factoryDetail->factoryImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('factoryImage');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/factory_detail/factoryImage/'), $new_name);

                // Update the events object with the new image path
                $factoryDetail->factoryImage = "/visen/factory_detail/factoryImage/" . $new_name; // Update the path for the database
                $factoryDetail->factoryImage = $new_name;
            }

            $factoryDetail->factoryName = $request->factoryName;
            $factoryDetail->factoryLocationName = $request->factoryLocationName;
            $factoryDetail->factoryLocationLink = $request->factoryLocationLink;
            $factoryDetail->factoryAddress = $request->factoryAddress;
            $factoryDetail->status = $request->status;
            $factoryDetail->modified_by = Auth::user()->id;
            $factoryDetail->modified_at = Carbon::now();
            $factoryDetail->save();

            return redirect()->route('factory-details.index')->with('message', 'Factory Details has been successfully updated.');

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

            $factoryDetail = FactoryDetails::findOrFail($id);
            $factoryDetail->update($data);

            return redirect()->route('factory-details.index')->with('message', 'Factory Details has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
