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
            <li class="breadcrumb-item"><a href="{{ route('quotaMember.index') }}">Pengaturan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kuota Member</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <div>
            <h4 class="mb-3 mb-md-0"></h4>
        </div> --}}
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" data-bs-toggle="modal" data-bs-target="#quotaMemberModal" id="btn-create-quota-member"
                class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="mdi mdi-account-plus"></i> Tambah Data Quota Member
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
                                    <th>Perusahaan</th>
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
    <div class="modal fade" id="quotaMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quotaMemberModalHeading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                        style="color: red">
                    </div>
                    <form class="forms-sample" id="quotaForm">
                        <input type="hidden" name="quota_id" id="quota_id">
                        <input type="hidden" name="member_id" id="member_id">
                        <input type="hidden" name="v_location" id="v_location">
                        <input type="hidden" name="company_id" id="company_id">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Perusahaan</label>
                                    <select class="form-select" id="company_name" name="company_name">
                                        <option selected disabled value="">-- Pilih Perusahaan --</option>
                                        @foreach ($companies as $item)
                                            <option value="{{ $item->company_id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="member_name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="member_name" name="member_name"
                                        autocomplete="off" placeholder="Masukkan Nama">
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
                            <h6 class="mb-4">Data Kuota</h6>
                            <div class="data-quota row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="i_quota" class="form-label">Meeting Room | Hourly (jam)</label>
                                        <input type="number" class="form-control" name="i_quota[]" autocomplete="off"
                                            placeholder="Masukkan Kuota">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="i_quota" class="form-label">Print/Scan/Copy Color (10 pcs)</label>
                                        <input type="number" class="form-control" name="i_quota[]" autocomplete="off"
                                            placeholder="Masukkan Kuota">
                                    </div>
                                </div>
                            </div>
                            <div class="quota-data row"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit-quotaMember" class="btn btn-primary">Save changes</button>
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
                ajax: "{{ route('quotaMember.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
            });

            // CREATE NEW DATA QUOTA MEMBER
            $('#btn-create-quota-member').click(function() {
                $('#submit-user').val("create-jenis");
                $('#quota_id').val('');
                $('.alert').hide();
                $('#quotaForm').trigger("reset");
                $('#quotaMemberModalHeading').html("ADD NEW QUOTA MEMBER DATA");
                $('#quotaMemberModal').modal('show');
                $('#quota_id').val('');
                $('#company_name').val('').attr('disabled', false)
                $('#member_name').val('').attr('disabled', false)
                $('#location').val('').attr('disabled', false)
                $('.i_quota').val('').attr('disabled', false)
                // Reset null values for other input fields
                $('input[type="number"]').val(null);

                // Call the function on page load
                handleCompanyChange();

                // Passing Overtime Status
                $('#submit-quotaMember').attr('hidden', false)
            });

            // SUBMIT QUOTA MEMBER
            $('#submit-quotaMember').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                $(".spinner-container").show();

                $.ajax({
                    url: "{{ route('quotaMember.store') }}",
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
                            $('#submit-quotaMember').html('Save changes');
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
                            $('#submit-quotaMember').html('Save changes');
                            $(".spinner-container").hide();
                            $('#quotaMemberModal').modal('hide');

                            datatable.draw();

                        }
                    }
                });

            });

            // Function to handle the AJAX request
            function handleCompanyChange() {
                var company_id = $("#company_name").val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('get.company') }}",
                    data: {
                        company_id: company_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#member_id').val(response.companies.member_id);
                        $('#v_location').val(response.companies.v_location);
                        $('#member_name').val(response.companies.pic_name).prop('disabled', true);
                        $('#location').val(response.companies.v_location).prop('disabled', true)

                        console.log(response.data.member_quota_detail);

                        var quotaHTML = '';

                        if (response.data.member_quota_detail.length > 0) {
                            $(".data-quota").html('')

                            // LOOPING DATA QUOTA DETAIL
                            $.each(response.data.member_quota_detail, function(index, value) {
                                const company   = value["company"]
                                const fkSpaces  = value["fkSpaces"]
                                const quota     = value["quota"]
                                const quota_id  = value["quota_id"]
                                const title     = value["title"]

                                quotaHTML += `<div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">${title}</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" value="${quota}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="quota_id[]"
                                                        autocomplete="off" value="${quota_id}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="${fkSpaces}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${company}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>`;
                            });
                        } else {
                            $(".data-quota").html('')

                            quotaHTML += `<div class="data-quota row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">Meeting Room | Hourly (jam)</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="7" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${response.data.member_quota_company.company_id}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">Print/Scan/Copy Color (10 pcs)</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="21" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${response.data.member_quota_company.company_id}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>
                                        </div>`;
                        }

                        $(".quota-data").html(quotaHTML);

                    }
                });
            }

            // Attach the function to the change event of the company_name select element
            $("#company_name").change(function() {
                handleCompanyChange();
            });

            // EDIT DATA QUOTA MEMBER
            $('body').on('click', '#edit-quota', function() {
                var company_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('quotaMember.edit') }}",
                    data: {
                        company_id: company_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#quotaForm').trigger("reset");
                        $('#quotaMemberModalHeading').html("EDIT DATA OVERTIME");
                        $('#quotaMemberModal').modal('show');
                        $('#quota_id').val(response.companies.quota_id);
                        $('#member_id').val(response.companies.member_id);
                        $('#company_id').val(response.companies.company_id).attr('disabled',
                            false)
                        $('#company_name').val(response.companies.company_id).attr('disabled',
                            true)
                        $('#member_name').val(response.companies.pic_name).attr('disabled',
                            true)
                        $('#location').val(response.companies.v_location).attr('disabled', true)
                        $('#v_location').val(response.companies.v_location).attr('disabled',
                            false)

                        console.log(response.data.member_quota_detail);

                        var quotaHTML = '';

                        if (response.data.member_quota_detail.length > 0) {
                            $(".data-quota").html('')

                            // LOOPING DATA QUOTA DETAIL
                            $.each(response.data.member_quota_detail, function(index, value) {
                                const company = value["company"]
                                const fkSpaces = value["fkSpaces"]
                                const quota = value["quota"]
                                const quota_id = value["quota_id"]
                                const title = value["title"]

                                quotaHTML += `<div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">${title}</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" value="${quota}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="quota_id[]"
                                                        autocomplete="off" value="${quota_id}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="${fkSpaces}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${company}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>`;
                            });
                        } else {
                            quotaHTML += `<div class="data-quota row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">Meeting Room | Hourly (jam)</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="21" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${response.data.member_quota_company.company_id}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">Print/Scan/Copy Color (10 pcs)</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="21" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${response.data.member_quota_company.company_id}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>
                                        </div>`;
                        }

                        $(".quota-data").html(quotaHTML);

                        // Passing Booking Status
                        $('#submit-quotaMember').attr('hidden', false)
                    }
                });
            });

            // SHOW DATA QUOTA MEMBER
            $('body').on('click', '#detail-quota', function() {
                var company_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('quotaMember.edit') }}",
                    data: {
                        company_id: company_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#quotaForm').trigger("reset");
                        $('#quotaMemberModalHeading').html("DETAIL DATA OVERTIME");
                        $('#quotaMemberModal').modal('show');
                        $('#quota_id').val(response.quota_id);
                        $('#member_id').val(response.companies.member_id);
                        $('#company_name').val(response.companies.company_id).attr('disabled',
                            true)
                        $('#member_name').val(response.companies.pic_name).attr('disabled',
                            true)
                        $('#location').val(response.companies.v_location).attr('disabled', true)
                        $('#v_location').val(response.companies.v_location).attr('disabled',
                            false)

                        var quotaHTML = '';

                        if (response.data.member_quota_detail.length > 0) {
                            $(".data-quota").html('')

                            // LOOPING DATA QUOTA DETAIL
                            $.each(response.data.member_quota_detail, function(index, value) {
                                const company = value["company"]
                                const fkSpaces = value["fkSpaces"]
                                const quota = value["quota"]
                                const quota_id = value["quota_id"]
                                const title = value["title"]

                                quotaHTML += `<div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">${title}</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" value="${quota}" placeholder="Masukkan Kuota" disabled>
                                                    <input type="hidden" class="form-control" name="quota_id[]"
                                                        autocomplete="off" value="${quota_id}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="${fkSpaces}" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${company}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>`;
                            });
                        } else {
                            quotaHTML += `<div class="data-quota row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">Meeting Room | Hourly (jam)</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" placeholder="Masukkan Kuota" disabled>
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="21" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${response.data.member_quota_company.company_id}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="i_quota" class="form-label">Print/Scan/Copy Color (10 pcs)</label>
                                                    <input type="number" class="form-control" name="i_quota[]"
                                                        autocomplete="off" placeholder="Masukkan Kuota" disabled>
                                                    <input type="hidden" class="form-control" name="fkSpaces[]"
                                                        autocomplete="off" value="21" placeholder="Masukkan Kuota">
                                                    <input type="hidden" class="form-control" name="company[]"
                                                        autocomplete="off" value="${response.data.member_quota_company.company_id}" placeholder="Masukkan Kuota">
                                                </div>
                                            </div>
                                        </div>`;
                        }

                        $(".quota-data").html(quotaHTML);

                        // Passing Booking Status
                        $('#submit-quotaMember').attr('hidden', true)
                    }
                });
            });

            // ARSIPKAN DATA QUOTA MEMBER
            $('body').on('click', '#delete-quota', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var company_id = $(this).attr('data-id');

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
                                url: "{{ route('quotaMember.destroy') }}",
                                data: {
                                    company_id: company_id,
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

        })
    </script>
@endpush
