<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductFilterRequest;
use App\Models\Industry;
use App\Models\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productFilters = ProductFilter::with('industry')
                                        ->orderBy("id","desc")
                                        ->whereNull('deleted_at')
                                        ->get()
                                        ->map(function ($filter) {
                                            // Decode the JSON stored in filter_name
                                            $filter->decoded_filter_name = json_decode($filter->filter_name, true);
                                            return $filter;
                                        });

        return view('backend.product-filters.index', [
            'productFilters' => $productFilters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // === Fetch industries_name
        $industriesName = Industry::orderBy("id","asc")->whereNull('deleted_at')->get([
            'industries_name',
            'id'
        ]);

        return view('backend.product-filters.create', [
            'industriesName' => $industriesName,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFilterRequest $request)
    {
        $request->validated();

        try {

            // Create a new Product Filter instance
            $industries = new ProductFilter();

            $industries->industry_id = $request->industry_id;
            $industries->category_id = $request->category_id;
            $industries->filter_name = json_encode($request->filter_name);
            $industries->inserted_at = Carbon::now();
            $industries->inserted_by = Auth::user()->id;
            $industries->save();

            return redirect()->route('product-filter.index')->with('message', 'Product Filter has been successfully created.');

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
        $productFillter = ProductFilter::findOrFail($id);

        // Decode the filter_name JSON to get an array
        $decodedFilterNames = json_decode($productFillter->filter_name, true);

        // Fetch industries_name
        $industriesName = Industry::orderBy("id", "asc")
            ->whereNull('deleted_at')
            ->get(['industries_name', 'id']);

        // ==== get industry_category which is store in jason format
        $industriesCategoryName = Industry::orderBy("id", "asc")
                                        ->whereNull('deleted_at')
                                        ->get(['industry_category', 'id']);

        // === Decode industriesCategoryName
        $industriesCategoryName = json_decode($industriesCategoryName[0]->industry_category, true);
        // dd($industriesCategoryName);


        $filterNames = $decodedFilterNames;

        return view('backend.product-filters.edit', [
            'productFillter' => $productFillter,
            'industriesName' => $industriesName,
            'industriesCategoryName' => $industriesCategoryName,
            'filterNames' => $filterNames
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFilterRequest $request, string $id)
    {
        $request->validated();

        try {

            $productFilter = ProductFilter::findOrFail($id);

            $productFilter->industry_id = $request->industry_id;
            $productFilter->category_id = $request->category_id;
            $productFilter->filter_name = json_encode($request->filter_name);
            $productFilter->modified_at = Carbon::now();
            $productFilter->modified_by = Auth::user()->id;
            $productFilter->save();

            return redirect()->route('product-filter.index')->with('message', 'Product Filter has been successfully updated.');

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

            $productFilter = ProductFilter::findOrFail($id);
            $productFilter->update($data);

            return redirect()->route('product-filter.index')->with('message', 'Product Filter has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }

    public function fetchCategoryNname(Request $request)
    {
        $industryID = $request->industryID;

        // Fetch the industry data based on the industry ID
        $industry = Industry::find($industryID);

        // Check if the industry exists
        if ($industry) {
            // Decode the JSON data stored in the industry_category field
            $categories = json_decode($industry->industry_category, true);

            // Ensure that we return a proper JSON response
            return response()->json($categories);
        }

        // Return an empty array if the industry is not found
        return response()->json([]);
    }

}
