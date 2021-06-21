@extends('includes.header')
@section('pageTitle', 'Medical Condition')
@push('styles')
<style>
	#diseaseList_wrapper {
		padding-left: 0;
		padding-right: 0;
	}

	#diseaseList_wrapper i {
		cursor: pointer;
	}
</style>
@endpush

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Medical condition setup</h4>
			</div>
			<div class="card-body">
				<form id="disease_add_form">
					<div class="form-body">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<label for="diseas_name" class="col-sm-4 control-label">Medical
												<br>Condition Name:<span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<div class="input-group">
													<input type="text" maxlength="50" class="form-control"
														name="diseas_name" id="diseas_name"
														placeholder="Medical Condition Name" require>
												</div>
											</div>
										</div>
									</div>
									<!--/span-->
								</div>
							</div>
							<div class="col-md-6">
								<!--/row-->
								<div class="row">
									<!--/span-->
									<div class="col-md-12">
										<div class="form-group row">
											<label for="remark" class="col-sm-4 text-center control-label">Remarks:
											</label>
											<div class="col-sm-8">
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
				<h4 class="m-b-0 text-white">Medical condition list</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="diseaseList" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<th>Actions</th>
								<th>Name</th>
								<th>Remarks</th>
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
			<div class="modal-header">
				<h4 class="modal-title" id="editdiseaseLabel1">Edit Medical condition info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
			</div>
			<form id="disease_edit_form">
				<div class="modal-body">
					<div class="form-body">
						{{ csrf_field() }}
						<input type="hidden" id="id_deseas_edit" name="id_deseas_edit">
						<div class="row  p-t-20">
							<div class="col-md-12">
								<div class="form-group row">
									<label for="diseas_name_edit" class="col-sm-3 control-label">Medical
										<br>Condition Name:<span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="text" maxlength="128" class="form-control"
												name="diseas_name_edit" id="diseas_name_edit"
												placeholder="Medical Condition Name" require>
										</div>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
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

<!-- /delete doc modal -->
<div id="deleteDoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="tooltipmodel">Are you sure to delete this disease?</h4>
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

<script>
	// data add
	$("#disease_add_form").on('submit', function (event) {
		event.preventDefault();
		$("#add_save_btn").prop("disabled", true);

		var form_data = document.getElementById("disease_add_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/addNewDisease') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (data) {
				console.log(data);
				if (data.result == "success") {
					$('#disease_add_form')[0].reset();
					table.ajax.reload(null, false);
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
					// if ($('#diseas_name').val() == '') {
					// 	$('#diseas_name').css('border-color', 'red');
					// }
				}
				$("#add_save_btn").prop("disabled", false);
			}
		});

	});


	// list data
	var table = $('#diseaseList').DataTable({

		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ route('diseaseList.index') }}",
			type: 'GET',
		},
		"order": [
			[0, 'asc']
		],
		columnDefs: [{
				targets: [0],
				width: "30%",
			},
			{
				targets: [1],
				width: "60%",
			}
		],

		columns: [
			{
				data: 'action',
				name: 'action',
				orderable: false,
				searchable: false
			},{
				data: 'diseas_name',
				name: 'diseas_name'
			},
			{
				data: 'remark',
				name: 'remark'
			},
			
		]
	});

	// edit data
	$('body').on('click', '.editData', function () {
		var id_deseas = $(this).data('id');
		$('#id_deseas_edit').val(id_deseas);
		$.get("{{url('/getDiseaseInfoById')}}/" + id_deseas, function (data) {
			$('#editDoc').modal('show');
			$('#diseas_name_edit').val(data[0].diseas_name);
			$('#remark_edit').val(data[0].remark);
			console.log(data);
		});
	});

	// Edit data
	$("#disease_edit_form").on('submit', function (event) {
		event.preventDefault();
		var form_data = document.getElementById("disease_edit_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/editDisease') }}",
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

					$('#cabinList').DataTable();
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


	// delete data
	var id_cabin_for_delete = "";
	$('body').on('click', '.deleteData', function () {
		id_cabin_for_delete = $(this).data('id');
		$('#deleteDoc').modal('show');
	});

	// delete yes click
	$("#delete_yes").click(function (event) {
		$.post("{{ url('/diseaseDelete') }}", {
				"_token": "{{ csrf_token() }}",
				'id': id_cabin_for_delete,
			},
			function (data, textStatus, xhr) {
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