@extends('includes.header')
@section('pageTitle', 'Pending bills')
@push('styles')
<link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
<style>
#ipdHistoryList_wrapper {
    padding-left: 0;
    padding-right: 0;
}

#ipdHistoryList_wrapper i {
    cursor: pointer;
}

#ipdHistoryList_wrapper i.p-10 {
    padding: 8px;
}

body {
    counter-reset: Serial;
}

#billingList tbody tr td:first-child:before {
    counter-increment: Serial;
    content: counter(Serial);
}

#patientModal input[readonly],
#patientModal select:not(#patient_type)[readonly],
#patientModal textarea[readonly],
#ipdModal input[readonly],
#ipdModal select:not(#patient_type)[readonly],
#ipdModal textarea[readonly] {
    opacity: 1;
    background-color: transparent;
}
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="d-flex">
                    <div>
                        <h4 class="card-title m-b-0 text-white">Pending bills of {{session('name')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label for="date_from" class="col-sm-4 control-label">Date from :
                            </label>
                            <div class="col-sm-8">
                                <div class="controls">
                                    <input type="text" name="date_from" class="form-control datepicker" id="date_from"
                                        placeholder="Date from">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <label for="date_to" class="col-sm-4 control-label">Date to :
                            </label>
                            <div class="col-sm-8">
                                <div class="controls">
                                    <input type="text" name="date_to" class="form-control datepicker" id="date_to"
                                        placeholder="Date to">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="pull-right btn btn-secondary active box-s shadow-none" type="button">Total
                            amount: <span id="total_amount">0</span></button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="ipdHistoryList" class="p-l-0 p-r-0 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Bill No.</th>
                                <th>P.ID</th>
                                <th>Name</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Grand total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Billing date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- dynamic table will be load here -->

                        </tbody>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- /refundDoc doc modal -->
<div id="patientModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tooltipmodel">Patient Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {{ csrf_field() }}
            <input type="hidden" id="id_patient" name="id_patient">

            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 control-label">Name: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="controls">
                                        <input type="text" maxlength="60" name="name" class="form-control"
                                            id="patientName" placeholder="Name" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="age" class="col-sm-3 control-label">Age: </label>
                                <div class="col-sm-9">
                                    <div class="controls">
                                        <input type="text" name="age" class="form-control inputmask" id="age"
                                            placeholder="__ years __ months __ days" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 control-label">Phone: <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="controls">
                                        <input type="text" name="phone" class="form-control phone-inputmask" id="phone"
                                            placeholder="Phone" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="guardian_name" class="col-sm-3 control-label">Guardian Name:</label>
                                <div class="col-sm-9">
                                    <div class="controls">
                                        <input type="text" maxlength="60" name="guardian_name" class="form-control"
                                            id="guardian_name" placeholder="Guardian Name" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label">Sex: </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select readonly name="sex" id="sex" class="form-control custom-select">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label">Blood group: </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select readonly name="blood_group" id="blood_group"
                                            class="form-control custom-select">
                                            <option value="">Select blood group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="nid_number" class="col-sm-3 control-label">NID number: </label>
                                <div class="col-sm-9">
                                    <div class="controls">
                                        <input type="number" maxlength="20" name="nid_number" class="form-control"
                                            id="nid_number" placeholder="NID number" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="present_address" class="col-sm-3 control-label">Present address:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" maxlength="512" rows="3" class="form-control"
                                            name="present_address" id="present_address" placeholder="Present address"
                                            readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="permanent_address" class="col-sm-3 control-label">Permanent address:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" maxlength="512" rows="3" class="form-control"
                                            name="permanent_address" id="permanent_address"
                                            placeholder="Permanent address" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="emergency_contact_person" class="col-sm-3 control-label">Emergency
                                    contact name: </label>
                                <div class="col-sm-9">
                                    <div class="controls">
                                        <input type="text" maxlength="60" name="emergency_contact_person"
                                            class="form-control" id="emergency_contact_person"
                                            placeholder="Emergency contact name" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="emergency_contact_no" class="col-sm-3 control-label">Emergency
                                    contact number: </label>
                                <div class="col-sm-9">
                                    <div class="controls">
                                        <input type="number" maxlength="20" name="emergency_contact_no"
                                            class="form-control" id="emergency_contact_no"
                                            placeholder="Emergency contact number" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="remark" class="col-sm-3 control-label">Remark: </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" maxlength="512" rows="3" class="form-control"
                                            name="remark" id="remark" placeholder="Remark" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                </div>
                <!--/row-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /end modal -->


<!-- /refundDoc doc modal -->
<div id="billModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tooltipmodel">Service list</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <input type="hidden" id="id_patient" name="id_patient">
                <table id="billingList" class="p-l-0 p-r-0 table color-bordered-table info-bordered-table">
                    <thead>
                        <tr>
                            <th>Serial no.</th>
                            <th>Service name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- dynamic table will be load here -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /end modal -->

<!-- /refundDoc doc modal -->
<div id="ipdModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tooltipmodel">IPD details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <input type="hidden" id="id_patient" name="id_patient">
                <div class="row">
                    <div class="col-md-12">
                        <div class="demo-radio-button">
                            <h4 id="ward_or_cabin"></h4>
                        </div>
                    </div>
                </div>
                <div class="row" id="ward-field" style="display: none;">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="parent_head" class="col-sm-3 control-label">Ward
                                no:</label>
                            <div class="col-sm-9">
                                <div class="input-group">

                                    <input type="text" name="id_ward" class="form-control" id="id_ward" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="parent_head" class="col-sm-3 control-label">Bed
                                no:</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="id_ward_bed" class="form-control" id="id_ward_bed"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row" id="cabin-field" style="display: none;">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="parent_head" class="col-sm-3 control-label">Cabin
                                no:</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="id_cabin" class="form-control" id="id_cabin" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="parent_head" class="col-sm-3 control-label">Medical
                                condition:</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="medical_condition" class="form-control"
                                        id="medical_condition" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12" id="doctor_search">
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Doctor:
                            </label>
                            <div class="col-sm-9">
                                <input type="hidden" id="id_doctor" name="id_doctor">
                                <div class="input-group">
                                    <input type="text" maxlength="128" class="form-control" name="doctor_name"
                                        id="doctor_name" placeholder="Search doctor" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->


                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="admission_date" class="col-sm-3 control-label">Admission date:
                                <span class="text-danger"></span>
                            </label>
                            <div class="col-sm-9">
                                <div class="controls">
                                    <input type="text" name="booked_on" class="form-control" id="admission_date"
                                        placeholder="Admission date" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="available_on" class="col-sm-3 control-label">Release date:
                            </label>
                            <div class="col-sm-9">
                                <div class="controls">
                                    <input type="text" name="available_on" class="form-control" id="available_on"
                                        placeholder="Release date" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /end modal -->

<!-- /delete doc modal -->
<div id="deleteDoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tooltipmodel">Are you sure to delete this Bill?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn waves-effect waves-light btn-outline-danger"
                    data-dismiss="modal">Cancel</button>
                <button id="delete_yes" type="button" class="btn waves-effect waves-light btn-danger"
                    data-dismiss="modal">Confirm</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /end modal -->

<!-- /Due receive User modal -->
<div id="dueReceiveModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tooltipmodel">Are you sure to receive due amount?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-footer">
                <button id="due_receive_yes" type="button" class="waves-effect waves-light btn btn-primary"
                    data-dismiss="modal">Yes</button>
                <button type="button" class="waves-effect waves-light btn btn-outline-primary"
                    data-dismiss="modal">No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /end modal -->

@endsection


@push('scripts')
<!-- start - This is for export functionality only -->
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/buttons.print.min.js')}}"></script>
<script>
$(document).ready(function() {
    $(".inputmask").inputmask("99 ye\\ars 99 months 99 d\\ays");
    $(".phone-inputmask").inputmask("99999999999");
});
// converting today date
function dateToMonth(date) {
    var strArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var d = date.getDate();
    var m = strArray[date.getMonth()];
    var y = date.getFullYear();
    return '' + (d <= 9 ? '0' + d : d) + ' ' + m + ' ' + y;
}

// today
Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

var today = dateToMonth(new Date(new Date().toDateInputValue()));
collectionAndPendingByDate(today, today);
$('#date_from').val(today);
$('#date_to').val(today);


var startDateParam = $('#date_from').val();
var endDateParam = $('#date_to').val();

$("#date_from").datepicker({
    dateFormat: "dd M yy",
    onSelect: function() {
        var dt2 = $('#date_to');
        var startDate = $(this).datepicker('getDate');
        var minDate = $(this).datepicker('getDate');
        //first day which can be selected in dt2 is selected date in dt1
        dt2.datepicker('option', 'minDate', minDate);
    },
    autoclose: true,
    maxDate: new Date()
});
$("#date_to").datepicker({
    dateFormat: "dd M yy",
    autoclose: true,
    // maxDate: new Date()
});

$('#date_to').change(function() {
    $(this).datepicker('hide');
    var startDate = new Date(
        $('#date_from').val()
    );
    var endDate = new Date(
        $('#date_to').val()
    );
    if (endDate >= startDate) {
        startDateParam = $('#date_from').val();
        endDateParam = $('#date_to').val();
        collectionAndPendingByDate(startDateParam, endDateParam);
        reInitializeAddedServicesDt();
    } else {
        $.toast({
            heading: 'Date to is smaller then Date from. Please try another to select Bigger date.',
            position: 'bottom-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 6500,
            stack: 6
        });
    }
});


function collectionAndPendingByDate(startDateParam, endDateParam) {

    $.post("{{ url('/pendingTotal') }}", {
            "_token": "{{ csrf_token() }}",
            'startDate': startDateParam,
            'endDate': endDateParam,
        },
        function(data, textStatus, xhr) {
            $('#total_amount').html(Number(data[0].core_income).toFixed(2));
        });

}


// list data

var addedServicesTable = function() {

    return $('#ipdHistoryList').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('userPendingBillsData') }}/" + startDateParam + '/' + endDateParam,
            type: 'GET',
        },
        "order": [
            [1, 'desc']
        ],

        columns: [{
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
            {
                data: 'id_bill',
                name: 'id_bill'
            },
            {
                data: 'id_patient',
                name: 'id_patient'
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
                data: 'discount',
                name: 'discount'
            },
            {
                data: 'grand_total',
                name: 'grand_total'
            },
            {
                data: 'paid',
                name: 'paid'
            },
            {
                data: 'due',
                name: 'due'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'acc_status',
                name: 'acc_status'
            },

        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf',
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-primary mr-1',
                customize: function(win) {
                    // $(win.document.body)
                    // .css( 'font-size', '10pt' )
                    // .prepend(
                    // 	'<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                    // 	);

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            },

        ]
    });
}

var table = $('#ipdHistoryList').DataTable();
// Apply the filter
table.columns().every(function() {
    var column = this;

    $('input', this.footer()).on('keyup change', function() {
        column
            .search(this.value)
            .draw();
    });
});

var dataTableAddedServices;
dataTableAddedServices = addedServicesTable();

function reInitializeAddedServicesDt() {
    if (typeof dataTableAddedServices != 'undefined') {
        dataTableAddedServices.destroy();
    }
    dataTableAddedServices = addedServicesTable();
}


$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
$('body').tooltip({selector: '[data-toggle="tooltip"]'});


// edit data
$('body').on('click', '.patientData', function() {
    var id_patient = $(this).data('id');
    $('#id_patient').val(id_patient);
    console.log("TCL: id_patient", id_patient)

    $.get("{{url('/patientInfoById')}}/" + id_patient, function(data) {
        console.log("TCL: data", data)
        $('#patientModal').modal('show');
        $('#patientName').val(data[0].name);
        $('#phone').val(data[0].phone);
        $('#guardian_name').val(data[0].guardian_name);
        $('#age').val(data[0].age);
        $('#sex').val(data[0].sex);
        $('#blood_group').val(data[0].blood_group);
        $('#nid_number').val(data[0].nid_number);
        $('#present_address').val(data[0].present_address);
        $('#permanent_address').val(data[0].permanent_address);
        $('#emergency_contact_person').val(data[0].emergency_contact_person);
        $('#emergency_contact_no').val(data[0].emergency_contact_no);
        $('#edit_remark').val(data[0].remark);
    });
});

$('body').on('click', '.ipdData', function() {
    var id_patient = $(this).data('id');
    $('#id_patient').val(id_patient);

    $.get("{{ url('/ipdDetailsByBillId') }}/" + id_patient, function(data) {
        console.log("TCL: data", data)
        $('#ipdModal').modal('show');
        $('#ward_or_cabin').html(data[0].ward_or_cabin);
        if (data[0].ward_or_cabin == 'Ward') {
            $('#ward-field').show();
            $('#cabin-field').hide();
        } else if (data[0].ward_or_cabin == 'Cabin') {
            $('#cabin-field').show();
            $('#ward-field').hide();
        }
        $('#doctor_name').val(data[0].doctor_name);
        $('#medical_condition').val(data[0].diseas_name);
        $('#admission_date').val(data[0].booked_on);
        $('#available_on').val(data[0].available_on);
        $('#id_ward').val(data[0].ward_name);
        $('#id_cabin').val(data[0].cabin_no);
        $('#id_ward_bed').val(data[0].bed_no);
    });
});

// edit data
$('body').on('click', '.billData', function() {
    var id_patient = $(this).data('id');
    $('#id_patient').val(id_patient);

    $.get("{{ url('/billServices') }}/" + id_patient, function(data) {
        $('#billModal').modal('show');
        var row = '';
        $('#billingList tbody').empty();
        $.each(data, function(i, value) {
            row = '<tr id="' + data[i].id_accounts_head +
                '" class="service_row"><td class="serial_number"></td><td>' +
                data[
                    i].name +
                '</td><td>' +
                data[i].rate + '</td>></tr>';
            // $('#billingList').append($row);
            $('#billingList tbody').append(row);
        })
    });
});

$('body').on('click', '.printData', function() {
    var id_patient = $(this).data('id');
    $('#id_patient').val(id_patient);
    window.open("{{url('/ipdinvoice')}}/" + id_patient, '_blank');
});


// Setup - add a text input to each footer cell
$('#ipdHistoryList tfoot th').each(function() {
    var title = $('#ipdHistoryList thead th').eq($(this).index()).text();
    $(this).html('<input class="form-control" type="text" placeholder="' + title +
        ' search" />');
});




// delete data
var id_bill = "";
$('body').on('click', '.deleteData', function() {
    id_bill = $(this).data('id');
    $('#deleteDoc').modal('show');
});

// delete yes click
$("#delete_yes").click(function(event) {
    $.post("{{ url('/billDelete') }}", {
            "_token": "{{ csrf_token() }}",
            'id_bill': id_bill,
        },
        function(data, textStatus, xhr) {
            if (data.result == "success") {
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 4000,
                    stack: 6
                });
                table.ajax.reload(null, false);
                var dateFrom = $('#date_from').val();
                var dateTo = $('#date_to').val();
                collectionAndPendingByDate(dateFrom, dateTo);
            } else if (data.result == "fail") {
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 6000,
                    stack: 6
                });
            }
        });
});


var id_due_bill = "";
var grand_total_amnt = "";

$('body').on('click', '.dueData', function() {
    id_due_bill = $(this).data('id');
    grand_total_amnt = $(this).closest('tr').find('td').eq(6).text();
    $('#dueReceiveModal').modal('show');
});



$("#due_receive_yes").click(function(event) {
    $.post("{{ url('/dueAmountReceive') }}", {
            "_token": "{{ csrf_token() }}",
            'id_bill': id_due_bill,
            'grand_total': grand_total_amnt
        },
        function(data, textStatus, xhr) {
            if (data.result == "success") {
                table.ajax.reload(null, false);
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 800,
                    stack: 1
                });
            } else if (data.result == "fail") {
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3000,
                    stack: 1
                });
            }
        });
});
</script>

@endpush