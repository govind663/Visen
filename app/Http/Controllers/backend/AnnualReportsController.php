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
            $reportDocs = [];
            $reportNames = [];

            if ($request->hasFile('report_doc')) {
                foreach ($request->file('report_doc') as $index => $file) {
                    $extension = $file->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $file->move(public_path('/visen/annual_report/report_doc'), $new_name);

                    // Add to separate arrays for JSON storage
                    $reportDocs[] = $new_name;
                    $reportNames[] = $request->report_name[$index];
                }
            }

            $annualReport = new AnnualReports();
            $annualReport->description = $request->description;
            $annualReport->report_doc = json_encode($reportDocs);
            $annualReport->report_name = json_encode($reportNames);
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

        // Decode JSON data
        $reportDocs = json_decode($annualReport->report_doc, true);
        $reportNames = json_decode($annualReport->report_name, true);

        return view('backend.annual-reports.edit', [
            'annualReport' => $annualReport,
            'reportDocs' => $reportDocs,
            'reportNames' => $reportNames
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnualReportsRequest $request, $id)
    {
        $request->validated();

        try {
            $annualReport = AnnualReports::findOrFail($id);
            $existingReportDocs = json_decode($annualReport->report_doc, true);
            $existingReportNames = json_decode($annualReport->report_name, true);

            $reportDocs = [];
            $reportNames = [];

            if ($request->hasFile('report_doc')) {
                foreach ($request->file('report_doc') as $index => $file) {
                    if ($file) {
                        // Remove existing file if present
                        if (isset($existingReportDocs[$index])) {
                            $existingFilePath = public_path('/visen/annual_report/report_doc/' . $existingReportDocs[$index]);
                            if (file_exists($existingFilePath)) {
                                unlink($existingFilePath);
                            }
                        }

                        // Upload new file
                        $extension = $file->getClientOriginalExtension();
                        $new_name = time() . rand(10, 999) . '.' . $extension;
                        $file->move(public_path('/visen/annual_report/report_doc'), $new_name);

                        $reportDocs[] = $new_name;
                        $reportNames[] = $request->report_name[$index];
                    }
                }
            }

            // Handle any existing files not removed or replaced
            if ($request->existing_report_doc) {
                foreach ($request->existing_report_doc as $index => $existingDoc) {
                    if (!in_array($existingDoc, $reportDocs)) {
                        $reportDocs[] = $existingDoc;
                        $reportNames[] = $existingReportNames[$index];
                    }
                }
            }

            $annualReport->description = $request->description;
            $annualReport->report_doc = json_encode($reportDocs);
            $annualReport->report_name = json_encode($reportNames);
            $annualReport->modified_at = Carbon::now();
            $annualReport->modified_by = Auth::user()->id;
            $annualReport->save();

            return redirect()->route('annual-reports.index')->with('message', 'Annual Report has been successfully updated.');

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
            $annualReport = AnnualReports::findOrFail($id);
            $annualReport->update($data);

            return redirect()->route('annual-reports.index')->with('success', 'Annual Report has been successfully deleted');
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
}
