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
                            <h1>WHY PARTNER WITH US</h1>
                            {{-- <p style="font-size:20px;">Our network of 150+ members across more than 4 locations in business
                                hubs nationwide are always looking to employ the services and products of our partners. If
                                you’re looking for new users, event organization, network gathering, content acquisition, or
                                simply wanted to grow your exposure, you might just have found the perfect platform.</p> --}}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-hero" aria-label="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="spacer-single"></div>
                        <h1 class="">Partner With <span class="id-color">Us</span></h1>
                        <p class=" lead">
                            At MyCo, we always look for ways to empower our network of high-functioning members. To achieve
                            that goal, we’re always looking to grow our network of partners, from all walks of services of
                            products. We aim to grow along with you.</p>
                        <div class="spacer-10"></div>
                        <a href="#contact" class="btn-main  lead">Connect With Us</a>
                        <div class="mb-sm-30"></div>
                    </div>
                    <div class="col-md-6 xs-hide">
                        <img src="{{ asset('frontoffice/assets/images/misc/partnership.jpg') }}" class="lazy img-fluid"
                            alt="">
                    </div>
                </div>
            </div>
        </section>


        <section aria-label="section" id="contact">
            <div class="container p-5" data-bgcolor="#F2F6FE">
                <div class="row p-3">

                    <div class="col-lg-12 mb-sm-30 text-center">
                        <h2 class="text-black">LET'S TALK ABOUT <span class="id-color">COLLABORATING</span></h2>
                        <p>Fill in the form below with your details, and we'll have a team member contact you.</p>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                            style="color: red">
                        </div>
                        <form class="row g-3" id="formPartnership">
                            <div class="col-md-6">
                                <div class="field-set">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Your Name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-set">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email Address" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-set">
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                        placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-set">
                                    <input type="text" name="company" id="company" class="form-control"
                                        placeholder="Company" />
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="field-set">
                                    <select class="form-select" name="partnership_type" id="partnership_type">
                                        <option selected disabled>-- Partnership Type --</option>
                                        <option value="member-benefit">Member Benefit</option>
                                        <option value="community-activation">Community Activation</option>
                                        <option value="event-organizing">Event Organizing</option>
                                        <option value="expansion">Expansion</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <textarea name="notes_partnership" id="notes_partnership" placeholder="Anything else we should know?" cols="20"
                                    rows="10" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="field-set">
                                    <input type="file" id="proposal" name="proposal" class="form-control">
                                    <label for="file" class="form-label">Upload Your Proposal : <span
                                            style="font-size: 13px;">*pdf, doc, docx file under 15MB</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-set">
                                    <button type="button" id="submitPartnership" class="btn-main w-100">Submit</button>
                                    <label for="file" class="form-label"></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        </div>
        <!-- content close -->
    @endsection

    @push('script-alt')
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Smooth scrolling for anchor links
                $('a[href^="#"]').on('click', function(event) {
                    var target = $($(this).attr('href'));

                    if (target.length) {
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 50);
                    }
                });

                // SUBMIT PARTNERSHIP DATA
                $('#submitPartnership').click(function(e) {
                    e.preventDefault();
                    $(this).html('Sending..');

                    $.ajax({
                        url: "{{ route('partnership.store') }}",
                        data: new FormData(this.form),
                        cache: false,
                        processData: false,
                        contentType: false,
                        type: "POST",

                        success: function(response) {
                            console.log(response)
                            if (response.errors) {
                                $('.alert-danger').html('');
                                $.each(response.errors, function(key, value) {
                                    $('.alert-danger').show();
                                    $('.alert-danger').append('<strong><li>' + value +
                                        '</li></strong>');
                                });
                                $('#submitPartnership').html('Submit');

                            } else {
                                $('.alert-danger').hide();

                                Swal.fire({
                                    title: `${response.message}`,
                                    text: "Terima kasih telah mengisi formulir online partnership MyCo. Salinan data akan segera terkirim ke email Anda dan tim kami akan segera menghubungi Anda",
                                    icon: "success"
                                });

                                $('#submitPartnership').html('Submit');
                                $('#formPartnership').trigger('reset');
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
