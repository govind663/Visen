<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCategoryRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::with('product')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product-categories.index', [
            'productCategories' => $productCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // === Fetch Product
        $products = Product::orderBy("id","asc")->whereNull('deleted_at')->get([
            'productName',
            'id'
        ]);

        return view('backend.product-categories.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        $request->validated();

        try {

            $productCategory = new ProductCategory();

            // Check if the request contains an image file
            if ($request->hasFile('resource_doc') && $request->file('resource_doc')->isValid()) {

                $image = $request->file('resource_doc');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/product_category/resource_doc/'), $new_name);

                $image_path = "/visen/product_category/resource_doc/" . $new_name;
                $productCategory->resource_doc = $new_name;
            }

            $productCategory->product_id = $request->product_id;
            $productCategory->productCategoryName = $request->productCategoryName;
            $productCategory->name = $request->name;
            $productCategory->solidContentInPercentage = $request->solidContentInPercentage;
            $productCategory->viscosity = $request->viscosity;
            $productCategory->mfet = $request->mfet;
            $productCategory->description = $request->description;
            $productCategory->inserted_at = Carbon::now();
            $productCategory->inserted_by = Auth::user()->id;
            $productCategory->save();

            return redirect()->route('product-category.index')->with('message', 'Product Filter has been successfully created.');

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
        $productCategory = ProductCategory::findOrFail($id);

        // Fetch products
        $products = Product::orderBy("id", "asc")
            ->whereNull('deleted_at')
            ->get(['productName', 'id']);

        // Fetch productCategoryName
        $productCategoryName = $productCategory->productCategoryName;

        // Fetch product categories that match the productCategoryName in JSON format
        $productCategories = Product::whereNotNull('productCategoryName')
            ->orderBy("id", "asc")
            ->whereNull('deleted_at')
            ->get(['productCategoryName'])
            ->pluck('productCategoryName')
            ->flatMap(function ($item) {
                return json_decode($item, true);
            })
            ->unique()
            ->toArray();

        return view('backend.product-categories.edit', [
            'productCategory' => $productCategory,
            'products' => $products,
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, string $id)
    {
        $request->validated();

        try {

            $productCategory = ProductCategory::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('resource_doc') && $request->file('resource_doc')->isValid()) {
                // Delete the old resource_doc if it exists
                if ($productCategory->image) {
                    $oldImagePath = public_path($productCategory->resource_doc);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old resource_doc file
                    }
                }

                $image = $request->file('resource_doc');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/product_category/resource_doc/'), $new_name);

                // Update the media object with the new resource_doc path
                $image_path = "/visen/product_category/resource_doc/" . $new_name; // Update the path for the database
                $productCategory->resource_doc = $new_name;
            }

            $productCategory->product_id = $request->product_id;
            $productCategory->productCategoryName = $request->productCategoryName;
            $productCategory->name = $request->name;
            $productCategory->solidContentInPercentage = $request->solidContentInPercentage;
            $productCategory->viscosity = $request->viscosity;
            $productCategory->mfet = $request->mfet;
            $productCategory->description = $request->description;
            $productCategory->modified_at = Carbon::now();
            $productCategory->modified_by = Auth::user()->id;
            $productCategory->save();

            return redirect()->route('product-category.index')->with('message', 'Product Category has been successfully updated.');

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

            $productCategory = ProductCategory::findOrFail($id);
            $productCategory->update($data);

            return redirect()->route('product-category.index')->with('message', 'Product Category has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }

    public function getProductCategoryName(Request $request)
    {
        $productId = $request->productID;
        $product = Product::where('id', $productId)
            ->whereNull('deleted_at')
            ->first(['productCategoryName']);

        // Decode the JSON format if it's stored as JSON in the database
        $productCategories = $product ? json_decode($product->productCategoryName, true) : [];

        return response()->json($productCategories);
    }

}
