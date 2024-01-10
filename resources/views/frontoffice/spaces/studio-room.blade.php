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
    @include('frontoffice.layouts.logo-myco')
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
                            <li><a href="#">Studio Room</a></li>
                        </ul>
                        <h2>Studio Room - Sewa Studio Room</h2>
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
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/6a.jpg') }}"
                                    alt="">
                            </div>
                        </div>


                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Ruangan kedap suara dan di design untuk penggunaan pribadi bagi para content creator dan youtuber
                            seperti Anda karena kami paham bahwa konten yang berkualitas merupakan hal yang mendasar.</p>
                        <div class="col-md-12 mb-sm-30 mb-4">
                            <div class="box-custom">
                                <ul class="list s1 indented-list-2">
                                    <li>Ruangan terbaik untuk fokus</li>
                                    <li>Layar green-screen tersedia</li>
                                    <li>Ruangan kedap suara</li>
                                    <li>Fasilitas lengkap dengan harga terjangkau</li>
                                    <li>Koneksi internet cepat</li>
                                    <li>Lingkungan yang tepat untuk bertumbuh dan networking</li>
                                </ul>
                            </div>
                        </div>

                        <div class="spacer-double"></div>

                        <h3>Our Packages</h3>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Daily</h2>
                                        <p class="plan-tagline">Best for personal</p>
                                    </div>
                                    <div class="mid bg-color-secondary text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">200.000</span>
                                            <span class="month">/all day</span>
                                        </p>
                                    </div>

                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ Office Address</li>
                                            <li>✅ Domicile Affidavit</li>
                                            <li>✅ Call/Mail/Document/Parcel Handling</li>
                                            <li>❌ Call/Mail/Document/Parcel Storage</li>
                                            <li>❌ Mail Delivery</li>
                                            <li>❌ All Day Pass Voucher</li>
                                            <li>❌ Meeting Room</li>
                                            <li>✅ Print/Scan/Copy : 40PCS</li>
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
                                        <h2>Monthly</h2>
                                        <p class="plan-tagline">Best for small group</p>
                                    </div>

                                    <div class="mid bg-color-secondary text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">1.800.00</span>
                                            <span class="month">/month</span>
                                        </p>
                                    </div>
                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ Office Address</li>
                                            <li>✅ Domicile Affidavit</li>
                                            <li>✅ Call/Mail/Document/Parcel Handling</li>
                                            <li>❌ Call/Mail/Document/Parcel Storage</li>
                                            <li>✅ Mail Delivery : Surabaya Only</li>
                                            <li>✅ All Day Pass Voucher : 5</li>
                                            <li>✅ Meeting Room : 4 hours/month</li>
                                            <li>✅ Print/Scan/Copy : 80PCS</li>
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
