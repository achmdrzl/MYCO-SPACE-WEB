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
                            <li><a href="#">MyCo X - Trillium Tower</a></li>
                        </ul>
                        <h2>MyCo X - Trillium Tower</h2>
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
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/1a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/2a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/3a.jpg') }}"
                                    alt="">
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Sewa kantor dan coworking space Surabaya Pusat dengan bangunan office tower terletak di Jalan
                            Pemuda, Genteng, Surabaya</p>
                        <div class="col-md-6 mb-sm-30 mb-4">
                            <div class="box-custom">
                                <ul class="list s1">
                                    <li>Bisa berjalan kaki ke Delta Plaza, Surabaya</li>
                                    <li>3 menit ke Stasiun Kereta Api Gubeng</li>
                                    <li>5 menit ke Monumen Bambu Runcing</li>
                                    <li>10 menit ke Mall Tunjungan Plaza</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-3">Facilities</h4>
                            <div class="row" style="font-size:15px;">
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Receptionist"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/receptionist.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Receptionist</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Pantry"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/pantry.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Pantry</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Meeting Room"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/meeting-room.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Meeting
                                        Room</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Free-flow Beverage"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/free-flow-beverage.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Free-flow
                                        Beverage</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Printing Assist"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/printing-assist.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Printing
                                        Assist</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Connecting Board"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/connecting-board.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Connecting
                                        Board</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Musholla"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/musholla.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Musholla</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="General Cleaning"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/general-cleaning.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>General
                                        Cleaning</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="High Speed Internet"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/high-speed-connection.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>High Speed
                                        Internet</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Incoming Call Management"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/incoming-call-management.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Incoming
                                        Call Management</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Locker"><img
                                            src="{{ asset('frontoffice/assets/images/facilities/locker.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Locker</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2 mt-2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Access 24 Hours"><img
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
                                <a href="{{ route('private.office') }}" class="de-card">
                                    <div class="text">
                                        <h4>Private Office</h4>
                                        <p>Ruangan kantor yang siap pakai, luas dan full furnished untuk mendukung
                                            kebutuhan perusahaan Anda. Tersedia dalam ukuran ruangan yang kecil dan besar.
                                        </p>
                                        <ul class="list s1 indented-list-2  ">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Complimentary Free Flow & Snack</li>
                                            <li>Quota Meeting Room</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                            <li>Pantry Access</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>1.500.000/Month</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('virtual.office') }}" class="de-card">
                                    <div class="text">
                                        <h4>Virtual Office</h4>
                                        <p>Alamat surat menyurat dengan lokasi strategis untuk perusahaan Anda tanpa perlu
                                            memiliki bangunan fisik.</p>
                                        <ul class="list s1 indented-list-2  ">
                                            <li>Office Address</li>
                                            <li>Domicile Affidavit</li>
                                            <li>Call/Mail/Parcel Handling</li>
                                            <li>Mail/Document/Parcel Storage</li>
                                            <li>Mail Delivery</li>
                                            <li>All Day Pass Voucher</li>
                                            <li>Quota Meeting Room</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                        </ul>
                                        <div class="de-price">
                                            <span style="font-size: 13px;">Start from 4.500.000</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Coworking Space</h3>

                        <div class="row">
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('hot.desk') }}" class="de-card">
                                    <div class="text">
                                        <h4>Hot Desk</h4>
                                        <p>Coworking space harian untuk Anda mengerjakan tugas, bekerja dan berkembang dalam
                                            komunitas. Cocok bagi Anda yang membutuhkan tempat yang nyaman untuk
                                            menyelesaikan tugas dan pekerjaan.</p>
                                        <ul class="list s1 indented-list-2  ">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                            <li>Complimentary Free Flow & Snack</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>Start from 35.000</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('meeting.room') }}" class="de-card">
                                    <div class="text">
                                        <h4>Meeting Room</h4>
                                        <p>Ruang meeting yang layak dan cozy merupakan salah satu kunci kesuksesan pertemuan
                                            Anda dengan client, presentasi proposal, dan dealing secara profesional.
                                            Fokuslah pada meeting penting Anda dan biarkan kami yang support ruang meeting
                                            untuk Anda.</p>
                                        <ul class="list s1 indented-list-2  ">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Complimentary Free Flow & Snack</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>150.000 / Hour</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('studio.index') }}" class="de-card">
                                    <div class="text">
                                        <h4>Studio Room</h4>
                                        <p>Ruangan kedap suara dan di design untuk penggunaan pribadi bagi para content
                                            creator dan youtuber seperti Anda karena kami paham bahwa konten yang
                                            berkualitas merupakan hal yang mendasar.</p>
                                        <ul class="list s1 indented-list-2  ">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Pantry Access</li>
                                            <li>Complimentary Free Flow & Snack</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>200.000 / Day</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('event.index') }}" class="de-card">
                                    <div class="text">
                                        <h4>Event Space</h4>
                                        <p>Punya rencana untuk mengadakan acara komunitas? Ruangan di MyCo fleksibel untuk
                                            dimodifikasi sesuai kebutuhan event Anda, yuk kunjungi MyCo dan MyCo X.</p>
                                        <ul class="list s1 indented-list-2  ">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Pantry Access</li>
                                            <li>TV Access</li>
                                            <li>Assistance in Registration and Attendance</li>
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
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7794946974773!2d112.74644697460946!3d-7.265916692740977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9f99ec81b57%3A0x26490a67340a8387!2sMyCo%20X%20Coworking%20Space%20-%20Trillium%20Tower!5e0!3m2!1sen!2sid!4v1702525507296!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div class="spacer-double"></div>

                        <h3>Ratings &amp; Reviews</h3>

                        <ul class="de-review-list">
                            <li>
                                {{-- <h5>Excellent coworking place</h5> --}}
                                <div class="d-user">Hengky (KlikA2C)</div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                </div>
                                <p class="d-testi">
                                    Working in a coworking space has become simpler and more practical. The service provided
                                    by the staff is also excellent, without any issues, and the facilities and cleanliness
                                    are of high quality.
                                </p>
                            </li>
                            <li>
                                {{-- <h5>Very cozy place to work</h5> --}}
                                <div class="d-user">Ferdinan (Nirankara Law Firm)</div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                    MyCo offers the advantages of coworking, which include a high level of flexibility,
                                    comfort, and security as networking resources. It provides excellent and prompt
                                    services, supported by cleanliness and outstanding facilities.
                                </p>
                            </li>
                            <li>
                                {{-- <h5>Outstanding coworking services</h5> --}}
                                <div class="d-user">Kevin - Pelajar/Mahasiswa </div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                    Comfortable with the place because it's not too noisy so he can focus on doing the test.
                                </p>
                            </li>
                            <li>
                                {{-- <h5>Outstanding coworking services</h5> --}}
                                <div class="d-user">Ika - The Body Shop </div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                   Warm and helpful staff. A quiet and focused place to work. Located in front of Delta Plaza, easy access to various food for lunch.
                                </p>
                            </li>
                        </ul>

                    </div>
                    <div id="sidebar" class="col-lg-4">
                        <div class="de-box de-location-address">
                            <h3>Location Address</h3>
                            <div>Jl. Pemuda, Embong Kaliasin,<br>Kec. Genteng, <br>Kota Surabaya, Jawa Timur 60271</div>
                            <div>+6287766523711</div>
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
