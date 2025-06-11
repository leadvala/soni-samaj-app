<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::OrderBy('id', 'desc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $this->upload_file($request->file('image'), 'sliders');

        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $imagePath,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
        ]);

        return to_route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url|max:255',
        ]);

        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($slider->image && Storage::exists('public/' . $slider->image)) {
                Storage::delete('public/' . $slider->image);
            }

            $imagePath = $this->upload_file($request->file('image'), 'sliders');
            $slider->image = $imagePath;
        }

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->save();

        return to_route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }


    public function toggleStatus(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->is_active = $request->is_active;
        $slider->save();

        return response()->json(['success' => true, 'message' => 'Slider status updated successfully!']);
    }



    public function destroy(Slider $slider)
    {
        $slider->delete();
        return to_route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }


}
