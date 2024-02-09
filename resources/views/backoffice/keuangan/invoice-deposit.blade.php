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
            <li class="breadcrumb-item"><a href="{{ route('invoicedeposit.index') }}">Keuangan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keuangan Deposit</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        {{-- <div>
            <h4 class="mb-3 mb-md-0"></h4>
        </div> --}}
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" data-bs-toggle="modal" data-bs-target="#invoicedepositModal" id="btn-create-invoice"
                class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="mdi mdi-account-plus"></i> Tambah Data Invoice Deposit
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
                                    <label for="startDate" class="form-label">Jatuh Tempo Dari</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate"
                                        autocomplete="off" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="endDate" class="form-label">Hingga</label>
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
                                    <th>Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Nama</th>
                                    <th>Nominal</th>
                                    <th>Lokasi</th>
                                    <th>Status Terkirim</th>
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
    <div class="modal fade" id="invoicedepositModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoicedepositModalHeading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                        style="color: red">
                    </div>
                    <form class="forms-sample" id="invoiceForm">
                        <input type="hidden" name="invoice_id" id="invoice_id">
                        <input type="hidden" name="isEdit" id="isEdit">
                        <h6 class="mb-4">Data Invoice Layanan</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="invoice" class="form-label">Invoice Layanan</label>
                                    <select class="form-select" id="invoice" name="invoice">
                                        <option disabled selected value="">-- Pilih Invoice --</option>
                                        @foreach ($invoices as $item)
                                            <option value="{{ $item->invoice_id }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="company" name="company"
                                        autocomplete="off" placeholder="Masukkan Company">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Nama PIC</label>
                                    <input type="text" class="form-control" id="pic" name="pic"
                                        placeholder="Masukkan Nama PIC">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input class="form-control" id="location" name="location" type="location"
                                        placeholder="Masukkan Lokasi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input class="form-control" id="total" name="total" type="total"
                                        placeholder="Masukkan Lokasi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input class="form-control" id="due_date" name="due_date" type="date"
                                        placeholder="Masukkan Lokasi">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-4">Deposit</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="amount_deposit" class="form-label">Jumlah Depost</label>
                                    <input type="text" class="form-control" id="amount_deposit" name="amount_deposit"
                                        autocomplete="off" placeholder="Masukkan Jumlah Deposit">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit-invoice" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- MODAL BOOKING END --}}
@endsection

@push('script-alt')
    <script>
        // Function to format a number with a comma separator per 1,000
        function formatWithCommaSeparator(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

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
            var columnsToFormat = [2, 3, 5];

            // Loop through the columns and apply the rendering function
            var columnDefs = columnsToFormat.map(function(columnIndex) {
                return {
                    targets: columnIndex,
                    render: function(data, type, row) {
                        if ((columnIndex === 2 || columnIndex === 3) && type === 'sort') {
                            // Return the raw date data for sorting
                            return data;
                        } else if ((columnIndex === 2 || columnIndex === 3) && type === 'display') {
                            // Format the date for display
                            return formatCustomDates(data);
                        } else {
                            // Format as Rupiah
                            return 'Rp.' + parseFloat(data).toLocaleString('id-ID');
                        }
                    },
                };
            });

            // LOAD DATATABLE
            var datatable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('invoicedeposit.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'created_date',
                        name: 'created_date'
                    },
                    {
                        data: 'due_date',
                        name: 'due_date'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'status_send',
                        name: 'status_send'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                columnDefs: columnDefs,
            });

            // CREATE NEW DATA INVOICE DEPOSIT
            $('#btn-create-invoice').click(function() {
                $('#submit-user').val("create-jenis");
                $('#invoice_id').val('');
                $('.alert').hide();
                $('#invoiceForm').trigger("reset");
                $('#invoicedepositModalHeading').html("ADD NEW INVOICE DEPOST");
                $('#invoicedepositModal').modal('show');
                $('#invoice_id').val('');
                $("#invoice").val('').attr('disabled', false)
                $("#company").val('').attr('disabled', false)
                $("#pic").val('').attr('disabled', false)
                $("#location").val('').attr('disabled', false)
                $("#due_date").val('').attr('disabled', false)
                $("#total").val('').attr('disabled', false)
                $("#amount_deposit").val('').attr('disabled', false)

                // Passing Booking Status
                $('#submit-invoice').attr('hidden', false)
            });

            // SUBMIT INVOICE DEPOSIT
            $('#submit-invoice').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                $(".spinner-container").show();

                $.ajax({
                    url: "{{ route('invoicedeposit.store') }}",
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
                            $('#submit-invoice').html('Save changes');
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
                            $('#submit-invoice').html('Save changes');
                            $(".spinner-container").hide();
                            $('#invoicedepositModal').modal('hide');

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

            var lastRowIndex = 0; // Keep track of the last index used

            // Define an array of spaces with codes and names
            const spaceOptions = [
                @foreach ($spaces as $item)
                    {
                        code: '{{ $item->v_code }}',
                        name: '{{ $item->v_name }}'
                    },
                @endforeach
            ];

            // EDIT DATA INVOICE DEPOSIT
            $('body').on('click', '#edit-invoice', function() {
                var invoice_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('invoicedeposit.edit') }}",
                    data: {
                        invoice_id: invoice_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#invoiceForm').trigger("reset");
                        $('#invoicedepositModalHeading').html("EDIT DATA INVOICE LAYANAN");
                        $('#invoicedepositModal').modal('show');

                        const company_name = response.company_name
                        const name = response.name
                        const location = response.location
                        const subtotal = response.subtotal
                        const due_date = response.due_date
                        const fk_invoiceutama  = response.fk_invoiceutama
                        const invoice_id  = response.invoice_id
                        const isEdit    = 'edit';

                        var loc = ''
                        if (location == 'cw-tower') {
                            loc += 'CW TOWER'
                        } else if (location == 'indragiri') {
                            loc += 'INDRAGIRI'
                        } else if (location == 'trilium-tower') {
                            loc += 'TRILLIUM TOWER'
                        } else if (location == 'satoria-tower') {
                            loc += 'SATORIA TOWER'
                        }   

                        $("#isEdit").val(isEdit).attr('disabled', false)
                        $("#invoice_id").val(invoice_id).attr('disabled', false)
                        $("#invoice").val(fk_invoiceutama).attr('disabled', true)
                        $("#company").val(company_name).attr('disabled', true)
                        $("#pic").val(name).attr('disabled', true)
                        $("#location").val(loc).attr('disabled', true)
                        $("#due_date").val(formatCustomDate(due_date)).attr('disabled', true)
                        $("#total").val(formatWithCommaSeparator(subtotal)).attr('disabled', true)
                        $("#amount_deposit").val(subtotal).attr('disabled', false)

                        // Passing Booking Status
                        $('#submit-invoice').attr('hidden', false)
                    }
                });
            });

            // GET PRICE ADDTIONAL SPACE
            $("#invoice").on('change', function() {
                var invoice_id = $(this).val()
                console.log('cekkk', invoice_id)
                $.ajax({
                    type: "POST",
                    url: "{{ route('get.invoice.deposit') }}",
                    data: {
                        invoice_id: invoice_id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)

                        const company_name = response.company_name
                        const name = response.name
                        const location = response.location
                        const subtotal = response.subtotal
                        const due_date = response.due_date

                        var loc = ''
                        if (location == 'cw-tower') {
                            loc += 'CW TOWER'
                        } else if (location == 'indragiri') {
                            loc += 'INDRAGIRI'
                        } else if (location == 'trilium-tower') {
                            loc += 'TRILLIUM TOWER'
                        } else if (location == 'satoria-tower') {
                            loc += 'SATORIA TOWER'
                        }

                        $("#company").val(company_name).attr('disabled', true)
                        $("#pic").val(name).attr('disabled', true)
                        $("#location").val(loc).attr('disabled', true)
                        $("#total").val(formatWithCommaSeparator(subtotal)).attr('disabled', true)
                        $("#due_date").val(formatCustomDate(due_date)).attr('disabled', true)
                    }
                });
            })

            // SHOW DATA INVOICE DEPOSIT
            $('body').on('click', '#detail-invoice', function() {
                var invoice_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('invoicedeposit.edit') }}",
                    data: {
                        invoice_id: invoice_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#invoiceForm').trigger("reset");
                        $('#invoicedepositModalHeading').html("SHOW DATA INVOICE LAYANAN");
                        $('#invoicedepositModal').modal('show');
                        $('#submit-user').val("edit-user");
                        $('#invoiceForm').trigger("reset");
                        $('#invoicedepositModalHeading').html("EDIT DATA INVOICE LAYANAN");
                        $('#invoicedepositModal').modal('show');

                        const company_name = response.company_name
                        const name = response.name
                        const location = response.location
                        const subtotal = response.subtotal
                        const due_date = response.due_date
                        const invoice_id  = response.fk_invoiceutama

                        var loc = ''
                        if (location == 'cw-tower') {
                            loc += 'CW TOWER'
                        } else if (location == 'indragiri') {
                            loc += 'INDRAGIRI'
                        } else if (location == 'trilium-tower') {
                            loc += 'TRILLIUM TOWER'
                        } else if (location == 'satoria-tower') {
                            loc += 'SATORIA TOWER'
                        }

                        $("#invoice").val(invoice_id).attr('disabled', true)
                        $("#company").val(company_name).attr('disabled', true)
                        $("#pic").val(name).attr('disabled', true)
                        $("#location").val(loc).attr('disabled', true)
                        $("#due_date").val(formatCustomDate(due_date)).attr('disabled', true)
                        $("#total").val(formatWithCommaSeparator(subtotal)).attr('disabled', true)
                        $("#amount_deposit").val(formatWithCommaSeparator(subtotal)).attr('disabled', true)

                        // Passing Booking Status
                        $('#submit-invoice').attr('hidden', true)
                    }
                });
            });

            // ARSIPKAN DATA USER
            $('body').on('click', '#delete-invoice', function() {

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2",
                    },
                    buttonsStyling: false,

                });

                var invoice_id = $(this).attr('data-id');

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
                                url: "{{ route('invoicedeposit.destroy') }}",
                                data: {
                                    invoice_id: invoice_id,
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
                var filter_company = $('#filter_company').val();
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();

                datatable.one('preDraw', function() {
                    // Display the loading state
                    $('#datatable').addClass('loading');
                }).draw();

                $.ajax({
                    type: "POST",
                    url: "{{ route('invoicedeposit.sorting') }}",
                    data: {
                        filter_location: filter_location,
                        filter_company: filter_company,
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
                                        data: 'code',
                                        name: 'code'
                                    },
                                    {
                                        data: 'created_date',
                                        name: 'created_date'
                                    },
                                    {
                                        data: 'due_date',
                                        name: 'due_date'
                                    },
                                    {
                                        data: 'name',
                                        name: 'name'
                                    },
                                    {
                                        data: 'total',
                                        name: 'total'
                                    },
                                    {
                                        data: 'location',
                                        name: 'location'
                                    },
                                    {
                                        data: 'status_send',
                                        name: 'status_send'
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
                    ajax: "{{ route('invoicedeposit.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'code',
                            name: 'code'
                        },
                        {
                            data: 'created_date',
                            name: 'created_date'
                        },
                        {
                            data: 'due_date',
                            name: 'due_date'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'total',
                            name: 'total'
                        },
                        {
                            data: 'location',
                            name: 'location'
                        },
                        {
                            data: 'status_send',
                            name: 'status_send'
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
