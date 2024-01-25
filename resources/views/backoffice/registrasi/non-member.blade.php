@extends('layouts.main')

@push('style-alt')
    <style>
        .custom-modal-dialog {
            max-width: 1280px;
            /* Set your desired width */
            width: 100%;
            margin: 1.75rem auto;
        }

        .custom-width-column {
            width: 50px;
            /* Set your desired width here */
        }
    </style>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('non-member.index') }}">Registrasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Non Member</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <div>
            <h4 class="mb-3 mb-md-0"></h4>
        </div> --}}
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
                        <table id="datatable" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Layanan</th>
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
    <div class="modal fade" id="nonmemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nonmemberModalHeading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                        style="color: red">
                    </div>
                    <form class="forms-sample" id="memberForm">
                        <input type="hidden" name="member_id" id="member_id">
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
                                    <label for="idnumber" class="form-label">No KTP</label>
                                    <input class="form-control" id="idnumber" name="idnumber" type="idnumber"
                                        placeholder="Masukkan No KTP">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="address" id="address"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
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
                                    <input type="number" class="form-control" name="people" id="people">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">Kota</label>
                                    <select class="form-select" id="city" name="city">
                                        <option selected disabled value="">-- Pilih Kota --</option>
                                        <option value="surabaya">Surabaya</option>
                                        <option value="jakarta">Jakarta</option>
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
                                    <label for="date_start" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="date_start" name="date_start"
                                        autocomplete="off" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_end" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="date_end"
                                        placeholder="Masukkan Perusahaan" name="date_end">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit-nonmember" class="btn btn-primary">Save changes</button>
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

            // LOAD DATATABLE
            var datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ route('non-member.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name',
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
                        data: 'action',
                        name: 'action'
                    }
                ],
            });

            // Custom function to format the date as dd/mm/yyyy
            function formatCustomDate(dateString) {
                const [fullDate, timePart] = dateString.split(' ');
                const [year, month, day] = fullDate.split('-');

                return `${year}-${month}-${day}`;
            }

            // SUBMIT COMPANY
            $('#submit-nonmember').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                $(".spinner-container").show();

                $.ajax({
                    url: "{{ route('non-member.store') }}",
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
                            $('#submit-nonmember').html('Save changes');
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
                            $('#submit-nonmember').html('Save changes');
                            $(".spinner-container").hide();

                            $('#nonmemberModal').modal('hide');

                            datatable.draw();

                        }
                    },
                    error: function(error) {
                        console.log(error);
                        $(".spinner-container")
                            .hide(); // Ensure preloader is hidden in case of an error
                    }
                });
            });

            // EDIT DATA NON MEMBER
            $('body').on('click', '#edit-nonmember', function() {
                var member_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('non-member.edit') }}",
                    data: {
                        member_id: member_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#memberForm').trigger("reset");
                        $('#nonmemberModalHeading').html("EDIT DATA NON MEMBER");
                        $('#nonmemberModal').modal('show');
                        $('#member_id').val(response.member_id);
                        $('#name').val(response.name).attr('disabled', false)
                        $('#email').val(response.email).attr('disabled', false)
                        $('#phone').val(response.phone).attr('disabled', false)
                        $('#city').val(response.city).attr('disabled', false)
                        $('#address').val(response.address).attr('disabled', false)
                        $('#people').val(response.people).attr('disabled', false)
                        $('#location').val(response.location).attr('disabled', false)
                        $('#spaces').val(response.spaces).attr('disabled', false)
                        $('#idnumber').val(response.idnumber).attr('disabled', false)
                        if (response.date_start) {
                            $('#date_start').val(formatCustomDate(response.date_start)).attr(
                                'disabled', false)
                        }

                        if (response.date_end) {
                            $('#date_end').val(formatCustomDate(response.date_end)).attr(
                                'disabled', false)
                        } else {
                            $('#date_end').val('').attr(
                                'disabled', false)
                        }

                        $('#idnumber').val(response.idnumber).attr('disabled', false)

                        // Passing NON MEMBER Status
                        $('#submit-nonmember').attr('hidden', false)
                    }
                });
            });

            // SHOW DATA NON MEMBER
            $('body').on('click', '#detail-nonmember', function() {
                var member_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('non-member.edit') }}",
                    data: {
                        member_id: member_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#memberForm').trigger("reset");
                        $('#nonmemberModalHeading').html("DETAIL DATA NON MEMBER");
                        $('#nonmemberModal').modal('show');
                        $('#member_id').val(response.member_id);
                        $('#name').val(response.name).attr('disabled', true)
                        $('#email').val(response.email).attr('disabled', true)
                        $('#phone').val(response.phone).attr('disabled', true)
                        $('#city').val(response.city).attr('disabled', true)
                        $('#address').val(response.address).attr('disabled', true)
                        $('#people').val(response.people).attr('disabled', true)
                        $('#location').val(response.location).attr('disabled', true)
                        $('#spaces').val(response.spaces).attr('disabled', true)
                        $('#idnumber').val(response.idnumber).attr('disabled', true)

                        if (response.date_start) {
                            $('#date_start').val(formatCustomDate(response.date_start)).attr(
                                'disabled', true)
                        } else {
                            $('#date_start').val('').attr(
                                'disabled', true)
                        }

                        if (response.date_end) {
                            $('#date_end').val(formatCustomDate(response.date_end)).attr(
                                'disabled', true)
                        } else {
                            $('#date_end').val('').attr(
                                'disabled', true)
                        }

                        $('#idnumber').val(response.idnumber).attr('disabled', true)

                        // Passing Company Status
                        $('#submit-nonmember').attr('hidden', true)
                    }
                });
            });

            // ARSIPKAN DATA NON MEMBER
            $('body').on('click', '#delete-nonmember', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var member_id = $(this).attr('data-id');

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
                                url: "{{ route('non-member.destroy') }}",
                                data: {
                                    member_id: member_id,
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
                var filter_spaces   = $('#filter_spaces').val();

                datatable.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('non-member.sorting') }}",
                    data: {
                        filter_location: filter_location,
                        filter_spaces: filter_spaces,
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
                                        name: 'name',
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
                                        data: 'action',
                                        name: 'action'
                                    }
                                ],
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
                var filter_spaces   = $('#filter_spaces').val('');

                // Destroy the existing DataTable
                datatable.destroy();
                // DISPLAY TRANSAKSI PEMBELIAN
                datatable = $('#datatable').DataTable({
                    scrollX: true,
                    autoWidth: false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('non-member.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name',
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
                            data: 'action',
                            name: 'action'
                        }
                    ],
                });

                // Close the accordion by collapsing it
                $("#collapseTwo").collapse("hide");
            })

        })
    </script>
@endpush
