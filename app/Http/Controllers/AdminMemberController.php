<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class AdminMemberController extends Controller
{
     // Dropdown options
    protected array $gotras = [
        'Garg',
        'Bharadwaj',
        'Vasishtha',
        'Sandilya',
        // ...add more
    ];

    protected array $religiousList = [
        'Sundha Mata',
        'Ambaji',
        'Mandir A',
        'Mandir B',
        // ...add more
    ];
 // ✅ Add this index() method
    public function index(Request $request)
    {
        $search = $request->query('search');
        $members = Member::query()
            ->when($search, fn($q) => $q
                ->where('name', 'like', "%{$search}%")
                ->orWhere('gotra', 'like', "%{$search}%")
                ->orWhere('mobile', 'like', "%{$search}%"))
            ->paginate(10)
            ->withQueryString();

        return view('admin.members.index', compact('members', 'search'));
    }
    public function create()
    {
        return view('admin.members.create', [
            'gotras'        => $this->gotras,
            'religiousList' => $this->religiousList,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'father_name'        => 'nullable|string|max:255',
            'mother_name'        => 'nullable|string|max:255',
            'dob'                => 'nullable|date',
            'gender'             => 'required|string|max:50',
            'marital_status'     => 'required|string|max:50',
            'address'            => 'required|string',
            'permanent_address'  => 'required|string',
            'district'           => 'required|string|max:255',
            'work_place'         => 'required|string|max:255',
            'area'               => 'required|string',
            'gotra'              => 'required|string|max:255',
            'gotra_self'         => 'nullable|string|max:255',
            'gotra_mother'       => 'nullable|string|max:255',
            'gotra_nani'         => 'nullable|string|max:255',
            'gotra_dadi'         => 'nullable|string|max:255',
            'satimata_place'     => 'nullable|string|max:255',
            'bheruji_place'      => 'nullable|string|max:255',
            'kuldevi_place'      => 'nullable|string|max:255',
            'qualifications'     => 'required|string|max:255',
            'blood_group'        => 'required|string|max:3',
            'mobile'             => 'required|string|max:20',
            'whatsapp'           => 'nullable|string|max:20',
            'job_or_business'    => 'nullable|string|max:100',
            'business_name'      => 'nullable|string|max:255',
            'business_location'  => 'nullable|string|max:255',
            'job_type'           => 'nullable|string|max:50',
            'designation'        => 'nullable|string|max:255',
            'work_place'         => 'nullable|string|max:255',
            'photo'              => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members/photos', 'public');
        }

        Member::create($data);

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'New member added successfully.');
    }

    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'name'               => 'required|string|max:255',
            'father_name'        => 'nullable|string|max:255',
            'mother_name'        => 'nullable|string|max:255',
            'dob'                => 'nullable|date',
            'gender'             => 'required|string|max:50',
            'marital_status'     => 'required|string|max:50',
            'address'            => 'required|string',
            'permanent_address'  => 'required|string',
            'district'           => 'required|string|max:255',
            'city'               => 'required|string|max:255',
            'area'               => 'required|string',
            'gotra'              => 'required|string|max:255',
            'satimata_place'     => 'nullable|string|max:255',
            'bheruji_place'      => 'nullable|string|max:255',
            'kuldevi_place'      => 'nullable|string|max:255',
            'qualifications'     => 'required|string|max:255',
            'blood_group'        => 'required|string|max:3',
            'mobile'             => 'required|string|max:20',
            'whatsapp'           => 'nullable|string|max:20',
            'job_or_business'    => 'nullable|string|max:100',
            'business_location'  => 'nullable|string|max:255',
            'job_type'           => 'nullable|string|max:50',
            'designation'        => 'nullable|string|max:255',
            'work_city'          => 'nullable|string|max:255',
            'photo'              => 'nullable|image|max:2048',
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

    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();

        return back()->with('success', 'Member deleted successfully.');
    }
}
