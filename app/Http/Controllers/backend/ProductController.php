<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Industry;
use App\Models\Product;
use App\Models\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('industry')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view('backend.product.index', [
            'products' => $products
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

        return view('backend.product.create',[
            'industriesName' => $industriesName
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        try {

            // Create a new Product instance
            $product = new Product();

            $product->industry_id = $request->industry_id;
            $product->categoryName = $request->categoryName;
            $product->filterName = $request->filterName;
            $product->productName = $request->productName;
            $product->productCategoryName = json_encode($request->productCategoryName);
            $product->status = $request->status;
            $product->inserted_at = Carbon::now();
            $product->inserted_by = Auth::user()->id;
            $product->save();

            return redirect()->route('product.index')->with('message', 'Product has been successfully created.');

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
    public function edit(string $id, Request $request)
    {
        $product = Product::findOrFail($id);

        // Fetch industries_name
        $industriesName = Industry::orderBy("id", "asc")
                                    ->whereNull('deleted_at')
                                    ->get(['industries_name', 'id']);

        // Fetch IDs from $industriesName
        $industriesId = $industriesName->pluck('id')->toArray();

        // Fetch and decode industry_category JSON
        $industriesCategoryName = Industry::orderBy("id", "asc")
                                            ->whereNull('deleted_at')
                                            ->get(['industry_category'])
                                            ->map(function ($industry) {
                                                // Decode the JSON and return as an array
                                                return json_decode($industry->industry_category, true);
                                            });

        // Fetch and decode filterName JSON by filter_name in table ProductFilter
        $filterNames = ProductFilter::orderBy("id", "asc")
                                    ->whereNull('deleted_at')
                                    ->when(!empty($industriesId), function ($query) use ($industriesId) {
                                        // Filter by matching industry_id in the $industriesId array
                                        return $query->whereIn('industry_id', $industriesId);
                                    })
                                    ->get(['filter_name'])
                                    ->map(function ($productFilter) {
                                        // Decode the JSON and return as an array
                                        return json_decode($productFilter->filter_name, true);
                                    });
        // dd($filterNames);

        // Decode the productCategoryName JSON to get an array
        $productCategoryName = json_decode($product->productCategoryName, true);

        return view('backend.product.edit', [
            'product' => $product,
            'industriesName' => $industriesName,
            'industriesCategoryName' => $industriesCategoryName,
            'filterNames' => $filterNames,
            'productCategoryName' => $productCategoryName,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $request->validated();

        try {
            $product = Product::findOrFail($id);

            $product->industry_id = $request->industry_id;
            $product->categoryName = $request->categoryName;
            $product->filterName = $request->filterName;
            $product->productName = $request->productName;
            $product->productCategoryName = json_encode($request->productCategoryName);
            $product->status = $request->status;
            $product->modified_by = Auth::user()->id;
            $product->modified_at = Carbon::now();
            $product->save();

            return redirect()->route('product.index')->with('message', 'Product has been successfully updated.');

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

            $product = Product::findOrFail($id);
            $product->update($data);

            return redirect()->route('product.index')->with('message', 'Product has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
