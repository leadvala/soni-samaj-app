<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::OrderBy('id', 'desc')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
        ]);

        $slug = $this->generateUniqueSlug($request->title);
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $this->upload_file($request->file('icon'), 'pages/icons');
        }

        Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->type,
            'description' => $request->description,
            'content' => $request->content,
            'icon' => $iconPath,
            'is_active' => 1,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Page added successfully!');
    }

    private function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Page::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = $this->generateUniqueSlug($request->title, $page->id);
        $iconPath = $page->icon;

        if ($request->hasFile('icon')) {
            if ($iconPath) {
                Storage::delete($iconPath);
            }
            $iconPath = $this->upload_file($request->file('icon'), 'pages/icons');
        }

        $page->update([
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->type,
            'description' => $request->description,
            'content' => $request->content,
            'icon' => $iconPath,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully!');
    }


    public function destroy(Page $page)
    {
        $page->delete();
        return to_route('admin.pages.index')->with('success', 'Page deleted successfully.');
    }

}
