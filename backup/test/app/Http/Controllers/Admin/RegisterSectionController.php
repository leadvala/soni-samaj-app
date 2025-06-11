<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterSectionController extends Controller
{
    public function index()
    {
        $registerSections = RegisterSection::all();
        return view('admin.register_sections.index', compact('registerSections'));
    }

    public function create()
    {
        return view('admin.register_sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'required|image|max:255',
            'charity_name' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_text' => 'required|string',
            'contact_link' => 'required|url',
        ]);

        $imagePath = $this->upload_file($request->file('image'), 'register_sections');
        $iconPath = $this->upload_file($request->file('icon'), 'register_sections/icons');

        RegisterSection::create([
            'image' => $imagePath,
            'icon' => $iconPath,
            'charity_name' => $request->charity_name,
            'description' => $request->description,
            'contact_text' => $request->contact_text,
            'contact_link' => $request->contact_link,
        ]);

        return redirect()->route('admin.register-sections.index')->with('success', 'Register section created successfully.');
    }

    public function edit(RegisterSection $registerSection)
    {
        return view('admin.register_sections.edit', compact('registerSection'));
    }

    public function update(Request $request, RegisterSection $registerSection)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:255',
            'charity_name' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_text' => 'required|string',
            'contact_link' => 'required|url',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($registerSection->image && Storage::exists('public/' . $registerSection->image)) {
                Storage::delete('public/' . $registerSection->image);
            }
            $imagePath = $this->upload_file($request->file('image'), 'register_sections');
            $registerSection->image = $imagePath;
        }

        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($registerSection->icon && Storage::exists('public/' . $registerSection->icon)) {
                Storage::delete('public/' . $registerSection->icon);
            }
            $iconPath = $this->upload_file($request->file('icon'), 'register_sections/icons');
            $registerSection->icon = $iconPath;
        }

        $registerSection->charity_name = $request->charity_name;
        $registerSection->description = $request->description;
        $registerSection->contact_text = $request->contact_text;
        $registerSection->contact_link = $request->contact_link;
        $registerSection->save();

        return redirect()->route('admin.register-sections.index')->with('success', 'Register section updated successfully.');
    }

    public function destroy(RegisterSection $registerSection)
    {
        // Delete the associated image and icon files
        if ($registerSection->image && Storage::exists('public/' . $registerSection->image)) {
            Storage::delete('public/' . $registerSection->image);
        }
        if ($registerSection->icon && Storage::exists('public/' . $registerSection->icon)) {
            Storage::delete('public/' . $registerSection->icon);
        }

        $registerSection->delete();
        return redirect()->route('admin.register-sections.index')->with('success', 'Register section deleted successfully.');
    }


    // New method to get dynamic button text
    private function getButtonText($status)
    {
        return $status ? 'Deactivate' : 'Activate';
    }
}
