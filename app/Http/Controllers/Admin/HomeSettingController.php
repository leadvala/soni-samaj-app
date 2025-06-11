<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageSetting;
use App\Models\Media;

class HomeSettingController extends Controller
{
    public function index()
    {
        $homePageSetting = HomePageSetting::first();
        return view('admin.home_settings.index')->with(compact('homePageSetting'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->except(['_token']);
        if($request->hasFile('volunteer_section_image')) {
            $validateData['volunteer_section_image'] = $this->upload_file($request->file('volunteer_section_image'), 'home');
        }
        if($request->hasFile('donation_section_image')) {
            $validateData['donation_section_image'] = $this->upload_file($request->file('donation_section_image'), 'home');
        }
        $settings = HomePageSetting::firstOrNew([]);
        if($request->hasFile('press_logo')) {
            $press_logo = $this->upload_file($request->file('press_logo'), 'home');
            $media = new \App\Models\Media();
            $media->path = $press_logo;
            $media->save();
            $media_ids = $settings->press_logo;
            $press_logo = $media->id;
            if(empty($media_ids)) {
                $new_press_logo = $press_logo;
            }
            else {
                $new_press_logo = $media_ids . ',' . $press_logo;
            }
            $validateData['press_logo'] = $new_press_logo;
        }
        $settings->fill($validateData);
        $settings->save();

        return back()->with('success', 'Settings updated successfully.');
    }

    public function destroy(Request $request,$id)
    {
        $media = Media::findOrFail($id);
        if ($media->image) {
            \Storage::delete('public/' . $media->image);
        }
        $homePageSetting = HomePageSetting::first();
        $media_ids = str_replace(','.$id, '', $homePageSetting->press_logo);
        $homePageSetting->press_logo = $media_ids;
        $homePageSetting->save();
        $media->delete();

        return back()->with('success', 'Image deleted successfully!');
    }
}
