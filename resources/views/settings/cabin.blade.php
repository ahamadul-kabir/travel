@extends('includes.header')
@section('pageTitle', 'cabin')
@push('styles')
<style>
	#cabinList_wrapper {
		padding-left: 0;
		padding-right: 0;
	}

	#cabinList_wrapper i {
		cursor: pointer;
	}

	#cabinList_wrapper table.table-bordered.dataTable tbody td:nth-child(4) {
		max-width: 160px;
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
	}

	#cabinList_wrapper table.table-bordered.dataTable tbody tr td:nth-child(2):before {
		content: "";
		width: 10px;
		height: 10px;
		border-radius: 50%;
		float: left;
		margin: 6px 8px 0 0;
	}

	#cabinList_wrapper table.table-bordered.dataTable tbody tr.available td:nth-child(2):before {
		background-color: var(--teal);
	}

	#cabinList_wrapper table.table-bordered.dataTable tbody tr.booked td:nth-child(2):before {
		background-color: var(--red);
	}

	#cabinList_wrapper table.table-bordered.dataTable tbody tr.booked td:last-child {
		/* pointer-events: none; */
		color: #b7b7b7;
	}
</style>
@endpush


@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Cabin entry</h4>
			</div>
			<div class="card-body">
				<form id="cabin_add_form">
					<div class="form-body">
						{{ csrf_field() }}
						<div class="row  p-t-20">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<label for="cabin_no" class="col-sm-3 control-label">Cabin no:<span
													class="text-danger">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<input type="text" maxlength="50" class="form-control"
														name="cabin_no" id="cabin_no" placeholder="Cabin no"
														oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														onKeyUp="if(this.value<0){this.value='0';}" require>
												</div>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-12">
										<div class="form-group row">
											<label for="rate_par_day" class="col-sm-3 control-label">Rate per day:<span
													class="text-danger">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<input type="number" min="1" maxlength="7" name="rate_par_day"
														class="form-control" id="rate_par_day"
														placeholder="Rate per day"
														oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														onKeyUp="if(this.value<0){this.value='0';}">
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
											<label for="remark" class="col-sm-3 control-label">Remarks: </label>
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
				<h4 class="m-b-0 text-white">Cabin list</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="cabinList" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<th>Actions</th>
								<th>Cabin No.</th>
								<th>Status</th>
								<th>Rate per day</th>
								<th>Remarks</th>
								<th>Booked on</th>
								<th>Available on</th>
								<th>Patient name</th>
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
				<h4 class="modal-title" id="editCabinLabel1">Edit cabin info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
			</div>
			<form id="cabin_edit_form">
				<div class="modal-body">
					<div class="form-body">
						{{ csrf_field() }}
						<input type="hidden" id="id_cabin_edit" name="id_cabin_edit">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group row">
									<label for="cabin_no_edit" class="col-sm-3 control-label">Cabin no:<span
											class="text-danger">*</span></label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="text" min="1" maxlength="10" class="form-control"
												name="cabin_no_edit" id="cabin_no_edit" placeholder="Cabin no"
												onKeyUp="if(this.value<0){this.value='0';}" require>
										</div>
									</div>
								</div>
							</div>

							<!--/span-->
							<div class="col-md-12">
								<div class="form-group row">
									<label for="rate_par_day_edit" class="col-sm-3 control-label">Rate per day:<span
											class="text-danger">*</span></label>
									<div class="col-sm-9">
										<div class="input-group">
											<input type="number" min="1" maxlength="7" name="rate_par_day_edit"
												class="form-control" id="rate_par_day_edit" placeholder="Rate per day"
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
							<div class="col-md-12">
								<div class="form-group row">
									<label for="remark_edit" class="col-sm-3 control-label">Remarks: </label>
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
				<h4 class="modal-title" id="tooltipmodel">Are you sure to delete this Cabin?</h4>
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
	$(document).ready(function () {
		// Cabin add
		$("#cabin_add_form").on('submit', function (event) {
			event.preventDefault();
			$("#add_save_btn").prop("disabled", true);

			var form_data = document.getElementById("cabin_add_form");
			var fd = new FormData(form_data);
			$.ajax({
				url: "{{ url('/addNewCabin') }}",
				data: fd,
				cache: false,
				processData: false,
				contentType: false,
				type: 'POST',
				success: function (data) {
					console.log(data);
					if (data.result == "success") {
						$('#cabin_add_form')[0].reset();
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
						// if ($('#cabin_no').val() == '') {
						// 	$('#cabin_no').css('border-color', 'red');
						// }
						// if ($('#rate_par_day').val() == '') {
						// 	$('#rate_par_day').css('border-color', 'red');
						// }
					}
					$("#add_save_btn").prop("disabled", false);
				}
			});

		});

		// list data
		var table = $('#cabinList').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ route('cabinList.index') }}",
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
					data: 'cabin_name',
					name: 'cabin_name'
				},
				{
					data: 'booking_status',
					name: 'booking_status'
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
				
			]
		});


		// edit data
		$('body').on('click', '.editData', function () {
			var id_cabin = $(this).data('id');
			$('#id_cabin_edit').val(id_cabin);
			$.get("{{url('/getCabinInfoById')}}/" + id_cabin, function (data) {
				// alert(id_cabin);
				$('#editDoc').modal('show');
				$('#cabin_no_edit').val(data[0].cabin_name);
				$('#rate_par_day_edit').val(data[0].rate);
				$('#remark_edit').val(data[0].remark);
				console.log(data);
			});
		});

		// Edit data
		$("#cabin_edit_form").on('submit', function (event) {
			event.preventDefault();
			var form_data = document.getElementById("cabin_edit_form");
			var fd = new FormData(form_data);
			$.ajax({
				url: "{{ url('/editCabin') }}",
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
							hideAfter: 6000,
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
							hideAfter: 6500,
							stack: 6
						});
					} else if (data.result == "error") {
						$.each(data.message, function (index, val) {
							$.toast({
								heading: data.message[index],
								position: 'bottom-right',
								loaderBg: '#ff6849',
								icon: 'error',
								hideAfter: 6500,
								stack: 6
							});
						});
						// if ($('#cabin_no_edit').val() == '') {
						// 	$('#cabin_no_edit').css('border-color', 'red');
						// }
						// if ($('#rate_par_day_edit').val() == '') {
						// 	$('#rate_par_day_edit').css('border-color', 'red');
						// }
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
			$.post("{{ url('/cabinDelete') }}", {
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
							hideAfter: 6000,
							stack: 6
						});
						table.ajax.reload(null, false);
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

		setTimeout(function () {
			$("#cabinList_wrapper").on("click", "tr.booked td i", function () {
				$(this).prop("disabled", true);
			});

			$("#cabinList_wrapper").on("mouseover", "tr.booked", function () {
				$('#cabinList_wrapper tbody tr.booked, #cabinList_wrapper tbody tr.booked td i')
					.prop('title', 'Cabin cannot be modified until it is available.');
			});

		}, 2000);
	});
</script>
@endpush