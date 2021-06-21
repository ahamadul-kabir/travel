@extends('includes.header')
@section('pageTitle', 'Doctor')
@push('styles')
<style>
#docList_wrapper {
    padding-left: 0;
    padding-right: 0;
}

#docList_wrapper i {
    cursor: pointer;
}

#docList_wrapper table.table-bordered.dataTable tbody td:nth-child(6) {
    max-width: 160px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.help-phone ul {
    list-style: none;
    margin-left: 0;
    padding-left: 0;
}
</style>
@endpush



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Add new doctor</h4>
            </div>
            <div class="card-body">
                <form id="doctor_add_form">
                    <div class="form-body">
                        {{ csrf_field() }}
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Select type:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="type" class="form-control custom-select" require>
                                                <option value="Foundation">Foundation</option>
                                                <option value="Visiting">Visiting</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="eamil" class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="email" maxlength="120" class="form-control" id="eamil"
                                                name="email" placeholder="Email">
                                            <div class="help-block" style="display: none;">
                                                <ul role="alert">
                                                    <li>Please enter a valid email address</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 control-label">Name:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="text" maxlength="60" name="doctor_name" class="form-control"
                                                id="name" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 control-label">Phone:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="number" name="phone" class="form-control" id="phone"
                                                placeholder="Phone">
                                            <div class="help-phone" style="display: none;">
                                                <ul role="alert">
                                                    <li>Please enter a valid mobile no.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="department" class="col-sm-3 control-label">Department: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" maxlength="60" class="form-control" name="department"
                                                id="department" placeholder="Department">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="degree" class="col-sm-3 control-label">Degree: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" maxlength="35" class="form-control" name="degree"
                                                id="degree" placeholder="Degree">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="specializes" class="col-sm-3 control-label">Specializes in: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" maxlength="160" class="form-control" name="specialty"
                                                id="specializes" placeholder="Specializes in">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="room-no" class="col-sm-3 control-label">Room no: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" min="1" maxlength="10" class="form-control"
                                                name="room_no" id="room-no" placeholder="Room no"
                                                onKeyUp="if(this.value<0){this.value='0';}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 control-label">Address: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea type="text" maxlength="256" rows="3" class="form-control"
                                                name="address" id="address" placeholder="Address"></textarea>
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
                                            <textarea type="text" maxlength="256" rows="3" class="form-control"
                                                name="remark" id="remark" placeholder="Remark"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <hr>
                    <div class="form-actions text-right">
                        <button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-info"> <i
                                class="fa fa-check"></i> Save</button>
                        <!-- <button type="button" id="sa-warning" class="btn btn-inverse">Cancel</button> -->
                    </div>
                </form>
            </div>
        </div>
        <!-- end of card -->

        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Doctor List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="docList" class="p-l-0 p-r-0 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Actions</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Dept</th>
                                <th>Room</th>
                                <th>Degree</th>
                                <th>Specializes in</th>
                                <th>Email</th>
                                <th>Phone</th>
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
<div class="modal fade bs-example-modal-lg" id="editDoc" tabindex="-1" role="dialog" aria-labelledby="editDocLabel1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editDocLabel1">Edit doctor info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="doctor_edit_form">
                    <div class="form-body">
                        {{ csrf_field() }}
                        <input type="hidden" id="id_doctor_edit" name="id_doctor_edit">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Select type:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select id="edit_doctor_type" name="edit_doctor_type"
                                                class="form-control custom-select">
                                                <option value="Foundation">Foundation</option>
                                                <option value="Visiting">Visiting</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_doctor_eamil" class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="text" maxlength="256" class="form-control"
                                                id="edit_doctor_eamil" name="edit_doctor_eamil" placeholder="Email">
                                            <div class="help-block" style="display: none;">
                                                <ul role="alert">
                                                    <li>Please enter a valid email address</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_doctor_name" class="col-sm-3 control-label">Name:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="text" maxlength="60" name="edit_doctor_name"
                                                class="form-control" id="edit_doctor_name" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_phone" class="col-sm-3 control-label">Phone:<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="number" maxlength="15" name="edit_phone" class="form-control"
                                                id="edit_phone" placeholder="Phone">
                                            <div class="help-phone" style="display: none;">
                                                <ul role="alert">
                                                    <li>Please enter a valid mobile no.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_department" class="col-sm-3 control-label">Department: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" maxlength="35" class="form-control"
                                                name="edit_department" id="edit_department" placeholder="Department">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_degree" class="col-sm-3 control-label">Degree: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" maxlength="35" class="form-control" name="edit_degree"
                                                id="edit_degree" placeholder="Degree">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_specialty" class="col-sm-3 control-label">Specializes in: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" maxlength="160" class="form-control"
                                                name="edit_specialty" id="edit_specialty" placeholder="Specializes in">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_room_no" class="col-sm-3 control-label">Room no: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" min="1" maxlength="10" class="form-control"
                                                name="edit_room_no" id="edit_room_no" placeholder="Room no"
                                                onKeyUp="if(this.value<0){this.value='0';}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_address" class="col-sm-3 control-label">Address: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea type="text" maxlength="256" rows="3" class="form-control"
                                                name="edit_address" id="edit_address" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="edit_remark" class="col-sm-3 control-label">Remark: </label>
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
                <button id="edit_save_btn" type="submit" class="btn waves-effect waves-light btn-info">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /end modal -->

<!-- /delete doc modal -->
<div id="deleteDoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tooltipmodel">Are you sure to delete this doctor?</h4>
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

<script type="text/javascript">
$(document).ready(function() {
    // edit data
    $('body').on('click', '.editData', function() {
        var id_doctor = $(this).data('id');
        $('#id_doctor_edit').val(id_doctor);

        $.get("{{url('/getDoctorInfoById')}}/" + id_doctor, function(data) {
            $('#editDoc').modal('show');
            $('#edit_doctor_type').val(data[0].type);
            $('#edit_doctor_eamil').val(data[0].email);
            $('#edit_doctor_name').val(data[0].doctor_name);
            $('#edit_phone').val(data[0].phone);
            $('#edit_department').val(data[0].department);
            $('#edit_degree').val(data[0].degree);
            $('#edit_specialty').val(data[0].specialty);
            $('#edit_room_no').val(data[0].room_no);
            $('#edit_address').val(data[0].address);
            $('#edit_remark').val(data[0].remark);
        });
    });

    // delete data
    var id_doctor_for_delete = "";
    $('body').on('click', '.deleteData', function() {
        id_doctor_for_delete = $(this).data('id');
        $('#deleteDoc').modal('show');
    });


    // list data
    var table = $('#docList').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('dostorList.index') }}",
            type: 'GET',
        },
        "order": [
            [1, 'asc']
        ],
        columns: [{
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
            {
                data: 'type',
                name: 'type'
            },
            {
                data: 'doctor_name',
                name: 'doctor_name'
            },
            {
                data: 'department',
                name: 'department'
            },
            {
                data: 'room_no',
                name: 'room_no'
            },
            {
                data: 'degree',
                name: 'Degree'
            },
            {
                data: 'specialty',
                name: 'specialty'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            
        ]
    });

    $("#doctor_add_form").on('submit', function(event) {
        event.preventDefault();
        $("#add_save_btn").prop("disabled", true);

        var form_data = document.getElementById("doctor_add_form");
        var fd = new FormData(form_data);
        $.ajax({
            url: "{{ url('/addNewDoctor') }}",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                console.log(data);
                if (data.result == "success") {
                    $('#doctor_add_form')[0].reset();
                    table.ajax.reload(null, false);
                    $.toast({
                        heading: data.message,
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3000,
                        stack: 6
                    });

                    $('#docList').DataTable();
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
                    // if ($('#name').val() == '') {
                    // 	$('#name').css('border-color', 'red');
                    // }
                    // if ($('#phone').val() == '') {
                    // 	$('#phone').css('border-color', 'red');
                    // }
                }
                $("#add_save_btn").prop("disabled", false);
            }
        });

    });

    // Edit data
    $("#doctor_edit_form").on('submit', function(event) {
        event.preventDefault();
        $("#edit_save_btn").prop("disabled", true);

        var form_data = document.getElementById("doctor_edit_form");
        var fd = new FormData(form_data);
        $.ajax({
            url: "{{ url('/editDoctor') }}",
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

                    $('#docList').DataTable();
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


    // delete yes click
    $("#delete_yes").click(function(event) {
        $.post("{{ url('/doctorDelete') }}", {
                "_token": "{{ csrf_token() }}",
                'id': id_doctor_for_delete,
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

    // email validation
    $('#eamil').on('keyup', function() {

        $('#eamil').filter(function() {
            var emil = $('#eamil').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (!emailReg.test(emil)) {
                $('.help-block').show();
                $("#add_save_btn").prop("disabled", true);
            } else {
                $('.help-block').hide();
                $("#add_save_btn").prop("disabled", false);
            }
        })
    });

    // edit email validation
    $('#edit_doctor_eamil').on('keyup', function() {

        $('#edit_doctor_eamil').filter(function() {
            var emil = $('#edit_doctor_eamil').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (!emailReg.test(emil)) {
                $('.help-block').show();
                $("#edit_save_btn").prop("disabled", true);
            } else {
                $('.help-block').hide();
                $("#edit_save_btn").prop("disabled", false);
            }
        })
    });

    // phone number validation
    // 		$("#phone").on('keyup', function () {
    // 			var phone = $("#phone").val();
    // 			var bdPhoneReg = /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/;
    // 			var otherPhoneReg = /^[\+]?[(]?[0-9]{4}[)]?[-\s\.]?[0-9]{4}[-\s\.]?[0-9]{4,6}$/im;

    // 			if (!otherPhoneReg.test(phone)) {
    // 				$('.help-phone').show();
    // 				$("#add_save_btn").prop("disabled", true);
    // 			} else {
    // 				$('.help-phone').hide();
    // 				$("#add_save_btn").prop("disabled", false);
    // 			}
    // 		});

    // edit phone number validation
    // 		$("#edit_phone").on('keyup', function () {
    // 			var phone = $("#edit_phone").val();
    // 			var bdPhoneReg = /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/;
    // 			var otherPhoneReg = /^[\+]?[(]?[0-9]{4}[)]?[-\s\.]?[0-9]{4}[-\s\.]?[0-9]{4,6}$/im;

    // 			if (!otherPhoneReg.test(phone)) {
    // 				$('.help-phone').show();
    // 				$("#edit_save_btn").prop("disabled", true);
    // 			} else {
    // 				$('.help-phone').hide();
    // 				$("#edit_save_btn").prop("disabled", false);
    // 			}
    // 		});

});
</script>
@endpush