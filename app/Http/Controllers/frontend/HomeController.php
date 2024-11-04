<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // === Home
    public function home(Request $request)
    {
        return view("frontend.home");
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

        $industryName = $industry;
        $categoryName = $category;

        return view("frontend.product-details", [
            'industryName' => $industryName,
            'categoryName' => $categoryName,
        ]);
    }
}
