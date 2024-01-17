@extends('frontoffice.layouts.main')

@push('style-alt')
    <style>
        .indent-list-2 a {
            margin-left: 35px;
            /* Adjust the desired indent */
            text-indent: -26px;
            /* Adjust according to your design */
            display: block;
            /* Make the link a block element for proper styling */
        }

        .indent-list-2 i {
            margin-left: 25px;
            margin-right: 1px;
            /* Counteract the spacing for the icon */
        }

        .indent-list-2 a:first-line {
            text-indent: 0;
            /* Reset text-indent for the first line */
            margin-left: 30px;
            /* Additional indent for the first line */
        }
    </style>
@endpush


@push('logo-black')
    @include('frontoffice.layouts.logo-white')
@endpush

@push('header-alt')
    <header class="transparent scroll-light">
    @endpush

    @section('content')
        <!-- section begin -->
        <section id="subheader" class="text-light"
            data-bgimage="url({{ asset('frontoffice/assets/images/background/subheader-c.jpg') }}) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Contact Us</h1>
                            <p style="font-size: 20px">Need an expert? you are more than welcomed to leave your contact <br>
                                info and we will be in touch shortly</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section aria-label="section">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-lg-4 mb25">
                        <div class="p-2 text-center">
                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Visit Us">
                                <img src="{{ asset('frontoffice/assets/images/contact-us/location-2.png') }}" alt=""
                                    style="width: 40%; margin-top: -14px;">
                            </span>
                            <h3>Visit Us</h3>
                            <div class="col-lg-12 mb20">
                                <div class="d-user mb-4">
                                    <a href="https://maps.app.goo.gl/C29CadNeby1G5DSHA" target="_blank"><strong>MyCo -
                                            Indragiri</strong><br>
                                        <div style="color: #000">Komp. Pertokoan Landmark Modern,<br>Jl. Indragiri No.12
                                            - 18,
                                            Darmo,<br>Surabaya, Jawa
                                            Timur 60241</div>
                                    </a>
                                </div>
                                <div class="d-user mb-4">
                                    <a href="https://maps.app.goo.gl/GJEWDezTCKe6oxcw6" target="_blank"><strong>MyCo X -
                                            Ciputra World</strong><br>
                                        <div style="color: #000">Ciputra World<br>Jl. Mayjend Sungkono No.
                                            89,<br>Surabaya. Jawa Timur 60224
                                        </div>
                                    </a>
                                </div>
                                <div class="d-user mb-4">
                                    <a href="https://maps.app.goo.gl/ojceJZ7btNpAXse99" target="_blank"><strong>MyCo X -
                                            Trilium Tower</strong><br>
                                        <div style="color: #000">Jl. Pemuda, Embong Kaliasin,<br>Kec. Genteng, <br>Kota
                                            SBY, Jawa Timur
                                            60271</div>
                                    </a>
                                </div>
                                <div class="d-user">
                                    <a href="https://maps.app.goo.gl/nMPFHXXyJjmJ7mYUA" target="_blank"><strong>MyCo X -
                                            Satoria Tower</strong><br>
                                        <div style="color: #000">Jl. Pradah Jaya I No.1,<br>Pradahkalikendal, Kec.
                                            Dukuhpakis,<br>Kota SBY,
                                            Jawa Timur 60226
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb25">
                        <div class="top text-center">
                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Call Us">
                                <img src="{{ asset('frontoffice/assets/images/contact-us/phone-2.png') }}" alt=""
                                    style="width: 40%; margin-top: -14px;">
                            </span>
                            <h3>Call Us</h3>
                            <div class="col-lg-12 p-2 mb20">
                                <div class="d-user mb-4">
                                    <a href="https://api.whatsapp.com/send/?phone=6289633299494&text=Hallo+admin+MYCO+Indragiri....&type=phone_number&app_absent=0"
                                        target="_blank"><strong>MyCo - Indragiri</strong><br>
                                        <div style="color: #000">+6289633299494</div>
                                    </a>
                                </div>
                                <div class="d-user mb-4">
                                    <a href="https://api.whatsapp.com/send/?phone=6285808756528&text=Hallo+admin+MYCO+Ciputra+World....&type=phone_number&app_absent=0"
                                        target="_blank"><strong>MyCo X - Ciputra World</strong><br>
                                        <div style="color: #000">+6285808756528</div>
                                    </a>
                                </div>
                                <div class="d-user mb-4">
                                    <a href="https://api.whatsapp.com/send/?phone=6287766523711&text=Hallo+admin+MYCO+Trillium....&type=phone_number&app_absent=0"
                                        target="_blank"><strong>MyCo X - Trilium Tower</strong><br>
                                        <div style="color: #000">+6287766523711</div>
                                    </a>
                                </div>
                                <div class="d-user">
                                    <a href="#"><strong>MyCo X - Satoria Tower</strong><br>
                                        <div style="color: #000">+6289633299494</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb25">
                        <div class="top text-center">
                            <span aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Contact Us">
                                <img src="{{ asset('frontoffice/assets/images/contact-us/email-1.png') }}" alt=""
                                    style="width: 40%; margin-top: -14px;">
                            </span>
                            <h3>Contact Us</h3>
                            <div class="col-lg-12 p-2 mb20">
                                <div class="d-user mb-4">
                                    <a href="mailto:Myco.spaceidn@gmail.com"><strong>MyCo - Indragiri</strong><br>
                                        <div style="color: #000">Myco.spaceidn@gmail.com</div>
                                    </a>
                                </div>
                                <div class="d-user mb-4">
                                    <a href="mailto:Cw.tower@my-co.space"><strong>MyCo X - Ciputra World</strong><br>
                                        <div style="color: #000">Cw.tower@my-co.space</div>
                                    </a>
                                </div>
                                <div class="d-user mb-4">
                                    <a href="mailto:Trilium.tower@my-co.space"><strong>MyCo X - Trilium Tower</strong><br>
                                        <div style="color: #000">Trilium.tower@my-co.space</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="padding40 box-rounded mb30" data-bgcolor="#F2F6FE">
                            <h3>MyCo - Indragiri</h3>
                            <address class="s1">
                                <span class="indent-list-2">
                                    <a href="https://maps.app.goo.gl/C29CadNeby1G5DSHA" style="color: #000">
                                        <i class="id-color fa fa-map-marker fa-lg"></i>Komp. Pertokoan Landmark Modern, Jl.
                                        Indragiri No.12 - 18, Darmo, Surabaya, Jawa Timur 60241
                                    </a>
                                </span>
                                <span>
                                    <a
                                        href="https://api.whatsapp.com/send/?phone=6289633299494&text=Hallo+admin+MYCO+Indragiri....&type=phone_number&app_absent=0">
                                        <i class="id-color fa fa-phone fa-lg"></i>+6289633299494
                                    </a>
                                </span>
                                <span>
                                    <i class="id-color fa fa-envelope-o fa-lg"></i><a
                                        href="mailto:Myco.spaceidn@gmail.com">Myco.spaceidn@gmail.com</a> & <a
                                        href="mailto:admin@my-co.space">Admin@my-co.space</a>
                                </span>
                            </address>
                        </div>
                        <div class="padding40 box-rounded mb30" data-bgcolor="#F2F6FE">
                            <h3>MyCo X - Ciputra World</h3>
                            <address class="s1">
                                <span class="indent-list-2">
                                    <a href="https://maps.app.goo.gl/GJEWDezTCKe6oxcw6" style="color: #000">
                                        <i class="id-color fa fa-map-marker fa-lg"></i>Ciputra World, Jl. Mayjend Sungkono
                                        No. 89, Kota Surabaya Jawa Timur 60224
                                    </a>
                                </span>
                                <span>
                                    <a
                                        href="https://api.whatsapp.com/send/?phone=6285808756528&text=Hallo+admin+MYCO+Ciputra+World....&type=phone_number&app_absent=0">
                                        <i class="id-color fa fa-phone fa-lg"></i>+6285808756528
                                    </a>
                                </span>
                                <span><i class="id-color fa fa-envelope-o fa-lg"></i><a
                                        href="mailto:Cw.tower@my-co.space">Cw.tower@my-co.space</a></span>
                            </address>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="padding40 box-rounded mb30" data-bgcolor="#F2F6FE">
                            <h3>MyCo X - Trillium Tower</h3>
                            <address class="s1">
                                <span class="indent-list-2">
                                    <a href="https://maps.app.goo.gl/ojceJZ7btNpAXse99" style="color: #000">
                                        <i class="id-color fa fa-map-marker fa-lg"></i>Jl. Pemuda, Embong Kaliasin, Kec.
                                        Genteng, Kota Surabaya, Jawa Timur 60271
                                    </a>
                                </span>
                                <span>
                                    <a
                                        href="https://api.whatsapp.com/send/?phone=6287766523711&text=Hallo+admin+MYCO+Trillium....&type=phone_number&app_absent=0">
                                        <i class="id-color fa fa-phone fa-lg"></i>+6287766523711
                                    </a>
                                </span>
                                <span>
                                    <i class="id-color fa fa-envelope-o fa-lg"></i><a
                                        href="mailto:Trillium.tower@my-co.space">Trillium.tower@my-co.space</a>
                                </span>
                            </address>
                        </div>
                        <div class="padding40 box-rounded mb30" data-bgcolor="#F2F6FE">
                            <h3>MyCo X - Satoria Tower</h3>
                            <address class="s1">
                                <span class="indent-list-2">
                                    <a href="https://maps.app.goo.gl/nMPFHXXyJjmJ7mYUA" style="color: #000">
                                        <i class="id-color fa fa-map-marker fa-lg"></i>Jl. Pradah Jaya I No.1,
                                        Pradahkalikendal, Kec. Dukuhpakis, Kota SBY Jawa Timur 60226
                                    </a>
                                </span>
                                <span>
                                    <a
                                        href="https://api.whatsapp.com/send/?phone=6289633299494&text=Hallo+admin+MYCO+Indragiri....&type=phone_number&app_absent=0">
                                        <i class="id-color fa fa-phone fa-lg"></i>+6289633299494
                                    </a>
                                </span>
                                <span>
                                    <i class="id-color fa fa-envelope-o fa-lg"></i><a
                                        href="mailto:admin@my-co.space">Admin@my-co.space</a> & <a
                                        href="mailto:mycospace.idn@gmail.com">Mycospace.idn@gmail.com</a>
                                </span>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div style="margin-top:-50px;"></div>
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h1>Frequently Asked Question.</h1>
                            <div class="small-border bg-color-2"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#one" aria-expanded="false" aria-controls="one">
                                        Dimanakah letak lokasi myco saat ini ?
                                    </button>
                                </h2>
                                <div id="one" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Saat ini MyCo hanya ada di Surabaya</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#two" aria-expanded="false" aria-controls="two">
                                        Apakah saya harus melakukan booking dahulu sebelum menggunakan seluruh layanan di
                                        MyCo ?
                                    </button>
                                </h2>
                                <div id="two" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Penggunaan layanan MyCo dapat dilakukan dengan cara booking
                                        terlebih melalui website atau datang langsung ke lokasi cabang myco yang ingin
                                        dituju</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#three" aria-expanded="false" aria-controls="three">
                                        Apakah saya boleh membawa makanan dan minuman dari luar MyCo ?
                                    </button>
                                </h2>
                                <div id="three" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Diperbolehkan dengan batas kuantitas yang sewajarnya </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#four" aria-expanded="false" aria-controls="four">
                                        Jika saya ingin visit ke lokasi myco, apakah saya boleh langsung ke lokasi atau
                                        melakukan perjanjian terlebih dahulu?
                                    </button>
                                </h2>
                                <div id="four" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Kami anjurkan sebelum visit untuk melakukan janjian
                                        terlebih dahulu dan dapat menghubungi kontak admin cabang yang ingin dituju. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
