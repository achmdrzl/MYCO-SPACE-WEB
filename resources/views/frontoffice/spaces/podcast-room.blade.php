@extends('frontoffice.layouts.main')

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
                            <li><a href="#">Podcast Room</a></li>
                        </ul>
                        <h2>Podcast Room - Sewa Podcast Room</h2>
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
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/7a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/8a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/9a.jpg') }}"
                                    alt="">
                            </div>
                        </div>


                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Audience sangat ingin mendapatkan konten yang berkualitas dari Anda dan ruang podcast eksklusif
                            kami lengkap dengan peralatan podcast untuk membantu mewujudkannya.</p>
                        <div class="col-md-12 mb-sm-30 mb-4">
                            <div class="box-custom">
                                <ul class="list s1 indented-list-2">
                                    <li>Rekam konten audio dengan kualitas tinggi</li>
                                    <li>Peralatan podcast yang profesional</li>
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
