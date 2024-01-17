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
            data-bgimage="url({{ asset('frontoffice/assets/images/background/subheader-a.jpg') }}) top">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>Inspiring Journeys with various moment filled by many networking in the world</h2>
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
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb30">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="post-image">
                                    <img alt="" src="{{ asset('frontoffice/assets/images/blog/a/ZENIUS.png') }}"
                                        class="lazy">
                                </div>
                                <div class="post-text">
                                    <span class="p-tagline">Technology &amp; Edu</span>
                                    <span class="p-date">16 January, 2024</span>
                                    <h4><a href="{{ route('blog.detail.a') }}">Trend Aplikasi Media Belajar Online!<span></span></a>
                                    </h4>
                                    <p>Hai Co-Lovers lagi trend berita soal aplikasi media belajar online yang bernama Zenius telah menyatakan pamit dari layanan indonesia....</p>
                                    <a class="btn-main" href="{{ route('blog.detail.a') }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="spacer-single"></div>

                    {{-- <ul class="pagination">
                        <li><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul> --}}

                </div>
            </div>
        </section>
    @endsection
