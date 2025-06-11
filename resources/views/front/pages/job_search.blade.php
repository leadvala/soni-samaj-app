@extends('front.layouts.master')

@section('content')
    <!-- start of breadcumb -->
    <div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>trusted non profit</h2>
                        <h3><span>Job Search</span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape">
            <svg width="128" height="357" viewBox="0 0 128 357" fill="none">
                <path
                    d="M-9.73063 357C-11.832 304.262 -1.65343 268.562 21.3305 247.878C27.4705 242.355 34.4642 238.095 41.2608 233.944C44.6099 231.887 48.0903 229.757 51.4066 227.519C63.6866 219.217 71.3041 210.301 74.5875 200.338C75.1457 198.713 75.5397 196.981 75.7695 195.212C68.2505 198.569 62.1762 199.688 56.5944 198.749C50.5201 197.703 43.5592 193.19 41.6548 185.43C40.3086 179.871 42.2787 173.987 46.974 169.691C52.5229 164.601 60.1405 163.23 65.8865 166.262C74.686 170.882 78.4948 181.639 78.0679 191.783C98.3923 181.603 114.58 162.002 121.77 138.72C129.289 114.318 126.695 86.4868 114.809 64.2508C110.048 55.3348 103.711 46.9963 97.6043 38.9466C86.375 24.1467 74.7845 8.87758 72.6831 -10.3623C70.8116 -28.1583 78.0679 -46.4596 91.2016 -57L92.3508 -55.2312C79.7753 -45.124 72.8473 -27.6529 74.686 -10.6511C76.6889 7.93905 87.6227 22.3419 99.1475 37.5388C105.32 45.6607 111.69 54.0714 116.55 63.1318C128.698 85.8731 131.358 114.39 123.675 139.369C116.221 163.591 99.2131 183.913 77.9366 194.201C77.6739 196.584 77.1814 198.894 76.4591 201.06C72.9786 211.528 65.1313 220.769 52.4573 229.36C49.1082 231.634 45.5949 233.764 42.213 235.821C35.5148 239.9 28.5868 244.16 22.5782 249.538C0.0867844 269.753 -9.82913 304.839 -7.76058 356.856L-9.73063 357ZM59.3525 166.767C55.1825 166.767 51.1111 168.716 48.2873 171.315C44.2159 175.033 42.4757 180.087 43.6249 184.816C45.2994 191.638 51.5379 195.645 56.9556 196.584C62.1762 197.486 67.955 196.367 75.1457 193.154C75.4412 193.01 75.7695 192.866 76.065 192.721C76.7217 182.975 73.1756 172.398 65.0656 168.139C63.2269 167.2 61.2568 166.767 59.3525 166.767Z"
                    fill="white" fill-opacity="0.18" />
            </svg>
        </div>
        <div class="shape-s2">
            <img src="{{ asset('front_assets/assets/images/slider/shape-3.svg') }}" alt="">
        </div>
        <div class="shape-s3">
            <img src="{{ asset('front_assets/assets/images/donate-2.svg') }}" alt="">
        </div>

    </div>
    <!-- end of breadcumb-->

    <!-- donation-page-area start -->
    <div class="donation-page-area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="donate-header">
                        <h2>Job Search</h2>
                    </div>
                    <div id="Donations" class="tab-pane">
                        <form action="#">
                            <div class="donations-amount">
                                <h2>Job Title</h2>
                                <input type="text" class="form-control" name="text" id="text"
                                    placeholder="Enter Job Title">
                            </div>
                            <div class="submit-area">
                                <button type="submit" class="theme-btn submit-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- donation-page-area end -->

    <!-- start Volunteer -->
    <section class="volunteer-section volunteer-section-s3 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="vol-card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="image">
                            <img src="{{ asset('front_assets') }}/assets/images/volunteer/1.jpg" alt="">
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
                            <img src="{{ asset('front_assets') }}/assets/images/volunteer/2.jpg" alt="">
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
                            <img src="{{ asset('front_assets') }}/assets/images/volunteer/3.jpg" alt="">
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
                            <img src="{{ asset('front_assets') }}/assets/images/volunteer/4.jpg" alt="">
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
        </div>
    </section>
    <!-- end Volunteer -->
@endsection
