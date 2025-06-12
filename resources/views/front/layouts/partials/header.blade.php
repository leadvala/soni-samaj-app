<!-- Start header -->
<header id="header" class="header-s2">
    <!-- start topbar -->
    <div class="topbar" @if(Request::route()->getName() != 'front.index') style="background:#EBEBEB" @endif>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <ul class="contact-info">
                        <li>
                            <a href="tel:+887869587496">
                                <i class="flaticon-phone-1"></i><span>Hot Line: +1 800 123 456 789</span>
                            </a>
                        </li>
                        <li>
                            <i class="ti-email"></i><span>support@sonicommunity.com</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="contact-into">
                        <ul class="social-media">
                            <li><a href="#"><i class="flaticon-facebook-app-symbol"></i></a></li>
                            <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                            <li><a href="#"><i class="flaticon-camera"></i></a></li>
                            <li><a href="#"><i class="flaticon-vimeo"></i></a></li>
                        </ul>
                        <div class="pryment-selector">
                            <select>
                                <option value="usd">USD</option>
                                <option value="aud">AUD</option>
                            </select>
                        </div>

                        <!-- ✅ Google Translate Widget -->
                        <div id="google_translate_element" style="margin-left: 10px;"></div>
                        <!-- End Translate -->

                        <div class="language-selector">
                            <!-- <select id="languageSelect">
                                <option value="en"
                                    data-icon="{{ asset('front_assets/assets/images/language/1.svg') }}">English
                                </option>
                                <option value="sp"
                                    data-icon="{{ asset('front_assets/assets/images/language/2.svg') }}">Spanish
                                </option>
                            </select> -->
                            <!-- <div class="language-selector">
    <select id="custom-lang-switcher" class="form-select" onchange="changeLanguage(this)">
        <option value="en">English</option>
        <option value="hi">Hindi</option>
    </select>
</div> -->

                            <div class="custom-select-wrapper">
                                <div class="custom-select"></div>
                                <div class="custom-arrow"><i class="ti-angle-down"></i></div>
                            </div>
                            <div class="custom-options"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end topbar -->

    <div class="wpo-site-header">
        <nav class="navigation navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                        <div class="mobail-menu">
                            <button type="button" class="navbar-toggler open-btn">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar first-angle"></span>
                                <span class="icon-bar middle-angle"></span>
                                <span class="icon-bar last-angle"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ route('front.index') }}"><img
                                    src="{{ asset('logo') }}/soni-logo.png" width="150" height="70"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-1">
                        <div id="navbar" class="collapse navbar-collapse navigation-holder">
                            <button class="menu-close"><i class="ti-close"></i></button>
                            <ul class="nav navbar-nav mb-2 mb-lg-0">
                                <li><a href="{{ route('front.index') }}">Home</a></li>
                                <li><a href="{{ route('front.about') }}">About</a></li>
                                <li><a href="{{ route('front.sangathan') }}">Sangathan</a></li>
                                <li class="menu-item-has-children"><a href="#">Events</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('front.events') }}">Badhai</a></li>
                                        <li><a href="{{ route('front.events') }}">Shok Samachar</a></li>
                                        <li><a href="{{ route('front.events') }}">Today’s Birthday</a></li>
                                        <li><a href="{{ route('front.events') }}">News</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('front.kul_devta') }}">Kul Devta</a></li>
                                <li><a href="{{ route('front.job_search') }}">Job</a></li>
                                <li><a href="{{ route('front.contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-2 col-2">
                        <div class="header-right">
                            <div class="header-search-form-wrapper">
                                <div class="cart-search-contact">
                                    <button class="search-toggle-btn"><i
                                            class="fi flaticon-magnifying-glass"></i></button>
                                    <div class="header-search-form">
                                        <form>
                                            <div>
                                                <input type="text" class="form-control" placeholder="Search here...">
                                                <button type="submit"><i
                                                        class="fi flaticon-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="close-form">
                                <a class="theme-btn" href="{{ route('front.register_member') }}">Register Member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end of header -->

<div id="google_translate_element" style="display: none;"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,hi',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }

    function changeLanguage(selectObj) {
        const lang = selectObj.value;
        const frame = document.querySelector("iframe.goog-te-menu-frame");
        if (frame) {
            const innerDoc = frame.contentDocument || frame.contentWindow.document;
            const items = innerDoc.querySelectorAll(".goog-te-menu2-item span.text");
            for (let item of items) {
                if (item.innerText.toLowerCase().includes(lang === "en" ? "english" : "hindi")) {
                    item.click();
                    break;
                }
            }
        }
    }
</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Optional: Hide branding if needed -->
<style>
    /* Hide Google branding */
    .goog-logo-link,
    .goog-te-gadget span,
    .goog-te-banner-frame.skiptranslate,
    .goog-te-menu-value span,
    .goog-te-menu-value,
    .goog-te-combo {
        display: none !important;
    }

    /* Hide the entire top frame that Google injects */
    body > .goog-te-banner-frame {
        display: none !important;
    }

    /* Hide iframe borders and frames */
    .goog-te-menu-frame {
        display: none !important;
    }

    /* Remove padding/margin caused by injected translate bar */
    body {
        top: 0px !important;
    }

    /* Reset z-index changes */
    .goog-tooltip,
    .goog-tooltip:hover {
        display: none !important;
    }

    .goog-te-balloon-frame {
        display: none !important;
    }

    #goog-gt-tt, .goog-te-balloon-frame {
        display: none !important;
    }

    .goog-text-highlight {
        background: none !important;
        box-shadow: none !important;
    }

    /* Prevent page from shifting when translate bar appears */
    html {
        margin-top: 0px !important;
    }
</style>

