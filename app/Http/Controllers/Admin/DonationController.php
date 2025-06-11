<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('admin.donations.index', compact('donations'));
    }

    public function create()
    {
        return view('admin.donations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', 
            'goal' => 'required|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'short_description', 'description', 'goal']);

        if (isset($data['description'])) {
            $description = preg_replace('/^"+|"+$/', '', $data['description']); 
            $data['description'] = htmlentities($description); 
        }
        if ($request->hasFile('image')) {   
            $data['image'] = $request->file('image')->store('donations', 'public');
        }

        Donation::create($data);
        return redirect()->route('admin.donations.index')->with('success', 'Donation added successfully.');
    }


    public function edit(string $id)
    {
        $donation = Donation::find($id);
        return view('admin.donations.edit',compact('donation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|string', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = Donation::find($id);
        $data = $request->only(['title', 'short_description', 'description', 'goal']);
        if (isset($data['description'])) {
            $description = preg_replace('/^"+|"+$/', '', $data['description']); 
            $data['description'] = htmlentities($description); 
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('donations', 'public');
            if ($blog->image && file_exists(storage_path('app/public/' . $blog->image))) {
                unlink(storage_path('app/public/' . $blog->image)); 
            }
        }

        $blog->update($data);
        return redirect()->route('admin.donations.index')->with('success', 'Donation updated successfully.');
    }

    public function destroy(Donation $blog)
    {
        $blog->delete();
        return redirect()->route('admin.donations.index')->with('success', 'donations deleted successfully!');
    }
}
