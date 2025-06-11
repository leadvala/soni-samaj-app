<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use App\Models\AboutTab;

class AboutSectionController extends Controller
{
    public function index()
    {
        $aboutSection = AboutSection::with('aboutTabs')->first();
        return view('admin.about_sections.index', compact('aboutSection'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'since_counter' => 'required|string',
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'required|string',
        ]);

        $aboutSection = AboutSection::first();

        $image1Path = $aboutSection ? $aboutSection->image1 : null;
        $image2Path = $aboutSection ? $aboutSection->image2 : null;

        if ($request->hasFile('image1')) {
            $image1Path = $this->upload_file($request->file('image1'), 'about');
        }

        if ($request->hasFile('image2')) {
            $image2Path = $this->upload_file($request->file('image2'), 'about');
        }

        if ($aboutSection) {
            $aboutSection->update([
                'image1' => $image1Path,
                'image2' => $image2Path,
                'since_counter' => $request->since_counter,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);
        } else {
            AboutSection::create([
                'image1' => $image1Path,
                'image2' => $image2Path,
                'since_counter' => $request->since_counter,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('admin.about-sections.index')->with('success', 'About Section saved successfully!');
    }

    public function tabStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_url' => 'nullable|url',
            'points' => 'nullable|array',
        ]);

        if ($request->hasFile('content_image')) {
            $image = $request->file('content_image');
            $imagePath = $image->store('images', 'public');
        }

        $tab = new AboutTab();
        $tab->about_section_id = AboutSection::first()->id;
        $tab->title = $request->input('title');
        $tab->content = $imagePath ?? null;
        $tab->video_url = $request->input('video_url');

        $tab->points = $request->has('points') ? json_encode($request->input('points')) : null;

        $tab->save();

        return back()->with('success', 'Tab added successfully!');
    }

    public function destroyTab($id)
    {
        $tab = AboutTab::findOrFail($id);
        if ($tab->content) {
            \Storage::disk('public')->delete($tab->content);
        }
        $tab->delete();

        return back()->with('success', 'Tab deleted successfully!');
    }

    public function updateTab(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content_image' => 'nullable|image',
            'video_url' => 'required|url',
            'points' => 'required|array',
        ]);

        $tab = AboutTab::findOrFail($request->tab_id);
        $tab->title = $validated['title'];
        $tab->video_url = $validated['video_url'];

        if ($request->hasFile('content_image')) {
            $tab->content = $request->file('content_image')->store('tabs');
        }

        $cleanedPoints = array_map(function($point) {
            return trim(preg_replace('/\s+/', ' ', $point));
        }, $validated['points']);

        $tab->points = json_encode($cleanedPoints);
        $tab->save();

        return to_route('admin.about-sections.index')->with('success', 'Tab updated successfully!');
    }
}
