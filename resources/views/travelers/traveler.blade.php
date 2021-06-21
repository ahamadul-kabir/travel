@extends('includes.header')
@section('pageTitle', 'Travelers')

@push('styles')
<style>

.addBtn{
	font-size: 18px;
	font-style: normal;
	font-weight: bold;

}
.form_mar{
	margin-top: 0px
	margin-left: 15px;
	margin-right: 15px;
	margin-bottom: 20px;

}
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
.picture-upload:hover .upload-icon {
	opacity: 1;
	transform: scale(1);

}
.picture-upload:hover .upload-icon-wrap {
	opacity: 1;
	transform: scale(1);
}

</style>
@endpush

@section('content')

<div class="row">

	<div class="col-12">
		<div class="card">
			<div class="card-header bg-secondary">
				<div class="d-flex">
					<div class="align-self-center">
						<h3 class="m-b-0 text-white">Show All Traveler List</h3>
					</div>
					<div class="ml-auto">
						<button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">
						Add New Traveler</button>

					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="userManagList" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Image</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th width="5%">Action</th> 
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

<!-- /delete User modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" >Are you sure to delete this Traveler?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn waves-effect waves-light btn-outline-danger"
				data-dismiss="modal">Cancel</button>
				<button id="delete_yes" type="button" class="btn waves-effect waves-light btn-danger"
				data-dismiss="modal">Confirm</button>
			</div>
		</div>

	</div>

</div>
<!-- /end delete modal -->



<!-- / modal start here -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-secondary">
				<h4 class="modal-title text-white" id="modalHeader"></h4>
				<button type="button" class="close white" data-dismiss="modal" aria-hidden="true">×</button>
			</div>

			<div class="modal-body">
				<div class="col-12">
					<div class="card">

						<form id="addForm">
							<input type="hidden" name="edit_id" id="edit_id"/>
							<div class="form-body">
								{{ csrf_field() }}
								
								<center class="m-t-30">
									<div class="picture-upload">
										<img id="profile-pic" src="assets/images/man.png" width="150" />
										<span class="upload-icon-wrap"> <i class="upload-icon fas fa-camera"></i></span>
									</div>
									<!-- <h4 class="card-title m-t-10">Hanna Gover</h4> -->
									<input id="hidden_upload" accept=".gif,.png,.jpeg,.jpg" type="file" name="user-picture"
									size="chars">
								</center>

								<div class="row p-t-20">
									<div class="col-md-12">
										<div class="form-group row">
											<label  class="col-sm-4 control-label">First Name:<span
												class="text-danger">*</span></label>
												<div class="col-sm-8">
													<div class="controls">
														<input 
														type="text" maxlength="60" name="first_name" class="form-control" id="first_name"
														placeholder="First Name" required>
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-12">
											<div class="form-group row">
												<label  class="col-sm-4 control-label">Last Name:<span
													class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<input type="text" maxlength="60" name="last_name" class="form-control" id="last_name"
															placeholder="Last Name" required>
														</div>
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-12">
												<div class="form-group row">
													<label  class="col-sm-4 control-label">Email:<span
														class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<input type="text" maxlength="60" name="user_email" class="form-control" id="user_email"
																placeholder="Email Address" required>
															</div>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-12">
													<div class="form-group row">
														<label for="name" class="col-sm-4 control-label">Phone:<span class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<input type="number" min="0" maxlength="15" name="phone_num" class="form-control" id="phone_num" placeholder="Phone Number" required>
															</div>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-12">
													<div class="form-group row">
														<label for="name" class="col-sm-4 control-label">Address:</label>
														<div class="col-sm-8">
															<div class="controls">
																<textarea type="text" name="user_address" class="form-control" id="user_address"
																placeholder="Address"row="3" ></textarea>
															</div>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-12">
													<div class="form-group row">
														<label  class="col-sm-4 control-label">Password:<span
															class="text-danger">*</span></label>
															<div class="col-sm-8">
																<div class="controls">
																	<input type="text" maxlength="13" name="password" class="form-control" id="password"
																	placeholder="Passsword" required>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-12" id="con_pass_div">
														<div class="form-group row">
															<label  class="col-sm-4 control-label">Confirm Password:<span
																class="text-danger">*</span></label>
																<div class="col-sm-8">
																	<div class="controls">
																		<input type="text" maxlength="13" name="con_password" class="form-control" id="con_password"
																		placeholder="Confirm Password" required> 
																	</div>
																</div>
															</div>
														</div>
														<!--/span-->
														
													</div>
													<hr>
													<div class="form-actions text-right">
														<button type="button" class="btn waves-effect waves-light btn-outline-dark"
														data-dismiss="modal">Cancel</button>

														<button id="add_save_btn" type="submit" class="waves-effect waves-light btn btn-dark" > <i class="fa fa-check"> </i> Submit</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /end Add modal -->



					@endsection


					@push('scripts')
					<script type="text/javascript">
						$(document).ready(function() {



        						// show modal code
        						$('#addBtn').click(function(event) {

        							$('#modalHeader').html('New Traveler Information');
        							$('#profile-pic').attr('src', 'assets/images/man.png');
        							$('#addForm')[0].reset();
        							$('#addModal').modal('show');

        						});

        					});






        				</script>
        				@endpush
