<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('frontoffice/assets/images/logo-light-3.png') }}" type="image/gif" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="MyCo X - Admin Panel">
    <meta name="author" content="Achmad Rizal">
    <meta name="keywords" content="myco x, coworking space, coworking, space, admin panel, myco x admin, myco admin">

    <title>MyCo X - Admin Panel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />

    <!-- Plugin fullcalendar -->
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/fullcalendar/main.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/core/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/flatpickr/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/sweetalert2/sweetalert2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backoffice/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/select2/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/dropzone/dropzone.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/dropify/dist/dropify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/pickr/themes/classic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/css/demo1/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/fonts/feather-font/css/iconfont.css') }}" />
    <link rel="stylesheet" href="{{ asset('backoffice/assets/css/demo1/style.css') }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <style>
        .spinner-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            /* Adjust the background color and opacity as needed */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Set a high z-index value to bring it to the front */
        }

        .spinner-border {
            z-index: 10000;
            /* Make sure the spinner itself has a higher z-index than its container */
        }
    </style>

    @stack('style-alt')
</head>

<body>
    <div class="main-wrapper">

        <div class="spinner-container" style="display:none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- partial:partials/_sidebar.html -->
        @include('layouts.sidebar')
        <nav class="settings-sidebar">
            <div class="sidebar-body">
                <a href="#" class="settings-sidebar-toggler">
                    <i data-feather="settings"></i>
                </a>
                <h6 class="text-muted mb-2">Sidebar:</h6>
                <div class="mb-3 pb-3 border-bottom">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                            value="sidebar-light" checked>
                        <label class="form-check-label" for="sidebarLight">
                            Light
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                            value="sidebar-dark">
                        <label class="form-check-label" for="sidebarDark">
                            Dark
                        </label>
                    </div>
                </div>
            </div>
        </nav>
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('layouts.navbar')
            <!-- partial -->
            <div class="page-content">
                @yield('content')
            </div>

            <!-- partial:partials/_footer.html -->
            <footer
                class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com"
                        target="_blank">NobleUI</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm"
                        data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>

    @stack('script-alt')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="{{ asset('backoffice/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/template.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/dashboard-light.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/sweet-alert.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/prismjs/prism.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/select2.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('backoffice/assets/js/dropify.js') }}"></script>
    <script src="{{ asset('backoffice/assets/vendors/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('backoffice/assets/vendors/fullcalendar/main.min.js') }}"></script>

</body>

</html>
