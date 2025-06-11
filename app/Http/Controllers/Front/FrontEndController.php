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
    $request->validate([
        'name' => 'required',
        'father_name' => 'required',
        'mother_name' => 'required',
        'dob' => 'required|date',
        'gender' => 'required',
        'marital_status' => 'required',
        'address' => 'required',
        'permanent_address' => 'required',
        'gotra_self' => 'required',
        'gotra_mother' => 'required',
        'gotra_nani' => 'required',
        'gotra_dadi' => 'required',
        'qualifications' => 'required',
        'blood_group' => 'required',
        'mobile' => 'required',
        'whatsapp' => 'required',
        'photo' => 'required|image|mimes:jpg,jpeg,png',
    ]);

    $photoPath = $request->file('photo')->store('uploads/members', 'public');

    Member::create([
        'name' => $request->name,
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'marital_status' => $request->marital_status,
        'address' => $request->address,
        'permanent_address' => $request->permanent_address,
        'gotra_self' => $request->gotra_self,
        'gotra_mother' => $request->gotra_mother,
        'gotra_nani' => $request->gotra_nani,
        'gotra_dadi' => $request->gotra_dadi,
        'qualifications' => $request->qualifications,
        'blood_group' => $request->blood_group,
        'mobile' => $request->mobile,
        'whatsapp' => $request->whatsapp,
        'photo' => $photoPath,
        'job_or_business' => $request->job_or_business,
        'job_type' => $request->job_type,
        'designation' => $request->designation,
        'work_city' => $request->work_city,
        'satimata_place' => $request->satimata_place,
        'bheruji_place' => $request->bheruji_place,
        'kuldevi_place' => $request->kuldevi_place,
    ]);

         return redirect()->route('thankyou');
}

    public function thankyou()
{
    return view('front.pages.thankyou');
}

}
