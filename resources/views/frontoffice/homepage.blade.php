@extends('frontoffice.layouts.main')

@push('header-alt')
    <header class="transparent header-light scroll-light">
@endpush

@section('content')
    <section id="section-hero" aria-label="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="spacer-single"></div>
                    <h6 class="wow fadeInUp" data-wow-delay=".5s"><span class="text-uppercase id-color-2">We
                            are CoSpace</span></h6>
                    <div class="spacer-10"></div>
                    <h1 class="wow fadeInUp" data-wow-delay=".75s">The <span class="id-color">largest</span>
                        leading premium coworking and office space.</h1>
                    <p class="wow fadeInUp lead" data-wow-delay="1s">
                        We provide the best workspace for your company. Over 150 locations around the world.
                        Find your best place to work in CoSpace.</p>
                    <div class="spacer-10"></div>
                    <a href="explore.html" class="btn-main wow fadeInUp lead" data-wow-delay="1.25s">Explore</a>
                    <div class="spacer-single"></div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.1s">
                            <div class="de_count text-left">
                                <h3><span>150</span>+</h3>
                                <h5 class="id-color">Rooms Available</h5>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.4s">
                            <div class="de_count text-left">
                                <h3><span>48</span>k</h3>
                                <h5 class="id-color">Happy Customers</h5>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.7s">
                            <div class="de_count text-left">
                                <h3><span>15</span></h3>
                                <h5 class="id-color">Year Experiences</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-sm-30"></div>
                </div>
                <div class="col-md-6 xs-hide">
                    <img src="{{ asset('frontoffice/assets/images/misc/images-set.png') }}"
                        class="lazy img-fluid wow fadeIn" data-wow-delay="1.25s" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="pt30 pb30 bg-color-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="item_category" class="dropdown style-2">
                        <h4>Locations</h4>
                        <a href="#" class="btn-selector">Australia</a>
                        <ul class="d-col-3">
                            <li><span>Australia</span></li>
                            <li><span>Austria</span></li>
                            <li><span>Belgium</span></li>
                            <li><span>Brazil</span></li>
                            <li><span>Canada</span></li>
                            <li><span>Chile</span></li>
                            <li><span>China</span></li>
                            <li><span>Colombia</span></li>
                            <li><span>Croatia</span></li>
                            <li><span>Czech Republic</span></li>
                            <li><span>Denmark</span></li>
                            <li><span>Estonia</span></li>
                            <li><span>Finland</span></li>
                            <li><span>France</span></li>
                            <li><span>Germany</span></li>
                            <li><span>Greece</span></li>
                            <li><span>Hungary</span></li>
                            <li><span>India</span></li>
                            <li><span>Indonesia</span></li>
                            <li><span>Ireland</span></li>
                            <li><span>Japan</span></li>
                            <li><span>Malaysia</span></li>
                            <li><span>Mexico</span></li>
                            <li><span>New Zealand</span></li>
                            <li><span>Peru</span></li>
                            <li><span>Philippines</span></li>
                            <li><span>South Africa</span></li>
                            <li><span>Ukraine</span></li>
                            <li><span>United Kingdom</span></li>
                            <li><span>Uruguay</span></li>
                            <li><span>USA</span></li>
                            <li><span>Thailand</span></li>
                            <li><span>Venezuela</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div id="buy_category" class="dropdown style-2">
                        <h4>Plans</h4>
                        <a href="#" class="btn-selector">All Plans</a>
                        <ul>
                            <li class="active"><span>All Plans</span></li>
                            <li><span>Daily Pass</span></li>
                            <li><span>Flexi Desk</span></li>
                            <li><span>Team Desk</span></li>
                            <li><span>Dedicated Desk</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div id="items_type" class="dropdown style-2">
                        <h4>Number of People</h4>
                        <a href="#" class="btn-selector">1 Person</a>
                        <ul>
                            <li class="active"><span>1 Person</span></li>
                            <li><span>2 - 5 Persons</span></li>
                            <li><span>6 - 10 Persons</span></li>
                            <li><span>11 - 20 Persons</span></li>
                            <li><span>More than 20</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <a href="search-result.html" class="btn-search-big">Submit</a>
                </div>
            </div>
        </div>
    </section>
    <section id="section-locations" class="relative no-bottom">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Our Locations</h2>
                    <div class="small-border bg-color-2"></div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="p-sm-30 pb-sm-0 mb-sm-0">
                        <div class="de-map-hotspot">

                            <div class="de-spot" style="top:39%; left:20%">
                                <span>United&nbsp;States</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:76%; left:87%">
                                <span>Australia</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:68%; left:80%">
                                <span>Indonesia</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:23%; left:18%">
                                <span>Canada</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:68%; left:33%">
                                <span>Brazil</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:19%; left:81%">
                                <span>Rusia</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:45%; left:75%">
                                <span>China</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:36%; left:48%">
                                <span>France</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:23%; left:51%">
                                <span>Sweden</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>
                            <div class="de-spot" style="top:78%; left:53%">
                                <span>South&nbsp;Africa</span>
                                <div class="de-circle-1"></div>
                                <div class="de-circle-2"></div>
                            </div>

                            <img src="{{ asset('frontoffice/assets/images/misc/map.png') }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="section-intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2>Find Your Space</h2>
                        <div class="small-border bg-color-2"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <a href="plan-daily-pass.html" class="de-card">
                        <div class="de-image">
                            <img src="{{ asset('frontoffice/assets/images/misc/is-1.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="text">
                            <h4>Private Office</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                            <ul class="ul-style-2">
                                <li>High Speed Connection</li>
                                <li>Unlimited Coffee &amp; Tea</li>
                                <li>Phone Booth Access</li>
                            </ul>
                            <div class="de-price">
                                <span>$39 / Day</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <a href="plan-daily-pass.html" class="de-card">
                        <div class="de-image">
                            <img src="{{ asset('frontoffice/assets/images/misc/is-2.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="text">
                            <h4>Coworking Space</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                            <ul class="ul-style-2">
                                <li>High Speed Connection</li>
                                <li>Unlimited Coffee &amp; Tea</li>
                                <li>Phone Booth Access</li>
                            </ul>
                            <div class="de-price">
                                <span>$169 / Day</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <a href="plan-daily-pass.html" class="de-card">
                        <div class="de-image">
                            <img src="{{ asset('frontoffice/assets/images/misc/is-3.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="text">
                            <h4>Virtual Office</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                            <ul class="ul-style-2">
                                <li>High Speed Connection</li>
                                <li>Unlimited Coffee &amp; Tea</li>
                                <li>Phone Booth Access</li>
                            </ul>
                            <div class="de-price">
                                <span>$329 / Day</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="section-why-choose-us" class="no-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2>Why Choose Us?</h2>
                        <div class="small-border bg-color-2"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('frontoffice/assets/images/misc/images-set-2.png') }}" class="lazy img-fluid"
                        alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6 mb20">
                            <h4>Modern &amp; Comfortable</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                        </div>
                        <div class="col-lg-6 mb20">
                            <h4>24/7 Secure Access</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                        </div>
                        <div class="col-lg-6 mb20">
                            <h4>Free Drinks &amp; Snacks</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                        </div>
                        <div class="col-lg-6 mb20">
                            <h4>Printing &amp; Scanning</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="section-pricing" class="no-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="text-center">
                        <h2>Select Your Plan</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="switch-set">
                        <div>Daily</div>
                        <div><input id="sw-1" class="switch" type="checkbox" /></div>
                        <div>Monthly</div>
                        <div class="spacer-20"></div>
                    </div>
                </div>
            </div>
            <div class="item pricing">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="pricing-s1 mb30">
                                <div class="top">
                                    <h2>Private Office</h2>
                                    <p class="plan-tagline">Best for personal</p>
                                </div>
                                <div class="mid bg-color-secondary text-light">
                                    <p class="price">
                                        <span class="currency">$</span>
                                        <span class="m opt-1">39</span>
                                        <span class="y opt-2">19</span>
                                        <span class="month">p/day</span>
                                    </p>
                                </div>

                                <div class="bottom">
                                    <ul>
                                        <li><i class="fa fa-check"></i>24/7 Access</li>
                                        <li><i class="fa fa-check"></i>High speed Wi-Fi</li>
                                        <li><i class="fa fa-check"></i>Secure keycard access</li>
                                        <li><i class="fa fa-check"></i>Dedicated phone line</li>
                                        <li><i class="fa fa-check"></i>Meeting room usage</li>
                                        <li><i class="fa fa-check"></i>Daily cleaning service</li>
                                    </ul>
                                </div>

                                <div class="action">
                                    <a href="" class="btn-main">Sign Up Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="pricing-s1 mb30">
                                <div class="top">
                                    <h2>Coworking Space</h2>
                                    <p class="plan-tagline">Best for small group</p>
                                </div>

                                <div class="mid bg-color-secondary text-light">
                                    <p class="price">
                                        <span class="currency">$</span>
                                        <span class="m opt-1">169</span>
                                        <span class="y opt-2">89</span>
                                        <span class="month">p/day</span>
                                    </p>
                                </div>
                                <div class="bottom">
                                    <ul>
                                        <li><i class="fa fa-check"></i>24/7 Access</li>
                                        <li><i class="fa fa-check"></i>High speed Wi-Fi</li>
                                        <li><i class="fa fa-check"></i>Secure keycard access</li>
                                        <li><i class="fa fa-check"></i>Dedicated phone line</li>
                                        <li><i class="fa fa-check"></i>Meeting room usage</li>
                                        <li><i class="fa fa-check"></i>Daily cleaning service</li>
                                    </ul>
                                </div>

                                <div class="action">
                                    <a href="" class="btn-main">Sign Up Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="pricing-s1 mb30">
                                <div class="top">
                                    <h2>Virtual Office</h2>
                                    <p class="plan-tagline">Best for organization</p>
                                </div>
                                <div class="mid bg-color-secondary text-light">
                                    <p class="price">
                                        <span class="currency">$</span>
                                        <span class="m opt-1">329</span>
                                        <span class="y opt-2">164</span>
                                        <span class="month">p/day</span>
                                    </p>
                                </div>
                                <div class="bottom">
                                    <ul>
                                        <li><i class="fa fa-check"></i>24/7 Access</li>
                                        <li><i class="fa fa-check"></i>High speed Wi-Fi</li>
                                        <li><i class="fa fa-check"></i>Secure keycard access</li>
                                        <li><i class="fa fa-check"></i>Dedicated phone line</li>
                                        <li><i class="fa fa-check"></i>Meeting room usage</li>
                                        <li><i class="fa fa-check"></i>Daily cleaning service</li>
                                    </ul>
                                </div>

                                <div class="action">
                                    <a href="" class="btn-main">Sign Up Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="section-studio-type" class="no-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2>Space Type</h2>
                        <div class="small-border bg-color-2"></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="de-image-text">
                        <a href="#" class="d-text">
                            <h3><span class="id-color">01</span> Podcast</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                        </a>
                        <img src="{{ asset('frontoffice/assets/images/misc/space-type-podcast.jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="de-image-text">
                        <a href="#" class="d-text">
                            <h3><span class="id-color">02</span> Live Streaming</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                        </a>
                        <img src="{{ asset('frontoffice/assets/images/misc/space-type-streaming.jpg') }}"
                            class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="de-image-text">
                        <a href="#" class="d-text">
                            <h3><span class="id-color">03</span> Photo &amp; Video Shoot</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque laudantium, totam rem.</p>
                        </a>
                        <img src="{{ asset('frontoffice/assets/images/misc/space-type-photo.jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
