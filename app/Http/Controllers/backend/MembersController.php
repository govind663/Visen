<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MembersRequest;
use App\Models\Members;
use App\Models\MeetOurMinds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Members::with('teamName')->orderBy("id","desc")->whereNull('deleted_at')->get();

        return view("backend.members.index",["members"=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ==== Fetch MeetOurMinds and get only ('id', 'title')
        $meetOurMinds = MeetOurMinds::orderBy("id","desc")->whereNull('deleted_at')->get([
            'id', 'title'
        ]);

        return view("backend.members.create",["meetOurMinds"=>$meetOurMinds]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembersRequest $request)
    {
        $request->validated();

        try {
            $member = new Members();

            // Handle member profile picture
            if ($request->hasFile('memberProfilePic') && $request->file('memberProfilePic')->isValid()) {
                $image = $request->file('memberProfilePic');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/members/memberProfilePic/'), $new_name);

                $member->memberProfilePic = $new_name;
            }

            // Assign other member details
            $member->meet_our_minds_id = $request->meet_our_minds_id;
            $member->memberName = $request->memberName;
            $member->memberPosition = $request->memberPosition;
            $member->memberDescription = $request->memberDescription;
            $member->status = $request->status;
            $member->inserted_at = Carbon::now();
            $member->inserted_by = Auth::user()->id;

            // Handle Social Media icons and URLs
            $socialMediaIcons = [];
            $socialMediaLinks = [];

            if ($request->has('socialMediaUrl')) {
                foreach ($request->socialMediaUrl as $index => $url) {
                    // Handle file upload if exists
                    if ($request->hasFile("socialMediaIcon.{$index}") && $request->file("socialMediaIcon.{$index}")->isValid()) {
                        $icon = $request->file("socialMediaIcon.{$index}");
                        $iconExtension = $icon->getClientOriginalExtension();
                        $iconName = time() . rand(10, 999) . '.' . $iconExtension;
                        $icon->move(public_path('/visen/members/socialMediaIcons/'), $iconName);

                        // Add to social media icons array
                        $socialMediaIcons[] = $iconName;

                    } else {
                        // Add null if no icon is uploaded
                        $socialMediaIcons[] = null;
                    }

                    // Add the URL to the array
                    $socialMediaLinks[] = $url;
                }
            }

            $member->socialMediaIcon = json_encode($socialMediaIcons);
            $member->socialMediaLink = json_encode($socialMediaLinks);

            // Save member
            $member->save();

            return redirect()->route('members.index')->with('message', 'Member has been successfully added.');

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
        $member = Members::findOrFail($id);

        // ==== Fetch MeetOurMinds and get only ('id', 'title')
        $meetOurMinds = MeetOurMinds::orderBy("id","desc")->whereNull('deleted_at')->get([
            'id', 'title'
        ]);

        // ==== Fetch socialMediaIcon, socialMediaLink
        $socialMediaIcons = json_decode($member->socialMediaIcon, true);
        $socialMediaLinks = json_decode($member->socialMediaLink, true);

        $member->socialMediaIcon = $socialMediaIcons;
        $member->socialMediaLink = $socialMediaLinks;

        return view("backend.members.edit",["member"=>$member,"meetOurMinds"=>$meetOurMinds]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembersRequest $request, string $id)
    {
        $request->validated();

        try {
            $member = Members::findOrFail($id);

            // Handle member profile picture
            if ($request->hasFile('memberProfilePic') && $request->file('memberProfilePic')->isValid()) {
                // Delete the old memberProfilePic if it exists
                if ($member->memberProfilePic) {
                    $oldImagePath = public_path("/visen/members/memberProfilePic/" . $member->memberProfilePic);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Delete the old image file
                    }
                }

                $image = $request->file('memberProfilePic');
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/visen/members/memberProfilePic/'), $new_name);

                $member->memberProfilePic = $new_name;
            }

            // Update member details
            $member->meet_our_minds_id = $request->meet_our_minds_id;
            $member->memberName = $request->memberName;
            $member->memberPosition = $request->memberPosition;
            $member->memberDescription = $request->memberDescription;
            $member->modified_by = Auth::user()->id;
            $member->modified_at = Carbon::now();

            // Handle Social Media icons and URLs
            $socialMediaIcons = [];
            $socialMediaLinks = [];

            if ($request->has('socialMediaUrl')) {
                foreach ($request->socialMediaUrl as $index => $url) {
                    // Handle file upload if exists
                    if ($request->hasFile("socialMediaIcon.{$index}") && $request->file("socialMediaIcon.{$index}")->isValid()) {
                        // Delete the old icon if exists
                        $existingIcons = json_decode($member->socialMediaIcon, true);
                        if (isset($existingIcons[$index]) && !empty($existingIcons[$index])) {
                            $oldIconPath = public_path("/visen/members/socialMediaIcons/" . $existingIcons[$index]);
                            if (file_exists($oldIconPath)) {
                                unlink($oldIconPath);
                            }
                        }

                        // Upload new icon
                        $icon = $request->file("socialMediaIcon.{$index}");
                        $iconExtension = $icon->getClientOriginalExtension();
                        $iconName = time() . rand(10, 999) . '.' . $iconExtension;
                        $icon->move(public_path('/visen/members/socialMediaIcons/'), $iconName);

                        $socialMediaIcons[] = $iconName;
                    } else {
                        // Keep the existing icon if no new file is uploaded
                        $existingIcons = json_decode($member->socialMediaIcon, true);
                        $socialMediaIcons[] = $existingIcons[$index] ?? null;
                    }

                    // Add the URL to the array
                    $socialMediaLinks[] = $url;
                }
            }

            $member->socialMediaIcon = json_encode($socialMediaIcons);
            $member->socialMediaLink = json_encode($socialMediaLinks);

            // Save member
            $member->save();

            return redirect()->route('members.index')->with('message', 'Member has been successfully updated.');

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

            $member = Members::findOrFail($id);
            $member->update($data);

            return redirect()->route('members.index')->with('message', 'Member has been successfully deleted.');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());

        }
    }
}
