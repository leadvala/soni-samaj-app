<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseStudy;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::all();
        return view('admin.case_studies.index', compact('caseStudies'));
    }

    public function create()
    {
        return view('admin.case_studies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->upload_file($request->file('image'), 'case_studies');
        }

        CaseStudy::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study created successfully!');
    }

    public function edit(CaseStudy $caseStudy)
    {
        return view('admin.case_studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $caseStudy->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::delete('public/' . $imagePath);
            }
            $imagePath = $this->upload_file($request->file('image'), 'case_studies');
        }

        $caseStudy->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imagePath,
        ]);

        return to_route('admin.case-studies.index')->with('success', 'Case Study updated successfully!');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        if ($caseStudy->image) {
            \Storage::delete('public/' . $caseStudy->image);
        }

        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study deleted successfully!');
    }
}
