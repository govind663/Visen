<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.news.index', [
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $request->validated();

        try {

            $news = News::where('title', $request->title)->first();

            if ($news) {
                return redirect()->back()->with('error', 'News already exists.');
            }

            // Create a new News instance
            $news = new News();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/news/image/'), $new_name);

                $image_path = "/visen/news/image/" . $new_name;
                $news->image = $new_name;
            }

            $news->title = $request->title;
            $news->description = $request->description;
            $news->inserted_at = Carbon::now();
            $news->inserted_by = Auth::user()->id;
            $news->save();

            return redirect()->route('news.index')->with('message', 'News has been successfully added.');

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
        $news = News::findOrFail($id);

        return view('backend.news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        $request->validated();
        try {
            $news = News::findOrFail($id);

            // Check if the request contains an image file
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete the old image if it exists
                if ($news->image) {
                    $oldImagePath = public_path($news->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/news/image/'), $new_name);

                // Update the news object with the new image path
                $news->image = "/visen/news/image/" . $new_name; // Update the path for the database
            }

            // Update other fields
            $news->title = $request->title;
            $news->description = $request->description;
            $news->modified_by = Auth::user()->id;
            $news->modified_at = Carbon::now();
            $news->save();

            return redirect()->route('news.index')->with('message', 'News has been successfully updated.');

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
            $news = News::findOrFail($id);
            $news->update($data);

            return redirect()->route('news.index')->with('message', 'News has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
