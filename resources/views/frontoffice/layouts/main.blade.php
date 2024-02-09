<!DOCTYPE html>
<html lang="en">

<head>
    <title>MyCo - Coworking Space</title>
    <link rel="icon" href="{{ asset('frontoffice/assets/images/logo-light-3.png') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Coworking Space dan Sewa Kantor Surabaya Jakarta Indonesia | MyCo" name="title" />
    <meta
        content="Sewa kantor dan coworking space di Surabaya dengan lokasi strategis demi pengalaman terbaik untuk perusahaan atau bisnis Anda"
        name="description" />
    <meta
        content="coworking space, sewa kantor, office rent, ruang kolaborasi, startup, bisnis umkm, coworking, private office, manage office, virtual office, event space, meeting room, podcast room, studio room, coworking space surabaya 24 jam, coworking space surabaya barat, coworking space surabaya terdekat, cafe coworking space surabaya, coworking space surabaya murah"
        name="keywords" />
    <meta content="MyCo- Coworking Space" name="author" />
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
    <link href="{{ asset('frontoffice/assets/css/style-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- color scheme -->
    <link id="colors" href="{{ asset('frontoffice/assets/css/colors/scheme-01.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('frontoffice/assets/css/coloring.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <link rel="canonical" href="https://example.com/canonical-url">
    <!-- CSS for Animation -->
    <style>
        #couponModal {
            overflow-y: hidden;
        }

        .modal-dialog-animate {
            animation: fadeInUp 0.5s ease-out;
            /* You can customize the animation duration and timing function */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 10%, 0);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        /* Add your custom styles here */
        #couponModal .carousel-inner img {
            width: 100%;
            height: 100%;
            /* Adjust the height as needed */
            object-fit: cover;
        }

        #couponModal .modal-content {
            border: none;
        }

        #couponModal .modal-header {
            background-color: #C2A04F;
            color: #fff;
            border-bottom: none;
        }

        #couponModal .modal-footer {
            background-color: #C2A04F;
            border-top: none;
        }

        #couponModal .carousel-control-prev,
        #couponModal .carousel-control-next {
            background-color: transparent;
            opacity: 0.7;
        }

        #couponModal .carousel-control-prev-icon,
        #couponModal .carousel-control-next-icon {
            color: #fff;
        }
    </style>
    @stack('style-alt')
</head>

<body>
    <div id="wrapper">
        <div id="preloader" style="display:none;">
            <div class="preloader1"></div>
        </div>
        {{-- <div class="spinner-container" style="display:none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div> --}}
        <!-- header begin -->
        @stack('header-alt')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex sm-pt10">
                        <div class="de-flex-col">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                @stack('logo-black')
                                @stack('logo-white')
                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col">
                            </div>
                        </div>
                        <div class="de-flex-col header-col-mid">
                            <!-- mainmenu begin -->
                            <ul id="mainmenu">
                                <li>
                                    <a href="/">Home<span></span></a>
                                </li>
                                <li>
                                    <a href="#">Locations<span></span></a>
                                    <ul>
                                        <li><a href="{{ route('indragiri.index') }}">MyCo - Indragiri</a></li>
                                        <li><a href="{{ route('cw.index') }}">MyCo X - CW Tower</a></li>
                                        <li><a href="{{ route('trilium.index') }}" style="width: 220px;">MyCo X -
                                                Trillium Tower</a></li>
                                        <li><a href="{{ route('satoria.index') }}" style="width: 220px;">MyCo X -
                                                Satoria Tower</a></li>
                                        <li>
                                            <a href="#">MyCo - Perak <sup
                                                    style="font-size: 8px; color: #D1C59E;"><u>Coming
                                                        soon</u></sup></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Services<span></span></a>
                                    <ul>
                                        <li><a href="{{ route('private.office') }}">Private Office</a></li>
                                        <li><a href="{{ route('manage.office') }}">Manage Office</a></li>
                                        <li><a href="{{ route('virtual.office') }}">Virtual Office</a></li>
                                        <li><a href="{{ route('meeting.room') }}">Meeting Room</a></li>
                                        <li><a href="{{ route('hot.desk') }}">Hot Desk</a></li>
                                        <li><a href="{{ route('dedicated.desk') }}">Dedicated Desk</a></li>
                                        <li><a href="{{ route('event.index') }}">Event Space</a></li>
                                        <li><a href="{{ route('podcast.index') }}">Podcast Room</a></li>
                                        <li><a href="{{ route('studio.index') }}">Studio Room</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Company<span></span></a>
                                    <ul>
                                        <li><a href="{{ route('about.index') }}">About Us</a></li>
                                        <li><a href="{{ route('blog.index') }}">Blogs</a></li>
                                        <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('partnership.index') }}">Partnership
                                        {{-- <sup style="font-size: 10px; background-color: #C2A04F; color: #FFF;">Coming
                                            soon</sup><span></span> --}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="de-flex-col btn-book" style="">
                            <div class="menu_side_area">
                                <a class="btn-main" type="button" id="addBooking"><i
                                        class="fa fa-cart-plus"></i><span>Booking
                                        Now!</span></a>
                                <span id="menu-btn"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <!-- header close -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            @yield('content')

            {{-- Modal Pop Up --}}
            {{-- <div class="modal fade" tabindex="-1" role="dialog" id="couponModal">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0 m-0">
                            <div class="row g-0 align-items-center justify-content-center">
                                <div class="col-lg-5 col-md-11 mb-3 mb-md-0">
                                    <img src="{{ asset('frontoffice/assets/images/misc/space-type-podcast-1.png') }}"
                                        alt="Gift Poster" class="img-fluid" id="leftImg">
                                </div>
                                <div class="col-lg-6 col-md-12 text-center">
                                    <div class="px-4">
                                        <h2 class="mb-4">30% Off !</h2>
                                        <p class="my-3 text-secondary">A perfect way to start your holiday season with
                                            our vast collection of gifts.</p>
                                        <p class="mt-3 mb-4 text-success">Avail coupon now</p>
                                        <input type="email" placeholder="Enter Email"
                                            class="form-control rounded-0">
                                        <button class="btn btn-dark rounded-0 mt-2 w-100">Send Me Coupon</button>
                                    </div>
                                    <a id="closeModalLink" class="text-secondary mt-3" type="button"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <small>I don't want any coupons</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Advertisement Modal -->
            <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="advertisementModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="advertisementModalLabel" style="color: #FFF">Special
                                Offer!</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close" style="background-color: #FFF"></button>
                        </div>
                        <div class="modal-body">
                            <div id="carouselExample" data-bs-interval="5000" class="carousel slide"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('frontoffice/assets/images/advertisement/End Year - Private Office.png') }}"
                                            class="d-block w-100 img-fluid" alt="Slide 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('frontoffice/assets/images/advertisement/MYCO POST 3 (1).png') }}"
                                            class="d-block w-100 img-fluid" alt="Slide 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('frontoffice/assets/images/advertisement/MYCO POST 3.png') }}"
                                            class="d-block w-100 img-fluid" alt="Slide 3">
                                    </div>
                                    <!-- Add more carousel items as needed -->
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="bg-dark" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="bg-dark" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content close -->
        <a href="https://api.whatsapp.com/send?phone=6289633299494&text=Hai%20Admin%20MyCo,%20saya%20mau%20tanya%20perihal%20office%20space%20di%20MyCo%0ANama%20:%20%0AEmail%20:%20%0AKebutuhan%20:%20"
            id="back-to-top" target="_blank"></a>

        <!-- footer begin -->
        <footer class="footer-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Services</h5>
                            <ul>
                                <li><a href="{{ route('private.office') }}">Private Office</a></li>
                                <li><a href="{{ route('manage.office') }}">Manage Office</a></li>
                                <li><a href="{{ route('virtual.office') }}">Virtual Office</a></li>
                                <li><a href="{{ route('meeting.room') }}">Meeting Room</a></li>
                                <li><a href="{{ route('hot.desk') }}">Hot Desk</a></li>
                                <li><a href="{{ route('dedicated.desk') }}">Dedicated Desk</a></li>
                                <li><a href="{{ route('event.index') }}">Event Space</a></li>
                                <li><a href="{{ route('podcast.index') }}">Podcast Room</a></li>
                                <li><a href="{{ route('studio.index') }}">Studio Room</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Company</h5>
                            <ul>
                                <li><a href="{{ route('indragiri.index') }}">MyCo - Indragiri</a></li>
                                <li><a href="{{ route('cw.index') }}">MyCo X - CW Tower</a></li>
                                <li><a href="{{ route('trilium.index') }}">MyCo X - Trilium Tower</a></li>
                                <li><a href="{{ route('satoria.index') }}">MyCo X - Satoria Tower</a></li>
                                <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Newsletter</h5>
                            <p>Signup for our newsletter to get the latest news in your inbox.</p>
                            <form action="blank.php" class="row form-dark" id="form_subscribe" method="post"
                                name="form_subscribe">
                                <div class="col text-center">
                                    <input class="form-control" id="txt_subscribe" name="txt_subscribe"
                                        placeholder="enter your email" type="text" /> <a href="#"
                                        id="btn-subscribe"><i class="arrow_right bg-color-secondary"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <div class="spacer-10"></div>
                            <small>Your email is safe with us. We don't spam.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    <a href="/">
                                        {{-- <img alt="" class="f-logo"src="{{ asset('frontoffice/assets/images/logomyco-7.png') }}" /> --}}
                                        <span class="copy">&copy; Copyright 2023 - MyCo Coworking Space</span>
                                    </a>
                                </div>
                                <div class="de-flex-col">
                                    <div class="social-icons mt-2">
                                        <a href="https://api.whatsapp.com/send?phone=6289633299494&text=Hai%20Admin%20MyCo,%20saya%20mau%20tanya%20perihal%20office%20space%20di%20MyCo%0ANama%20:%20%0AEmail%20:%20%0AKebutuhan%20:%20"
                                            title="go to whatsapp" target="_blank"><box-icon type='logo'
                                                name='whatsapp'></box-icon></a>
                                        <a href="https://www.instagram.com/myco.space/" title="go to instagram"
                                            target="_blank"><box-icon name='instagram' type='logo'></box-icon></a>
                                        <a href="https://www.linkedin.com/in/myco-space-15baa7217/"
                                            title="go to linkedin" target="_blank"><box-icon name='linkedin'
                                                type='logo'></box-icon></a>
                                        {{-- <a href="#" title="go to linktree"><i class="fa fa-tree fa-lg"></i></a> --}}
                                        {{-- <a href="#" title="go to tiktok"><i class="fa fa-music fa-lg"></i></a> --}}
                                        <a href="https://www.tiktok.com/@myco.space " title="go to tiktok"
                                            target="_blank"><box-icon type='logo' name='tiktok'></box-icon></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->

    </div>

    {{-- MODAL BOOKING --}}
    @include('frontoffice.layouts.modal-booking')
    {{-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-e775e09b-acdc-4b73-b016-c9ab38139ea6" data-elfsight-app-lazy></div> --}}

    <!-- Javascript Files
    ================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
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
    <script src="{{ asset('frontoffice/assets/js/mdb.min.js') }}"></script>
    <script src="{{ asset('frontoffice/assets/js/designesia.js') }}"></script>

    @stack('script-alt')

    <!-- jQuery Script to Trigger Modal on Page Load with Animation -->
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Set a delay of 5000 milliseconds (5 seconds) before showing the modal
            setTimeout(function() {
                // Trigger the modal show event
                $('#couponModal').on('show.bs.modal', function() {
                    $(this).find('.modal-dialog').addClass('modal-dialog-animate');
                });

                $('#couponModal').modal('show');
            }, 1000);

            // Add click event listener to close the modal when the link is clicked
            $('#closeModalLink, .btn-close').on('click', function() {
                $('#couponModal').modal('hide');
            });

            // Optional: If you want to remove the animation class after the modal is shown
            $('#couponModal').on('shown.bs.modal', function() {
                $(this).find('.modal-dialog').removeClass('modal-dialog-animate');
            });

            // // FUNC DYNAMICALLY LOCATION OPTION
            // $('#preference').change(function() {
            //     // PREFERENCE SELECT
            //     var location = '<option selected disabled>-- Pilih Lokasi --</option>';
            //     var preference = $(this).val();

            //     if (preference === 'office-tower') {
            //         location += '<option value="cw-tower">Cw Tower</option>\
            //                         <option value="trilium-tower">Trillium Tower</option>\
            //                         <option value="satoria-tower">Satoria Tower</option>';
            //     } else if (preference === 'landed-property') {
            //         location += '<option value="indragiri">Indragiri</option>';
            //     }

            //     console.log('location', location);
            //     $('#location').html(location); // Update #location based on the selected preference

            //     // reset spaces
            //     var spaces = '<option selected disabled>-- Pilih Ruangan --</option>';
            //     $('#spaces').html(spaces);
            // });

            // // FUNC DYNAMICALLY SPACES OPTION
            // $('#location').change(function() {
            //     // LOCATION SELECT
            //     var spaces = '<option selected disabled>-- Pilih Ruangan --</option>';
            //     var selectedLocation = $(this).val();

            //     if (selectedLocation === 'indragiri') {
            //         spaces += '<option value="private-office">Private Office</option>\
            //                     <option value="virtual-office-bronze">Virtual Office</option>\
            //                     <option value="hot-desk-student">Hot Desk</option>\
            //                     <option value="dedicated-desk">Dedicated Desk</option>\
            //                     <option value="event-space">Event Space</option>\
            //                     <option value="meeting-room-hourly">Meeting Room</option>';

            //         // Reduce opacity and remove shadow from myco image
            //         $('#myco-x').css({
            //             'opacity': 0.3,
            //             'box-shadow': 'none'
            //         });

            //         // Highlight myco-x image and apply bottom inner shadow
            //         $('#myco').css({
            //             'opacity': 1,
            //             'box-shadow': '0 10px 10px -10px #C2A04F'
            //         });
            //     } else if (selectedLocation === 'cw-tower') {
            //         spaces += '<option value="private-office">Private Office</option>\
            //                     <option value="virtual-office-bronze">Virtual Office</option>\
            //                     <option value="hot-desk-student">Hot Desk</option>\
            //                     <option value="dedicated-desk">Dedicated Desk</option>\
            //                     <option value="event-space">Event Space</option>\
            //                     <option value="meeting-room-hourly">Meeting Room</option>\
            //                     <option value="podcast-room-hourly">Podcast Room</option>\
            //                     <option value="studio-room-hourly">Studio Room</option>';

            //         // Highlight myco-x image and apply bottom inner shadow
            //         $('#myco-x').css({
            //             'opacity': 1,
            //             'box-shadow': '0 10px 10px -10px #C2A04F'
            //         });
            //         // Reduce opacity and remove shadow from myco image
            //         $('#myco').css({
            //             'opacity': 0.3,
            //             'box-shadow': 'none'
            //         });
            //     } else if (selectedLocation === 'trilium-tower') {
            //         spaces += '<option value="private-office">Private Office</option>\
            //                     <option value="trilium-tower">Virtual Office</option>\
            //                     <option value="hot-desk-student">Hot Desk</option>\
            //                     <option value="dedicated-desk">Dedicated Desk</option>\
            //                     <option value="event-space">Event Space</option>\
            //                     <option value="meeting-room-hourly">Meeting Room</option>\
            //                     <option value="studio-room-hourly">Studio Room</option>';

            //         // Highlight myco-x image and apply bottom inner shadow
            //         $('#myco-x').css({
            //             'opacity': 1,
            //             'box-shadow': '0 10px 10px -10px #C2A04F'
            //         });

            //         // Reduce opacity and remove shadow from myco image
            //         $('#myco').css({
            //             'opacity': 0.3,
            //             'box-shadow': 'none'
            //         });

            //     } else {
            //         spaces += '<option value="manage-office">Manage Office</option>';

            //         // Highlight myco-x image and apply bottom inner shadow
            //         $('#myco-x').css({
            //             'opacity': 1,
            //             'box-shadow': '0 10px 10px -10px #C2A04F'
            //         });

            //         // Reduce opacity and remove shadow from myco image
            //         $('#myco').css({
            //             'opacity': 0.3,
            //             'box-shadow': 'none'
            //         });
            //     }

            //     console.log('spaces', spaces);
            //     $('#spaces').html(spaces); // Update #spaces based on the selected location
            // })

            // // CLOSE MODAL
            // $(".btn-close").click(function(){
            //      $('#bookingModal').modal('hide');
            // })

            // // CREATE BOOKING DATA
            // $('#addBooking').click(function() {
            //     $('#submitAddBooking').val("create-booking");
            //     $('#booking_id').val('');
            //     $('#formBooking').trigger("reset");
            //     // $('#bookingModalHeading').html("ADD NEW BOOKING DATA");
            //     $('#bookingModal').modal('show');
            //     // Reduce opacity and remove shadow from myco image
            //     $('#myco-x').css({
            //         'opacity': 0.3,
            //         'box-shadow': 'none'
            //     });

            //     // Highlight myco-x image and apply bottom inner shadow
            //     $('#myco').css({
            //         'opacity': 0.3,
            //         'box-shadow': 'none'
            //     });
            // });

            // // SUBMIT BOOKING DATA
            // $('#submitAddBooking').click(function(e) {
            //     e.preventDefault();
            //     $(this).html('Sending..');

            //     $.ajax({
            //         url: "{{ route('add.booking') }}",
            //         data: new FormData(this.form),
            //         cache: false,
            //         processData: false,
            //         contentType: false,
            //         type: "POST",

            //         success: function(response) {
            //             console.log(response)
            //             if (response.errors) {
            //                 $('.alert-danger').html('');
            //                 $.each(response.errors, function(key, value) {
            //                     $('.alert-danger').show();
            //                     $('.alert-danger').append('<strong><li>' + value +
            //                         '</li></strong>');
            //                 });
            //                 $('#submitAddBooking').html('Booking');

            //             } else {
            //                 $('.alert-danger').hide();

            //                 Swal.fire({
            //                     title: `${response.message}`,
            //                     text: "Terima kasih telah mengisi formulir online booking MyCo. Salinan booking akan segera terkirim ke email Anda dan tim kami akan segera menghubungi Anda",
            //                     icon: "success"
            //                 });

            //                 $('#submitAddBooking').html('Booking');
            //                 $('#bookingModal').modal('hide');
            //             }
            //         }
            //     });
            // });
        });
    </script>

</body>

</html>
