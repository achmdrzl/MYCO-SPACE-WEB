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

        @media (max-width: 767px) {
            table th {
                font-size: 12px;
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
                            <li><a href="#">MyCo X - CW Tower</a></li>
                        </ul>
                        <h2>MyCo X - CW Tower</h2>
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
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/1a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/2a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/3a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/4a.jpg') }}"
                                    alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/9a.jpg') }}"
                                    alt="">
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Overview</h3>
                        <p>Sewa kantor dan coworking space Surabaya Barat dengan bangunan office tower terletak di Ciputra
                            World Tower, Surabaya</p>

                        <div class="col-md-6 mb-sm-30 mb-4">
                            <div class="box-custom">
                                <ul class="list s1">
                                    <li>Terletak di Jalan Mayjend Sungkono</li>
                                    <li>Bisa berjalan kaki ke Mal Ciputra World</li>
                                    <li>10 menit ke Mal Surabaya Town Square</li>
                                    <li>15 menit ke Kebun Binatang Surabaya</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-3">Facilities</h4>
                            <div class="row" style="font-size:15px;">
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/receptionist.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Receptionist</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/pantry.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Pantry</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/meeting-room.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Meeting
                                        Room</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/free-flow-beverage.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Free-flow
                                        Beverage</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/printing-assist.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Printing
                                        Assist</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/connecting-board.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Connecting
                                        Board</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/musholla.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Musholla</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/general-cleaning.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>General
                                        Cleaning</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/high-speed-connection.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>High Speed
                                        Internet</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/incoming-call-management.png') }}"
                                            alt="" style="width: 70%; margin-top:-10px;"></span><strong>Incoming
                                        Call Management</strong>
                                </div>
                                <div class="col-md-4 col-lg-6 demo-icon-wrap-s2">
                                    <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title=""><img
                                            src="{{ asset('frontoffice/assets/images/facilities/locker.png') }}"
                                            alt=""
                                            style="width: 70%; margin-top:-10px;"></span><strong>Locker</strong>
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
                                <a href="{{ route('private.office') }}" class="de-card">
                                    <div class="text">
                                        <h4 class="de-title">Private Office</h4>
                                        <p>Ruangan kantor yang siap pakai, luas dan full furnished untuk mendukung
                                            kebutuhan perusahaan Anda. Tersedia dalam ukuran ruangan yang kecil dan besar.
                                        </p>
                                        <ul class="list s1 indented-list-2">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Complimentary Free Flow</li>
                                            <li>Quota Meeting Room</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>1.500.000/month</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('virtual.office') }}" class="de-card">
                                    <div class="text">
                                        <h4 class="de-title">Virtual Office</h4>
                                        <p>Alamat surat menyurat dengan lokasi strategis untuk perusahaan Anda tanpa perlu
                                            memiliki bangunan fisik.</p>
                                        <ul class="list s1 indented-list-2">
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
                                            <span>4.500.000/year</span>
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
                                        <h4 class="de-title">Hot Desk</h4>
                                        <p>Coworking space harian untuk Anda mengerjakan tugas, bekerja dan berkembang dalam
                                            komunitas. Cocok bagi Anda yang membutuhkan tempat yang nyaman untuk
                                            menyelesaikan tugas dan pekerjaan.</p>
                                        <ul class="list s1 indented-list-2">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                            <li>Complimentary Free Flow & Snack</li>
                                            <li>Phone Booth Access</li>
                                        </ul>
                                        <div class="de-price">
                                            {{-- <span>Start from 35.000</span> --}}
                                        </div>
                                        <h4 class="de-title">Our Packages</h4>

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                {{-- <thead>
                                                    <tr>
                                                        <th class="center-align" style="font-size: 20px;">PACKAGE</th>
                                                        <th class="bronze center-align">PRICE</th>
                                                    </tr>
                                                </thead> --}}
                                                <tbody>
                                                    <tr>
                                                        <th><span class="">Hot Desk Student</span></th>
                                                        <th class="center-align">35.000 / 4 hours</th>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="">Hot Desk 4 Hour</span></th>
                                                        <th class="center-align">50.000 / 4 hour</th>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="">Hot Desk Daily</span></th>
                                                        <th class="center-align">65.000 / day</th>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="">Hot Desk Monthly</span></th>
                                                        <th class="center-align">750.000 / month</th>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="">Hot Desk Private</span></th>
                                                        <th class="center-align">100.000 / day</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- <div class="col-lg-12 mb25">
                                <a href="{{ route('dedicated.desk') }}" class="de-card">
                                    <div class="text">
                                        <h4>Dedicated Desk</h4>
                                        <p>Coworking space bulanan untuk Anda mengerjakan tugas, bekerja dan berkembang
                                            dalam komunitas. Cocok bagi Anda yang membutuhkan tempat rutin setiap hari yang
                                            nyaman untuk menyelesaikan tugas dan pekerjaan.</p>
                                        <ul class="list s1 indented-list-2">
                                            <li>High Speed Connection</li>
                                            <li>Unlimited Coffee &amp; Tea</li>
                                            <li>Phone Booth Access</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>1.111.111/Month</span>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('meeting.room') }}" class="de-card">
                                    <div class="text">
                                        <h4 class="de-title">Meeting Room</h4>
                                        <p>Ruang meeting yang layak dan cozy merupakan salah satu kunci kesuksesan pertemuan
                                            Anda dengan client, presentasi proposal, dan dealing secara profesional.
                                            Fokuslah pada meeting penting Anda dan biarkan kami yang support ruang meeting
                                            untuk Anda.</p>
                                        <ul class="list s1 indented-list-2">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Complimentary Free Flow & Snack</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                            <li>Phone Booth Access</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>150.000/hour</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('podcast.index') }}" class="de-card">
                                    <div class="text">
                                        <h4 class="de-title">Podcast Room</h4>
                                        <p>Audience sangat ingin mendapatkan konten yang berkualitas dari Anda dan ruang
                                            podcast eksklusif kami lengkap dengan peralatan podcast untuk membantu
                                            mewujudkannya.</p>
                                        <ul class="list s1 indented-list-2">
                                            <li>High Speed Connection</li>
                                            <li>Unlimited Coffee &amp; Tea</li>
                                            <li>Phone Booth Access</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>200.000/hour</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-12 mb25">
                                <a href="{{ route('studio.index') }}" class="de-card">
                                    <div class="text">
                                        <h4 class="de-title">Studio Room</h4>
                                        <p>Ruangan kedap suara dan di design untuk penggunaan pribadi bagi para content
                                            creator dan youtuber seperti Anda karena kami paham bahwa konten yang
                                            berkualitas merupakan hal yang mendasar.</p>
                                        <ul class="list s1 indented-list-2">
                                            <li>Fully Furnished Space with Comfortable Space & Desk</li>
                                            <li>High Speed Internet</li>
                                            <li>Complimentary Free Flow & Snack</li>
                                            <li>Quota Print/Scan/Fotocopy</li>
                                            <li>Phone Booth Access</li>
                                        </ul>
                                        <div class="de-price">
                                            <span>200.000/day</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h3>Location on Maps</h3>
                        <div class="de-map-wrapper">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.53920351792!2d112.71827277460983!3d-7.29314969271434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fd0a8d32091b%3A0xe0c1c04bfdfe3ade!2sMyCo%20X%20Coworking%20and%20Office%20Space%20-%20Ciputra%20World!5e0!3m2!1sen!2sid!4v1702486351565!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div class="spacer-double"></div>

                        <h3>Ratings &amp; Reviews</h3>

                        <ul class="de-review-list">
                            <li>
                                {{-- <h5>Excellent coworking place</h5> --}}
                                <div class="d-user">Adinda Nurina Sari</div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                </div>
                                <p class="d-testi">
                                    MyCo Coworking Space can help and provide opportunities to establish relationships with
                                    other parties. MyCo prioritizes client comfort and offers friendly and informative
                                    services, supported by cleanliness and excellent facilities.
                                </p>
                            </li>
                            <li>
                                {{-- <h5>Very cozy place to work</h5> --}}
                                <div class="d-user">Agus (Live to Learn)</div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                    Working at MyCo Coworking Space feels more practical and efficient. The services
                                    provided are highly informative and communicative, which greatly contribute to enhancing
                                    productivity. The facilities offered are of good quality, the cleanliness is
                                    well-maintained, and the environment is comfortable. The rooms are equipped with
                                    comprehensive amenities that support a conducive working environment.
                                </p>
                            </li>
                            <li>
                                {{-- <h5>Outstanding coworking services</h5> --}}
                                <div class="d-user">Melin Surya - Freelancer </div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                    A cozy workplace with great ambience and views. Friendly and helpful staff. A great
                                    place to work.
                                </p>
                            </li>
                            <li>
                                {{-- <h5>Outstanding coworking services</h5> --}}
                                <div class="d-user">By:Jessicca - Freelancer</div>
                                <div class="p-rating">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="d-testi">
                                    Very good workplace with good cleanliness, very informative and good staff. Very
                                    comfortable to be able to think and develop creativity at myco with very adequate
                                    facilities.
                                    facilities.
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div id="sidebar" class="col-lg-4">
                        <div class="de-box de-location-address">
                            <h3>Location Address</h3>
                            <div>Ciputra World<br>Jl. Mayjend Sungkono No. 89,<br>Surabaya. Jawa Timur 60224</div>
                            <div>+6285808756528</div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="de-box de-location-address">
                            <h3>Operational Hours</h3>
                            <div>Senin - Jum'at : 09.00 - 18.00 WIB</div>
                            <div>Sabtu : 09.00 - 16.00 WIB</div>
                        </div>

                        <div class="spacer-single"></div>

                        <div class="sidebar_inner">
                            <div id="quick_form" class="form-border mb30">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12">
                                        <h3>Let's Get In Touch</h3>
                                        <a type="button" id="addBooking2"
                                            class="btn-main btn-fullwidth text-center">Booking Now!</a>
                                    </div>
                                </div>
                            </div>

                            <div class="de-box">
                                <h3>Share With Friends</h3>
                                <div class="de-color-icons mt-2">
                                    <a href="https://api.whatsapp.com/send/?phone=6285808756528&text=Hallo+admin+MYCO+Ciputra+World....&type=phone_number&app_absent=0"
                                        title="go to whatsapp" target="_blank"><box-icon type='logo'
                                            name='whatsapp'></box-icon></a>
                                    <a href="https://www.instagram.com/myco.space/" title="go to instagram"
                                        target="_blank"><box-icon name='instagram' type='logo'></box-icon></a>
                                    <a href="https://www.linkedin.com/in/myco-space-15baa7217/" title="go to linkedin"
                                        target="_blank"><box-icon name='linkedin' type='logo'></box-icon></a>
                                    <a href="https://www.tiktok.com/@myco.space " title="go to tiktok"
                                        target="_blank"><box-icon type='logo' name='tiktok'></box-icon></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
