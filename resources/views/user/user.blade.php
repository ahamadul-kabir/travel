@extends('includes.header')
@section('pageTitle', 'User')

@push('styles')
<style>
	#hidden_upload {
		height: 0;
		overflow: hidden;
		width: 0;
	}

	.picture-upload {
		position: relative;
		cursor: pointer;
		width: 150px;
		height: 150px;
		border-radius: 50%;
		display: inline-block;
		overflow: hidden;
	}

	.upload-icon {
		opacity: 0;
		position: absolute;
		top: calc(50% - 10px);
		left: calc(50% - 10px);
		color: #fff;
		transform: scale(0);
		transition: transform .3s ease-in-out;
	}

	.upload-icon-wrap {
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, .5);
		display: inline-block;
		position: absolute;
		left: 0;
		top: 0;
		opacity: 0;
		transition: transform .3s ease-in-out;
		transform: scale(0);
	}

	.picture-upload:hover .upload-icon-wrap {
		opacity: 1;
		transform: scale(1);
	}

	.picture-upload:hover .upload-icon {
		opacity: 1;
		transform: scale(1);

	}

	#userList_wrapper {
		padding-left: 0;
		padding-right: 0;
	}

	#userList_wrapper i {
		cursor: pointer;
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
				<h4 class="m-b-0 text-white">Add User</h4>
			</div>
			<div class="card-body">
				<form id="userAddForm">
					<div class="form-body">
						{{ csrf_field() }}
						<center class="m-t-30">
							<div class="picture-upload">
								<img id="profile-pic" src="assets/images/man.png" width="150" />
								<span class="upload-icon-wrap"> <i class="upload-icon fas fa-camera"></i></span>
							</div>
							<!-- <h4 class="card-title m-t-10">Hanna Gover</h4> -->
							<input id="hidden_upload" accept=".gif,.png,.jpeg,.jpg" type="file" name="user-picture" size="chars">

						</center>

						<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="name" class="col-sm-3 control-label">Name:<span
										class="text-danger">*</span></label>
										<div class="col-sm-9">
											<div class="controls">
												<input type="text" maxlength="60" name="name" class="form-control" id="name"
												placeholder="Name" required>
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
													<input required type="number"  name="phone"
													class="form-control" id="phone" placeholder="Phone">
                                           <!-- oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    onKeyUp="if(this.value<0){this.value='0';}" <div class="help-phone" style="display: none;">
                                                <ul role="alert">
                                                    <li>Please enter a valid mobile no.</li>
                                                </ul>
                                            </div> -->
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
                            <div class="col-md-6">
                            	<div class="form-group row">
                            		<label for="department" class="col-sm-3 control-label">Department: <span
                            			class="text-danger">*</span></label>
                            			<div class="col-sm-9">
                            				<div class="input-group">
                                            <!-- <input type="text" maxlength="60" class="form-control" name="department"
                                            	id="department" placeholder="Department"> -->
                                            	<select name="department" id="department"
                                            	class="form-control custom-select">
                                            	<!-- dynamic list will be load here -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                            	<div class="form-group row">
                            		<label for="password" class="col-sm-3 control-label">Password:<span
                            			class="text-danger">*</span> </label>
                            			<div class="col-sm-9">
                            				<div class="input-group">
                            					<input type="password" maxlength="60" class="form-control" name="password"
                            					id="password" placeholder="Password">
                            				</div>
                            			</div>
                            		</div>
                            	</div>
                            	<!--/span-->
                            	<div class="col-md-6">
                            		<div class="form-group row">

                            			<label for="designation" class="col-sm-3 control-label">Designation:</label>
                            			<div class="col-sm-9">
                            				<div class="input-group">
                            					<input type="text" maxlength="60" class="form-control" name="designation"
                            					id="designation" placeholder="Designation">
                            				</div>
                            			</div>
                            		</div>
                            	</div>
                            	<!--/span-->
                            	<div class="col-md-6">
                            		<div class="form-group row">
                            			<label for="re_password" class="col-sm-3 control-label">Re-enter password:<span
                            				class="text-danger">*</span> </label>
                            				<div class="col-sm-9">
                            					<div class="input-group">
                            						<input type="password" maxlength="60" class="form-control"
                            						name="re_password" id="re_password" placeholder="Re-enter password">
                            					</div>
                            				</div>
                            			</div>
                            		</div>
                            		<!--/span-->
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
                            	</div>

                            	<hr>
                            	<div class="form-actions text-right">
                            		<button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-info">
                            			<i class="fa fa-check"></i> Save</button>
                            		</div>
                            	</div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                    	<div class="card-header bg-info">
                    		<h4 class="m-b-0 text-white">User list</h4>
                    	</div>
                    	<div class="card-body">
                    		<div class="table-responsive">
                    			<table id="userList" class="p-l-0 p-r-0 table table-bordered table-striped">
                    				<thead>
                    					<tr>
                    						<th width="5%">Delete</th>
                    						<th width="5%">Image</th>
                    						<th>Name</th>
                    						<th>Phone</th>
                    						<th>Email</th>
                    						<th>Department</th>
                    						<th>Designation</th>
                    						<th>Address</th>
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
            <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editDocLabel1">
            	<div class="modal-dialog modal-xl" role="document">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h4 class="modal-title" id="editDocLabel1">Edit user info</h4>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            					aria-hidden="true">&times;</span></button>
            				</div>
            				<form id="user_edit_form">
            					<div class="modal-body">

            						<div class="form-body">
            							{{ csrf_field() }}
            							<input type="hidden" id="id_user_edit" name="id_user_edit">
            							<div class="row p-t-20">
            								<div class="col-md-6">
            									<div class="form-group row">
            										<label for="edit_name" class="col-sm-3 control-label">Name:<span
            											class="text-danger">*</span></label>
            											<div class="col-sm-9">
            												<div class="controls">
            													<input type="text" maxlength="60" name="edit_name" class="form-control"
            													id="edit_name" placeholder="Name" required>
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
            														<input required type="number" maxlength="15" name="edit_phone"
            														class="form-control" id="edit_phone" placeholder="Phone"
            														oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            														onKeyUp="if(this.value<0){this.value='0';}">
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
            										<div class="col-md-6">
            											<div class="form-group row">
            												<label for="edit_eamil" class="col-sm-3 control-label">Email:</label>
            												<div class="col-sm-9">
            													<div class="controls">
            														<input type="email" maxlength="120" class="form-control" id="edit_eamil"
            														name="edit_email" placeholder="Email">
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
            										<div class="col-md-6">
            											<div class="form-group row">
            												<label for="edit_department" class="col-sm-3 control-label">Department: </label>
            												<div class="col-sm-9">
            													<div class="input-group">
            														<input type="text" maxlength="60" class="form-control"
            														name="edit_department" id="edit_department" placeholder="Department">
            													</div>
            												</div>
            											</div>
            										</div>
            										<!--/span-->
            										<div class="col-md-6">
            											<div class="form-group row">
            												<label for="edit_designation" class="col-sm-3 control-label">Designation: </label>
            												<div class="col-sm-9">
            													<div class="input-group">
            														<input type="text" maxlength="60" class="form-control"
            														name="edit_designation" id="edit_designation" placeholder="Designation">
            													</div>
            												</div>
            											</div>
            										</div>
            										<!--/span-->
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
            									</div>
            								</div>
            							</div>
            							<div class="modal-footer">
            								<button type="button" class="btn waves-effect waves-light btn-outline-info"
            								data-dismiss="modal">Cancel</button>
            								<button id="edit_save_btn" type="submit"
            								class="btn waves-effect waves-light btn-info">Update</button>
            							</div>
            						</form>
            					</div>
            				</div>
            			</div>
            			<!-- /end modal -->

            			<!-- /delete User modal -->
            			<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
            				<div class="modal-dialog modal-dialog-centered">
            					<div class="modal-content">
            						<div class="modal-header">
            							<h4 class="modal-title" id="tooltipmodel">Are you sure to delete this User?</h4>
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
            			<script src="{{asset('assets/plugins/table-button/dataTables.buttons.min.js')}}"></script>
            			<script src="{{asset('assets/plugins/table-button/buttons.flash.min.js')}}"></script>
            			<script src="{{asset('assets/plugins/table-button/jszip.min.js')}}"></script>
            			<script src="{{asset('assets/plugins/table-button/pdfmake.min.js')}}"></script>
            			<script src="{{asset('assets/plugins/table-button/vfs_fonts.js')}}"></script>
            			<script src="{{asset('assets/plugins/table-button/buttons.html5.min.js')}}"></script>
            			<script src="{{asset('assets/plugins/table-button/buttons.print.min.js')}}"></script>
            			<script type="text/javascript">
            				$(document).ready(function() {

            					$('.upload-icon-wrap').click(function() {
            						$('#hidden_upload').click();
            					});



    // list data
    var table = $('#userList').DataTable({

    	processing: true,
    	serverSide: true,
    	ajax: {
    		url: "{{ url('userListDataTable') }}",
    		type: 'GET',
    	},
    	"order": [
    	[2, 'asc']
    	],
    	columns: [
    	{
    		data: 'action',
    		name: 'action',
    		orderable: false,
    		searchable: false
    	},
    	{
    		data: 'image',
    		name: 'image'
    	},
    	{
    		data: 'name',
    		name: 'name'
    	},
    	{
    		data: 'phone',
    		name: 'phone'
    	},
    	{
    		data: 'email',
    		name: 'email'
    	},
    	{
    		data: 'department',
    		name: 'department'
    	},
    	{
    		data: 'designation',
    		name: 'designation'
    	},
    	{
    		data: 'address',
    		name: 'address'
    	},

    	],
    	dom: 'Bfrtip',
    	buttons: [
    	'copy', 'csv', 'excel', 'pdf',
    	]
    });


    // image on change based on url
    // function readURL(input) {
    //     var url = input.value;
    //     var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    //     if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
    //         $('#profile-pic')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);

    //     } else {
    //         $('#profile-pic').attr('src', '../assets/images/man.png');
    //         $.toast({
    //             heading: 'file type not supported',
    //             position: 'bottom-right',
    //             loaderBg: '#ff6849',
    //             icon: 'error',
    //             hideAfter: 3500,
    //             stack: 1
    //         });
    //     }
    // }

    // image on change based on base64
    function readURL(input) {
    	var url = input.value;
    	var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    	if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
    		var reader = new FileReader();

    		reader.onload = function(e) {
    			$('#profile-pic').attr('src', e.target.result);
    		}

    		reader.readAsDataURL(input.files[0]);
    	} else {
    		$('#profile-pic').attr('src', 'assets/images/man.png');
    		$.toast({
    			heading: 'file type not supported',
    			position: 'bottom-right',
    			loaderBg: '#ff6849',
    			icon: 'error',
    			hideAfter: 3500,
    			stack: 1
    		});
    	}
    }


    $("#hidden_upload").change(function() {
    	readURL(this);
    });



    // user add form submit

    $("#userAddForm").on('submit', function(event) {
    	event.preventDefault();
    	$("#add_save_btn").prop("disabled", true);

    	var form_data = document.getElementById("userAddForm");
    	var fd = new FormData(form_data);
    	$.ajax({
    		url: "{{ url('/addNewUser') }}",
    		data: fd,
    		cache: false,
    		processData: false,
    		contentType: false,
    		type: 'POST',
    		success: function(data) {
    			console.log(data);
    			if (data.result == "success") {
    				$('#userAddForm')[0].reset();
    				table.ajax.reload(null, false);
    				$.toast({
    					heading: data.message,
    					position: 'bottom-right',
    					loaderBg: '#ff6849',
    					icon: 'success',
    					hideAfter: 3000,
    					stack: 1
    				});

    				$('#docList').DataTable();
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
    						heading: data.message[index],
    						position: 'bottom-right',
    						loaderBg: '#ff6849',
    						icon: 'error',
    						hideAfter: 3500,
    						stack: 1
    					});
    				});

    			}
    			$("#add_save_btn").prop("disabled", false);
    		}
    	});

    });


    // edit data
    $('body').on('click', '.editData', function() {
    	var id_user = $(this).data('id');
    	$('#id_user_edit').val(id_user);

    	$.get("{{ url('/getDoctorInfoById') }}/" + id_user, function(data) {
    		console.log("TCL: data", data)
    		$('#editModal').modal('show');
    		$('#edit_eamil').val(data[0].email);
    		$('#edit_name').val(data[0].name);
    		$('#edit_phone').val(data[0].phone);
    		$('#edit_department').val(data[0].department);
    		$('#edit_designation').val(data[0].designation);
    		$('#edit_address').val(data[0].address);
    	});
    });


    $.get("{{ url('/departmentList') }}", function(data) {
    	var state_html = "";
    	var final_data = data;
    	console.log("TCL: final_data", final_data)
    	$.each(final_data, function(index, val) {
    		state_html += '<option value = ' + val.id_department + '>' + val.department_name +
    		'</option>';

    	});
    	$('#department').html(state_html);

    });



    // Edit data
    $("#user_edit_form").on('submit', function(event) {
    	event.preventDefault();
    	$("#edit_save_btn").prop("disabled", true);

    	var form_data = document.getElementById("user_edit_form");
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
    // delete data
    var id_user_for_delete = "";
    $('body').on('click', '.deleteData', function() {
    	id_user_for_delete = $(this).data('id');
    	$('#deleteModal').modal('show');
    });

    // delete yes click
    $("#delete_yes").click(function(event) {
    	$.post("{{ url('/userDelete') }}", {
    		"_token": "{{ csrf_token() }}",
    		'id': id_user_for_delete,
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
    		var email = $('#eamil').val();
    		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    		if (!emailReg.test(email)) {
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
    		var email = $('#edit_doctor_eamil').val();
    		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    		if (!emailReg.test(email)) {
    			$('.help-block').show();
    			$("#edit_save_btn").prop("disabled", true);
    		} else {
    			$('.help-block').hide();
    			$("#edit_save_btn").prop("disabled", false);
    		}
    	})
    });

    // phone number validation
    // $("#phone").on('keyup', function() {
    //     var phone = $("#phone").val();
    //     var bdPhoneReg = /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/;
    //     var otherPhoneReg = /^[\+]?[(]?[0-9]{4}[)]?[-\s\.]?[0-9]{4}[-\s\.]?[0-9]{4,6}$/im;

    //     if (!otherPhoneReg.test(phone)) {
    //         $('.help-phone').show();
    //         $("#add_save_btn").prop("disabled", true);
    //     } else {
    //         $('.help-phone').hide();
    //         $("#add_save_btn").prop("disabled", false);
    //     }
    // });

    // edit phone number validation
    // $("#edit_phone").on('keyup', function() {
    //     var phone = $("#edit_phone").val();
    //     var bdPhoneReg = /(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/;
    //     var otherPhoneReg = /^[\+]?[(]?[0-9]{4}[)]?[-\s\.]?[0-9]{4}[-\s\.]?[0-9]{4,6}$/im;

    //     if (!otherPhoneReg.test(phone)) {
    //         $('.help-phone').show();
    //         $("#edit_save_btn").prop("disabled", true);
    //     } else {
    //         $('.help-phone').hide();
    //         $("#edit_save_btn").prop("disabled", false);
    //     }
    // });


});
</script>
@endpush