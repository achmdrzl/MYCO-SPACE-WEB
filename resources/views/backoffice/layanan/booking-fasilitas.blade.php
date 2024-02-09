@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 900px;
            /* Set your desired width */
            width: 100%;
            margin: 1.75rem auto;
        }
    </style>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('bookingFasilitas.index') }}">Layanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Booking Fasilitas</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <div>
            <h4 class="mb-3 mb-md-0"></h4>
        </div> --}}
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" data-bs-toggle="modal" data-bs-target="#bookingfasilitasModal"
                id="btn-create-bookingfasilitas" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="mdi mdi-account-plus"></i> Tambah Data Booking Fasilitas
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
                                    <label for="filter_company" class="form-label">Perusahaan</label>
                                    <select class="form-select" id="filter_company" name="filter_company">
                                        <option selected disabled value="">-- Pilih Perusahaan --</option>
                                        @foreach ($companies as $item)
                                            <option value="{{ $item->company_id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="filter_period" class="form-label">Periode</label>
                                    <input type="month" class="form-control" id="filter_period" name="filter_period"
                                        autocomplete="off" placeholder="Masukkan Nama">
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
                                    <th>Perusahaan</th>
                                    <th>Lokasi</th>
                                    <th>Layanan</th>
                                    <th>Pemakaian</th>
                                    <th>Tanggal</th>
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
    <div class="modal fade" id="bookingfasilitasModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingfasilitasModalHeading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                        style="color: red">
                    </div>
                    <form class="forms-sample" id="bookingfasilitasForm">
                        <input type="hidden" name="bookingfasilitas_id" id="bookingfasilitas_id">
                        <input type="hidden" name="v_location" id="v_location">
                        <input type="hidden" name="v_company" id="v_company">
                        <input type="hidden" name="v_spaces" id="v_spaces">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Perusahaan</label>
                                    <select class="form-select" id="company_name" name="company_name">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="spaces" class="form-label">Fasilitas</label>
                                    <select class="form-select" id="spaces" name="spaces">
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
                            <hr>
                            <h6 class="mb-4">Kuota Fasilitas</h6>
                            <div class="row data-input">

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit-bookingfasilitas" class="btn btn-primary">Save changes</button>
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
            var columnsToFormat = [5];

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
                ajax: "{{ route('bookingFasilitas.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'company',
                        name: 'company'
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
                        data: 'usage',
                        name: 'usage'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                columnDefs: columnDefs,
            });

            // CREATE NEW DATA OVERTIME
            $('#btn-create-bookingfasilitas').click(function() {
                $('#submit-user').val("create-jenis");
                $('#bookingfasilitas_id').val('');
                $('.alert').hide();
                $('#user_form').trigger("reset");
                $('#bookingfasilitasModalHeading').html("ADD NEW BOOKING FACILITY DATA");
                $('#bookingfasilitasModal').modal('show');
                $('#bookingfasilitas_id').val('');
                $('#company_name').val('').attr('disabled', false)
                $('#member_name').val('').attr('disabled', false)
                $('#location').val('').attr('disabled', false)
                $('#overtime_date').val('').attr('disabled', false)
                $('#start_time').val('').attr('disabled', false)
                $('#end_time').val('').attr('disabled', false)
                $('#notes').val('').attr('disabled', false)

                // Passing bookingfasilitas Status
                $('#submit-bookingfasilitas').attr('hidden', false)
            });

            // Call the function on page load
            handleCompanyChange();

            // Function to handle the AJAX request
            function handleCompanyChange() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('get.company.spaces') }}",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        // LOOPING COMPANY
                        var company =
                            '<option selected disabled value="">-- Pilih Perusahaan --</option>'
                        $.each(response.company, function(index, value) {
                            const fk_company = value["fk_company"]
                            const name = value["name"]

                            company += `<option value="${fk_company}">${name}</option>`;
                        });
                        $("#company_name").html(company)

                        // LOOPING SPACES
                        var spaces = '<option selected disabled value="">-- Pilih Fasilitas --</option>'
                        $.each(response.spaces, function(index, value) {
                            const id = value["id"]
                            const name = value["name"]

                            spaces += `<option value="${id}">${name}</option>`;
                        });
                        $("#spaces").html(spaces)
                    }
                });
            }

            // Attach the function to the change event of the company_name select element
            $("#spaces").change(function() {
                var id = $(this).val();
                var input = '';
                console.log(id, 'id spaces')
                if (id == 21) {
                    input += `<div class="col-md-12">
                                <div class="mb-3">
                                    <label for="pcs" class="form-label">Pcs</label>
                                    <input type="number" class="form-control" id="pcs" name="pcs"
                                        autocomplete="off" placeholder="Masukkan Jumlah Pcs">
                                </div>
                            </div>`;
                } else if (id == 7) {
                    input += `<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                                        autocomplete="off" placeholder="Masukkan Start Time" value="${getCurrentDateTime()}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="datetime-local" class="form-control" id="end_time" name="end_time"
                                        autocomplete="off" placeholder="Masukkan End Time" value="${getCurrentDateTime()}">
                                </div>
                            </div>`;

                    // Function to get current date and time in the format expected by datetime-local input
                    function getCurrentDateTime() {
                        const now = new Date();
                        const year = now.getFullYear();
                        const month = String(now.getMonth() + 1).padStart(2, '0');
                        const day = String(now.getDate()).padStart(2, '0');
                        const hours = String(now.getHours()).padStart(2, '0');
                        const minutes = String(now.getMinutes()).padStart(2, '0');

                        return `${year}-${month}-${day}T${hours}:${minutes}`;
                    }
                }
                $(".data-input").html(input)
            });

            // SUBMIT BOOKING FASILITAS
            $('#submit-bookingfasilitas').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                $(".spinner-container").show();

                var spaces = $("#spaces").val();

                if (spaces == 7) {
                    var start_time = $("#start_time").val()
                    var end_time = $("#end_time").val()

                    if (start_time === '' && end_time === '') {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Start Time & End Time are required!",
                        });

                        $('#submit-bookingfasilitas').html('Save changes');
                        $(".spinner-container").hide();
                        return; // Stop execution here if condition is not met
                    }

                    // If start_time and end_time are not empty, check the date logic
                    if (start_time !== '' && end_time !== '' && new Date(start_time) <= new Date(
                            end_time)) {
                        // Your existing code here

                        console.log('Condition met'); // Add this line for testing
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Start Time must be before End Time!",
                        });

                        $('#submit-bookingfasilitas').html('Save changes');
                        $(".spinner-container").hide();
                        return; // Stop execution here if condition is not met
                    }

                } else if (spaces == 21) {
                    var pcs = $("#pcs").val()
                    if (pcs == '') {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Pcs required!",
                        });

                        $('#submit-bookingfasilitas').html('Save changes');
                        $(".spinner-container").hide();
                        return; // Stop execution here if condition is not met
                    }
                }

                $.ajax({
                    url: "{{ route('bookingFasilitas.store') }}",
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
                                $('.alert-danger').append('<strong><li>' +
                                    value +
                                    '</li></strong>');
                            });
                            $('#submit-bookingfasilitas').html('Save changes');
                            $(".spinner-container").hide();

                        } else {
                            $('.alert-danger').hide();

                            if (response.quota == 1) {
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
                                $('#submit-bookingfasilitas').html('Save changes');
                                $(".spinner-container").hide();
                                $('#bookingfasilitasModal').modal('hide');

                                datatable.draw();
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.message,
                                });
                                $('#submit-bookingfasilitas').html('Save changes');
                                $(".spinner-container").hide();
                                $('#bookingfasilitasModal').modal('hide');
                            }
                        }
                    }
                });

            });

            // EDIT DATA BOOKING FASILITAS
            $('body').on('click', '#edit-bookingfasilitas', function() {
                var bookingfasilitas_id = $(this).attr('data-id');
                console.log(bookingfasilitas_id)
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('bookingFasilitas.edit') }}",
                    data: {
                        bookingfasilitas_id: bookingfasilitas_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#bookingfasilitasForm').trigger("reset");
                        $('#bookingfasilitasModalHeading').html("EDIT DATA BOOKING FASILITAS");
                        $('#bookingfasilitasModal').modal('show');
                        $('#bookingfasilitas_id').val(response.id);
                        $('#company_name').val(response.company).attr('disabled', false)
                        $('#v_company').val(response.company).attr('disabled', false)
                        $('#location').val(response.location).attr('disabled', false)
                        $('#v_location').val(response.location).attr('disabled', false)
                        $('#spaces').val(response.spaces).attr('disabled', false)
                        $('#v_spaces').val(response.spaces).attr('disabled', false)
                        $('#v_location').val(response.location).attr('disabled', false)

                        var input = '';
                        if (response.spaces == 21) {
                            input += `<div class="col-md-12">
                                <div class="mb-3">
                                    <label for="pcs" class="form-label">Pcs</label>
                                    <input type="number" class="form-control" id="pcs" value="${response.pcs}" name="pcs"
                                        autocomplete="off" placeholder="Masukkan Jumlah Pcs">
                                </div>
                            </div>`;
                        } else if (response.spaces == 7) {
                            input += `<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                                        autocomplete="off" placeholder="Masukkan Start Time" value="${response.dateStart}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="datetime-local" class="form-control" id="end_time" name="end_time"
                                        autocomplete="off" placeholder="Masukkan End Time" value="${response.dateEnd}">
                                </div>
                            </div>`;
                        }
                        $(".data-input").html(input)

                        // Passing Booking Status
                        $('#submit-bookingfasilitas').attr('hidden', false)
                    }
                });
            });

            // SHOW DATA BOOKING FASILITAS
            $('body').on('click', '#detail-bookingfasilitas', function() {
                var bookingfasilitas_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('bookingFasilitas.edit') }}",
                    data: {
                        bookingfasilitas_id: bookingfasilitas_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#bookingfasilitasForm').trigger("reset");
                        $('#bookingfasilitasModalHeading').html("DETAIL DATA OVERTIME");
                        $('#bookingfasilitasModal').modal('show');
                        $('#bookingfasilitas_id').val(response.bookingfasilitas_id);
                        $('#company_name').val(response.company).attr('disabled', true)
                        $('#v_company').val(response.company).attr('disabled', true)
                        $('#location').val(response.location).attr('disabled', true)
                        $('#v_location').val(response.location).attr('disabled', true)
                        $('#spaces').val(response.spaces).attr('disabled', true)
                        $('#v_spaces').val(response.spaces).attr('disabled', true)
                        $('#v_location').val(response.location).attr('disabled', true)

                        var input = '';
                        if (response.spaces == 21) {
                            input += `<div class="col-md-12">
                                <div class="mb-3">
                                    <label for="pcs" class="form-label">Pcs</label>
                                    <input type="number" class="form-control" id="pcs" value="${response.pcs}" name="pcs"
                                        autocomplete="off" placeholder="Masukkan Jumlah Pcs" disabled>
                                </div>
                            </div>`;
                        } else if (response.spaces == 7) {
                            input += `<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                                        autocomplete="off" placeholder="Masukkan Start Time" disabled value="${response.dateStart}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="datetime-local" class="form-control" id="end_time" name="end_time"
                                        autocomplete="off" placeholder="Masukkan End Time" disabled value="${response.dateEnd}">
                                </div>
                            </div>`;
                        }
                        $(".data-input").html(input)


                        // Passing Booking Status
                        $('#submit-bookingfasilitas').attr('hidden', true)
                    }
                });
            });

            // ARSIPKAN DATA USER
            $('body').on('click', '#delete-bookingfasilitas', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var bookingfasilitas_id = $(this).attr('data-id');

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
                                url: "{{ route('bookingFasilitas.destroy') }}",
                                data: {
                                    bookingfasilitas_id: bookingfasilitas_id,
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
                var filter_company  = $('#filter_company').val();
                var filter_period   = $('#filter_period').val();

                datatable.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('bookingFasilitas.sorting') }}",
                    data: {
                        filter_location: filter_location,
                        filter_company: filter_company,
                        filter_period: filter_period,
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
                                        data: 'company',
                                        name: 'company'
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
                                        data: 'usage',
                                        name: 'usage'
                                    },
                                    {
                                        data: 'date',
                                        name: 'date'
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
                var filter_company = $('#filter_company').val('');
                var filter_period = $('#filter_period').val('');

                // Destroy the existing DataTable
                datatable.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                datatable = $('#datatable').DataTable({
                    scrollX: true,
                    autoWidth: false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('bookingFasilitas.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'company',
                            name: 'company'
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
                            data: 'usage',
                            name: 'usage'
                        },
                        {
                            data: 'date',
                            name: 'date'
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
