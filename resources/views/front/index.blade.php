@extends('front.layouts.master')
@section('content')

        <!-- start of wpo-hero-slide-section-->
        @if(count($sliders)>0)
        <section class="wpo-hero-slider-s2">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="slide-inner slide-bg-image" data-background="{{ asset('storage/'.$slider->image) }}">
                                <div class="container-fluid">
                                    <div class="slide-content">
                                        <div data-swiper-parallax="300" class="slide-title">
                                            <span>
                                                <img src="{{ asset('front_assets/assets/images/healthcare.svg') }}" alt="">
                                                {{ $slider?->title }}
                                            </span>
                                        </div>
                                        <div data-swiper-parallax="400" class="slide-sub-title">
                                            <h2>
                                                {{ $slider?->subtitle }}
                                            </h2>
                                        </div>
                                        <div data-swiper-parallax="500" class="slide-btns">
                                            @if($slider->button_text && $slider->button_link)
                                                <a href="{{ $slider->button_link }}" class="theme-btn">
                                                    {{ $slider->button_text }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="shape">
                                            <img src="{{ asset('front_assets/assets/images/slider/shape-9.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="shape">
                                    <img src="{{ asset('front_assets/assets/images/slider/shape-10.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- end swiper-wrapper -->

                <!-- swipper controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        @else
        <section class="wpo-hero-slider-s2">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="{{asset('front_assets/assets/images/slider/slide-4.jpg')}}">
                            <div class="container-fluid">
                                <div class="slide-content">
                                    <div data-swiper-parallax="300" class="slide-title">
                                        <span><img src="{{asset('front_assets/assets/images/healthcare.svg')}}" alt=""> We can brighten every
                                            child's future.</span>
                                    </div>
                                    <div data-swiper-parallax="400" class="slide-sub-title">
                                        <h2>Charities focused
                                            <span>education </span> <span class="text">help</span></h2>
                                    </div>
                                    <div data-swiper-parallax="500" class="slide-btns">
                                        <a href="about.html" class="theme-btn">About Us</a>
                                        <div class="call">
                                            <div class="icon">
                                                <i class="flaticon-phone"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="shape">
                                        <img src="{{asset('front_assets/assets/images/slider/shape-9.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="shape">
                                <img src="{{asset('front_assets/assets/images/slider/shape-10.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="{{asset('front_assets/assets/images/slider/slide-3.jpg')}}">
                            <div class="container-fluid">
                                <div class="slide-content">
                                    <div data-swiper-parallax="300" class="slide-title">
                                        <span><img src="{{asset('front_assets/assets/images/healthcare.svg')}}" alt=""> We are always open for
                                            children</span>
                                    </div>
                                    <div data-swiper-parallax="400" class="slide-sub-title">
                                        <h2>Charities focused
                                            <span>education </span> <span class="text">help</span></h2>
                                    </div>
                                    <div data-swiper-parallax="500" class="slide-btns">
                                        <a href="about.html" class="theme-btn">About Us</a>
                                        <div class="call">
                                            <div class="icon">
                                                <i class="flaticon-phone"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="shape">
                                        <img src="{{asset('front_assets/assets/images/slider/shape-9.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="shape">
                                <img src="{{asset('front_assets/assets/images/slider/shape-10.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end swiper-wrapper -->

                <!-- swipper controls -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        @endif


        <!-- start of register -->
        <section class="register-section">
            <div class="container">
                <div class="content">
                    <div class="image">
                        @if(!empty($register_section) && !empty($register_section->image))
                            <img src="{{asset('storage/'.$register_section->image)}}" alt="">
                        @else
                        <img src="{{asset('front_assets/assets/images/click_To_register.jpg')}}" alt="">
                        @endif
                        <div class="icon">
                            <i class="flaticon-tablet"></i>
                        </div>
                    </div>
                    <div class="text">
                        <span><img src="{{asset('front_assets/assets/images/healthcare.svg')}}" alt="">{{ $register_section?->charity_name ?? 'Non profit Charity Fundation'}}</span>
                        <h2>{{ $register_section?->description ?? 'Click To Registered To be a memeber of us'}}</h2>
                        <a href="{{ $register_section?->contact_link }}">{{ $register_section?->contact_text ?? 'Contact Us' }} <i class="flaticon-right-arrow-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="{{asset('front_assets/assets/images/register-shape.svg')}}" alt="">
            </div>
        </section>
        <!-- end of register -->

        <!-- start about -->
        <section class="about-section-s2 section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="about-image">
                            <div class="image1 wow fadeIn" data-wow-delay="0.1s">
                                @if(!empty($about_section) && !empty($about_section->image1))
                                <img src="{{ asset('storage/'.$about_section->image1) }}" alt="">
                                @else
                                <img src="{{asset('front_assets/assets/images/about/about-3.jpg')}}" alt="">
                                @endif
                            </div>
                            <div class="image2 wow fadeIn" data-wow-delay="0.1s">
                                @if(!empty($about_section) && !empty($about_section->image2))
                                <img src="{{ asset('storage/'.$about_section->image2) }}" alt="">
                                @else
                                <img src="{{asset('front_assets/assets/images/about/about-4.jpg')}}" alt="">
                                @endif
                            </div>
                            <div class="shape-love">
                                <img src="{{asset('front_assets/assets/images/about/shape4.svg')}}" alt="">
                            </div>
                            <div class="text">
                                <h2>Since</h2>
                                <h3><span class="odometer" data-count="{{ $about_section?->since_counter ?? '1999' }}">00</span></h3>
                                <div class="shape">
                                    <img src="{{asset('front_assets/assets/images/about/shape11.svg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right-content wow fadeInRight" data-wow-delay="0.1s">
                            <h2><img src="{{asset('front_assets/assets/images/healthcare.svg')}}" alt="">{{ $about_section?->title ?? 'Building Brighter Futures Through Kindness.' }}</h2>
                            <h3> {{ $about_section?->subtitle ?? 'Helping each other can make world better' }}</h3>
                            <p>
                                @if(!empty($about_section) && !empty($about_section->description))
                                {{ $about_section->description }}
                                @else
                                Helping each other creates a stronger, kinder world. We build trust, spread compassion,
                                and inspire others to do the same. Together, we can overcome challenges and make lasting
                                positive changes.
                                @endif
                            </p>
                            @if(!empty($about_section) && count($about_section->aboutTabs) > 0)
                            <div class="about-tab">
                                <div class="tab">
                                    @foreach($about_section->aboutTabs as $key => $tab)
                                        <button class="tablinks" onclick="openTab(event, 'Tab{{ $key + 1 }}')">
                                            {{ $tab->title }}
                                        </button>
                                    @endforeach
                                </div>
                                @foreach($about_section->aboutTabs as $key => $tab)
                                    <div id="Tab{{ $key + 1 }}" class="tabcontent">
                                        <div class="tab-wrap">
                                            <div class="left">
                                                <img src="{{ asset('storage/'.$tab->content) }}" alt="">
                                                @if($tab->video_url)
                                                    <a href="{{ $tab->video_url }}" class="video-btn" data-type="iframe">
                                                        <i class="flaticon-play"></i>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="right">
                                                <ul>
                                                    @foreach(json_decode($tab->points) as $points)
                                                    @foreach (explode(",",$points) as $point)
                                                        <li><i class="flaticon-check"></i> {{ $point }}</li>
                                                    @endforeach
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @else
                            <div class="about-tab">
                                <div class="tab">
                                    <button class="tablinks" onclick="openTab(event, 'Tab1')">Our Mission</button>
                                    <button class="tablinks" onclick="openTab(event, 'Tab2')">Our Vission</button>
                                    <button class="tablinks" onclick="openTab(event, 'Tab3')">excellence</button>
                                </div>
                                <div id="Tab1" class="tabcontent">
                                    <div class="tab-wrap">
                                        <div class="left">
                                            <img src="{{asset('front_assets/assets/images/about/about-5.jpg')}}" alt="">
                                            <a href="https://www.youtube.com/embed/VqmFKnHG5q8?si=YcvnY_zzMv21k4iM"
                                                class="video-btn" data-type="iframe">
                                                <i class="flaticon-play"></i>
                                            </a>
                                        </div>
                                        <div class="right">
                                            <ul>
                                                <li><i class="flaticon-check"></i> People’s Growth</li>
                                                <li><i class="flaticon-check"></i>Helped fund 3,265 Project powerful
                                                </li>
                                                <li><i class="flaticon-check"></i>Awards Winning nonprofit company</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="Tab2" class="tabcontent">
                                    <div class="tab-wrap">
                                        <div class="left">
                                            <img src="{{asset('front_assets/assets/images/about/about-6.jpg')}}" alt="">
                                            <a href="https://www.youtube.com/embed/VqmFKnHG5q8?si=YcvnY_zzMv21k4iM"
                                                class="video-btn" data-type="iframe">
                                                <i class="flaticon-play"></i>
                                            </a>
                                        </div>
                                        <div class="right">
                                            <ul>
                                                <li><i class="flaticon-check"></i> The standard chunk of Lorem Ipsum
                                                </li>
                                                <li><i class="flaticon-check"></i>Helped fund 3,265 Project powerful
                                                </li>
                                                <li><i class="flaticon-check"></i>Awards Winning nonprofit company</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="Tab3" class="tabcontent">
                                    <div class="tab-wrap">
                                        <div class="left">
                                            <img src="{{asset('front_assets/assets/images/about/about-7.jpg')}}" alt="">
                                            <a href="https://www.youtube.com/embed/VqmFKnHG5q8?si=YcvnY_zzMv21k4iM"
                                                class="video-btn" data-type="iframe">
                                                <i class="flaticon-play"></i>
                                            </a>
                                        </div>
                                        <div class="right">
                                            <ul>
                                                <li><i class="flaticon-check"></i>There are many variations of passages
                                                </li>
                                                <li><i class="flaticon-check"></i>Helped fund 3,265 Project powerful
                                                </li>
                                                <li><i class="flaticon-check"></i>Awards Winning nonprofit company</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-1">
                <img src="{{asset('front_assets/assets/images/about/shape7.svg')}}" alt="">
            </div>
            <div class="shape-2">
                <img src="{{asset('front_assets/assets/images/about/shape2.svg')}}" alt="">
            </div>
            <div class="shape-3">
                <img src="{{asset('front_assets/assets/images/about/shape8.svg')}}" alt="">
            </div>
        </section>
        <!-- end about -->

        <!-- start service -->
        <section class="service-section-s2 section-padding pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12">
                        <div class="section-title">
                            <span><img src="{{asset('front_assets/assets/images/healthcare.svg')}}" alt="">{{ $service_section?->title ?? 'Together, We Can Change Lives Forever.'}}</span>
                            <h2>{{ $service_section?->subtitle ?? 'our non-profit services you must love'}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="all-Service-btn">
                            <a href="{{url('/service')}}" class="theme-btn">All Services</a>
                        </div>
                    </div>
                </div>
                <div class="bg-image">
                    @if($service_section?->image && !empty($service_section->image))
                    <img src="{{ asset('storage/'.$service_section->image) }}" alt="">
                    @else
                    <img src="{{asset('front_assets/assets/images/service/bg-img.jpg')}}" alt="">
                    @endif
                    <div class="shape">
                        <img src="{{asset('front_assets/assets/images/service/shape-3.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="service-wrap">
                    @if(!empty($service_section) && count($service_section->pages) > 0)
                    @foreach ($service_section->pages as $page)
                    <div class="item wow fadeInUp" data-wow-delay="0.0s">
                        <div class="visible-content">
                            <div class="icon">
                                <i class="flaticon-fund"></i>
                            </div>
                            <div class="text">
                                <h2><a href="{{ url($page->slug) }}">{{ $page->title }}</a></h2>
                            </div>
                        </div>
                        <div class="hover-content">
                            <div class="text">
                                <h2><a href="{{ url($page->slug) }}">{{ $page->title }}</a></h2>
                                <span>{{ $page->description }}</span>
                                <a href="{{ url($page->slug) }}">Read More<i class="flaticon-right-arrow-1"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="item wow fadeInUp" data-wow-delay="0.0s">
                        <div class="visible-content">
                            <div class="icon">
                                <i class="flaticon-fund"></i>
                            </div>
                            <div class="text">
                                <h2><a href="service-single.html">Fund Raised & Donation</a></h2>
                            </div>
                        </div>
                        <div class="hover-content">
                            <div class="text">
                                <h2><a href="service-single.html">Fund Raised & Donation</a></h2>
                                <span>Find information for
                                    people with dis</span>
                                <a href="service-single.html">Read More<i class="flaticon-right-arrow-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-delay="0.1s">
                        <div class="visible-content">
                            <div class="icon">
                                <i class="flaticon-first-aid-kit"></i>
                            </div>
                            <div class="text">
                                <h2><a href="service-single.html">Medical Treatment Help</a></h2>
                            </div>
                        </div>
                        <div class="hover-content">
                            <div class="text">
                                <h2><a href="service-single.html">Medical Treatment Help</a></h2>
                                <span>Find information for
                                    people with dis</span>
                                <a href="service-single.html">Read More<i class="flaticon-right-arrow-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="visible-content">
                            <div class="icon">
                                <i class="flaticon-gift"></i>
                            </div>
                            <div class="text">
                                <h2><a href="service-single.html">development programs</a></h2>
                            </div>
                        </div>
                        <div class="hover-content">
                            <div class="text">
                                <h2><a href="service-single.html">development programs</a></h2>
                                <span>Find information for
                                    people with dis</span>
                                <a href="service-single.html">Read More<i class="flaticon-right-arrow-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-delay="0.3s">
                        <div class="visible-content">
                            <div class="icon">
                                <i class="flaticon-charity"></i>
                            </div>
                            <div class="text">
                                <h2><a href="service-single.html">Child medical research</a></h2>
                            </div>
                        </div>
                        <div class="hover-content">
                            <div class="text">
                                <h2><a href="service-single.html">Child medical research</a></h2>
                                <span>Find information for
                                    people with dis</span>
                                <a href="service-single.html">Read More<i class="flaticon-right-arrow-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="visible-content">
                            <div class="icon">
                                <i class="flaticon-cardiogram"></i>
                            </div>
                            <div class="text">
                                <h2><a href="service-single.html">Corporate Gifts donate</a></h2>
                            </div>
                        </div>
                        <div class="hover-content">
                            <div class="text">
                                <h2><a href="service-single.html">Corporate Gifts donate</a></h2>
                                <span>Find information for
                                    people with dis</span>
                                <a href="service-single.html">Read More<i class="flaticon-right-arrow-1"></i></a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- end service -->

        <!-- start causes -->
        <section class="causes-section-s2 section-padding ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <span>{{ $homepage_settings?->donation_title ?? "Charity makes no decrease in property." }}</span>
                            <h2>{{$homepage_settings?->donation_subtitle ?? "Helping each other make world better."}}</h2>
                            <p>{{$homepage_settings?->donation_description??"Helping each other creates a stronger, kinder world. We build trust, spread compassion,
                                and inspire others to do the same. Together, we can overcome challenges and make lasting
                                positive changes."}}</p>
                            @php
                                $generalText = "We help companies develop powerful corporate social, We help companies develop powerful corporate social, We help companies develop powerful corporate social";
                                $donation_points = $homepage_settings?->donation_points ?? $generalText;
                                $donation_points = explode(",", $donation_points);
                            @endphp
                            <ul>
                                @foreach($donation_points as $item)
                                <li>
                                    <i class="flaticon-check"></i>
                                    {{ $item }}
                                </li>
                                @endforeach
                            </ul>
                            <a href="service.html" class="theme-btn">All Services</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="causes-slider-s2 owl-carousel">
                @if ($donations && $donations->isNotEmpty())
                    @foreach ($donations as $donation)
                        <div class="causes-card">
                            <div class="image">
                                <img 
                                    src="{{ $donation->image ? asset('storage/' . $donation->image) : asset('front_assets/assets/images/causes/3.jpg') }}" 
                                    alt="{{ $donation->title ?? 'Donation Title' }}">
                            </div>
                            <div class="text">
                                <h2><a href="#">{{ $donation->title ?? 'Lifeskills for Children in South Africa' }}</a></h2>
                                <p>{!! $donation->description ? html_entity_decode($donation->description) : 'Teaching life skills to children empowers them for a brighter future.' !!}</p>
                            </div>
                            <div class="progress-wrap">
                                <ul>
                                    <li>
                                        <span class="title">Goal:</span>
                                        <span>${{ number_format($donation->goal ?? 20000, 2) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="causes-card">
                        <div class="image">
                            <span>Health</span>
                            <img src="{{ asset('front_assets/assets/images/causes/1.jpg') }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="causes-single.html">Bringing Clean Water to Rural Communities</a></h2>
                            <p>Our initiative provides clean water to rural communities, improving health.</p>
                        </div>
                        <div class="progress-wrap">
                            <ul>
                                <li>
                                    <span class="title">Goal:</span>
                                    <span>$20,000</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="causes-card">
                        <div class="image">
                            <span>Health</span>
                            <img src="{{ asset('front_assets/assets/images/causes/2.jpg') }}" alt="">
                        </div>
                        <div class="text">
                            <h2><a href="causes-single.html">Providing Healthy Food for the Children</a></h2>
                            <p>We provide healthy food for children, ensuring they grow strong.</p>
                        </div>
                        <div class="progress-wrap">
                            <ul>
                                <li>
                                    <span class="title">Goal:</span>
                                    <span>$20,000</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="shape">
                <img src="{{asset('front_assets/assets/images/causes/shape2.svg')}}" alt="">
            </div>

        </section>
        <!-- end causes -->

        <!-- start become_volunteer -->
        <section class="become_volunteer">
            <div class="left-content" style="background: url('{{ asset('storage/' . ($homepage_settings?->volunteer_section_image ?? 'images/vb1.jpg')) }}') no-repeat !important;">
                <div class="icon">
                    <img src="{{asset('front_assets/assets/images/healthcare-icon1.svg')}}" alt="">
                </div>
                <h2>{{$homepage_settings?->volunteer_section_heading ?? 'Become a Volunteer?'}}</h2>
                <a href="{{$homepage_settings?->volunteer_section_link ?? '#'}}">{{$homepage_settings?->volunteer_section_link_text ?? 'Contact With us'}} <img src="{{asset('front_assets/assets/images/up-arrow1.svg')}}" alt=""></a>
            </div>
                <div class="right-content" style="background: url('{{ asset('storage/' . ($homepage_settings?->donation_section_image ?? 'images/vb1.jpg')) }}') no-repeat !important;">

                <div class="icon">
                    <img src="{{asset('front_assets/assets/images/healthcare-icon2.svg')}}" alt="">
                </div>
                <h2>{{$homepage_settings?->donation_section_heading ?? 'Make donation to us?'}}</h2>
                <a href="{{$homepage_settings?->donation_section_link ?? '#'}}">{{$homepage_settings?->donation_section_link_text ?? 'Contact With us'}} <img src="{{asset('front_assets/assets/images/up-arrow1.svg')}}" alt=""></a>
            </div>
            <div class="shape">
                <img src="{{asset('front_assets/assets/images/curved_shape2.svg')}}" alt="">
            </div>
        </section>
        <!-- end become_volunteer -->

        <!-- start service -->
        <section class="service-section-s3 section-padding ">
            <div class="container">
                {{-- <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <span>Compassion in Action: Join Us Today</span>
                            <h2>how we connect with
                                people helping</h2>
                        </div>
                    </div>
                </div> --}}
                <div class="service-wrap">
                    <div class="service-card wow fadeInUp" data-wow-delay="0.0s">
                        <div class="icon">
                            <i class="flaticon-graduation-cap"></i>
                        </div>
                        <h2><a href="service-single.html">We Educate & help
                                poor people</a></h2>
                        <span>Transmax is the world tr
                            we uphold industry Cu
                            stomer Oriented </span>
                        <a href="service-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                    </div>
                    <div class="service-card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="flaticon-charity"></i>
                        </div>
                        <h2><a href="service-single.html">We Helping People
                                & Donation</a></h2>
                        <span>Transmax is the world tr
                            we uphold industry Cu
                            stomer Oriented </span>
                        <a href="service-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                    </div>
                    <div class="service-card wow fadeInUp" data-wow-delay="0.0s">
                        <div class="icon">
                            <i class="flaticon-checklist"></i>
                        </div>
                        <h2><a href="service-single.html">We Ensure Safety & Treatment</a></h2>
                        <span>Transmax is the world tr
                            we uphold industry Cu
                            stomer Oriented </span>
                        <a href="service-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                    </div>
                    <div class="service-card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="flaticon-medal"></i>
                        </div>
                        <h2><a href="service-single.html">Awwarded service
                                & Treatment</a></h2>
                        <span>Transmax is the world tr
                            we uphold industry Cu
                            stomer Oriented </span>
                        <a href="service-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end service -->

        <!-- start GetQuate -->
        <section class="GetQuate-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="left-wrap">
                            <h2> <img src="{{asset('front_assets/assets/images/healthcare.svg')}}" alt="">{{ $homepage_settings?->support_donation_title ?? "Non profit Charity Fundation." }}</h2>
                            <h3>
                                {{$homepage_settings?->support_donation_subtitle ?? "Helping each other can make world better"}}
                            </h3>
                            <p>
                                {{$homepage_settings?->support_donation_description ?? "We approached aidused complex project Designing website can involve various aspects such as layout, graphics, content experience For a more specific response elaborate"}}
                            </p>
                            @php
                                $generalText = "Dedicated Team & volunteer, Transparent Support";
                                $donation_points = $homepage_settings?->support_donation_points ?? $generalText;
                                $donation_points = is_array($donation_points) ? $donation_points : explode(",", $donation_points);
                            @endphp
                            <ul class="op-item">
                                @foreach($donation_points as $item)
                                    <li>
                                        <i class="flaticon-check"></i>
                                        {{trim($item)}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="donation-from">
                            <h3>Support for eating funds</h3>
                            <div class="progress-wrap">
                                <div class="progress-item">
                                    <div class="progress">
                                        <div class="bar" style="width: 50%;"></div>
                                    </div>
                                    <span class="cssProgress-label">50%</span>
                                </div>
                                <ul>
                                    <li>
                                        <span>$7,560.00</span>
                                        <span class="title">Raised</span>
                                    </li>
                                    <li>
                                        <span>$10,000.00</span>
                                        <span class="title">Goal</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="donate-amount ">
                                <button class="active amount-btn">$100</button>
                                <button class="amount-btn">$300.00</button>
                                <button class="amount-btn">$400.00</button>
                                <button class="amount-btn">$200.00</button>
                                <button class="amount-btn">$600.00</button>
                            </div>
                            <div class="donate-now">
                                <input type="text" class="addAmount-value" placeholder="$Costume">
                                <div class="donation-one__btn-box">
                                    <a href="#" class="donation-one__btn theme-btn">Donate Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-shape">
                <img src="{{asset('front_assets/assets/images/donate-shape.svg')}}" alt="">
                <div class="shape1">
                    <img src="{{asset('front_assets/assets/images/donate-1.svg')}}" alt="">
                </div>
                <div class="shape2">
                    <img src="{{asset('front_assets/assets/images/donate-2.svg')}}" alt="">
                </div>
                <div class="shape3">
                    <img src="{{asset('front_assets/assets/images/donate-3.svg')}}" alt="">
                </div>
            </div>
            <div class="right-img">
                <img src="{{asset('front_assets/assets/images/donate.png')}}" alt="">
            </div>
        </section>
        <!-- end GetQuate -->

        <!-- start Volunteer -->
        <section class="volunteer-section section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title text-center">
                            <span>You Can Help The Poor With Us</span>
                            <h2>Meet the Member</h2>
                        </div>
                    </div>
                </div>
                @if(count($members) == 0)
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="vol-card wow fadeInUp" data-wow-delay="0.2s">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/volunteer/1.jpg')}}" alt="">
                                <span class="hover-icon"><i class="flaticon-share"></i></span>
                                <ul>
                                    <li><a href="#"><i class="flaticon-camera"></i></a></li>
                                    <li><a href="#"><i class="flaticon-facebook-app-symbol"></i></a></li>
                                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <h3><a href="volunteer-single.html">Leslie Alexander</a></h3>
                                <span>GRAPHIC DESIGNER</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="vol-card wow fadeInUp" data-wow-delay="0.0s">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/volunteer/2.jpg')}}" alt="">
                                <span class="hover-icon"><i class="flaticon-share"></i></span>
                                <ul>
                                    <li><a href="#"><i class="flaticon-camera"></i></a></li>
                                    <li><a href="#"><i class="flaticon-facebook-app-symbol"></i></a></li>
                                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <h3><a href="volunteer-single.html">Joshua Nunnally</a></h3>
                                <span>GRAPHIC DESIGNER</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="vol-card wow fadeInUp" data-wow-delay="0.2s">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/volunteer/3.jpg')}}" alt="">
                                <span class="hover-icon"><i class="flaticon-share"></i></span>
                                <ul>
                                    <li><a href="#"><i class="flaticon-camera"></i></a></li>
                                    <li><a href="#"><i class="flaticon-facebook-app-symbol"></i></a></li>
                                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <h3><a href="volunteer-single.html">Letourneau</a></h3>
                                <span>GRAPHIC DESIGNER</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="vol-card wow fadeInUp" data-wow-delay="0.0s">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/volunteer/4.jpg')}}" alt="">
                                <span class="hover-icon"><i class="flaticon-share"></i></span>
                                <ul>
                                    <li><a href="#"><i class="flaticon-camera"></i></a></li>
                                    <li><a href="#"><i class="flaticon-facebook-app-symbol"></i></a></li>
                                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="text">
                                <h3><a href="volunteer-single.html">Lillian Lewis</a></h3>
                                <span>GRAPHIC DESIGNER</span>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    
                        @foreach($members as $member)
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="vol-card wow fadeInUp" data-wow-delay="0.{{ $loop->iteration % 2 == 0 ? '2' : '0' }}s">
                                    <div class="image">
                                        <img src="{{ asset('storage/' . ($member->photo ?? 'default.jpg')) }}" alt="{{ $member->name }}">
                                        <span class="hover-icon"><i class="flaticon-share"></i></span>
                                        <ul>
                                            <li><a href="#"><i class="flaticon-camera"></i></a></li>
                                            <li><a href="#"><i class="flaticon-facebook-app-symbol"></i></a></li>
                                            <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                            <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text">
                                        <h3><a href="volunteer-single.html">{{ $member->name }}</a></h3>
                                        <span>{{ $member->job_or_business ?? 'Occupation Not Specified' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                @endif
                <div class="all-btn">
                    <a href="#" class="theme-btn">All Volunteer</a>
                </div>
            </div>
        </section>
        <!-- end Volunteer -->

        <!-- start project -->
        <section class="project-section-s2 section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title text-center">
                            <span>We are always open for children</span>
                            <h2>Our case study about helping people</h2>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($case_studies) > 0)
            <div class="project-slider-s2 owl-carousel">
                @foreach($case_studies as $case_study)
                <div class="project-card">
                    <img src="{{ asset('storage/' . $case_study->image) }}" alt="">
                    <div class="content">
                        <h2><a href="#">{{ $case_study->title }}</a></h2>
                        <span>{{ $case_study->subtitle }}</span>
                        <div class="icon"><a href="#"><i class="flaticon-arrow-up"></i></a></div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="project-slider-s2 owl-carousel">
                <div class="project-card">
                    
                    <img src="{{ asset('front_assets/') }}/assets/images/project/4.jpg" alt="">
                    <div class="content">
                        <h2><a href="#">Shelter for the Homeless</a></h2>
                        <span>Child & old care</span>
                        <div class="icon"><a href="#"><i class="flaticon-arrow-up"></i></a></div>
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-shape">
                <img src="{{ asset('front_assets/assets/images/project/shapebg-3.svg') }}" alt="">
            </div>
        </section>
        
        <!-- end project -->

        <!-- start testimonial -->
        <section class="testimonial-section-s2 section-padding">
            <div class="container">
                <div class="testimonial-wrap testimonial-slider-s2">
                    <div class="image slider-for">
                        @foreach($testimonials as $testimonial)
                        <div class="item">
                            <span class="feedback"><i class="flaticon-double-quotes"></i></span>
                            <img src="{{ asset('storage/' . ($testimonial->image ?? 'default.jpg')) }}" alt="{{ $testimonial->client_name }}">
                            <ul>
                                @for($i = 1; $i <= 5; $i++)
                                    <li>
                                        <i class="flaticon-star {{ $i <= $testimonial->rating ? 'active' : 'uncolor-stars' }}"></i>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    <div class="content-wrap">
                        <div class="slider-nav">
                            @foreach($testimonials as $testimonial)
                            <div class="content">
                                <p>{{ $testimonial->review }}</p>
                                <div class="client-name">
                                    <h4>{{ $testimonial?->client_name ?? 'Michel Jhonson'}}/</h4>
                                    <span>{{ $testimonial?->designation ?? 'Donar' }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="{{ asset('front_assets/assets/images/testimonial/shape.svg') }}" alt="Shape">
            </div>
            <div class="shape-2">
                <img src="{{ asset('front_assets/assets/images/testimonial/shape-2.svg') }}" alt="Shape 2">
            </div>
        </section>
        <!-- end testimonial -->

        <!-- start instagam -->
        {{-- <section class="instagam-section-s2 section-padding ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title text-center">
                            <span><img src="{{asset('front_assets/assets/images/healthcare.svg')}}" alt="">We are always open for children</span>
                            <h2>Recent instagram post</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-main-wrap">
                <div class="sortable-gallery">
                    <div class="grid">
                        <div class="img-holder">
                            <a href="{{asset('front_assets/assets/images/instagam/1.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{asset('front_assets/assets/images/instagam/1.jpg')}}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="flaticon-camera"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-holder">
                            <a href="{{asset('front_assets/assets/images/instagam/2.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{asset('front_assets/assets/images/instagam/2.jpg')}}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="flaticon-camera"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-holder">
                            <a href="{{asset('front_assets/assets/images/instagam/3.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{asset('front_assets/assets/images/instagam/3.jpg')}}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="flaticon-camera"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-holder">
                            <a href="{{asset('front_assets/assets/images/instagam/4.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{asset('front_assets/assets/images/instagam/4.jpg')}}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="flaticon-camera"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-holder">
                            <a href="{{asset('front_assets/assets/images/instagam/5.jpg')}}" class="fancybox" data-fancybox-group="gall-1">
                                <img src="{{asset('front_assets/assets/images/instagam/5.jpg')}}" alt class="img img-responsive">
                                <div class="hover-content">
                                    <i class="flaticon-camera"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="line-in">
                <img src="{{asset('front_assets/assets/images/line-ing.svg')}}" alt="">
            </div>
        </section> --}}
        <!-- end instagam -->

        <!-- start cta -->
        <section class="cta-section-s2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="content">
                            <h2> <img src="{{asset('front_assets/assets/images/healthcare-with.svg')}}" alt="">{{$homepage_settings?->helping_donation_section_heading ?? 'Give Your Big Hand Forever'}}</h2>
                            <h3>
                                {{$homepage_settings?->helping_donation_section_subtitle ?? 'Helping each other canmake world better'}}
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="all-btn">
                            <a href="{{$homepage_settings?->helping_donation_section_link ?? 'donate.html'}}" class="theme-btn">{{$homepage_settings?->helping_donation_section_link_text ?? 'Donate Now'}} <i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end cta -->

        <!-- start partners -->
        <section class="partners-section-s2">
            <div class="container">
                <div class="wraper">
                    <div class="title">
                        <h4>{{ $homepage_settings?->press_title ?? 'We’ve been mentioned in the press' }}</h4>
                    </div>
        
                    @php
                        $media_ids = explode(',', $homepage_settings?->press_logo ?? '');
                        $logos = \App\Models\Media::whereIn('id', $media_ids)->get();
                    @endphp     
        
                    <ul class="partners-slider-s2">
                        @foreach($logos as $logo)
                            <li>
                                <div class="press-logos">
                                    <img src="{{ asset('storage/' . $logo->path) }}" alt="Press Logo">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        
        <!-- end partners -->

        <!-- start blog -->
        <section class="blog-section-s2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title text-center">
                            <span>Hope, Support, and Love for All.</span>
                            <h2>our latest <span>article news</span> & blogs you need</h2>
                        </div>
                    </div>
                </div>
                @if (count($blogs) > 0)
                <div class="blog-slider owl-carousel">
                    @foreach ($blogs as $blog)
                        <div class="blog-card-s2">
                            <div class="image">
                                <img 
                                    src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('front_assets/assets/images/blog/img-3.jpg') }}" 
                                    alt="{{ $blog->title ?? 'Default Blog Title' }}">
                            </div>
                            
                            <div class="content">
                                <ul>
                                    <li>
                                        <i class="flaticon-calendar"></i>
                                        {{ $blog?->datetime?->format('d M Y') ?? '02 Apr 2021' }}
                                    </li>
                                </ul>
                                <h3>
                                    <a href="{{ route('front.blogs', $blog->slug) }}" target="_blank">
                                        {{ $blog?->title ?? 'Our Goal Is Help The Poor Child Around The World' }}
                                    </a>
                                </h3>
                                <a href="{{ route('front.blogs', $blog->slug) }}" target="_blank">
                                    Read More <i class="flaticon-right-arrow"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach    
                    @else
                    <div class="blog-slider owl-carousel">
                        <div class="blog-card-s2">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/blog/img-1.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <ul>
                                    <li><i class="flaticon-calendar"></i>02 Apr 2021</li>
                                    <li><i class="flaticon-chat"></i>2 Comments</li>
                                </ul>
                                <h3><a href="blog-single.html">Stories of Hope: Celebrating Our Community Impact</a></h3>
                                <a href="blog-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card-s2">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/blog/img-2.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <ul>
                                    <li><i class="flaticon-calendar"></i>02 Apr 2021</li>
                                    <li><i class="flaticon-chat"></i>2 Comments</li>
                                </ul>
                                <h3><a href="blog-single.html">How Your Generous Support Makes a Difference
                                    </a></h3>
                                <a href="blog-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card-s2">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/blog/img-3.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <ul>
                                    <li><i class="flaticon-calendar"></i>02 Apr 2021</li>
                                    <li><i class="flaticon-chat"></i>2 Comments</li>
                                </ul>
                                <h3><a href="blog-single.html">Our Goal Is Help The Poor Child Around The World</a></h3>
                                <a href="blog-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card-s2">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/blog/img-1.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <ul>
                                    <li><i class="flaticon-calendar"></i>02 Apr 2021</li>
                                    <li><i class="flaticon-chat"></i>2 Comments</li>
                                </ul>
                                <h3><a href="blog-single.html">Majority have Suffered Alteration Some</a></h3>
                                <a href="blog-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card-s2">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/blog/img-2.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <ul>
                                    <li><i class="flaticon-calendar"></i>02 Apr 2021</li>
                                    <li><i class="flaticon-chat"></i>2 Comments</li>
                                </ul>
                                <h3><a href="blog-single.html">Caring for the Elderly and Vulnerable Strategy
                                    </a></h3>
                                <a href="blog-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card-s2">
                            <div class="image">
                                <img src="{{asset('front_assets/assets/images/blog/img-3.jpg')}}" alt="">
                            </div>
                            <div class="content">
                                <ul>
                                    <li><i class="flaticon-calendar"></i>02 Apr 2021</li>
                                    <li><i class="flaticon-chat"></i>2 Comments</li>
                                </ul>
                                <h3><a href="blog-single.html">Our Goal Is Help The Poor Child Around The World</a></h3>
                                <a href="blog-single.html">Read More <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- end blog -->

        <!-- start cta-->
        <section class="cta-section-s3">
            <div class="container">
                <div class="cta-wrap">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-12">
                            <div class="content">
                                <h2>
                                    <img src="{{ asset('front_assets/assets/images/healthcare.svg') }}" alt="Healthcare">
                                    {{ $homepage_settings?->last_section_heading ?? 'Non-profit Charity Foundation' }}
                                </h2>
                                <h3>
                                    {{ $homepage_settings?->last_section_subtitle ?? 'Ensure safety & non-profit care & quality services' }}
                                </h3>
                                @php
                                    $lastgeneralText = "Dedicated Team & volunteer, Transparent Support";
                                    $lastsection_points = $homepage_settings?->last_section_points ?? $lastgeneralText;
                                    $lastsection_points = is_array($lastsection_points) ? $lastsection_points : explode(",", $lastsection_points);
                                @endphp
                                <ul class="op-item">
                                    @foreach($lastsection_points as $item)
                                        <li>
                                            <i class="flaticon-check"></i>
                                            {{ trim($item) }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="all-btn">
                                <a href="{{ $homepage_settings?->last_section_link ?? 'donate.html' }}" class="theme-btn">
                                    {{ $homepage_settings?->last_section_link_text ?? 'Donate Now' }} <i class="flaticon-heart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="shape">
                        <img src="{{ asset('front_assets/assets/images/cta-shap-2.svg') }}" alt="Shape">
                    </div>
                    <div class="shape1">
                        <img src="{{ asset('front_assets/assets/images/cta-shap-3.svg') }}" alt="Shape 1">
                    </div>
                </div>
            </div>
        </section>
        
        <!-- end cta-->
@endsection
