@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1280px;
            /* Set your desired width */
            width: 100%;
            margin: 1.75rem auto;
        }
    </style>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('booking.layanan') }}">Layanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Booking Layanan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <div>
            <h4 class="mb-3 mb-md-0"></h4>
        </div> --}}
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" data-bs-toggle="modal" data-bs-target="#bookingModal" id="btn-create-booking"
                class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="mdi mdi-account-plus"></i> Tambah Data Booking
            </button>
        </div>
    </div>
    {{-- FILTER START --}}
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Filter Data
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form id="form-filter">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="filter_location" class="form-label">Lokasi</label>
                                    <select class="form-select" id="filter_location" name="filter_location">
                                        <option selected disabled value="">-- Pilih Lokasi --</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->v_code }}">{{ $item->v_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="filter_spaces" class="form-label">Jenis Ruangan</label>
                                    <select class="form-select" id="filter_spaces" name="filter_spaces">
                                        <option selected disabled value="">-- Pilih Jenis Ruangan --</option>
                                        @foreach ($spaces as $item)
                                            <option value="{{ $item->v_code }}">{{ $item->v_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="startDate" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate"
                                        autocomplete="off" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="endDate" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="endDate"
                                        placeholder="Masukkan Perusahaan" name="endDate">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <button type="button" id="restart-date" class="btn btn-secondary"><i
                                            class="mdi mdi-autorenew"></i>
                                        Reset</button>
                                    <button type="button" id="show-data" class="btn btn-primary"><i
                                            class="mdi mdi-yeast"></i> Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- FILTER END --}}

    <div class="row">
        <div class="col col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Lokasi</th>
                                    <th>Layanan</th>
                                    <th>Booking</th>
                                    <th>Mulai</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL BOOKING START --}}
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalHeading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                        style="color: red">
                    </div>
                    <form class="forms-sample" id="bookingForm">
                        <input type="hidden" name="booking_id" id="booking_id">
                        <h6 class="mb-4">Data Kuota</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        autocomplete="off" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="text" class="form-label">Perusahaan</label>
                                    <input type="text" class="form-control" id="company_name"
                                        placeholder="Masukkan Perusahaan" name="company_name">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Masukkan Telepon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" id="email" name="email" type="email"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="occupation" class="form-label">Pekerjaan</label>
                                    <select class="form-select" id="occupation" name="occupation">
                                        <option disabled selected value="">-- Pilih Pekerjaan --</option>
                                        <option value="individual">Individual</option>
                                        <option value="freelance">Freelance</option>
                                        <option value="student">Student</option>
                                        <option value="startup">Startup</option>
                                        <option value="smes">SMEs</option>
                                        <option value="large-company">Large Company</option>
                                        <option value="non-profit-organization">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-4">Data Booking</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_start" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="date_start" name="date_start"
                                        autocomplete="off" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_tour" class="form-label">Tanggal Tour</label>
                                    <input type="date" class="form-control" id="date_tour"
                                        placeholder="Masukkan Perusahaan" name="date_tour">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="preference" class="form-label">Preferensi</label>
                                    <select class="form-select" id="preference" name="preference">
                                        <option selected disabled value="">-- Pilih Preferensi --</option>
                                        <option value="office-tower">Office Tower</option>
                                        <option value="landed-property">Landed Property</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <select class="form-select" id="location" name="location">
                                        <option selected disabled value="">-- Pilih Lokasi --</option>
                                        @foreach ($location as $item)
                                            <option value="{{ $item->v_code }}">{{ $item->v_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="spaces" class="form-label">Jenis Ruangan</label>
                                    <select class="form-select" id="spaces" name="spaces">
                                        <option selected disabled value="">-- Pilih Jenis Ruangan --</option>
                                        @foreach ($spaces as $item)
                                            <option value="{{ $item->v_code }}">{{ $item->v_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="people" class="form-label">Jumlah Tim</label>
                                    <select class="form-select" id="people" name="people">
                                        <option selected disabled value="">-- Pilih Jumlah Anggota --</option>
                                        <option value="1-3">1-3</option>
                                        <option value="4-7">4-7</option>
                                        <option value="8-10">8-10</option>
                                        <option value=">10">>10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">Kota</label>
                                    <select class="form-select" id="city" name="city">
                                        <option selected disabled value="">-- Pilih Kota --</option>
                                        <option value="surabaya">Surabaya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="notes_lead_booking" class="form-label">Keterangan Booking</label>
                                    <textarea class="form-control" name="notes_lead_booking" id="notes_lead_booking"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-4">Lead Progress</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="membership_status" class="form-label">Membership</label>
                                    <select class="form-select" id="membership_status" name="membership_status">
                                        <option selected disabled value="">-- Pilih Status Membership --</option>
                                        <option value="1">Member</option>
                                        <option value="2">Non-Member</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lead_status" class="form-label">Status</label>
                                    <select class="form-select" id="lead_status" name="lead_status">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="notes_lead_status" class="form-label">Keterangan Booking</label>
                                    <textarea class="form-control" name="notes_lead_status" id="notes_lead_status"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit-booking" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- MODAL BOOKING END --}}
@endsection

@push('script-alt')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Custom function to format the date as dd/mm/yyyy
            function formatCustomDate(dateString) {
                const [fullDate, timePart] = dateString.split(' ');
                const [year, month, day] = fullDate.split('-');

                return `${year}-${month}-${day}`;
            }

            // Custom function to format the date
            function formatCustomDates(dateString) {
                const [fullDate, timePart] = dateString.split(' ');
                const [year, month, day] = fullDate.split('-');

                // Map month abbreviation to full month name
                const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov',
                    'Des'
                ];
                const monthName = monthNames[parseInt(month) - 1];

                return `${day}-${monthName}-${year}`;
            }

            // Define an array of column indexes that need formatting
            var columnsToFormat = [4, 5];

            // Loop through the columns and apply the rendering function
            var columnDefs = columnsToFormat.map(function(columnIndex) {
                return {
                    targets: columnIndex,
                    render: function(data, type, row) {
                        if ((columnIndex === 4 || columnIndex === 5) && type === 'sort') {
                            // Return the raw date data for sorting
                            return data;
                        } else if ((columnIndex === 4 || columnIndex === 5) && type === 'display') {
                            // Format the date for display
                            return formatCustomDates(data);
                        } else {
                            // Format as Rupiah
                            return 'Rp ' + parseFloat(data).toLocaleString('id-ID');
                        }
                    },
                };
            });

            // LOAD DATATABLE
            var datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('booking.layanan') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'spaces',
                        name: 'spaces'
                    },
                    {
                        data: 'date_created',
                        name: 'date_created'
                    },
                    {
                        data: 'date_start',
                        name: 'date_start'
                    },
                    {
                        data: 'lead_status',
                        name: 'lead_status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                columnDefs: columnDefs,
            });

            // CREATE NEW DATA BOOKING
            $('#btn-create-booking').click(function() {
                $('#submit-user').val("create-jenis");
                $('#booking_id').val('');
                $('.alert').hide();
                $('#user_form').trigger("reset");
                $('#bookingModalHeading').html("ADD NEW BOOKING DATA");
                $('#bookingModal').modal('show');
                $('#booking_id').val('');
                $('#name').val('').attr('disabled', false)
                $('#email').val('').attr('disabled', false)
                $('#company_name').val('').attr('disabled', false)
                $('#phone').val('').attr('disabled', false)
                $('#occupation').val('').attr('disabled', false)
                $('#date_start').val('').attr('disabled', false)
                $('#date_tour').val('').attr('disabled', false)
                $('#preference').val('').attr('disabled', false)
                $('#location').val('').attr('disabled', false)
                $('#spaces').val('').attr('disabled', false)
                $('#people').val('').attr('disabled', false)
                $('#city').val('').attr('disabled', false)
                $('#membership_status').val('').attr('disabled', false)
                $('#notes_lead_booking').val('').attr('disabled', false)
                $('#notes_lead_status').val('').attr('disabled', false)

                // var option select to setting membership select option
                var option = '<option selected disabled value="">-- Pilih Status Booking --</option>\
                                                                                <option value="0">Booking</option>\
                                                                                <option value="1">Follow Up</option>\
                                                                                <option value="2">Invoice</option>\
                                                                                <option value="3">Cancel</option>\
                                                                                <option value="5">Paid</option>';

                $('#lead_status').html(option)

                // Passing Booking Status
                $('#lead_status').val('').attr('disabled', false)
                $('#submit-booking').attr('hidden', false)
            });

            // SUBMIT BOOKING
            $('#submit-booking').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                $(".spinner-container").show();

                $.ajax({
                    url: "{{ route('booking.layanan.store') }}",
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
                            $('#submit-booking').html('Save changes');
                            $(".spinner-container").hide();

                        } else {
                            $('.alert-danger').hide();

                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: "success",
                                title: `${response.message}`,
                            });
                            $('#submit-booking').html('Save changes');
                            $(".spinner-container").hide();
                            $('#bookingModal').modal('hide');

                            datatable.draw();

                        }
                    },
                    error: function(error) {
                        console.log(error);
                        $(".spinner-container").hide(); // Ensure preloader is hidden in case of an error
                    }
                });
            });

            // EDIT DATA BOOKING
            $('body').on('click', '#edit-booking', function() {
                var booking_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('booking.layanan.edit') }}",
                    data: {
                        booking_id: booking_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#bookingForm').trigger("reset");
                        $('#bookingModalHeading').html("EDIT DATA BOOKING");
                        $('#bookingModal').modal('show');
                        $('#booking_id').val(response.id);
                        $('#name').val(response.name).attr('disabled', false)
                        $('#email').val(response.email).attr('disabled', false)
                        $('#company_name').val(response.company_name).attr('disabled', false)
                        $('#phone').val(response.phone).attr('disabled', false)
                        $('#occupation').val(response.occupation).attr('disabled', false)

                        if (response.date_tour) {
                            $('#date_tour').val(formatCustomDate(response.date_tour)).attr(
                                'disabled', false)
                        }

                        $('#date_start').val(formatCustomDate(response.date_start)).attr(
                            'disabled', false)
                        $('#preference').val(response.preference).attr('disabled', false)
                        $('#location').val(response.location).attr('disabled', false)
                        $('#spaces').val(response.spaces).attr('disabled', false)
                        $('#people').val(response.people).attr('disabled', false)
                        $('#city').val(response.city).attr('disabled', false)
                        $('#membership_status').val(response.membership_status).attr('disabled',
                            false)
                        $('#notes_lead_booking').val(response.notes_lead_booking).attr(
                            'disabled', false)
                        $('#notes_lead_status').val(response.notes_lead_status).attr('disabled',
                            false)

                        // var option select to setting membership select option
                        var option =
                            '<option selected disabled>-- Pilih Status Booking --</option>';
                        if (response.membership_status === 1) {
                            option +=
                                '<option value="0">Booking</option>\
                                                                                                    <option value="1">Follow Up</option>\
                                                                                                    <option value="2">Invoice</option>\
                                                                                                    <option value="3">Cancel</option>\
                                                                                                    <option value="4">Deal</option>\
                                                                                                    <option value="5">Paid</option>';
                        } else {
                            option +=
                                '<option value="0">Booking</option>\
                                                                                                    <option value="1">Follow Up</option>\
                                                                                                    <option value="2">Invoice</option>\
                                                                                                    <option value="3">Cancel</option>\
                                                                                                    <option value="5">Paid</option>';
                        }
                        $('#lead_status').html(option)

                        // Passing Booking Status
                        $('#lead_status').val(response.lead_status).attr('disabled', false)
                        $('#submit-booking').attr('hidden', false)
                    }
                });
            });

            // SHOW DATA BOOKING
            $('body').on('click', '#detail-booking', function() {
                var booking_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('booking.layanan.edit') }}",
                    data: {
                        booking_id: booking_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#bookingForm').trigger("reset");
                        $('#bookingModalHeading').html("DETAIL DATA BOOKING");
                        $('#bookingModal').modal('show');
                        $('#booking_id').val(response.booking_id);
                        $('#name').val(response.name).attr('disabled', true)
                        $('#email').val(response.email).attr('disabled', true)
                        $('#company_name').val(response.company_name).attr('disabled', true)
                        $('#phone').val(response.phone).attr('disabled', true)
                        $('#occupation').val(response.occupation).attr('disabled', true)
                        $('#date_start').val(formatCustomDate(response.date_start)).attr(
                            'disabled', true)
                        if (response.date_tour) {
                            $('#date_tour').val(formatCustomDate(response.date_tour)).attr(
                                'disabled', true)
                        }
                        $('#preference').val(response.preference).attr('disabled', true)
                        $('#location').val(response.location).attr('disabled', true)
                        $('#spaces').val(response.spaces).attr('disabled', true)
                        $('#people').val(response.people).attr('disabled', true)
                        $('#city').val(response.city).attr('disabled', true)
                        $('#membership_status').val(response.membership_status).attr('disabled',
                            true)
                        $('#notes_lead_booking').val(response.notes_lead_booking).attr(
                            'disabled', true)
                        $('#notes_lead_status').val(response.notes_lead_status).attr('disabled',
                            true)

                        // var option select to setting membership select option
                        var option =
                            '<option selected disabled>-- Pilih Status Booking --</option>';
                        if (response.membership_status === 1) {
                            option +=
                                '<option value="0">Booking</option>\
                                                                                                    <option value="1">Follow Up</option>\
                                                                                                    <option value="2">Invoice</option>\
                                                                                                    <option value="3">Cancel</option>\
                                                                                                    <option value="4">Deal</option>\
                                                                                                    <option value="5">Paid</option>';
                        } else {
                            option +=
                                '<option value="0">Booking</option>\
                                                                                                    <option value="1">Follow Up</option>\
                                                                                                    <option value="2">Invoice</option>\
                                                                                                    <option value="3">Cancel</option>\
                                                                                                    <option value="5">Paid</option>';
                        }
                        $('#lead_status').html(option)

                        // Passing Booking Status
                        $('#lead_status').val(response.lead_status).attr('disabled', true)
                        $('#submit-booking').attr('hidden', true)
                    }
                });
            });

            // ARSIPKAN DATA USER
            $('body').on('click', '#delete-booking', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var booking_id = $(this).attr('data-id');

                swalWithBootstrapButtons
                    .fire({
                        title: "Do you want to deleted, this data?",
                        text: "This data will be deleted!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "me-2",
                        cancelButtonText: "No",
                        confirmButtonText: "Yes",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('booking.destroy') }}",
                                data: {
                                    booking_id: booking_id,
                                },
                                dataType: "json",
                                success: function(response) {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                    });

                                    Toast.fire({
                                        icon: 'success',
                                        title: `${response.message}`,
                                    })
                                    datatable.draw();
                                }
                            });
                        } else {
                            Swal.fire("Cancel!", "Command Canceled!", "error");
                        }
                    });

            });

            // FILTER DATA
            $('body').on('click', '#show-data', function() {
                var filter_location = $('#filter_location').val();
                var filter_spaces = $('#filter_spaces').val();
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();

                datatable.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('sorting.booking') }}",
                    data: {
                        filter_location: filter_location,
                        filter_spaces: filter_spaces,
                        startDate: startDate,
                        endDate: endDate,
                    },
                    dataType: "JSON",
                    success: function(response) {

                        if (response.data.length > 0) {

                            // Destroy the existing DataTable
                            datatable.destroy();

                            // Reinitialize the DataTable with the updated data
                            datatable = $('#datatable').DataTable({
                                scrollX: true,
                                autoWidth: false,
                                // Other DataTable options
                                data: response
                                    .data, // Pass the updated data to the DataTable
                                columns: [{
                                        data: 'DT_RowIndex',
                                        name: 'DT_RowIndex'
                                    },
                                    {
                                        data: 'name',
                                        name: 'name'
                                    },
                                    {
                                        data: 'location',
                                        name: 'location'
                                    },
                                    {
                                        data: 'spaces',
                                        name: 'spaces'
                                    },
                                    {
                                        data: 'date_created',
                                        name: 'date_created'
                                    },
                                    {
                                        data: 'date_start',
                                        name: 'date_start'
                                    },
                                    {
                                        data: 'lead_status',
                                        name: 'lead_status'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action'
                                    }
                                ],
                                columnDefs: columnDefs,
                            });

                            // Hide the loading state
                            $('#datatable').removeClass('loading');

                            // Close the accordion by collapsing it
                            $("#collapseTwo").collapse("hide");

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Data based on input filter is null!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    }
                });

            })

            // RESTART FILTER
            $('body').on('click', '#restart-date', function() {
                var filter_location = $('#filter_location').val('');
                var filter_spaces = $('#filter_spaces').val('');
                var startDate = $('#startDate').val('');
                var endDate = $('#endDate').val('');

                // Destroy the existing DataTable
                datatable.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                datatable = $('#datatable').DataTable({
                    scrollX: true,
                    autoWidth: false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('booking.layanan') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'location',
                            name: 'location'
                        },
                        {
                            data: 'spaces',
                            name: 'spaces'
                        },
                        {
                            data: 'date_created',
                            name: 'date_created'
                        },
                        {
                            data: 'date_start',
                            name: 'date_start'
                        },
                        {
                            data: 'lead_status',
                            name: 'lead_status'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ],
                    columnDefs: columnDefs,
                });

                // Close the accordion by collapsing it
                $("#collapseTwo").collapse("hide");
            })

        })
    </script>
@endpush
