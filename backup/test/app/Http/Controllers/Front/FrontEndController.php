<?php

namespace App\Http\Controllers\Front;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\RegisterSection;
use App\Models\AboutSection;
use App\Models\Blog;
use App\Models\CaseStudy;
use App\Models\Donation;
use App\Models\HomePageSetting;
use App\Models\ServiceSection;
use App\Models\Testimonial;

class FrontEndController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', 1)->get();
        $register_section = RegisterSection::latest()->first();
        $about_section = AboutSection::latest()->first();
        $service_section = ServiceSection::latest()->first();
        $homepage_settings = HomePageSetting::latest()->first() ?: [];
        $case_studies = CaseStudy::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $members = Member::latest()->get();
        $blogs = Blog::where('type','blog')->latest()->take(3)->get();
        $donations = Donation::latest()->get();
        return view('front.index')->with(compact('sliders', 'register_section', 'about_section', 'service_section', 'homepage_settings','case_studies','testimonials','members','blogs','donations'));
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $relatedBlogs = Blog::where('slug', '!=', $slug)->latest()->take(3)->get();
        
        return view('front.pages.blog', compact('blog', 'relatedBlogs'));
    }


    public function sangathan()
    {
        return view('front.pages.sangathan');
    }

    public function kul_devta()
    {
        return view('front.pages.kul_devta');
    }

    public function job_search()
    {
        return view('front.pages.job_search');
    }

    public function events()
    {
        return view('front.pages.events');
    }

    public function event_detail()
    {
        return view('front.pages.event_detail');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function register_member()
    {
        return view('front.pages.register_member');
    }
    public function store_member(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'gotra' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'permanent_address' => 'required|string|max:500',
            'qualifications' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'blood_group' => 'required|string|max:10',
            'house_type' => 'required|string|max:50',
            'job_or_business' => 'required|string|max:255',
            'aadhar' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'photo' => 'required|file|mimes:jpg,png|max:2048',
        ]);

        if ($request->hasFile('aadhar')) {
            $validated['aadhar'] = $this->upload_file($request->file('aadhar'), 'aadhar');
        }

        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->upload_file($request->file('photo'), 'photo');
        }

        $member =Member::create($validated);

        return redirect()->back()->with(['message' => 'Member registered successfully']);
    }
}
