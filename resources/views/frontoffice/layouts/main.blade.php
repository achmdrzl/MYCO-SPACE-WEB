<!DOCTYPE html>
<html lang="en">

<head>
    <title>MyCo - Coworking Space</title>
    <link rel="icon" href="{{ asset('frontoffice/assets/images/logo-light-3.png') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Coworking Space dan Sewa Kantor Surabaya Jakarta Indonesia | MyCo" name="title" />
    <meta content="Sewa kantor dan coworking space di Surabaya dengan lokasi strategis demi pengalaman terbaik untuk perusahaan atau bisnis Anda" name="description" />
    <meta content="coworking space, sewa kantor, office rent, ruang kolaborasi, startup, bisnis umkm, coworking, private office, manage office, virtual office, event space, meeting room, podcast room, studio room, coworking space surabaya 24 jam, coworking space surabaya barat, coworking space surabaya terdekat, cafe coworking space surabaya, coworking space surabaya murah" name="keywords" />
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
    </style>
    @stack('style-alt')
</head>

<body>
    <div id="wrapper">
        {{-- <div id="preloader">
            <div class="preloader1"></div>
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
                                    <a href="#">Partnership
                                        <sup style="font-size: 10px; background-color: #C2A04F; color: #FFF;">Coming soon</sup><span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="de-flex-col">
                            <div class="menu_side_area">
                                <a type="button" class="btn-main" data-bs-toggle="modal"
                                    data-bs-target="#bookingModal"><i class="fa fa-book"></i><span>Booking
                                        Now!</span>
                                </a>
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

            <!-- Modal -->
            <div class="modal fade" id="bookingModal" data-bs-backdrop="static" tabindex="-1]"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rekomendasi Kami Untuk Anda!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row align-items-center justify-content-center text-center"
                                style="border-bottom: solid 1px #d7d7d7; margin-bottom:25px;">
                                <div class="col-md-6">
                                    <img src="{{ asset('frontoffice/assets/images/logo/myco-x-landscape.png') }}"
                                        alt="myco-x-logo" style="width: 50%">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('frontoffice/assets/images/logo/myco-black-128.png') }}"
                                        alt="myco-logo" style="width: 30%">
                                </div>
                            </div>
                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="v_location" class="form-label">Lokasi<span
                                            style="color: red;">*</span></label>
                                    <select class="form-select" name="v_location" id="v_location">
                                        <option selected disabled>-- Pilih Lokasi --</option>
                                        <option value="indragiri">Indragiri</option>
                                        <option value="cw-tower">CW Tower</option>
                                        <option value="trilium-tower">Trilium Tower</option>
                                        <option value="satoria-tower">Satoria Tower</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="v_occupation" class="form-label">Pekerjaan</label>
                                    <select class="form-select" name="v_occupation" id="v_occupation">
                                        <option value="individual" selected>Individual</option>
                                        <option value="freelance">Freelance</option>
                                        <option value="student">Student</option>
                                        <option value="startup">Startup</option>
                                        <option value="smes">SMEs</option>
                                        <option value="large-company">Large Company</option>
                                        <option value="non-profit-organization">Non-profit Organization</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="v_preference" class="form-label">Preferensi</label>
                                    <select class="form-select" name="v_preference" id="v_preference">
                                        <option value="office-tower" selected>Gedung Perkantoran</option>
                                        <option value="landed-property">Ruko</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="v_spaces" class="form-label">Jenis Ruangan<span
                                            style="color: red;">*</span></label>
                                    <select class="form-select" name="v_spaces" id="v_spaces">
                                        <option selected disabled>-- Pilih Ruangan --</option>
                                        <option value="private-office">Private Office</option>
                                        <option value="virtual-office">Virtual Office</option>
                                        <option value="hot-desk">Hot Desk</option>
                                        <option value="event-space">Event Space</option>
                                        <option value="meeting-room">Meeting Room</option>
                                        <option value="studio-room">Studio Room</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="v_people" class="form-label">Jumlah Tim<span
                                            style="color: red;">*</span></label>
                                    <select class="form-select" name="v_people" id="v_people">
                                        <option selected disabled>-- Pilih Jumlah Tim --</option>
                                        <option value="private-office">1-3</option>
                                        <option value="virtual-office">4-7</option>
                                        <option value="manage-office">8-10</option>
                                        <option value="manage-office">>10</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="dt_mulai" class="form-label">Tanggal Mulai<span
                                            style="color: red;">*</span></label>
                                    <input type="date" class="form-control" id="dt_mulai"
                                        placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="col-md-4">
                                    <label for="dt_tour" class="form-label">Tanggal Tour</label>
                                    <input type="date" class="form-control" id="dt_tour">
                                </div>
                                <div class="col-md-6">
                                    <label for="v_name" class="form-label">Nama Anda<span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="v_name"
                                        placeholder="Your name">
                                </div>
                                <div class="col-md-6">
                                    <label for="v_companyname" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="v_companyname"
                                        placeholder="Company name">
                                </div>
                                <div class="col-md-6">
                                    <label for="v_email" class="form-label">Email<span
                                            style="color: red;">*</span></label>
                                    <input data-inputmask="'alias': 'email'" inputmode="email" class="form-control"
                                        id="v_email" name="v_email" placeholder="Email address">
                                </div>
                                <div class="col-md-6">
                                    <label for="v_phone" class="form-label">Nomor Telepon<span
                                            style="color: red;">*</span></label>
                                    <input name="v_phone" class="form-control" id="v_phone"
                                        placeholder="Phone number">
                                </div>
                                <div class="col-12">
                                    <label for="v_notesleadbooking" class="form-label">Jelaskan Kebutuhan Anda<span
                                            style="color: red;">*</span></label>
                                    <textarea name="v_notesleadbooking" id="v_notesleadbooking" placeholder="Your requirements" cols="20"
                                        rows="5" class="form-control"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-main btn-fullwidth">Booking</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Modal Pop Up --}}
            {{-- <div class="modal fade" tabindex="-1" role="dialog" id="couponModal">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0 m-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-sm-6 col-xs-12">
                                    <img src="{{ asset('frontoffice/assets/images/misc/space-type-photo.jpg') }}"
                                        alt="Gift Poster" class="img-fluid" id="leftImg">
                                </div>
                                <div class="col-sm-6 col-xs-12 text-center">
                                    <div class="px-4">
                                        <h2>30% Off !</h2>
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

        </div>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>

        <!-- footer begin -->
        <footer class="footer-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-1">
                        <div class="widget">
                            <h5>Services</h5>
                            <ul>
                                <li><a href="{{ route('private.office') }}">Private Office</a></li>
                                <li><a href="#">Manage Office</a></li>
                                <li><a href="#">Virtual Office</a></li>
                                <li><a href="#">Meeting Room</a></li>
                                <li><a href="#">Hot Desk</a></li>
                                <li><a href="#">Dedicated Desk</a></li>
                                <li><a href="#">Event Space</a></li>
                                <li><a href="#">Podcast Room</a></li>
                                <li><a href="#">Studio Room</a></li>
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
                                        <img alt="" class="f-logo"
                                            src="{{ asset('frontoffice/assets/images/logomyco-7.png') }}" /><span
                                            class="copy">&copy; Copyright 2023 - MyCo Space</span>
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

    {{-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
    <div class="elfsight-app-e775e09b-acdc-4b73-b016-c9ab38139ea6" data-elfsight-app-lazy></div> --}}

    {{-- Show Modal --}}
    <!-- jQuery Script to Trigger Modal on Page Load with Animation -->
    <script>
        $(document).ready(function() {
            // Set a delay of 5000 milliseconds (5 seconds) before showing the modal
            setTimeout(function() {
                // Trigger the modal show event
                $('#couponModal').on('show.bs.modal', function() {
                    $(this).find('.modal-dialog').addClass('modal-dialog-animate');
                });

                $('#couponModal').modal('show');
            }, 1000);

            // Add click event listener to close the modal when the link is clicked
            $('#closeModalLink').on('click', function() {
                $('#couponModal').modal('hide');
            });
        });

        // Optional: If you want to remove the animation class after the modal is shown
        $('#couponModal').on('shown.bs.modal', function() {
            $(this).find('.modal-dialog').removeClass('modal-dialog-animate');
        });
    </script>

    @stack('script-alt')

    <!-- Javascript Files
    ================================================== -->
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

</body>

</html>
