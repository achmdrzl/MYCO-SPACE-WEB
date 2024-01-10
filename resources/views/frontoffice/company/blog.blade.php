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
                                    <img alt="" src="{{ asset('frontoffice/assets/images/news/news-1.jpg') }}"
                                        class="lazy">
                                </div>
                                <div class="post-text">
                                    <span class="p-tagline">Tips &amp; Tricks</span>
                                    <span class="p-date">October 28, 2020</span>
                                    <h4><a href="{{ route('blog.detail') }}">Inviting Nature Into Workspace<span></span></a>
                                    </h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit
                                        cupidatat labore ad laborum consectetur consequat...</p>
                                    <a class="btn-main" href="{{ route('blog.detail') }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb30">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="post-image">
                                    <img alt="" src="{{ asset('frontoffice/assets/images/news/news-2.jpg') }}"
                                        class="lazy">
                                </div>
                                <div class="post-text">
                                    <span class="p-tagline">Tips &amp; Tricks</span>
                                    <span class="p-date">October 28, 2020</span>
                                    <h4><a href="{{ route('blog.detail') }}">Tips to Help Boost Focus at
                                            Work<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit
                                        cupidatat labore ad laborum consectetur consequat...</p>
                                    <a class="btn-main" href="{{ route('blog.detail') }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb30">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="post-image">
                                    <img alt="" src="{{ asset('frontoffice/assets/images/news/news-3.jpg') }}"
                                        class="lazy">
                                </div>
                                <div class="post-text">
                                    <span class="p-tagline">Tips &amp; Tricks</span>
                                    <span class="p-date">October 28, 2020</span>
                                    <h4><a href="{{ route('blog.detail') }}">Tips to Improving Your
                                            Productivity<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit
                                        cupidatat labore ad laborum consectetur consequat...</p>
                                    <a class="btn-main" href="{{ route('blog.detail') }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb30">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="post-image">
                                    <img alt="" src="{{ asset('frontoffice/assets/images/news/news-4.jpg') }}"
                                        class="lazy">
                                </div>
                                <div class="post-text">
                                    <span class="p-tagline">Tips &amp; Tricks</span>
                                    <span class="p-date">October 28, 2020</span>
                                    <h4><a href="{{ route('blog.detail') }}">6 Creative Ways to Solve a
                                            Problem<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit
                                        cupidatat labore ad laborum consectetur consequat...</p>
                                    <a class="btn-main" href="{{ route('blog.detail') }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb30">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="post-image">
                                    <img alt="" src="{{ asset('frontoffice/assets/images/news/news-5.jpg') }}"
                                        class="lazy">
                                </div>
                                <div class="post-text">
                                    <span class="p-tagline">Tips &amp; Tricks</span>
                                    <span class="p-date">October 28, 2020</span>
                                    <h4><a href="{{ route('blog.detail') }}">10 Best Site to Find Your Dream
                                            Job<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit
                                        cupidatat labore ad laborum consectetur consequat...</p>
                                    <a class="btn-main" href="{{ route('blog.detail') }}">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb30">
                        <div class="bloglist item">
                            <div class="post-content">
                                <div class="post-image">
                                    <img alt="" src="{{ asset('frontoffice/assets/images/news/news-6.jpg') }}"
                                        class="lazy">
                                </div>
                                <div class="post-text">
                                    <span class="p-tagline">Tips &amp; Tricks</span>
                                    <span class="p-date">October 28, 2020</span>
                                    <h4><a href="{{ route('blog.detail') }}">5 Ways to Maintain a Good
                                            Posture<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit
                                        cupidatat labore ad laborum consectetur consequat...</p>
                                    <a class="btn-main" href="{{ route('blog.detail') }}">Read more</a>
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
