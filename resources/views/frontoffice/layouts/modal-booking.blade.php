<!-- Modal -->
<div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rekomendasi Kami Untuk Anda!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center justify-content-center text-center p-3"
                    style="border-bottom: solid 1px #d7d7d7; margin-bottom:25px;">
                    <div class="col-md-6">
                        <img src="{{ asset('frontoffice/assets/images/logo/myco-x-landscape.png') }}" alt="myco-x-logo"
                            id="myco-x" style="width: 60%">
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('frontoffice/assets/images/logo/myco-black-128.png') }}" alt="myco-logo"
                            id="myco" style="width: 35%">
                    </div>
                </div>
                <div class="alert alert-danger alert2-danger alert-dismissible fade show" role="alert"
                    style="display: none;" style="color: red">
                </div>
                <form class="row g-3" id="formBooking">
                    <div class="col-md-6">
                        <label for="preference" class="form-label">Preferensi<span style="color: red;">*</span></label>
                        <select class="form-select" name="preference" id="preference">
                            <option disabled selected>-- Pilih Preferensi --</option>
                            <option value="office-tower">Gedung Perkantoran</option>
                            <option value="landed-property">Ruko</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="location" class="form-label">Lokasi<span style="color: red;">*</span></label>
                        <select class="form-select" name="location" id="location">
                            <option selected disabled>-- Pilih Lokasi --</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="occupation" class="form-label">Pekerjaan</label>
                        <select class="form-select" name="occupation" id="occupation">
                            <option value="individual">Individual</option>
                            <option value="freelance">Freelance</option>
                            <option value="student">Student</option>
                            <option value="startup">Startup</option>
                            <option value="smes">SMEs</option>
                            <option value="large-company">Large Company</option>
                            <option value="non-profit-organization">Non-profit Organization</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="spaces" class="form-label">Jenis Ruangan<span style="color: red;">*</span></label>
                        <select class="form-select" name="spaces" id="spaces">
                            <option selected disabled>-- Pilih Ruangan --</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="people" class="form-label">Jumlah Tim<span style="color: red;">*</span></label>
                        <select class="form-select" name="people" id="people">
                            <option selected disabled>-- Pilih Jumlah Tim --</option>
                            <option value="1-3">1-3</option>
                            <option value="4-7">4-7</option>
                            <option value="8-10">8-10</option>
                            <option value=">10">>10</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="date_start" class="form-label">Tanggal Mulai<span
                                style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="date_start" name="date_start">
                    </div>
                    <div class="col-md-4">
                        <label for="date_tour" class="form-label">Tanggal Tour</label>
                        <input type="date" class="form-control" name="date_tour" id="date_tour">
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama Anda<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Your name">
                    </div>
                    <div class="col-md-6">
                        <label for="company_name" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                            placeholder="Company name">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
                        <input class="form-control" type="email" name="email" placeholder="Email address">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Nomor Telepon<span
                                style="color: red;">*</span></label>
                        <input name="phone" class="form-control" id="phone" placeholder="Phone number">
                    </div>
                    <div class="col-12">
                        <label for="notes_lead_booking" class="form-label">Jelaskan Kebutuhan Anda<span
                                style="color: red;">*</span></label>
                        <textarea name="notes_lead_booking" id="notes_lead_booking" placeholder="Your requirements" cols="20"
                            rows="5" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submitAddBooking" class="btn-main btn-fullwidth">Booking</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // FUNC DYNAMICALLY LOCATION OPTION
        $('#preference').change(function() {
            // PREFERENCE SELECT
            var location = '<option selected disabled>-- Pilih Lokasi --</option>';
            var preference = $(this).val();

            if (preference === 'office-tower') {
                location += '<option value="cw-tower">Cw Tower</option>\
                                    <option value="trilium-tower">Trillium Tower</option>\
                                    <option value="satoria-tower">Satoria Tower</option>';
            } else if (preference === 'landed-property') {
                location += '<option value="indragiri">Indragiri</option>';
            }

            console.log('location', location);
            $('#location').html(location); // Update #location based on the selected preference

            // reset spaces
            var spaces = '<option selected disabled>-- Pilih Ruangan --</option>';
            $('#spaces').html(spaces);
        });

        // FUNC DYNAMICALLY SPACES OPTION
        $('#location').change(function() {
            // LOCATION SELECT
            var spaces = '<option selected disabled>-- Pilih Ruangan --</option>';
            var selectedLocation = $(this).val();

            if (selectedLocation === 'indragiri') {
                spaces += '<option value="private-office">Private Office</option>\
                                <option value="virtual-office-bronze">Virtual Office</option>\
                                <option value="meeting-room-hourly">Meeting Room</option>\
                                <option value="hot-desk-student">Hot Desk</option>\
                                <option value="dedicated-desk">Dedicated Desk</option>';

                // Reduce opacity and remove shadow from myco image
                $('#myco-x').css({
                    'opacity': 0.3,
                    'box-shadow': 'none'
                });

                // Highlight myco-x image and apply bottom inner shadow
                $('#myco').css({
                    'opacity': 1,
                    'box-shadow': '0 10px 10px -10px #C2A04F'
                });
            } else if (selectedLocation === 'cw-tower') {
                spaces += '<option value="private-office">Private Office</option>\
                                <option value="virtual-office-bronze">Virtual Office</option>\
                                <option value="meeting-room-hourly">Meeting Room</option>\
                                <option value="hot-desk-student">Hot Desk</option>\
                                <option value="podcast-room-hourly">Podcast Room</option>\
                                <option value="studio-room-hourly">Studio Room</option>';

                // Highlight myco-x image and apply bottom inner shadow
                $('#myco-x').css({
                    'opacity': 1,
                    'box-shadow': '0 10px 10px -10px #C2A04F'
                });
                // Reduce opacity and remove shadow from myco image
                $('#myco').css({
                    'opacity': 0.3,
                    'box-shadow': 'none'
                });
            } else if (selectedLocation === 'trilium-tower') {
                spaces += '<option value="private-office">Private Office</option>\
                                <option value="trilium-tower">Virtual Office</option>\
                                <option value="meeting-room-hourly">Meeting Room</option>\
                                <option value="hot-desk-student">Hot Desk</option>\
                                <option value="dedicated-desk">Dedicated Desk</option>\
                                <option value="event-space">Event Space</option>\
                                <option value="studio-room-hourly">Studio Room</option>';

                // Highlight myco-x image and apply bottom inner shadow
                $('#myco-x').css({
                    'opacity': 1,
                    'box-shadow': '0 10px 10px -10px #C2A04F'
                });

                // Reduce opacity and remove shadow from myco image
                $('#myco').css({
                    'opacity': 0.3,
                    'box-shadow': 'none'
                });

            } else {
                spaces += '<option value="manage-office">Manage Office</option>';

                // Highlight myco-x image and apply bottom inner shadow
                $('#myco-x').css({
                    'opacity': 1,
                    'box-shadow': '0 10px 10px -10px #C2A04F'
                });

                // Reduce opacity and remove shadow from myco image
                $('#myco').css({
                    'opacity': 0.3,
                    'box-shadow': 'none'
                });
            }

            console.log('spaces', spaces);
            $('#spaces').html(spaces); // Update #spaces based on the selected location
        })

        // CLOSE MODAL
        $(".btn-close").click(function() {
            $('#bookingModal').modal('hide');
        })

        // CREATE BOOKING DATA
        $('#addBooking').click(function() {
            $('#submitAddBooking').val("create-booking");
            $('#booking_id').val('');
            $('#formBooking').trigger("reset");
            // $('#bookingModalHeading').html("ADD NEW BOOKING DATA");
            $('.alert2-danger').hide();
            $('#bookingModal').modal('show');
            // Reduce opacity and remove shadow from myco image
            $('#myco-x').css({
                'opacity': 0.3,
                'box-shadow': 'none'
            });

            // Highlight myco-x image and apply bottom inner shadow
            $('#myco').css({
                'opacity': 0.3,
                'box-shadow': 'none'
            });
        });

        // CREATE BOOKING DATA
        $('#addBooking2').click(function() {
            $('#submitAddBooking').val("create-booking");
            $('#booking_id').val('');
            $('#formBooking').trigger("reset");
            // $('#bookingModalHeading').html("ADD NEW BOOKING DATA");
            $('.alert2-danger').hide();
            $('#bookingModal').modal('show');
            // Reduce opacity and remove shadow from myco image
            $('#myco-x').css({
                'opacity': 0.3,
                'box-shadow': 'none'
            });

            // Highlight myco-x image and apply bottom inner shadow
            $('#myco').css({
                'opacity': 0.3,
                'box-shadow': 'none'
            });
        });

        // SUBMIT BOOKING DATA
        $('#submitAddBooking').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            $("#preloader").show(); // Show preloader before making the AJAX request

            $.ajax({
                url: "{{ route('add.booking') }}",
                data: new FormData(this.form),
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",

                success: function(response) {
                    console.log(response)
                    if (response.errors) {
                        $('.alert2-danger').html('');
                        $.each(response.errors, function(key, value) {
                            $('.alert2-danger').show();
                            $('.alert2-danger').append('<strong><li>' + value +
                                '</li></strong>');
                        });
                        $('#submitAddBooking').html('Booking');
                        $("#preloader").hide();
                    } else {
                        $('.alert2-danger').hide();

                        Swal.fire({
                            title: `${response.message}`,
                            text: "Terima kasih telah mengisi formulir online booking MyCo, tim kami akan segera menghubungi Anda",
                            icon: "success"
                        });

                        $('#submitAddBooking').html('Booking');
                        $("#preloader").hide();
                        $('#bookingModal').modal('hide');
                    }
                },
                error: function(error) {
                    console.log(error);
                    $("#preloader")
                .hide(); // Ensure preloader is hidden in case of an error
                }
            });
        });

    });
</script>
