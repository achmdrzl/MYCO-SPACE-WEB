@extends('frontoffice.layouts.main')

@push('logo-black')
    @include('frontoffice.layouts.logo-white')
@endpush


@push('header-alt')
    <header class="transparent scroll-light">
    @endpush

    @section('content')
        <!-- section begin -->
        <section id="subheader" class="text-light"
            data-bgimage="url({{ asset('frontoffice/assets/images/background/subheader-f.jpg') }}) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 offset-md-2 text-center">
                            <h1>Everything you need to elevate your business</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section aria-label="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-5">
                        <img src="{{ asset('frontoffice/assets/images/misc/images-set-3-a.png') }}" class="img-fluid"
                            alt="#">
                    </div>
                    <div class="col-md-6">
                        <h3>About MyCo Space</h3>
                        <p>MyCo estabilished in 2021, is a Collaborative Space & Office which provides cost-effective access
                            to encourage and energize entrepreneurs and companies to create, collaborate, and evolve
                            simultaneously. A warm, cozy ambience designed to boost your productivity.</p>
                    </div>
                </div>

                <div class="spacer-triple"></div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay=".1s">
                        <div class="de_count s2 text-center">
                            <h3><span>511</span>+</h3>
                            <h5 class="id-color">Happy Customers</h5>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay=".4s">
                        <div class="de_count s2 text-center">
                            <h3><span>313</span>+</h3>
                            <h5 class="id-color">Happy Subscribers</h5>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-4 wow fadeInRight mb30" data-wow-delay=".7s">
                        <div class="de_count s2 text-center">
                            <h3><span>3</span></h3>
                            <h5 class="id-color">Year Experiences</h5>
                        </div>
                    </div>
                </div>

                <div class="spacer-single"></div>

                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center">
                        <h3>We're proud to list some of the world's most mind-blowing spaces.</h3>
                        {{-- <p class="w-100">Enriches the work experience by providing access to a flexible and collaborative environment. With these facilities, innovation and creativity naturally flourish, enabling a dynamic exchange of ideas. Create inclusive communities, strengthen professional networks, and facilitate business growth through easy and open collaboration</p> --}}
                    </div>
                    <div class="spacer-10"></div>
                    <div class="col-md-12">
                        <!-- Carousel wrapper -->
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                            <!-- Slides -->
                            <div class="carousel-inner mb-5">
                                <div class="carousel-item active">
                                    <img src="{{ asset('frontoffice/assets/images/location-details-slider/cw/2b.jpg') }}" class="d-block w-100"
                                        alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontoffice/assets/images/location-details-slider/indragiri/1b.jpg') }}" class="d-block w-100"
                                        alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/3b.jpg') }}" class="d-block w-100"
                                        alt="" />
                                </div>
                            </div>
                            <!-- Slides -->

                            {{-- <!-- Controls -->
                            <button class="carousel-control-prev" type="button"
                                data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <!-- Controls --> --}}

                            <!-- Thumbnails -->
                            <div class="carousel-indicators" style="margin-bottom: -20px;">
                                <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1" style="width: 100px;">
                                    <img class="d-block w-100 img-fluid"
                                        src="{{ asset('frontoffice/assets/images/location-details-slider/cw/2b.jpg') }}" alt="" />
                                </button>
                                <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="1"
                                    aria-label="Slide 2" style="width: 100px;">
                                    <img class="d-block w-100 img-fluid"
                                        src="{{ asset('frontoffice/assets/images/location-details-slider/indragiri/1b.jpg') }}" alt="" />
                                </button>
                                <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="2"
                                    aria-label="Slide 3" style="width: 100px;">
                                    <img class="d-block w-100 img-fluid"
                                        src="{{ asset('frontoffice/assets/images/location-details-slider/trilium/3b.jpg') }}" alt="" />
                                </button>
                            </div>
                            <!-- Thumbnails -->
                        </div>
                        <!-- Carousel wrapper -->
                    </div>
                </div>

            </div>
        </section>
    @endsection
