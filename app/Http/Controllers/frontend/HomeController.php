<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Counter;
use App\Models\Customer;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    // === Home
    public function home(Request $request)
    {
        // ==== Fetch Banner
        $banners = Banner::orderBy("id","asc")->where('status', 1)->whereNull('deleted_at')->first();

        // ==== Fetch Industry
        $industries = Industry::orderBy("id","asc")->where('status', 1)->whereNull('deleted_at')->get();

        // ==== Fetch Counter
        $counters = Counter::orderBy("id","asc")->whereNull('deleted_at')->get();

        // ==== Fetch Customer
        $customers = Customer::orderBy("id","asc")->whereNull('deleted_at')->get();

        return view("frontend.home", [
            'banners' => $banners,
            'industries' => $industries,
            'counters' => $counters,
            'customers' => $customers
        ]);
    }

    // ==== Innovation
    public function innovation(Request $request){
        return view("frontend.innovation");
    }

    // ==== Contact Us
    public function contactUs(Request $request){
        return view("frontend.contact-us");
    }

    // ==== Investor Relations
    public function investorRelations(Request $request){
        return view("frontend.investor-relations");
    }

    // ==== News, Media & Events
    public function newsMediaEvents(Request $request){
        return view("frontend.news-media-events");
    }

    // ==== Download Brochure
    public function downloadBrochure(Request $request){
        return view("frontend.download-brochure");
    }

    // ==== Meet our Minds
    public function meetOurMinds(Request $request){
        return view("frontend.meet-our-minds");
    }

    // ===== Group Policies
    public function groupPolicies(Request $request){
        return view("frontend.group-policies");
    }

    // ==== My list
    public function myList(Request $request){
        return view("frontend.my-list");
    }

    // ==== Product Details Page With Slug
    public function productDetails(Request $request, string $industry, string $category){

        // Optionally, transform slugs back to readable names
        $industryName = $industry;
        $categoryName = $category;

        // ==== Fetch Industry
        $industry = Industry::orderBy("id","asc")->whereNull('deleted_at')->where('status', 1)->get([
            'industries_name',
            'industry_category',
            'id'
        ]);

        // === Convert industry_category to array decode
        $industry = $industry->map(function ($item) {
            $item->industry_category = json_decode($item->industry_category);
            return $item;
        });

        return view("frontend.product-details", [
            'industryName' => $industryName,
            'categoryName' => $categoryName,
            'industry' => $industry,
        ]);
    }}
