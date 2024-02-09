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
            <li class="breadcrumb-item"><a href="{{ route('invoicelayanan.index') }}">Keuangan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keuangan Layanan</li>
        </ol>
    </nav>

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
    <div class="modal fade" id="invoicelayananModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoicelayananModalHeading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                        style="color: red">
                    </div>
                    <form class="forms-sample" id="invoiceForm">
                        <input type="hidden" name="invoice_id" id="invoice_id">
                        <h6 class="mb-4">Data PIC</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <select class="form-select" id="title" name="title">
                                        <option disabled selected value="">-- Pilih Title --</option>
                                        <option value="Bapak">Bapak</option>
                                        <option value="Ibu">Ibu</option>
                                    </select>
                                </div>
                            </div>
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
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-4">Data Layanan</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Kode Invoice</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        autocomplete="off" placeholder="Masukkan Code Invoice">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="renewal_status" class="form-label">Invoice Type</label>
                                    <input type="text" class="form-control" id="renewal_status"
                                        placeholder="Masukkan Invoice Type" name="renewal_status">
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
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="due_date"
                                        placeholder="Masukkan Due Date" name="due_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dp" class="form-label">DP</label>
                                    <input type="text" class="form-control" id="dp" placeholder="Masukkan DP"
                                        name="dp">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="notes" class="form-label">Catatan Invoice</label>
                                    <textarea class="form-control" name="notes" id="notes"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="table-responsive">
                                        <input type="hidden" id="invoice_ctr" name="invoice_ctr">
                                        <table id="invoice_detail" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="d-none">Spaces Value</th>
                                                    <th class="text-center">Spaces</th>
                                                    <th class="text-center">Pax</th>
                                                    <th class="text-center">Periode</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Disc. Layanan (%)</th>
                                                    <th class="text-center">Subtotal</th>
                                                    <th class="text-center">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="detail">

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4"></th>
                                                    <th class="text-right">Subtotal</th>
                                                    <th colspan="1" class="text-right"><span
                                                            id="inputsubtotal">0</span>
                                                    </th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"></th>
                                                    <th class="text-right">Disc. Invoice (%)</th>
                                                    <th colspan="1">
                                                        <input type="text" class="form-control text-right"
                                                            id="inputdiscount" name="inputdiscount" value="0">
                                                    </th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"></th>
                                                    <th class="text-right">Tax (%)</th>
                                                    <th colspan="1">
                                                        <input type="text" class="form-control text-right"
                                                            id="inputtax" name="inputtax" value="10" max="10"
                                                            min="10">
                                                    </th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"></th>
                                                    <th class="text-right">Total</th>
                                                    <th colspan="1" class="text-right"><span id="inputtotal">0</span>
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-4" id="title-additional-space">Additional Space</h6>
                        <div class="row mb-3" id="additional-space">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="inputspaces" class="form-label">Spaces</label>
                                    <select class="form-select" id="inputspaces" name="inputspaces">
                                        <option selected disabled value="">-- Pilih Layanan --</option>
                                        @foreach ($spaces as $item)
                                            <option value="{{ $item->v_code }}">{{ $item->v_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="inputqty" class="form-label">Pax</label>
                                    <input type="text" class="form-control" id="inputqty" placeholder="Masukkan Qty"
                                        name="inputqty">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="inputunit_qty" class="form-label">Periode</label>
                                    <input type="text" class="form-control" id="inputunit_qty"
                                        placeholder="Masukkan Periode" name="inputunit_qty">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-4">
                                    <label for="inputunit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" id="inputunit"
                                        placeholder="Masukkan unit" name="inputunit">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputamount" class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="inputamount"
                                        placeholder="Masukkan Harga" name="inputamount" value="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputdiscount" class="form-label">Disc. Layanan(%)</label>
                                    <input type="text" class="form-control" id="inputdiscount"
                                        placeholder="Masukkan Harga" name="inputdiscount" value="0">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-success" id="addRowBtn">Tambah</button>
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
        // Define removeRow in the global scope
        function removeRow(rowId) {
            // Remove the corresponding row when the delete button is clicked
            $(`#${rowId}`).remove();
            // Recalculate the total after removing a row
            calculateGrandTotal();
        }

        // Calculate each row
        function calculateRowTotal(row) {
            var qty = parseFloat(row.find('.qty').val()) || 0;
            var amount = parseFloat(row.find('.amount').val()) || 0;
            var discount = parseFloat(row.find('.discount').val()) || 0;

            var total = (qty * amount) - (qty * amount * discount / 100);
            var decimalPlaces = 0;

            // Round the total value to the specified decimal places
            total = parseFloat(total.toFixed(decimalPlaces));

            var totalFormatted = formatWithCommaSeparator(total);

            row.find('.subtotal').html(totalFormatted);
            row.find('.subtotal').attr('data-value', total);
        }

        // Calculate the grandtotal
        function calculateGrandTotal() {
            var subtotal = 0;

            // Iterate through each row and sum the subtotal values
            $('.subtotal').each(function() {
                var totalValue = parseFloat($(this).attr('data-value')) || 0;
                subtotal += totalValue;
            });

            var inputdiskon = parseFloat($("#inputdiscount").val()) || 0;
            var inputtax = parseFloat($("#inputtax").val()) || 0;
            var grandTotal = subtotal - (subtotal * inputdiskon / 100) - (subtotal * inputtax / 100); // Grand Total Formula

            var diskonFormatted = formatWithCommaSeparator(inputdiskon);
            var taxFormatted = formatWithCommaSeparator(inputtax);
            var subtotalFormatted = formatWithCommaSeparator(subtotal);
            var grandTotalFormatted = formatWithCommaSeparator(grandTotal);

            $('#inputsubtotal').html(subtotalFormatted);
            $('#inputdiscount').val(diskonFormatted);
            $('#inputdiscount').attr('data-value', inputdiskon);
            $('#inputtax').val(taxFormatted);
            $('#inputtax').attr('data-value', inputtax);
            $('#inputtotal').html(grandTotalFormatted);
        }

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
                ajax: "{{ route('invoicelayanan.index') }}",
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

            // CREATE NEW DATA INVOICE LAYANAN
            $('#btn-create-invoice').click(function() {
                $('#submit-user').val("create-jenis");
                $('#invoice_id').val('');
                $('.alert').hide();
                $('#user_form').trigger("reset");
                $('#invoicelayananModalHeading').html("ADD NEW INVOICE LAYANAN");
                $('#invoicelayananModal').modal('show');
                $('#invoice_id').val('');

                // Passing Booking Status
                $('#submit-invoice').attr('hidden', false)
            });

            // SUBMIT INVOICE LAYANAN
            $('#submit-invoice').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                $(".spinner-container").show();

                $.ajax({
                    url: "{{ route('invoicelayanan.store') }}",
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
                            $('#invoicelayananModal').modal('hide');

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

            // EDIT DATA INVOICE LAYANAN
            $('body').on('click', '#edit-invoice', function() {
                var invoice_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('invoicelayanan.edit') }}",
                    data: {
                        invoice_id: invoice_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#invoiceForm').trigger("reset");
                        $('#invoicelayananModalHeading').html("EDIT DATA INVOICE LAYANAN");
                        $('#invoicelayananModal').modal('show');
                        $('#invoice_id').val(response.invoice.invoice_id);
                        $("#title").val(response.invoice.title ?? '-').attr('disabled', false)
                        $("#name").val(response.invoice.name).attr('disabled', false)
                        $("#phone").val(response.invoice.phone).attr('disabled', false)
                        $("#email").val(response.invoice.email).attr('disabled', false)
                        $("#address").val(response.invoice.address).attr('disabled', false)
                        $("#code").val(response.invoice.code).attr('disabled', false)

                        var invoice_type = ''
                        if (response.invoice.renewal_status == 1) {
                            invoice_type = 'New'
                        } else if (response.invoice.renewal_status == 2) {
                            invoice_type = 'Renewal'
                        } else {
                            invoice_type = 'Monthly Subscription'
                        }

                        $("#renewal_status").val(invoice_type).attr('disabled', false)
                        $("#location").val(response.invoice.location).attr('disabled', false)
                        $("#due_date").val(formatCustomDate(response.invoice.due_date)).attr(
                            'disabled', false)
                        $("#dp").val(response.invoice.dp).attr('disabled', false)
                        $("#notes").val(response.invoice.notes).attr('disabled', false)

                        var detail_invoice = '';

                        $.each(response.invoice_detail.invoice.detail, function(index, value) {
                            lastRowIndex++; // Increment the last index for each new row

                            const spaces = value['spaces'];
                            const qty = value['qty'];
                            const unitQty = value['unit_qty'];
                            const unit = value['unit'];
                            const amount = value['amount'];
                            const amountFormatted = formatWithCommaSeparator(value[
                                'amount'])
                            const discount = value['discount'] == null ? 0 : value[
                                'discount'];
                            const subtotal = value['subtotal'];
                            let spaceName = '';

                            // Find the corresponding space name
                            for (let i = 0; i < spaceOptions.length; i++) {
                                if (spaceOptions[i].code === spaces) {
                                    spaceName = spaceOptions[i].name;
                                    spaceCode = spaceOptions[i].code;
                                    break;
                                }
                            }

                            const rowId =
                                `row_${lastRowIndex}`; // Unique ID for the entire row

                            detail_invoice += `<tr id="${rowId}">
                                                <td>
                                                     <input class="text-center form-control spaces" value="${spaceCode}"type="hidden" name="spaces[]" placeholder="Masukkan Pax">
                                                    ${spaceName}
                                                </td>
                                                <td>
                                                    <input class="text-center form-control qty" value="${qty}" type="text" name="qty[]" placeholder="Masukkan Pax">
                                                </td>
                                                <td>
                                                    <input class="text-center form-control unit_qty" value="${unitQty}" data-value="${unitQty}" type="text" name="unit_qty[]" placeholder="Masukkan Periode">
                                                    <input class="text-center form-control unit" value="${unit}"type="hidden" name="unit[]" placeholder="Masukkan Pax">
                                                    <span class="text-center">${unit}</span>
                                                </td>
                                                <td>
                                                    <input class="text-right form-control amount" value="${amount}" data-value="${amount}" name="amount[]" type="text" placeholder="Masukkan Harga">
                                                </td>
                                                <td>
                                                    <input class="text-right form-control discount" value="${discount}" name="discount[]" placeholder="Masukkan Discount">
                                                </td>
                                                 <td colspan="1" class="text-right">
                                                    <span class="subtotal">${formatWithCommaSeparator(amount)}</span>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>`;
                        });

                        $("#detail").html(detail_invoice);

                        // Calculate the total and update the total input for each row
                        $('[id^="row_"]').each(function() {
                            var row = $(this);
                            calculateRowTotal(row);
                            calculateGrandTotal();
                        });

                        // Show Additional Space
                        $("#title-additional-space").attr('hidden', false)
                        $("#additional-space").attr('hidden', false)
                        // Passing Booking Status
                        $('#submit-invoice').attr('hidden', false)
                    }
                });
            });

            $("#addRowBtn").on("click", function() {
                lastRowIndex++; // Increment the last index for the new row

                const spaces = $("#inputspaces").val();
                const qty = $("#inputqty").val();
                const unitQty = $("#inputunit_qty").val();
                const unit = $("#inputunit").val();
                const amount = $("#inputamount").val();
                const amountFormatted = formatWithCommaSeparator(amount)
                const discount = $("#inputdiscount").val();
                let spaceName = '';

                // Find the corresponding space name
                for (let i = 0; i < spaceOptions.length; i++) {
                    if (spaceOptions[i].code === spaces) {
                        spaceName = spaceOptions[i].name;
                        spaceCode = spaceOptions[i].code;
                        break;
                    }
                }

                const newRowId = `row_${lastRowIndex}`; // Unique ID for the new row

                const newRow = `<tr id="${newRowId}">
                        <td>
                            <input class="text-center form-control spaces" value="${spaceCode}" type="hidden" name="spaces[]" placeholder="Masukkan Pax">
                            ${spaceName}
                        </td>
                        <td>
                            <input class="text-center form-control qty" value="${qty}"type="text" name="qty[]" placeholder="Masukkan Pax">
                        </td>
                        <td>
                            <input class="text-center form-control unit_qty" value="${unitQty}" data-value="${unitQty}" type="text" name="unit_qty[]" placeholder="Masukkan Periode">
                            <input class="text-center form-control unit" value="${unit}"type="hidden" name="unit[]" placeholder="Masukkan Pax">
                            <span class="text-center">${unit}</span>
                        </td>
                        <td>
                            <input class="text-right form-control amount" value="${amount}" data-value="${amount}" name="amount[]" type="text" placeholder="Masukkan Harga">
                        </td>
                        <td>
                            <input class="text-right form-control discount" value="${discount}" name="discount[]" placeholder="Masukkan Discount">
                        </td>
                        <td colspan="1" class="text-right">
                            <span class="subtotal">${formatWithCommaSeparator(amount)}</span>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger removeRowBtn" data-row-id="${newRowId}"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr>`;

                // Append the new row to the table
                $("#detail").append(newRow);

                // Calculate the total and update the total input
                calculateRowTotal($(`#${newRowId}`));
                calculateGrandTotal();

                $("#inputspaces").val('')
                $("#inputqty").val('')
                $("#inputunit_qty").val('')
                $("#inputunit").val('')
                $("#inputamount").val('')
            });

            // Calculate and update the totals for each row
            $('body').on('input', '.qty, .amount, .discount, #inputdiscount, #inputtax, #inputtotal', function() {
                var row = $(this).closest('tr');
                calculateRowTotal(row);
                calculateGrandTotal();
            });

            // Remove row function
            $('body').on('click', '.removeRowBtn', function() {
                var rowId = $(this).data('row-id');
                $('#' + rowId).remove();
                calculateGrandTotal();
            });

            // RUNNING FUNCTION SUM GRAND TOTAL
            calculateGrandTotal();

            // GET PRICE ADDTIONAL SPACE
            $("#inputspaces").on('change', function() {
                var v_space = $(this).val()

                $.ajax({
                    type: "POST",
                    url: "{{ route('get.price.space') }}",
                    data: {
                        v_space: v_space,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response)

                        const amount = response.i_amount
                        const unit = response.v_unit
                        const pax = 1
                        const periode = 1

                        $("#inputqty").val(pax)
                        $("#inputunit_qty").val(periode)
                        $("#inputunit").val(unit)
                        $("#inputamount").val(amount)
                    }
                });
            })

            // SHOW DATA INVOICE LAYANAN
            $('body').on('click', '#detail-invoice', function() {
                var invoice_id = $(this).attr('data-id');
                $('.alert').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ route('invoicelayanan.edit') }}",
                    data: {
                        invoice_id: invoice_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('#submit-user').val("edit-user");
                        $('#invoiceForm').trigger("reset");
                        $('#invoicelayananModalHeading').html("SHOW DATA INVOICE LAYANAN");
                        $('#invoicelayananModal').modal('show');
                        $('#invoice_id').val(response.invoice.invoice_id);
                        $("#title").val(response.invoice.title ?? '-').attr('disabled', true)
                        $("#name").val(response.invoice.name).attr('disabled', true)
                        $("#phone").val(response.invoice.phone).attr('disabled', true)
                        $("#email").val(response.invoice.email).attr('disabled', true)
                        $("#address").val(response.invoice.address).attr('disabled', true)
                        $("#code").val(response.invoice.code).attr('disabled', true)

                        var invoice_type = ''
                        if (response.invoice.renewal_status == 1) {
                            invoice_type = 'New'
                        } else if (response.invoice.renewal_status == 2) {
                            invoice_type = 'Renewal'
                        } else {
                            invoice_type = 'Monthly Subscription'
                        }

                        $("#renewal_status").val(invoice_type).attr('disabled', true)
                        $("#location").val(response.invoice.location).attr('disabled', true)
                        $("#due_date").val(formatCustomDate(response.invoice.due_date)).attr(
                            'disabled', true)
                        $("#dp").val(response.invoice.dp).attr('disabled', true)
                        $("#notes").val(response.invoice.notes).attr('disabled', false)

                        var detail_invoice = '';

                        $.each(response.invoice_detail.invoice.detail, function(index, value) {
                            lastRowIndex++; // Increment the last index for each new row

                            const spaces = value['spaces'];
                            const qty = value['qty'];
                            const unitQty = value['unit_qty'];
                            const unit = value['unit'];
                            const amount = value['amount'];
                            const amountFormatted = formatWithCommaSeparator(value[
                                'amount'])
                            const discount = value['discount'] == null ? 0 : value[
                                'discount'];
                            const subtotal = value['subtotal'];
                            let spaceName = '';

                            // Find the corresponding space name
                            for (let i = 0; i < spaceOptions.length; i++) {
                                if (spaceOptions[i].code === spaces) {
                                    spaceName = spaceOptions[i].name;
                                    spaceCode = spaceOptions[i].code;
                                    break;
                                }
                            }

                            const rowId =
                                `row_${lastRowIndex}`; // Unique ID for the entire row

                            detail_invoice += `<tr id="${rowId}">
                                                <td>
                                                     <input class="text-center form-control spaces" value="${spaceCode}"type="hidden" name="spaces[]" placeholder="Masukkan Pax">
                                                    ${spaceName}
                                                </td>
                                                <td>
                                                    <input class="text-center form-control qty" value="${qty}" type="text" name="qty[]" placeholder="Masukkan Pax" disabled>
                                                </td>
                                                <td>
                                                    <input class="text-center form-control unit_qty" value="${unitQty}" data-value="${unitQty}" type="text" name="unit_qty[]" placeholder="Masukkan Periode" disabled>
                                                    <input class="text-center form-control unit" value="${unit}"type="hidden" name="unit[]" placeholder="Masukkan Pax">
                                                    <span class="text-center">${unit}</span>
                                                </td>
                                                <td>
                                                    <input class="text-right form-control amount" value="${amount}" data-value="${amount}" name="amount[]" type="text" placeholder="Masukkan Harga" disabled>
                                                </td>
                                                <td>
                                                    <input class="text-right form-control discount" value="${discount}" name="discount[]" placeholder="Masukkan Discount" disabled>
                                                </td>
                                                 <td colspan="1" class="text-right">
                                                    <span class="subtotal">${formatWithCommaSeparator(amount)}</span>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>`;
                        });

                        $("#detail").html(detail_invoice);

                        // Calculate the total and update the total input for each row
                        $('[id^="row_"]').each(function() {
                            var row = $(this);
                            calculateRowTotal(row);
                            calculateGrandTotal();
                        });

                        // Show Additional Space
                        $("#title-additional-space").attr('hidden', true)
                        $("#additional-space").attr('hidden', true)

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
                                url: "{{ route('invoicelayanan.destroy') }}",
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
                    url: "{{ route('invoicelayanan.sorting') }}",
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
                    ajax: "{{ route('invoicelayanan.index') }}",
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
