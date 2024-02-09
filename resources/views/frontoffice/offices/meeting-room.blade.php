@extends('frontoffice.layouts.main')

@push('style-alt')

    <meta name="title" content="Sewa Meeting Room Surabaya Jakarta Indonesia | MyCo">
    <meta name="url" content="{{ route('meeting.room') }}">
    <meta content="Ruang meeting yang layak dan cozy merupakan salah satu kunci kesuksesan pertemuan Anda dengan client, presentasi proposal, dan dealing secara profesional. Fokuslah pada meeting penting Anda dan biarkan kami yang support ruang meeting untuk Anda." name="description">
    <meta content="coworking space, sewa kantor, office rent, ruang kolaborasi, startup, bisnis umkm, coworking, private office, manage office, virtual office, event space, meeting room, podcast room, studio room" name="keywords">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Sewa Meeting Room Surabaya Jakarta Indonesia | MyCo">
    <meta property="og:url" content="{{ route('meeting.room') }}" />
    <meta property="og:description" content="Ruang meeting yang layak dan cozy merupakan salah satu kunci kesuksesan pertemuan Anda dengan client, presentasi proposal, dan dealing secara profesional. Fokuslah pada meeting penting Anda dan biarkan kami yang support ruang meeting untuk Anda.">
    <meta property="og:site_name" content="Sewa Meeting Room Surabaya Jakarta Indonesia | MyCo" />

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
                            <li><a href="#">Meeting Room</a></li>
                        </ul>
                        <h2>Meeting Room - Sewa Meeting Room</h2>
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
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/indragiri/3a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/4a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/2a.jpg') }}"
                                    alt="">
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Ruang meeting yang layak dan cozy merupakan salah satu kunci kesuksesan pertemuan Anda dengan
                            client, presentasi proposal, dan dealing secara profesional. Fokuslah pada meeting penting Anda
                            dan biarkan kami yang support ruang meeting untuk Anda.</p>
                        <div class="col-md-12 mb-sm-30 mb-4">
                            <div class="box-custom">
                                <ul class="list s1 indented-list-2">
                                    <li>Ruangan meeting yang private dan luas</li>
                                    <li>Akses TV dengan kabel HDMI</li>
                                    <li>Papan tulis kaca</li>
                                    <li>Fasilitas lengkap dengan harga terjangkau</li>
                                    <li>Koneksi internet cepat</li>
                                    <li>Lingkungan yang tepat untuk bertumbuh dan networking</li>
                                </ul>
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
