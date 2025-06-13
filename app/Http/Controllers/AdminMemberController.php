<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class AdminMemberController extends Controller
{
    /**
     * Display a listing of members with search & pagination.
     */
    public function index(Request $request)
{
    $search = $request->query('search');

    $members = Member::query()
        ->when($search, function($query, $search) {
            $query->where(function($q) use ($search) {
                $q->where('name',            'like', "%{$search}%")
                  ->orWhere('gotra',         'like', "%{$search}%")
                  ->orWhere('gotra_self',    'like', "%{$search}%")
                  ->orWhere('gotra_mother',  'like', "%{$search}%")
                  ->orWhere('gotra_nani',    'like', "%{$search}%")
                  ->orWhere('gotra_dadi',    'like', "%{$search}%")
                  ->orWhere('mobile',        'like', "%{$search}%");
            });
        })
        ->paginate(10)
        ->withQueryString();

    return view('admin.members.index', compact('members', 'search'));
}


    /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created member in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'father_name'         => 'nullable|string|max:255',
            'mother_name'         => 'nullable|string|max:255',
            'gotra'               => 'nullable|string|max:255',
            'gotra_self'          => 'nullable|string|max:255',
            'gotra_mother'        => 'nullable|string|max:255',
            'gotra_nani'          => 'nullable|string|max:255',
            'gotra_dadi'          => 'nullable|string|max:255',
            'marital_status'      => 'nullable|string|max:50',
            'dob'                 => 'nullable|date',
            'address'             => 'nullable|string',
            'permanent_address'   => 'nullable|string',
            'photo'               => 'nullable|image|max:2048',
            'qualifications'      => 'nullable|string|max:255',
            'gender'              => 'nullable|string|max:50',
            'blood_group'         => 'nullable|string|max:3',
            'house_type'          => 'nullable|string|max:100',
            'job_or_business'     => 'nullable|string|max:100',
            'job_type'            => 'nullable|string|max:50',
            'designation'         => 'nullable|string|max:255',
            'work_city'           => 'nullable|string|max:255',
            'mobile'              => 'required|string|max:20',
            'whatsapp'            => 'nullable|string|max:20',
            'satimata_place'      => 'nullable|string|max:255',
            'bheruji_place'       => 'nullable|string|max:255',
            'kuldevi_place'       => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members/photos', 'public');
        }

        Member::create($data);

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'New member added successfully.');
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified member in storage.
     */
    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'name'                => 'required|string|max:255',
            'father_name'         => 'nullable|string|max:255',
            'mother_name'         => 'nullable|string|max:255',
            'gotra'               => 'nullable|string|max:255',
            'gotra_self'          => 'nullable|string|max:255',
            'gotra_mother'        => 'nullable|string|max:255',
            'gotra_nani'          => 'nullable|string|max:255',
            'gotra_dadi'          => 'nullable|string|max:255',
            'marital_status'      => 'nullable|string|max:50',
            'dob'                 => 'nullable|date',
            'address'             => 'nullable|string',
            'permanent_address'   => 'nullable|string',
            'photo'               => 'nullable|image|max:2048',
            'qualifications'      => 'nullable|string|max:255',
'gender' => 'required|string|max:50',
            'blood_group'         => 'nullable|string|max:3',
            'house_type'          => 'nullable|string|max:100',
            'job_or_business'     => 'nullable|string|max:100',
            'job_type'            => 'nullable|string|max:50',
            'designation'         => 'nullable|string|max:255',
            'work_city'           => 'nullable|string|max:255',
            'mobile'              => 'required|string|max:20',
            'whatsapp'            => 'nullable|string|max:20',
            'satimata_place'      => 'nullable|string|max:255',
            'bheruji_place'       => 'nullable|string|max:255',
            'kuldevi_place'       => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $data['photo'] = $request->file('photo')->store('members/photos', 'public');
        }

        $member->update($data);

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified member from storage.
     */
    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }

        $member->delete();

        return back()->with('success', 'Member deleted successfully.');
    }
}
