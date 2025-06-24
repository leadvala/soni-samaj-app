<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BadhaiEntry;
use Illuminate\Support\Facades\Storage;

class AdminBadhaiController extends Controller
{
    public function index()
    {
        $entries = BadhaiEntry::latest()->paginate(10);
        return view('admin.badhai.index', compact('entries'));
    }

    public function create()
    {
        return view('admin.badhai.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'reason'      => 'required|string|max:100',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|max:2048',
            'date'        => 'required|date',
            'city'        => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('badhai/photos', 'public');
        }

        BadhaiEntry::create($data);

        return redirect()->route('admin.badhai.index')->with('success', 'Badhai entry added.');
    }

    public function edit(BadhaiEntry $badhai)
    {
        return view('admin.badhai.edit', compact('badhai'));
    }

    public function update(Request $request, BadhaiEntry $badhai)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:150',
            'reason'      => 'required|string|max:100',
            'description' => 'nullable|string',
            'photo'       => 'nullable|image|max:2048',
            'date'        => 'required|date',
            'city'        => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('photo')) {
            if ($badhai->photo_path) {
                Storage::disk('public')->delete($badhai->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('badhai/photos', 'public');
        }

        $badhai->update($data);

        return redirect()->route('admin.badhai.index')->with('success', 'Badhai entry updated.');
    }

    public function destroy(BadhaiEntry $badhai)
    {
        if ($badhai->photo_path) {
            Storage::disk('public')->delete($badhai->photo_path);
        }
        $badhai->delete();

        return back()->with('success', 'Badhai entry deleted.');
    }
}
