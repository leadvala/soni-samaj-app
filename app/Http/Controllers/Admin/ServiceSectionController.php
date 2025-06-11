<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceSection;
use App\Models\Page;

class ServiceSectionController extends Controller
{
    public function index()
    {
        $serviceSection = ServiceSection::first();
        $pages = Page::where('type', 'service')->where('is_active',1)->get();
        return view('admin.service_sections.index', compact('serviceSection','pages'));
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'page_id' => 'required|array',
        'page_id.*' => 'exists:pages,id',
    ]);

    $serviceSection = ServiceSection::firstOrNew([]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $this->upload_file($request->file('image'), 'service-sections');
        $serviceSection->image = $imagePath;
    }

    $serviceSection->title = $request->title;
    $serviceSection->subtitle = $request->subtitle;
    $serviceSection->save();

    $serviceSection->pages()->sync($request->page_id);

    return redirect()->route('admin.service-sections.index')->with('success', 'Service Section saved successfully!');
}

}
