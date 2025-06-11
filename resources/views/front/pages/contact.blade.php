@extends('front.layouts.master')

@section('content')
    <!-- start of breadcumb -->
    <div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>trusted non profit</h2>
                        <h3>contact us</h3>
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

    <!--start of contact-page -->
    <section class="contact-page section-padding">
        <div class="container">
            <div class="office-info">
                <div class="row">
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="office-info-item">
                            <div class="office-info-icon">
                                <div class="icon">
                                    <i class="fi flaticon-home-address"></i>
                                </div>
                            </div>
                            <div class="office-info-text">
                                <h2>address line</h2>
                                <p>Bowery St, New York, 37 USA
                                    <br> NY 10013,USA
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="office-info-item active">
                            <div class="office-info-icon">
                                <div class="icon">
                                    <i class="fi flaticon-phone-call"></i>
                                </div>
                            </div>
                            <div class="office-info-text">
                                <h2>Phone Number</h2>
                                <p>+1255 - 568 - 6523 4374-221 <br>
                                    +1255 - 568 - 6523</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="office-info-item">
                            <div class="office-info-icon">
                                <div class="icon">
                                    <i class="fi flaticon-mail-1"></i>
                                </div>
                            </div>
                            <div class="office-info-text">
                                <h2>Address</h2>
                                <p>contact@aidUs.com <br> info@aidUs.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-wrap">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="contact-left">
                            <h2>Get in touch</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit mattis
                                faucibus odio feugiat arc dolor.</p>
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="contact-right">
                            <div class="title">
                                <h2>Fill Up The Form</h2>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>
                            <form id="contactForm" class="contact-form">
                                <div class="input-item">
                                    <input id="name" class="fild" type="text" placeholder="Your Name*" required>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <div class="input-item">
                                    <input id="email" class="fild" type="email" placeholder="Email Address*"
                                        required>
                                    <label><i class="flaticon-email"></i></label>
                                </div>
                                <div class="input-item">
                                    <textarea id="message" class="fild textarea" placeholder="Enter Your Message here" required></textarea>
                                    <label><i class="flaticon-edit"></i></label>
                                </div>
                                <div class="input-item submitbtn">
                                    <input class="fild" type="submit" value="Get In Touch">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end of contact-page -->
@endsection
