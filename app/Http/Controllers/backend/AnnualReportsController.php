<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AnnualReportsRequest;
use App\Models\AnnualReports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AnnualReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annualReports = AnnualReports::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.annual-reports.index', [
            'annualReports' => $annualReports
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.annual-reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnualReportsRequest $request)
    {
        $request->validated();

        try {

            $annualReport = new AnnualReports();

            if ($request->hasFile('report_doc')) {
                $image = $request->file('report_doc');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/annual_report/report_doc'), $new_name);

                $image_path = "/visen/annual_report/report_doc/" . $new_name;
                $annualReport->report_doc = $new_name;
            }

            $annualReport->description = $request->description;
            $annualReport->report_name = $request->report_name;
            $annualReport->inserted_at = Carbon::now();
            $annualReport->inserted_by = Auth::user()->id;
            $annualReport->save();

            return redirect()->route('annual-reports.index')->with('message', 'Annual Report has been successfully created.');
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
        $annualReport = AnnualReports::findOrFail($id);

        return view('backend.annual-reports.edit', [
            'annualReport' => $annualReport
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnualReportsRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $annualReport = AnnualReports::findOrFail($id);
            $annualReport->update($data);

            return redirect()->route('annual-reports.index')->with('success', 'Annual Report has been successfully deleted');
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
