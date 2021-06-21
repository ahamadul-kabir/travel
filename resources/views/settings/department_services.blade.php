@extends('includes.header')
@section('pageTitle', 'Department wise service setting')
@push('styles')
<style>
	.tabs-vertical li .nav-link.active,
	.tabs-vertical li .nav-link:hover,
	.tabs-vertical li .nav-link.active:focus {
		background: #398bf7;
		border: 0px;
		color: #ffffff;
	}

	/*Custom vertical tab*/
	.customvtab .tabs-vertical li .nav-link.active,
	.customvtab .tabs-vertical li .nav-link:hover,
	.customvtab .tabs-vertical li .nav-link:focus {
		background: #ffffff;
		border: 0px;
		border-right: 2px solid #398bf7;
		margin-right: -1px;
		color: #398bf7;
	}

	.tabcontent-border {
		border: 1px solid #ddd;
		border-top: 0px;
	}

	.customtab2 li a.nav-link {
		border: 0px;
		margin-right: 3px;
		color: #67757c;
	}

	.customtab2 li a.nav-link.active {
		background: #398bf7;
		color: #ffffff;
	}

	.customtab2 li a.nav-link:hover {
		color: #ffffff;
		background: #398bf7;
	}

	.addServiceToDept,
	.removeServiceDept {
		cursor: pointer;
	}

	#incomeSubHeadList_wrapper,
	#addedServices_wrapper {
		padding-left: 0;
		padding-right: 0;
	}
</style>
@endpush

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Department wise service settings</h4>
			</div>
			<div class="card-body">
				<!-- Select Service -->
				<div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label class="col-sm-3 control-label">Select department:</label>
							<div class="col-sm-9">
								<div class="input-group">
									<select id="department_name" name="department_name"
										class="form-control custom-select">
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div id="opd_ipd_radio" class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label class="col-sm-3 control-label">Select OPD/IPD:</label>
							<div class="col-sm-6">
								<input class="with-gap" name="group1" type="radio" id="radio_1" value="OPD" checked="">
								<label for="radio_1">OPD</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input class="with-gap" name="group1" type="radio" id="radio_2" value="IPD">
								<label for="radio_2">IPD</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-6">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white">All service list</h4>
			</div>
			<div class="card-body form-body">
				<div class="table-responsive">
					<table id="incomeSubHeadList" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<!-- <th>Parent head</th> -->
								<th>Service name</th>
								<th>Rate</th>
								<th>Add</th>
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

	<div class="col-6">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white" id="dept_services_header">Reception services</h4>
			</div>
			<div class="card-body form-body">
				<div class="table-responsive">
					<table id="addedServices" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<th>Service name</th>
								<th>Rate</th>
								<th>Remove</th>
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


<!-- /delete doc modal -->
<div id="editSubHead" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="tooltipmodel">Are you sure to delete this Reception services?</h4>
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
	var id_department = "1";
	var radio_btn_val = "OPD";

	$('input:radio[name="group1"]').change(function () {
		id_department = $("#department_name").val();
		radio_btn_val = $('input[name=group1]:checked').val();
		reInitializeAddedServicesDt();
	});

	$("#department_name").change(function () {
		var department_val = this.value;
		var department_name = $("#department_name option:selected").text();
		$('#dept_services_header').html(department_name + " " + 'services');

		if (department_val != 1) {
			$("#opd_ipd_radio").hide('200');
		} else {
			$("#opd_ipd_radio").show('200');
		}

		id_department = $("#department_name").val();
		radio_btn_val = $('input[name=group1]:checked').val();
		reInitializeAddedServicesDt();
	});

	$.get("{{ url('/departmentList') }}", function (data) {
		var select_html = '';
		$.each(data, function (index, val) {
			select_html += '<option value = ' + val.id_department + '>' + val.department_name +
				'</option>';
		});
		$('#department_name').html(select_html);
	});

	var subHeadTable = $('#incomeSubHeadList').DataTable({
		"lengthMenu": [20, 40, 60, 80, 100],
		"pageLength": 20,
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ url('serviceListForSetting') }}",
			type: 'GET',
		},
		"order": [
			[0, 'asc']
		],

		columns: [
			// {
			// 	data: 'head_name',
			// 	name: 'head_name'
			// },
			{
				data: 'subhead_name',
				name: 'subhead_name'
			},
			{
				data: 'rate',
				name: 'rate'
			},

			{
				data: 'action',
				name: 'action',
				orderable: false,
				searchable: false
			},
		]
	});


	$('body').on('click', '.addServiceToDept', function () {
		var id_income_subhead = $(this).data('id');
		id_department = $("#department_name").val();
		radio_btn_val = $('input[name=group1]:checked').val();
		if (id_department != 1) {
			radio_btn_val = "empty";
		}

		$.post("{{ url('/addDeptServices') }}", {
				"_token": "{{ csrf_token() }}",
				'id_department': id_department,
				'id_income_subhead': id_income_subhead,
				'opd_or_ipd': radio_btn_val,
			},
			function (data, textStatus, xhr) {
				if (data.result == "success") {
					reInitializeAddedServicesDt();
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
						hideAfter: 3000,
						stack: 6
					});
				}
			});

	});


	// delete data
	var id_dept_services = "";
	$('body').on('click', '.removeServiceDept', function () {
		id_dept_services = $(this).data('id');
		$('#editSubHead').modal('show');
	});

	// delete yes click
	$("#delete_yes").on('click', function (event) {
		$.post("{{ url('deactiveDeptServices') }}", {
				"_token": "{{ csrf_token() }}",
				'id_dept_services': id_dept_services
			},
			function (data, textStatus, xhr) {
				if (data.result == "success") {
					reInitializeAddedServicesDt();
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
						hideAfter: 3000,
						stack: 6
					});
				}
			});
	});




	var addedServicesTable = function () {

		return $('#addedServices').DataTable({
			"lengthMenu": [20, 40, 60, 80, 100],
			"pageLength": 20,
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ url('servicesByDeptId') }}/" + id_department + "/" + radio_btn_val,
				type: 'GET',
			},
			"order": [
				[0, 'asc']
			],

			columns: [{
					data: 'name',
					name: 'name'
				},
				{
					data: 'rate',
					name: 'rate'
				},
				{
					data: 'action',
					name: 'action',
					orderable: false,
					searchable: false
				},
			]
		});
	}





	var dataTableAddedServices;
	dataTableAddedServices = addedServicesTable();

	function reInitializeAddedServicesDt() {
		if (typeof dataTableAddedServices != 'undefined') {
			dataTableAddedServices.destroy();
		}
		dataTableAddedServices = addedServicesTable();
	}
</script>

@endpush