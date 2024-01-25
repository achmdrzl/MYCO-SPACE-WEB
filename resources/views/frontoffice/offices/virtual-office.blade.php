@extends('frontoffice.layouts.main')

@push('style-alt')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        .indented-list li {
            margin-left: 10px;
            /* Atur indent yang diinginkan */
            text-indent: -25px;
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

        .check-icon {
            color: green;
            /* Set the color for the check icon */
        }

        .close-icon {
            color: red;
            /* Set the color for the close icon */
        }

        .bronze {
            background: linear-gradient(to right, #E9935A, #BB5B28);
            color: #fff;
            /* Adjust text color for better readability */
        }

        .silver {
            background: linear-gradient(to right, #FFFBFA, #D1D2D6);
            color: #000;
            /* Adjust text color for better readability */
        }

        .gold {
            background: linear-gradient(to right, #F6C909, #AD7600);
            color: #fff;
            /* Adjust text color for better readability */
        }

        /* Remove border for header cells */
        table.table thead th {
            border: none;
        }

        .center-align {
            text-align: center;
        }

        table.table {
            border-collapse: separate;
            border-spacing: 5px;
            background-color: rgb(252, 252, 252);
            /* You can adjust this value to your preference */
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
                            <li><a href="#">Virtual Office</a></li>
                        </ul>
                        <h2>Virtual Office - Office Space</h2>
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
                    <div class="col-lg-9">
                        <div id="slider-carousel" class="owl-carousel">
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/1a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/indragiri/1a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/1a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/indragiri/5a.jpg') }}"
                                    alt="">
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Alamat surat menyurat dengan lokasi strategis untuk perusahaan Anda tanpa perlu memiliki bangunan
                            fisik.</p>
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

                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2>Choose your plan</h2>
                                <div class="small-border bg-color-2"></div>
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        {{-- <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Bronze</h2>
                                        <p class="plan-tagline">Best for personal</p>
                                    </div>
                                    <div class="mid bronze text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">4.500.000</span>
                                            <span class="month">/y</span>
                                        </p>
                                    </div>

                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ Office Address</li>
                                            <li>✅ Domicile Affidavit</li>
                                            <li>✅ Call/Mail/Document/Parcel Handling</li>
                                            <li>❌ Call/Mail/Document/Parcel Storage</li>
                                            <li>❌ Mail Delivery : Not Available</li>
                                            <li>❌ All Day Pass Voucher : Not Available</li>
                                            <li>❌ Meeting Room</li>
                                            <li>✅ Print/Scan/Copy: 40PCS</li>
                                        </ul>
                                    </div>

                                    <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Silver</h2>
                                        <p class="plan-tagline">Best for small group</p>
                                    </div>

                                    <div class="mid silver">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">6.500.000</span>
                                            <span class="month">/y</span>
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

                                    <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Gold</h2>
                                        <p class="plan-tagline">Best for organization</p>
                                    </div>
                                    <div class="mid gold text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">7.500.000</span>
                                            <span class="month">/y</span>
                                        </p>
                                    </div>
                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ Office Address</li>
                                            <li>✅ Domicile Affidavit</li>
                                            <li>✅ Call/Mail/Document/Parcel Handling</li>
                                            <li>✅ Call/Mail/Document/Parcel Storage</li>
                                            <li>✅ Mail Delivery : All City</li>
                                            <li>✅ All Day Pass Voucher : 10</li>
                                            <li>✅ Meeting Room : 8 hours/month</li>
                                            <li>✅ Print/Scan/Copy : 100PCS</li>
                                        </ul>
                                    </div>

                                    <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="spacer-single"></div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Bronze</h2>
                                        <p class="plan-tagline">Best for personal</p>
                                    </div>
                                    <div class="mid bronze text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">4.500.000</span>
                                            <span class="month">/y</span>
                                        </p>
                                    </div>

                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ Office Address</li>
                                            <li>✅ Domicile Affidavit</li>
                                            <li>✅ Call/Mail/Document/Parcel Handling</li>
                                            <li>❌ Call/Mail/Document/Parcel Storage</li>
                                            <li>❌ Mail Delivery : Not Available</li>
                                            <li>❌ All Day Pass Voucher : Not Available</li>
                                            <li>❌ Meeting Room</li>
                                            <li>✅ Print/Scan/Copy: 40PCS</li>
                                        </ul>
                                    </div>

                                    <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Silver</h2>
                                        <p class="plan-tagline">Best for small group</p>
                                    </div>

                                    <div class="mid silver">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">6.500.000</span>
                                            <span class="month">/y</span>
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

                                    <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="pricing-s1 mb30">
                                    <div class="top">
                                        <h2>Gold</h2>
                                        <p class="plan-tagline">Best for organization</p>
                                    </div>
                                    <div class="mid gold text-light">
                                        <p class="price">
                                            <span class="currency">Rp</span>
                                            <span class="m opt-1" style="font-size: 28px;">7.500.000</span>
                                            <span class="month">/y</span>
                                        </p>
                                    </div>
                                    <div class="bottom">
                                        <ul class="indented-list">
                                            <li>✅ Office Address</li>
                                            <li>✅ Domicile Affidavit</li>
                                            <li>✅ Call/Mail/Document/Parcel Handling</li>
                                            <li>✅ Call/Mail/Document/Parcel Storage</li>
                                            <li>✅ Mail Delivery : All City</li>
                                            <li>✅ All Day Pass Voucher : 10</li>
                                            <li>✅ Meeting Room : 8 hours/month</li>
                                            <li>✅ Print/Scan/Copy : 100PCS</li>
                                        </ul>
                                    </div>

                                    <div class="action">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="spacer-single"></div> --}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center-align" style="font-size: 25px;">VIRTUAL OFFICE</th>
                                                <th class="bronze center-align">BRONZE</th>
                                                <th class="silver center-align">SILVER</th>
                                                <th class="gold center-align">GOLD</th>
                                            </tr>
                                            <tr>
                                                <th class="center-align" style="font-size: 25px;">PRICE LIST</th>
                                                <th class="bronze center-align">IDR <br> 4.500.000</th>
                                                <th class="silver center-align">IDR <br> 6.500.000</th>
                                                <th class="gold center-align">IDR <br> 7.500.000</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>OFFICE ADDRESS</th>
                                                <th class="center-align">✅</th>
                                                <th class="center-align">✅</th>
                                                <th class="center-align">✅</th>
                                            </tr>
                                            <tr>
                                                <th>DOMICILE AFFIDAVIT</th>
                                                <th class="center-align">✅</th>
                                                <th class="center-align">✅</th>
                                                <th class="center-align">✅</th>
                                            </tr>
                                            <tr>
                                                <th>CALL/MAIL/DOCUMENT/PARCEL HANDLING</th>
                                                <th class="center-align">✅</th>
                                                <th class="center-align">✅</th>
                                                <th class="center-align">✅</th>
                                            </tr>
                                            <tr>
                                                <th>CALL/MAIL/DOCUMENT/PARCEL STORAGE</th>
                                                <th class="center-align">❌</th>
                                                <th class="center-align">❌</th>
                                                <th class="center-align">✅</th>
                                            </tr>
                                            <tr>
                                                <th>MAIL DELIVERY</th>
                                                <th class="center-align">❌</th>
                                                <th class="center-align">SURABAYA ONLY</th>
                                                <th class="center-align">ALL CITY</th>
                                            </tr>
                                            <tr>
                                                <th>ALL DAY PASS VOUCHER</th>
                                                <th class="center-align">❌</th>
                                                <th class="center-align">5</th>
                                                <th class="center-align">10</th>
                                            </tr>
                                            <tr>
                                                <th>MEETING ROOM</th>
                                                <th class="center-align">❌</th>
                                                <th class="center-align">4 HOURS/MONTH</th>
                                                <th class="center-align">8 HOURS/MONTH</th>
                                            </tr>
                                            <tr>
                                                <th>PRINT/SCAN/COPY</th>
                                                <th class="center-align">40 PCS</th>
                                                <th class="center-align">80 PCS</th>
                                                <th class="center-align">100 PCS</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="spacer-double"></div>
                        <div class="spacer-double"></div>

                        <h3>Locations</h3>

                        <div class="row g-5">
                            @include('frontoffice.layouts.locations-services.cw')
                            @include('frontoffice.layouts.locations-services.indragiri')
                            @include('frontoffice.layouts.locations-services.trilium')
                        </div>

                        <div class="spacer-double"></div>

                    </div>

                    <div id="sidebar" class="col-lg-3">
                        <div class="sidebar_inner">
                            @include('frontoffice.layouts.booking-button')
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
