@extends('frontoffice.layouts.main')

@push('logo-black')
    @include('frontoffice.layouts.logo-black')
@endpush

@push('style-alt')
    <style>
        .indented-list li {
            margin-left: 10px;
            /* Atur indent yang diinginkan */
            text-indent: -13px;
            /* Sesuaikan sesuai desain Anda */
        }

        .indented-list li:first-line {
            text-indent: 0;
            /* Setel ulang text-indent untuk baris pertama */
            margin-left: 30px;
            /* Atur indent tambahan untuk baris pertama */
        }

        .indented-list-2 li {
            margin-left: 25px;
            /* Atur indent yang diinginkan */
            text-indent: -26px;
            /* Sesuaikan sesuai desain Anda */
        }

        .indented-list-2 li:first-line {
            text-indent: 0;
            /* Setel ulang text-indent untuk baris pertama */
            margin-left: 30px;
            /* Atur indent tambahan untuk baris pertama */
        }
        @media (max-width: 767px) {
            .de-price span {
                font-size: 12px;
            }
        }
        
        @media (max-width: 767px) {
            .de-title {
                font-size: 16px;
            }
        }
    </style>
@endpush

@push('header-alt')
    <header class="transparent header-light scroll-light">
    @endpush

    @section('content')
        <!-- section begin -->
        <section id="subheader" class="s2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="crumb">
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Locations</a></li>
                            <li><a href="#">Myco X - Satoria Tower</a></li>
                        </ul>
                        <h2>Myco X - Satoria Tower</h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div id="slider-carousel" class="owl-carousel">
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/satoria/1a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/satoria/2a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/satoria/3a.jpg') }}"
                                    alt="">
                            </div>
                        </div>


                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Sewa kantor dan coworking space Surabaya Barat dengan bangunan office tower terletak di Jalan
                            Pradah Jaya, Dukuh Pakis, Surabaya</p>
                        <div class="col-md-6 mb-sm-30 mb-4">
                            <div class="box-custom">
                                <ul class="list s1">
                                    <li>Terletak di pusat Surabaya Barat</li>
                                    <li>5 menit ke Pakuwon Mall</li>
                                    <li>5 menit ke Spazio Terrace</li>
                                    <li>7 menit ke Lenmarc Mall</li>
                                    <li>10 menit ke Bundaran Satelit</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-3">Facilities</h4>
                            <div class="row" style="font-size:15px;">
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2 mt-2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/pantry.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Pantry</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2 mt-2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/free-flow-beverage.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Free-flow
                                        Beverage</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2 mt-2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/high-speed-connection.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>High Speed
                                        Internet</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2 mt-2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/24-hour.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Access 24
                                        Hours</strong>
                                </div>
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Sewa Kantor</h3>

                        <div class="row">
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('manage.office') }}" class="de-card">
                                    <div class="text">
                                        <h4 class="de-title">Manage Office</h4>
                                        <p>Ruang kerja on-demand yang luas di desain khusus sesuai kebutuhan perusahaan
                                            Anda, kini Anda bisa fokus pada perkembangan bisnis Anda dan biarkan kami
                                            support dengan mengelola fasilitas di kantor Anda. Cocok untuk perusahaan skala
                                            menengah dan besar.</p>
                                        <ul class="list s1 indented-list-2">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Electricity</li>
                                            <li>Complimentary Beverage</li>
                                            <li>General Cleaning</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>Inquiry</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Location on Maps</h3>
                        <div class="de-map-wrapper">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2044.0304248540288!2d112.68423363587132!3d-7.2827326347563694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc3b7474c7e3%3A0xc96a508be98e6fa4!2sSatoria%20Tower!5e0!3m2!1sen!2sid!4v1702525654397!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        {{-- <div class="spacer-double"></div>

                        <h3>Ratings &amp; Reviews</h3>

                        <ul class="de-review-list">
                            <li>
                                <h5>Excellent coworking place</h5>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                </div>
                                <p class="d-testi">
                                    It's exactly what I've been looking for. CoSpace impressed me on multiple levels. We've
                                    seen
                                    amazing results already. Thank you CoSpace!
                                </p>
                                <div class="d-user">By: Janice Mojica</div>
                            </li>
                            <li>
                                <h5>Very cozy place to work</h5>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                    I am so pleased with this product. This is simply unbelievable! CoSpace is the most
                                    valuable
                                    business resource we have EVER purchased.
                                </p>
                                <div class="d-user">By: Cathleen Conrath</div>
                            </li>
                            <li>
                                <h5>Outstanding coworking services</h5>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                    Man, this thing is getting better and better as I learn more about it. CoSpace is both
                                    attractive and highly adaptable. I will refer everyone I know.
                                </p>
                                <div class="d-user">By: Laine Votaua</div>
                            </li>
                        </ul> --}}

                    </div>

                    <div id="sidebar" class="col-lg-4">
                        <div class="de-box de-location-address">
                            <h3>Location Address</h3>
                            <div>Jl. Pradah Jaya I No.1,<br>Pradahkalikendal, Kec. Dukuhpakis,<br>Kota Surabaya, Jawa Timur
                                60226
                            </div>
                            <div>+6289633299494</div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="de-box de-location-address">
                            <h3>Operational Hours</h3>
                            <div>Senin - Jum'at : 09.00 - 18.00 WIB</div>
                            <div>Sabtu : 09.00 - 16.00 WIB</div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="sidebar_inner">
                            @include('frontoffice.layouts.booking-button')
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
