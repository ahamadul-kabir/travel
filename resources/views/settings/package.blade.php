@extends('includes.header')
@section('pageTitle', 'package')
@push('styles')
<link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
<style>
    #packageList_wrapper {
        padding-left: 0;
        padding-right: 0;
    }

    #packageList_wrapper i {
        cursor: pointer;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Add package</h4>
            </div>
            <div class="card-body">
                <form id="add_package_form">
                    <div class="form-body">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="foundation_or_visiting" class="col-sm-3 control-label">Foundation /
                                        Visiting:<span class="text-danger">*</span></label>
                                        <div class="col-sm-9 demo-radio-button">
                                            <input class="with-gap" name="foundation_or_visiting" type="radio"
                                            id="radio_foundation" value="Foundation" checked="">
                                            <label for="radio_foundation">Foundation</label>

                                            <input class="with-gap" name="foundation_or_visiting" type="radio"
                                            id="radio_visiting" value="Visiting">
                                            <label for="radio_visiting">Visiting</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="ward_or_cabin" class="col-sm-3 control-label">Ward / Cabin:<span
                                            class="text-danger">*</span></label>
                                            <div class="col-sm-9 demo-radio-button">
                                                <input class="with-gap" name="ward_or_cabin" type="radio" id="radio_ward"
                                                value="Ward" checked="">
                                                <label for="radio_ward">Ward</label>

                                                <input class="with-gap" name="ward_or_cabin" type="radio" id="radio_cabin"
                                                value="Cabin">
                                                <label for="radio_cabin">Cabin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="package_name" class="col-sm-3 control-label">Package name:<span
                                                class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" maxlength="100" class="form-control" name="package_name"
                                                        id="package_name" placeholder="Package name" require>
                                                    </div>
                                                </div>

                                                <div style="display: none;">
                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <input readonly type="text" maxlength="100" class="form-control"
                                                            name="foundation_or_visiting_input"
                                                            id="foundation_or_visiting_input" placeholder="Foundation" require>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <input readonly type="text" maxlength="100" class="form-control"
                                                            name="ward_or_cabin_input" id="ward_or_cabin_input"
                                                            placeholder="Ward" require>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="package_cost" class="col-sm-3 control-label">Package cost:<span
                                                    class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="number" maxlength="10" class="form-control" value="0"
                                                            name="package_cost" id="package_cost" placeholder="Package Cost"
                                                            onKeyUp="if(this.value<0){this.value='0';}" require>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <!--/span-->
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="remark" class="col-sm-3 control-label">Remark:
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <textarea type="text" maxlength="256" rows="3" class="form-control"
                                                            name="remark" id="remark" placeholder="Remark"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                    </div>
                                    <hr class="m-t-0">
                                    <div class="form-actions text-right">
                                        <button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-info"> <i
                                            class="fa fa-check"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end of card -->
                        </div>
                        <div class="col-5">
                            <div class="card hide" id="facility_table_wrap">
            <!-- <div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Selected facilities list</h4>
			</div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="facilitiesList" class="p-l-0 p-r-0 table color-bordered-table info-bordered-table">
                        <thead>
                            <tr>
                                <th>Facilities with rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- dynamic table will be load here -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" id="package-list">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Package list</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="packageList" class="p-l-0 p-r-0 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Package name</th>
                                <th>Cost</th>
                                <th>Remark</th>
                                <th>Created by</th>
                                <th>Created on</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- dynamic table will be load here -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- /edit doc modal -->
<div class="modal fade bs-example-modal-lg" id="editDoc" tabindex="-1" role="dialog" aria-labelledby="editCabinLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit_package_form">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title" id="showPackageServices"></h4> <span
                    style="margin-left: 5px; font-weight: bold;">(<strong id="showPackageType"></strong>)</span>
                    <input type="hidden" id="id_package_services" name="id_package_services">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-body">



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="foundation_or_visiting" class="col-sm-3 control-label">Foundation /
                                            Visiting:<span class="text-danger">*</span></label>
                                            <div class="col-sm-9 demo-radio-button">
                                                <input class="with-gap" name="foundation_or_visiting" type="radio"
                                                id="edit_radio_foundation" value="Foundation" checked="">
                                                <label for="edit_radio_foundation">Foundation</label>

                                                <input class="with-gap" name="foundation_or_visiting" type="radio"
                                                id="edit_radio_visiting" value="Visiting">
                                                <label for="edit_radio_visiting">Visiting</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="ward_or_cabin" class="col-sm-3 control-label">Ward / Cabin:<span
                                                class="text-danger">*</span></label>
                                                <div class="col-sm-9 demo-radio-button">
                                                    <input class="with-gap" name="ward_or_cabin" type="radio" id="edit_radio_ward"
                                                    value="Ward" checked="">
                                                    <label for="edit_radio_ward">Ward</label>

                                                    <input class="with-gap" name="ward_or_cabin" type="radio" id="edit_radio_cabin"
                                                    value="Cabin">
                                                    <label for="edit_radio_cabin">Cabin</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="edit_package_name" class="col-sm-3 control-label">Package name:<span
                                                    class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text" maxlength="100" class="form-control"
                                                            name="edit_package_name" id="edit_package_name"
                                                            placeholder="Package name" require>
                                                        </div>
                                                    </div>

                                                    <div style="display: none;">
                                                        <div class="col-sm-3">
                                                            <div class="input-group">
                                                                <input readonly type="text" maxlength="100" class="form-control"
                                                                name="foundation_or_visiting_input"
                                                                id="foundation_or_visiting_input" placeholder="Foundation" require>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="input-group">
                                                                <input readonly type="text" maxlength="100" class="form-control"
                                                                name="ward_or_cabin_input" id="ward_or_cabin_input"
                                                                placeholder="Ward" require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!--/row-->
                                        <div class="row">
                                            <!--/span-->
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="edit_package_cost" class="col-sm-3 control-label">Package cost:<span
                                                        class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <input type="number" maxlength="10" class="form-control" value="0"
                                                                name="edit_package_cost" id="edit_package_cost"
                                                                placeholder="Package Cost" onKeyUp="if(this.value<0){this.value='0';}"
                                                                require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <!--/span-->
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="edit_remark" class="col-sm-3 control-label">Remark:
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <textarea type="text" maxlength="256" rows="3" class="form-control"
                                                                name="edit_remark" id="edit_remark" placeholder="Remark"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn waves-effect waves-light btn-outline-info"
                                        data-dismiss="modal">Cancel</button>
                                        <button id="edit_save_btn" type="submit"
                                        class="btn waves-effect waves-light btn-info">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
<!-- <div class="modal fade bs-example-modal-lg" id="editDoc" tabindex="-1" role="dialog" aria-labelledby="editCabinLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="showPackageServices">Add info </h4> <span
                    style="margin-left: 5px; font-weight: bold;">(<strong id="showPackageType"></strong>)</span>
                <input type="hidden" id="id_package_services" name="id_package_services">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="packageFacilitiesList" class="p-l-0 p-r-0 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Rate</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- /end modal -->



<!-- /delete doc modal -->
<div id="deleteDoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tooltipmodel">Are you sure to delete this package?</h4>
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

@endsection

@push('scripts')
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>

<script>
    $("input[name='foundation_or_visiting']").click(function() {
        var radioValue = $("input[name='foundation_or_visiting']:checked").val();
        if (radioValue) {
            $("#foundation_or_visiting_input").val(radioValue);
        }
    });

    $("input[name='ward_or_cabin']").click(function() {
        var radioValue = $("input[name='ward_or_cabin']:checked").val();
        if (radioValue) {
            $("#ward_or_cabin_input").val(radioValue);
        }
    });


// package list data
var table = $('#packageList').DataTable({

    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('packageList.index') }}",
        type: 'GET',
    },
    "order": [
    [0, 'asc']
    ],


    columns: [
        {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
    },
    {
        data: 'package_name',
        name: 'package_name'
    },
    {
        data: 'rate',
        name: 'rate'
    },
    {
        data: 'remark',
        name: 'remark'
    },
    {
        data: 'name',
        name: 'name'
    },
    {
        data: 'create_date',
        name: 'create_date'
    },
    
    ]
});

// show package data
var id_package_services = "";
$('body').on('click', '.detailsData', function() {

    $('#packageFacilitiesList').DataTable().clear().destroy();
    id_package_services = $(this).data('id');
    $('#editDoc').modal('show');
    var packageType = $(this).parent().siblings(":first").text();
    $('#showPackageType').text(packageType);

    $.get("{{url('/packageDetailsById')}}/" + id_package_services, function(data) {
        $('#showPackageServices').text(data[0].package_name);
        console.log(data);

        // foundation_or_visiting
        if (data[0].foundation_or_visiting === 'Foundation') {
            $('#edit_radio_foundation').prop("checked", true);
        } else if (data[0].foundation_or_visiting === 'Visiting') {
            $('#edit_radio_visiting').prop("checked", true);
        }
        // ward_or_cabin
        if (data[0].ward_or_cabin === "Cabin") {
            $('#edit_radio_cabin').prop("checked", true);
        } else if (data[0].ward_or_cabin === "Ward") {
            $('#edit_radio_ward').prop("checked", true);
        }

        $('#id_package_services').val(data[0].id_accounts_head); 
        $('#edit_package_name').val(data[0].name);
        $('#edit_package_name').val(data[0].name);
        $('#edit_package_cost').val(data[0].rate);
        $('#edit_remark').val(data[0].remark);
        // $.each(data, function(i, value) {
        //     $('#packageFacilitiesList').append('<tr><td>' + data[i].subhead_name +
        //         '</td><td>' + data[i].rate + '</td></tr>');
        // })
    });
});




// facilities search 
var facilitiesArray = [];

function isInArray(value, array) {
    return array.indexOf(value) > -1;
}

var hint_package_cost = 0;

$("#facilities").autocomplete({
    source: "{{url('/searchIncomeSubhead')}}",
    minLength: 1,
    response: function(event, ui) {
        if (!ui.content.length) {
            $.toast({
                heading: 'No results found.',
                position: 'bottom-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3500,
                stack: 4
            });
        }
    },
    select: function(event, ui) {
        $('#facility_table_wrap').show('400');

        // console.log(ui.item.value);
        // console.log(ui.item.id);
        if (isInArray(ui.item.id, facilitiesArray)) {
            $.toast({
                heading: 'This facility already added. Please select other facility.',
                position: 'bottom-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3500,
                stack: 6
            });
        } else {
            //   if(isNaN(parseFloat(hint_package_cost)) === true){
            //       hint_package_cost = 0;
            //   }
            hint_package_cost = parseFloat(ui.item.rate) + parseFloat(hint_package_cost);
            $('#package_cost').val(hint_package_cost);
            $('#facilitiesList').append('<tr><td>' + ui.item.value + '</td></tr>');
        }

        facilitiesArray.push(ui.item.id);
        $("#facilities_array").val("");
        $("#facilities_array").val(facilitiesArray);

        console.log(facilitiesArray);
        $(this).val('');
        return false;
    }
});


// data add
$("#add_package_form").on('submit', function(event) {
    event.preventDefault();
    $("#add_save_btn").prop("disabled", true);

    var form_data = document.getElementById("add_package_form");
    var fd = new FormData(form_data);
    $.ajax({
        url: "{{ url('/addPackage') }}",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
            console.log(data);
            if (data.result == "success") {
                table.ajax.reload(null, false);
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 1
                });
                facilitiesArray = [];
                hint_package_cost = 0;
                $('#packageList').DataTable();
                // $("#facilitiesList tr").empty();
                $("#facilitiesList > tbody").html("");
                $("#package_name").val("");
                $("#package_cost").val("");
                $("#remark").val("");
                $("#facilities_array").val("");
                $('#facility_table_wrap').hide('400');
            } else if (data.result == "fail") {
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3500,
                    stack: 1
                });
            } else if (data.result == "error") {
                $.each(data.message, function(index, val) {
                    $.toast({
                        heading: 'Please fill all required fields.',
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 1
                    });
                });
                // if ($('#package_name').val() == '') {
                // 	$('#package_name').css('border-color', 'red');
                // }
                // if ($('#facilities').val() == '') {
                // 	$('#facilities').css('border-color', 'red');
                // }
                // if ($('#package_cost').val() == '') {
                // 	$('#package_cost').css('border-color', 'red');
                // }
            }
            $("#add_save_btn").prop("disabled", false);
        }
    });

});


// Edit data
$("#edit_package_form").on('submit', function(event) {
    event.preventDefault();
    $("#edit_save_btn").prop("disabled", true);

    var form_data = document.getElementById("edit_package_form");
    var fd = new FormData(form_data);
    $.ajax({
        url: "{{ url('/editPackage') }}",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
            console.log(data);
            if (data.result == "success") {
                table.ajax.reload(null, false);
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3000,
                    stack: 6
                });

                $('#packageList').DataTable();
                $('#editDoc').modal('hide');
            } else if (data.result == "fail") {
                $.toast({
                    heading: data.message,
                    position: 'bottom-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3500,
                    stack: 6
                });
            } else if (data.result == "error") {
                $.each(data.message, function(index, val) {
                    $.toast({
                        heading: data.message[index],
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 6
                    });
                });
            }
            $("#edit_save_btn").prop("disabled", false);
        }
    });

});


// delete data
var id_cabin_for_delete = "";
$('body').on('click', '.deleteData', function() {
    id_cabin_for_delete = $(this).data('id');
    $('#deleteDoc').modal('show');
});

// delete yes click
$("#delete_yes").click(function(event) {
    $.post("{{ url('packageDelete') }}", {
        "_token": "{{ csrf_token() }}",
        'id': id_cabin_for_delete,
    },
    function(data, textStatus, xhr) {
        if (data.result == "success") {
            $.toast({
                heading: data.message,
                position: 'bottom-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            table.ajax.reload(null, false);
        } else if (data.result == "fail") {
            $.toast({
                heading: data.message,
                position: 'bottom-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3000,
                stack: 6
            });
        }
    });
});
</script>

@endpush