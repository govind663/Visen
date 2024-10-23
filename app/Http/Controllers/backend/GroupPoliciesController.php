<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\GroupPoliciesRequest;
use App\Models\GroupPolicies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GroupPoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupPolicies = GroupPolicies::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('backend.group-policies.index', [
            'groupPolicies' => $groupPolicies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.group-policies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupPoliciesRequest $request)
    {
        $request->validated();

        try {
            $policyDocs = [];
            $policyNames = [];

            if ($request->hasFile('policy_doc')) {
                foreach ($request->file('policy_doc') as $index => $file) {
                    $extension = $file->getClientOriginalExtension();
                    $new_name = time() . rand(10, 999) . '.' . $extension;
                    $file->move(public_path('/visen/group_policy/policy_doc'), $new_name);

                    // Add to separate arrays for JSON storage
                    $policyDocs[] = $new_name;
                    $policyNames[] = $request->policy_name[$index];
                }
            }

            $groupPolicy = new GroupPolicies();

            $groupPolicy->description = $request->description;
            $groupPolicy->policy_doc = json_encode($policyDocs);
            $groupPolicy->policy_name = json_encode($policyNames);
            $groupPolicy->inserted_at = Carbon::now();
            $groupPolicy->inserted_by = Auth::user()->id;
            $groupPolicy->save();

            return redirect()->route('group-policies.index')->with('message', 'Policy has been successfully created.');

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
        $groupPolicy = GroupPolicies::find($id);

        // Decode JSON data
        $policyDocs = json_decode($groupPolicy->policy_doc, true);
        $policyNames = json_decode($groupPolicy->policy_name, true);

        return view('backend.group-policies.edit', [
            'groupPolicy' => $groupPolicy,
            'policyDocs' => $policyDocs,
            'policyNames' => $policyNames,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupPoliciesRequest $request, string $id)
    {
        $request->validated();

        try {

            $groupPolicy = GroupPolicies::findOrFail($id);


            $existingPolicyDocs = json_decode($groupPolicy->policy_doc, true);
            $existingPolicyNames = json_decode($groupPolicy->policy_name, true);

            $policyDocs = [];
            $policyNames = [];

            if ($request->hasFile('policy_doc')) {
                foreach ($request->file('policy_doc') as $index => $file) {
                    if ($file) {
                        // Remove existing file if present
                        if (isset($existingPolicyDocs[$index])) {
                            $existingFilePath = public_path('/visen/group_policy/policy_doc/' . $existingPolicyDocs[$index]);
                            if (file_exists($existingFilePath)) {
                                unlink($existingFilePath);
                            }
                        }

                        // Upload new file
                        $extension = $file->getClientOriginalExtension();
                        $new_name = time() . rand(10, 999) . '.' . $extension;
                        $file->move(public_path('/visen/group_policy/policy_doc/'), $new_name);

                        $policyDocs[] = $new_name;
                        $policyNames[] = $request->report_name[$index];
                    }
                }
            }

            // Handle any existing files not removed or replaced
            if ($request->existing_policy_doc) {
                foreach ($request->existing_policy_doc as $index => $existingDoc) {
                    if (!in_array($existingDoc, $policyDocs)) {
                        $policyDocs[] = $existingDoc;
                        $policyNames[] = $existingPolicyNames[$index];
                    }
                }
            }

            $groupPolicy->description = $request->description;
            $groupPolicy->policy_doc = json_encode($policyDocs);
            $groupPolicy->policy_name = json_encode($policyNames);
            $groupPolicy->modified_at = Carbon::now();
            $groupPolicy->modified_by = Auth::user()->id;
            $groupPolicy->save();

            return redirect()->route('group-policies.index')->with('message', 'Policy has been successfully updated.');

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
            $groupPolicy = GroupPolicies::findOrFail($id);
            $groupPolicy->update($data);

            return redirect()->route('group-policies.index')->with('message', 'Policy has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
