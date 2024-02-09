@extends('frontoffice.layouts.main')

@push('style-alt')

    <meta name="title" content="Sewa Coworking Space Harian Surabaya Jakarta Indonesia | MyCo">
    <meta name="url" content="{{ route('hot.desk') }}">
    <meta content="Coworking space harian untuk Anda mengerjakan tugas, bekerja dan berkembang dalam komunitas. Cocok bagi Anda yang membutuhkan tempat yang nyaman untuk menyelesaikan tugas dan pekerjaan." name="description">
    <meta content="coworking space, sewa kantor, office rent, ruang kolaborasi, startup, bisnis umkm, coworking, private office, manage office, virtual office, event space, meeting room, podcast room, studio room" name="keywords">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Sewa Coworking Space Harian Surabaya Jakarta Indonesia | MyCo">
    <meta property="og:url" content="{{ route('hot.desk') }}" />
    <meta property="og:description" content="Coworking space harian untuk Anda mengerjakan tugas, bekerja dan berkembang dalam komunitas. Cocok bagi Anda yang membutuhkan tempat yang nyaman untuk menyelesaikan tugas dan pekerjaan.">
    <meta property="og:site_name" content="Sewa Coworking Space Harian Surabaya Jakarta Indonesia | MyCo" />

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
    </style>
@endpush

@push('logo-black')
    @include('frontoffice.layouts.logo-black')
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
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Hot Desk</a></li>
                        </ul>
                        <h2>Hot Desk - Coworking Area</h2>
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
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/3a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/2a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/indragiri/2a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/3a.jpg') }}"
                                    alt="">
                            </div>
                        </div>


                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Coworking space harian untuk Anda mengerjakan tugas, bekerja dan berkembang dalam komunitas.
                            Cocok bagi Anda yang membutuhkan tempat yang nyaman untuk menyelesaikan tugas dan pekerjaan.</p>
                        <div class="col-md-12 mb-sm-30 mb-4">
                            <div class="box-custom">
                                <ul class="list s1 indented-list-2">
                                    <li>Akses ke semua lokasi MyCo dan MyCo X</li>
                                    <li>Fasilitas lengkap dengan harga terjangkau</li>
                                    <li>Koneksi internet cepat</li>
                                    <li>Lingkungan yang tepat untuk bertumbuh dan networking</li>
                                    <li>Menfaat dan bonus membership</li>
                                    <li>Bekerja kapanpun dan dimanapun</li>
                                </ul>
                            </div>
                        </div>

                        <div class="spacer-double"></div>

                        <h3>Our Packages for Membership</h3>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Monthly</h2>
                                        <p class="plan-tagline">Best for personal</p>
                                    </div>
                                    <div class="mid bg-color-secondary text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">750.000</span>
                                            <span class="month">/month</span>
                                        </p>
                                    </div>

                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ All day hot desk access</li>
                                            <li>✅ Complimentary Drink</li>
                                            <li>✅ Quota Print & Photocopy 50pcs A4</li>
                                        </ul>
                                    </div>
                                    {{-- <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Voucher</h2>
                                        <p class="plan-tagline">Best for small group</p>
                                    </div>

                                    <div class="mid bg-color-secondary text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">500.000</span>
                                            <span class="month">/10pcs voucher</span>
                                        </p>
                                    </div>
                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ 10x 1 Day Pass</li>
                                            <li>✅ Quota Print & Photocopy 20pcs A4</li>
                                            <li>✅ Drink Voucher 50% off x5</li>
                                        </ul>
                                    </div>
                                    {{-- <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Locations</h3>

                        <div class="row g-5">
                            @include('frontoffice.layouts.locations-services.cw')
                            @include('frontoffice.layouts.locations-services.indragiri')
                            @include('frontoffice.layouts.locations-services.trilium')
                        </div>

                        <div class="spacer-double"></div>

                    </div>

                    <div id="sidebar" class="col-lg-4">

                        <div class="sidebar_inner">
                            @include('frontoffice.layouts.booking-button')
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
