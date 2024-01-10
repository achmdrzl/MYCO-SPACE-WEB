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
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Layanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Booking Layanan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <div>
            <h4 class="mb-3 mb-md-0"></h4>
        </div> --}}
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" data-bs-toggle="modal" data-bs-target="#bookingModal" id="btn-create-user"
                class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="mdi mdi-account-plus"></i> Tambah Data Booking
            </button>
        </div>
    </div>
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


    {{-- Modal User --}}
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
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
                                    <label for="email" class="form-label">Perusahaan</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Masukkan Perusahaan" name="email">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        autocomplete="off" data-inputmask-alias="(+99)" placeholder="Masukkan Telepon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Email</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="off" placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Pekerjaan</label>
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="name" name="name"
                                        autocomplete="off" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Tanggal Tour</label>
                                    <input type="date" class="form-control" id="email"
                                        placeholder="Masukkan Perusahaan" name="email">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Preferensi</label>
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Lokasi</label>
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Jenis Ruangan</label>
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Jumlah Tim</label>
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Kota</label>
                                   <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Keterangan Booking</label>
                                    <textarea class="form-control" name="notes" id=""></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Membership</label>
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Status</label>
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>-- Pilih Pekerjaan --</option>
                                        <option value="superadmin">Individual</option>
                                        <option value="finance">Freelance</option>
                                        <option value="operasional">Student</option>
                                        <option value="operasional">Startup</option>
                                        <option value="operasional">SMEs</option>
                                        <option value="operasional">Large Company</option>
                                        <option value="operasional">Non-profit Organization</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Keterangan Booking</label>
                                    <textarea class="form-control" name="notes" id=""></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit-user" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
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
                ]
            });

            // Create New Supplier.
            $('#btn-create-user').click(function() {
                $('#submit-user').val("create-jenis");
                $('#booking_id').val('');
                $('#user_form').trigger("reset");
                $('#bookingModalHeading').html("ADD NEW USER DATA");
                $('#bookingModal').modal('show');
            });

            // SUBMIT USER
            $('#submit-user').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    url: "{{ route('user.store') }}",
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
                            $('#submit-user').html('Save changes');

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
                            $('#submit-user').html('Save changes');
                            $('#bookingModal').modal('hide');

                            datatable.draw();

                        }
                    }
                });
            });

            // EDIT DATA BOOKING
            $('body').on('click', '#edit-booking', function() {
                var booking_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.edit') }}",
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
                        $('#booking_id').val(response.booking_id);
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                        $('#role').val(response.role);
                    }
                });
            });

            // ARSIPKAN DATA USER
            $('body').on('click', '#delete-user', function() {

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
                        title: "Do you want to updated, this data?",
                        text: "This data will be updated!",
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
                                url: "{{ route('user.destroy') }}",
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
                                        title: `${response.status}`,
                                    })
                                    datatable.draw();
                                }
                            });
                        } else {
                            Swal.fire("Cancel!", "Command Canceled!", "error");
                        }
                    });

            });

        })
    </script>
@endpush
