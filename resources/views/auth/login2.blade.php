<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Template</title>
    <link rel="icon" href="{{ asset('frontoffice/assets/images/logo-light-3.png') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="CoSpace - Coworking Space Website Template" name="description" />
    <meta content="" name="keywords" />
    <meta content="" name="author" />
    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="{{ asset('frontoffice/assets/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link id="bootstrap-grid" href="{{ asset('frontoffice/assets/css/bootstrap-grid.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link id="bootstrap-reboot" href="{{ asset('frontoffice/assets/css/bootstrap-reboot.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/owl.transitions.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/jquery.countdown.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- color scheme -->
    <link id="colors" href="{{ asset('frontoffice/assets/css/colors/scheme-01.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/coloring.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
</head>

<body>
    <div id="wrapper">
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <section class="full-height relative no-top no-bottom vertical-center"
                data-bgimage="url({{ asset('frontoffice/assets/images/background/subheader.jpg') }}) top"
                data-stellar-background-ratio=".5">
                <div class="overlay-gradient t50">
                    <div class="center-y relative">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6 text-light wow fadeInRight" data-wow-delay=".5s">
                                    <div class="spacer-10"></div>
                                    <h1>The best place for work</h1>
                                    <p class="lead">Convenient location with easy access to transportation, amenities, and services. A central location reduces commute time and allows for a better work-life balance.</p>
                                </div>

                                <div class="col-lg-4 offset-lg-1 wow fadeIn" data-wow-delay=".5s">
                                    <div class="box-rounded padding40" data-bgcolor="#ffffff">
                                        <h3 class="mb10">Sign In</h3>
                                        <p>Enter your username and password to login</p>
                                        <form name="contactForm" id='contact_form' class="form-border" method="post"
                                            action='blank.php'>

                                            <div class="field-set">
                                                <input type='text' name='email' id='email' class="form-control"
                                                    placeholder="username">
                                            </div>

                                            <div class="field-set">
                                                <input type='password' name='password' id='password'
                                                    class="form-control" placeholder="password">
                                            </div>

                                            <div class="field-set">
                                                <input type='submit' id='send_message' value='Submit'
                                                    class="btn btn-main btn-fullwidth color-2">
                                            </div>

                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- content close -->

    </div>


    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('frontoffice/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/easing.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/OwlCarousel2Thumbs.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/validation.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/enquire.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.plugin.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.lazy.plugins.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/jquery.smartsticky.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/designesia.js') }}"></script>



</body>

</html>
