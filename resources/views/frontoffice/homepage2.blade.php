@extends('frontoffice.layouts.main')

@push('logo-black')
    @include('frontoffice.layouts.logo-white')
@endpush


@push('header-alt')
    <header class="transparent scroll-light">
    @endpush

    @section('content')
        <section id="section-hero" data-bgimage="url({{ asset('frontoffice/assets/images/background/12.jpg') }}) top"
            aria-label="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-light">
                        <div class="spacer-single"></div>
                        <h6 class="wow fadeInUp" data-wow-delay=".5s"><span class="text-uppercase id-color">We are
                                MyCo Space</span>
                        </h6>
                        <div class="spacer-10"></div>
                        <h1 class="wow fadeInUp" data-wow-delay=".75s">Innovate <span class="id-color">at the Top</span>
                            Premium Coworking and Office Solutions.</h1>
                        <p class="wow fadeInUp lead" data-wow-delay="1s">
                            Elevate Your Workspace: Exceptional Work Environments at 4 Prime Locations in Surabaya,
                            Indonesia. Experience Excellence at MyCo Space.</p>
                        <div class="spacer-10"></div>
                        <a class="btn-main wow fadeInUp lead" type="button" id="addBooking" data-wow-delay="1.25s">Booking Now!</a>
                        <div class="spacer-single"></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.1s">
                                <div class="de_count text-left">
                                    <h3><span class="timer" data-to="150" data-speed="3000">0</span></h3>
                                    <h5 class="id-color">Rooms Available</h5>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.4s">
                                <div class="de_count text-left">
                                    <h3><span class="timer" data-to="48" data-speed="3000">0</span></h3>
                                    <h5 class="id-color">Happy Customers</h5>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay="1.7s">
                                <div class="de_count text-left">
                                    <h3><span class="timer" data-to="4" data-speed="3000">0</span></h3>
                                    <h5 class="id-color">Year Experiences</h5>
                                </div>
                            </div>
                        </div>
                        <div class="mb-sm-30"></div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-lg-12 col-md-12">
                        <div id="carouselExampleSlidesOnly" class="carousel slide d-block mx-auto" data-bs-ride="carousel"
                            data-bs-interval="2000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/ANTERAJA.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/ASIANET.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/CVEKAWAHYUSEJAHTERA.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <!-- Repeat similar structure for other columns -->
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/FASHIONWISEVENUE.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/IMEJI.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/KlikA2C.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <!-- Repeat similar structure for other columns -->
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/KOINWORKS.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/LIVETOLEARN.png') }}"
                                                        alt="" style="width: 100%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/MAIMAID.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <!-- Repeat similar structure for other columns -->
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/MAXY.png') }}"
                                                        alt="" style="width: 60%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/NIRANKARA.png') }}"
                                                        alt="" style="width: 100%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/OTOHUB.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <!-- Repeat similar structure for other columns -->
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/PAWSOME.png') }}"
                                                        alt="" style="width: 100%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/PRISNTITUTE.png') }}"
                                                        alt="" style="width: 100%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/PRUDENTIAL.png') }}"
                                                        alt="" style="width: 100%;"></span>
                                            </div>
                                        </div>
                                        <!-- Repeat similar structure for other columns -->
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/ALTACONSULTING.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/RISE.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/SAVETHECHILDREN.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <!-- Repeat similar structure for other columns -->
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/SHELL.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/StudioTigaDinding.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="text-center">
                                                <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title=""><img
                                                        src="{{ asset('frontoffice/assets/images/logo-tenant/ALPLUS.png') }}"
                                                        alt="" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <!-- Repeat similar structure for other columns -->
                                    </div>
                                </div>
                                <!-- Repeat similar structure for other carousel items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- <section>
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-lg-12 col-md-12">
                        <div id="carouselExampleSlidesOnly" class="carousel slide d-block mx-auto" data-bs-ride="carousel"
                            data-bs-interval="2000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/ANTERAJA.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/ASIANET.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/CVEKAWAHYUSEJAHTERA.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/FASHIONWISEVENUE.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/IMEJI.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/KlikA2C.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/KOINWORKS.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/LIVETOLEARN.png') }}"
                                                    alt="" style="width: 100%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/MAIMAID.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/MAXY.png') }}"
                                                    alt="" style="width: 60%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/NIRANKARA.png') }}"
                                                    alt="" style="width: 100%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/OTOHUB.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/PAWSOME.png') }}"
                                                    alt="" style="width: 100%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/PRISNTITUTE.png') }}"
                                                    alt="" style="width: 100%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/PRUDENTIAL.png') }}"
                                                    alt="" style="width: 100%;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/ALTACONSULTING.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/RISE.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/SAVETHECHILDREN.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ">
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/SHELL.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/StudioTigaDinding.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""><img
                                                    src="{{ asset('frontoffice/assets/images/logo-tenant/ALPLUS.png') }}"
                                                    alt="" style="width: 80%;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}



        {{-- <section id="section-intro">
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
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem.</p>
                                <ul class="ul-style-2">
                                    <li>High Speed Connection</li>
                                    <li>Unlimited Coffee &amp; Tea</li>
                                    <li>Phone Booth Access</li>
                                </ul>
                                <div class="de-price">
                                    <span>1.111.111 / Month</span>
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
                                <h4>Hot Desk</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem.</p>
                                <ul class="ul-style-2">
                                    <li>High Speed Connection</li>
                                    <li>Unlimited Coffee &amp; Tea</li>
                                    <li>Phone Booth Access</li>
                                </ul>
                                <div class="de-price">
                                    <span>35.000 / Day</span>
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
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem.</p>
                                <ul class="ul-style-2">
                                    <li>High Speed Connection</li>
                                    <li>Unlimited Coffee &amp; Tea</li>
                                    <li>Phone Booth Access</li>
                                </ul>
                                <div class="de-price">
                                    <span>5.000.000 / Year</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section id="section-why-choose-us" class="no-top">
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
                    <div class="col-md-6 mt-2">
                        <div class="row">
                            <div class="col-lg-6 mb20">
                                <h4>Modern &amp; Comfortable</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem.</p>
                            </div>
                            <div class="col-lg-6 mb20">
                                <h4>24/7 Secure Access</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem.</p>
                            </div>
                            <div class="col-lg-6 mb20">
                                <h4>Free Drinks &amp; Snacks</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem.</p>
                            </div>
                            <div class="col-lg-6 mb20">
                                <h4>Printing &amp; Scanning</h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <div class="container" style="margin-bottom: 120px;"></div>

        <section id="section-why-choose-us" class="no-top">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1>Why Choose Us?</h1>
                            <div class="small-border bg-color-2"></div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="mb30">
                            <div class="top text-center">
                                <div class="col-lg-12">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/why-choose-us/prime-location.png') }}"
                                            alt="" style="width: 70%;"></span>
                                </div>
                                <div class="col-lg-12 p-4 mb20">
                                    <h4>Prime Location</h4>
                                    <p>MyCo X enjoys a prime location, providing businesses and professionals with a
                                        strategic and prestigious workspace in the heart of the city.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="mb30">
                            <div class="top text-center">
                                <div class="col-lg-12">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/why-choose-us/comfortable-Workspace.png') }}"
                                            alt="" style="width: 70%;"></span>
                                </div>
                                <div class="col-lg-12 p-3">
                                    <h4>Comfortable Workspace</h4>
                                    <p>MyCo X offers a comfortable workspace designed to enhance
                                        productivity and
                                        well-being, fostering a positive and inspiring work environment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="mb30">
                            <div class="top text-center">
                                <div class="col-lg-12">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/why-choose-us/fully-furnished.png') }}"
                                            alt="" style="width: 70%;"></span>
                                </div>
                                <div class="col-lg-12 p-4 mb20">
                                    <h4>Fully Furnished</h4>
                                    <p>MyCo X provides fully furnished spaces equipped with modern amenities, ensuring a
                                        hassle-free and comfortable for work experience.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="mb30">
                            <div class="top text-center">
                                <div class="col-lg-12">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/why-choose-us/cost-effective.png') }}"
                                            alt="" style="width: 70%;"></span>
                                </div>
                                <div class="col-lg-12 p-4 mb20">
                                    <h4>Cost Effective</h4>
                                    <p>MyCo X offers cost-effective solutions, providing budget-friendly workspaces without
                                        compromising on quality and amenities.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="mb30">
                            <div class="top text-center">
                                <div class="col-lg-12 p-2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/why-choose-us/networking-opportunities.png') }}"
                                            alt="" style="width: 70%;"></span>
                                </div>
                                <div class="col-lg-12 p-3">
                                    <h4>Networking Opportunities</h4>
                                    <p>MyCo X provides networking opportunities, fostering a
                                        collaborative environment where
                                        professionals can connect and thrive together.</p>
                                </div>
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
                            <div class="mb30">
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

        <section class="pt30 pb30 bg-color-secondary mb-5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-lg-6 col-md-3">
                        <h5>Punya Permintaan Khusus?</h5>
                        <a href="https://api.whatsapp.com/send?phone=6289633299494&text=Hai%20Admin%20MyCo,%20saya%20mau%20tanya%20perihal%20office%20space%20di%20MyCo%0ANama%20:%20%0AEmail%20:%20%0AKebutuhan%20:%20"
                            class="btn-search-big" target="_blank"><i class="fa fa-whatsapp fa-lg"></i> Whatsapp
                            Kami !</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-studio-type" class="no-top">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1>Space Type</h1>
                            <div class="small-border bg-color-2"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <a href="#" class="d-text">
                                <h3><span class="id-color">01</span> Podcast Room</h3>
                                <p>Exploring boundless ideas and untold stories within these podcast walls.</p>
                            </a>
                            <img src="{{ asset('frontoffice/assets/images/misc/space-type-podcast-1.png') }}"
                                class="img" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <a href="#" class="d-text">
                                <h3><span class="id-color">02</span> Private Office</h3>
                                <p>Where focus meets ambition, and dreams turn into strategies. Welcome to my sanctuary of
                                    productivity.</p>
                            </a>
                            <img src="{{ asset('frontoffice/assets/images/misc/space-type-private-office-1.png') }}"
                                class="img" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <a href="#" class="d-text">
                                <h3><span class="id-color">03</span> Coworking Areas</h3>
                                <p>Fueling creativity in the dynamic hum of shared ideas. Here, collaboration knows no
                                    boundaries.</p>
                            </a>
                            <img src="{{ asset('frontoffice/assets/images/misc/space-type-coworking-1.png') }}"
                                class="img" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <a href="#" class="d-text">
                                <h3><span class="id-color">04</span> Meeting Room</h3>
                                <p>Where ideas converge and decisions take flight. In this room, every moment is a step
                                    towards progress.</p>
                            </a>
                            <img src="{{ asset('frontoffice/assets/images/misc/space-type-meeting-room-1.png') }}"
                                class="img" alt="">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="de-image-text">
                            <a href="#" class="d-text">
                                <h3><span class="id-color">05</span> Event Space</h3>
                                <p>Transforming moments into memories, one event at a time. Welcome to a space where
                                    celebrations find their perfect stage.</p>
                            </a>
                            <img src="{{ asset('frontoffice/assets/images/misc/space-type-event-space-1.png') }}"
                                class="img" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <a href="#" class="d-text">
                                <h3><span class="id-color">06</span> Studio Room</h3>
                                <p>Suitable for content creators or YouTube in producing their videos.</p>
                            </a>
                            <img src="{{ asset('frontoffice/assets/images/misc/space-type-studio-room-1.png') }}"
                                class="img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    @push('script-alt')
        <script>
            $(document).ready(function() {
                // Trigger counting animation when the document is ready
                $(".timer").countTo();
            });
        </script>
    @endpush
