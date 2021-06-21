@extends('includes.header')
@section('pageTitle', 'ward')
@push('styles')
<style>
	#wardList_wrapper {
		padding-left: 0;
		padding-right: 0;
	}

	#bedList_wrapper i,
	#wardList_wrapper i {
		cursor: pointer;
	}

	#bedList_wrapper table.table-bordered.dataTable tbody tr td:nth-child(2):before {
		content: "";
		width: 10px;
		height: 10px;
		border-radius: 50%;
		float: left;
		margin: 6px 8px 0 0;
	}

	#bedList_wrapper table.table-bordered.dataTable tbody tr.available td:nth-child(2):before {
		background-color: var(--teal);
	}

	#bedList_wrapper table.table-bordered.dataTable tbody tr.booked td:nth-child(2):before {
		background-color: var(--red);
	}

	#bedList_wrapper table.table-bordered.dataTable tbody tr.booked td:last-child {
		pointer-events: none;
		color: #b7b7b7;
	}
</style>
@endpush

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Ward entry</h4>
			</div>
			<div class="card-body">
				<form id="ward_add_form">
					<div class="form-body">
						{{ csrf_field() }}
						<div class="row p-t-20">
							<div class="col-md-6">
								<div class="form-group row">
									<label for="ward_name" class="col-sm-3 control-label">Ward No / Name:<span
										class="text-danger">*</span></label>
										<div class="col-sm-9">
											<div class="controls">
												<input type="text" maxlength="60" name="ward_name" class="form-control"
												id="ward_name" placeholder="Ward No / Name">
											</div>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 control-label">Ward type:<span
											class="text-danger">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<select name="ward_type" class="form-control custom-select" required>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
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
											<label for="no_of_bed" class="col-sm-3 control-label">No. of beds:<span
												class="text-danger">*</span></label>
												<div class="col-sm-9">
													<div class="input-group">
														<input type="number" min="1" maxlength="3" name="no_of_bed"
														class="form-control" id="no_of_bed" placeholder="No. of beds"
														oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														onKeyUp="if(this.value<0){this.value='0';}">
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-6">
											<div class="form-group row">
												<label for="rate_per_day" class="col-sm-3 control-label">Rate per day:<span
													class="text-danger">*</span></label>
													<div class="col-sm-9">
														<div class="input-group">
															<input type="number" min="1" maxlength="7" name="rate_per_day"
															class="form-control" id="rate_per_day" placeholder="Rate per day"
															oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
															onKeyUp="if(this.value<0){this.value='0';}">
														</div>
													</div>
												</div>
											</div>
											<!--/span-->
										</div>
										<!--/row-->
										<div class="row">
											<!--/span-->
											<div class="col-md-6">
												<div class="form-group row">
													<label for="remark" class="col-sm-3 control-label">Remarks:
													</label>
													<div class="col-sm-9">
														<div class="input-group">
															<textarea type="text" maxlength="256" rows="3" class="form-control"
															name="remark" id="remark" placeholder="Remarks"></textarea>
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
											<!-- <button type="button" id="sa-warning" class="btn btn-inverse">Cancel</button> -->
										</div>
									</form>
								</div>
							</div>
							<!-- end of card -->

							<div class="card">
								<div class="card-header bg-info">
									<h4 class="m-b-0 text-white">Ward list</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="wardList" class="p-l-0 p-r-0 table table-bordered table-striped">
											<thead>
												<tr>
													<th>Ward No.</th>
													<th>Type</th>
													<th>No. of beds</th>
													<th>Rate per day</th>
													<th>Remarks</th>
													<th>Actions</th>
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
					<div class="modal fade bs-example-modal-lg" id="editDoc" tabindex="-1" role="dialog" aria-labelledby="editwardLabel1">
						<div class="modal-dialog modal-xl" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="editwardLabel1">Edit ward info</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
									</div>
									<form id="ward_edit_form">
										<div class="modal-body">
											<div class="form-body">
												{{ csrf_field() }}
												<input type="hidden" id="id_ward_edit" name="id_ward_edit">
												<div class="row p-t-20">
													<div class="col-md-6">
														<div class="form-group row">
															<label for="ward_name_edit" class="col-sm-3 control-label">Ward No / Name:<span
																class="text-danger">*</span></label>
																<div class="col-sm-9">
																	<div class="controls">
																		<input type="text" maxlength="60" name="ward_name_edit" class="form-control"
																		id="ward_name_edit" placeholder="Ward No / Name">
																	</div>
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group row">
																<label class="col-sm-3 control-label">Ward type:<span
																	class="text-danger">*</span></label>
																	<div class="col-sm-9">
																		<div class="input-group">
																			<select name="ward_type_edit" class="form-control custom-select" required>
																				<option value="Male">Male</option>
																				<option value="Female">Female</option>
																			</select>
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
																	<label for="rate_per_day_edit" class="col-sm-3 control-label">Rate per day:<span
																		class="text-danger">*</span></label>
																		<div class="col-sm-9">
																			<div class="input-group">
																				<input type="number" min="1" maxlength="7" name="rate_per_day_edit"
																				class="form-control" id="rate_per_day_edit" placeholder="Rate per day"
																				oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
																				onKeyUp="if(this.value<0){this.value='0';}">
																			</div>
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group row">
																		<label for="remark_edit" class="col-sm-3 control-label">Remarks:
																		</label>
																		<div class="col-sm-9">
																			<div class="input-group">
																				<textarea type="text" maxlength="256" rows="3" class="form-control"
																				name="remark_edit" id="remark_edit" placeholder="Remarks"></textarea>
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


									<!-- /showWard modal -->
									<div class="modal fade bs-example-modal-lg" id="showWard" tabindex="-1" role="dialog" aria-labelledby="editwardLabel1">
										<div class="modal-dialog modal-xl" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="editwardLabel1">Bed details</h4>
													<div class="ml-auto">
														<form id="add_new_bed_form" class="ml-auto d-inline">
															<input type="hidden" id="id_ward_bed_add" name="id_ward_bed_add">
															<button id="add_new_bed" type="submit"
															class="btn btn-sm waves-effect waves-light btn-outline-info"> <i
															class="ti-plus"></i>&nbsp;&nbsp; Add more bed</button>
														</form>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
															aria-hidden="true">&times;</span></button>
														</div>
													</div>
													<form id="ward_edit_form">
														<div class="modal-body">
															<div class="table-responsive">
																<table id="bedList" class="p-l-0 p-r-0 table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th>Bed No.</th>
																			<th>Status</th>
																			<th>Booked on</th>
																			<th>Available on</th>
																			<th>Patient name</th>
																			<th>Actions</th>
																		</tr>
																	</thead>
																	<tbody>
																		<!-- dynamic table will be load here -->

																	</tbody>
																</table>
															</div>
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
														<h4 class="modal-title" id="tooltipmodel">Are you sure to delete this ward?</h4>
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


										<!-- /delete doc modal -->
										<div id="deleteBed" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="tooltipmodel">Are you sure to delete this bed?</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn waves-effect waves-light btn-outline-danger"
														data-dismiss="modal">Cancel</button>
														<button id="delete_bed" type="button" class="btn waves-effect waves-light btn-danger"
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

										<script>
	// data add
	$("#ward_add_form").on('submit', function (event) {
		event.preventDefault();
		$("#add_save_btn").prop("disabled", true);

		var form_data = document.getElementById("ward_add_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/addNewWard') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				console.log(data);
				if (data.result == "success") {
					$('#ward_add_form')[0].reset();
					table.ajax.reload(null, false);
					$.toast({
						heading: data.message,
						position: 'bottom-right',
						loaderBg: '#ff6849',
						icon: 'success',
						hideAfter: 3000,
						stack: 1
					});
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
					$.each(data.message, function (index, val) {
						$.toast({
							heading: 'Please fill all required fields',
							position: 'bottom-right',
							loaderBg: '#ff6849',
							icon: 'error',
							hideAfter: 3500,
							stack: 1
						});
					});
					// if ($('#ward_name').val() == '') {
					// 	$('#ward_name').css('border-color', 'red');
					// }
					// if ($('#no_of_bed').val() == '') {
					// 	$('#no_of_bed').css('border-color', 'red');
					// }
					// if ($('#rate_per_day').val() == '') {
					// 	$('#rate_per_day').css('border-color', 'red');
					// }
				}
				$("#add_save_btn").prop("disabled", false);
			}
		});

	});



	// list data
	var table = $('#wardList').DataTable({

		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ route('wardList.index') }}",
			type: 'GET',
		},
		"order": [
		[0, 'asc']
		],
		columns: [{
			data: 'ward_name',
			name: 'ward_name'
		},
		{
			data: 'ward_type',
			name: 'ward_type'
		},
		{
			data: 'no_of_beds',
			name: 'no_of_beds'
		},
		{
			data: 'rate_per_day',
			name: 'rate_per_day'
		},
		{
			data: 'remark',
			name: 'remark'
		},
		{
			data: 'action',
			name: 'action',
			orderable: false,
			searchable: false
		},
		]
	});

	// show bed data
	var id_ward_for_details = "";
	$('body').on('click', '.showData', function () {
		id_ward_for_details = $(this).data('id');

		$('#id_ward_bed_add').val(id_ward_for_details);


		$('#bedList').DataTable().clear().destroy();
		tablebed();
		$('#showWard').modal('show');
	});

	// bed data
	var tablebed = function () {
		$('#bedList').DataTable({
			processing: true,
			serverSide: true,
			retrieve: true,
			ajax: {
				url: "{{ url('/getBedInfoByWardId') }}/" + id_ward_for_details,
				type: 'GET',
			},
			"order": [
			[0, 'asc']
			],

			columns: [{
				data: 'bed_no',
				name: 'bed_no'
			},
			{
				data: 'using_status',
				name: 'using_status'
			},
			{
				data: 'booked_on',
				name: 'booked_on'
			},
			{
				data: 'available_on',
				name: 'available_on'
			},
			{
				data: 'name',
				name: 'name'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false,
				searchable: false
			},
			]
		})
	};



	// edit data
	$('body').on('click', '.editData', function () {
		var id_ward = $(this).data('id');
		$('#id_ward_edit').val(id_ward);
		$.get("{{ url('/getWardInfoById') }}/" + id_ward, function (data) {
			$('#editDoc').modal('show');
			$('#ward_name_edit').val(data[0].ward_name);
			$('#ward_type_edit').val(data[0].ward_type);
			$('#no_of_bed_edit').val(data[0].no_of_beds);
			$('#rate_per_day_edit').val(data[0].rate_per_day);
			$('#remark_edit').val(data[0].remark);
			console.log(data);
		});
	});

	// Edit data
	$("#ward_edit_form").on('submit', function (event) {
		event.preventDefault();
		var form_data = document.getElementById("ward_edit_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/editWard') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
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

					$('#bedList').DataTable();
					$('#editDoc').modal('hide');
				} else if (data.result == "fail") {
					$.toast({
						heading: data.message,
						position: 'bottom-right',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 5500,
						stack: 6
					});
				} else if (data.result == "error") {
					$.each(data.message, function (index, val) {
						$.toast({
							heading: 'Please fill all required fields',
							position: 'bottom-right',
							loaderBg: '#ff6849',
							icon: 'error',
							hideAfter: 5500,
							stack: 1
						});
					});
					// if ($('#ward_name_edit').val() == '') {
					// 	$('#ward_name_edit').css('border-color', 'red');
					// }
					// if ($('#no_of_bed_edit').val() == '') {
					// 	$('#no_of_bed_edit').css('border-color', 'red');
					// }
					// if ($('#rate_per_day_edit').val() == '') {
					// 	$('#rate_per_day_edit').css('border-color', 'red');
					// }
				}
			}
		});

	});


	// delete data
	var id_ward_for_delete = "";
	$('body').on('click', '.deleteData', function () {
		id_ward_for_delete = $(this).data('id');
		$('#deleteDoc').modal('show');
	});

	// delete yes click
	$("#delete_yes").click(function (event) {
		$.post("{{ url('/wardDelete') }}", {
			"_token": "{{ csrf_token() }}",
			'id_ward': id_ward_for_delete,
		},
		function (data, textStatus, xhr) {
			console.log(data);
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


	// delete bed
	var id_ward_bed_delete = "";
	$('body').on('click', '.deleteBedData', function () {
		id_ward_bed_delete = $(this).data('id');
		$('#deleteBed').modal('show');
	});

	// delete bed click
	$("#delete_bed").click(function (event) {
		if($('#bedList').DataTable().rows().cache().length > 1){
			$.post("{{ url('/wardBedDelete') }}", {
				"_token": "{{ csrf_token() }}",
				'id_ward_bed': id_ward_bed_delete,
			},
			function (data, textStatus, xhr) {
				console.log(data);
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
					$('#bedList').DataTable().clear().destroy();
					tablebed();
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
		}
		else {
			$.toast({
				heading: 'Number of bed in a ward can not be zero.',
				position: 'bottom-right',
				loaderBg: '#ff6849',
				icon: 'error',
				hideAfter: 3000,
				stack: 6
			});
		}
	});




	// add new beds
	$("#add_new_bed_form").on('submit', function (event) {
		event.preventDefault();
		var id_ward = $('#id_ward_bed_add').val();
		var form_data = document.getElementById("add_new_bed_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/addMoreBed') }}/" + id_ward,
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'GET',
			success: function (data) {
				console.log(data);
				if (data.result == "success") {
					// $('#showWard').modal('hide');
					table.ajax.reload(null, false);
					$('#bedList').DataTable().clear().destroy();
					tablebed();
					$.toast({
						heading: data.message,
						position: 'bottom-right',
						loaderBg: '#ff6849',
						icon: 'success',
						hideAfter: 3000,
						stack: 6
					});
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
					$.each(data.message, function (index, val) {
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
			}
		});

	});
</script>

@endpush