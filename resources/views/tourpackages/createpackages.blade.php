@extends('includes.header')
@section('pageTitle', 'Create Packages')
@push('styles')
<style type="text/css">

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
.picture-upload:hover .upload-icon {
	opacity: 1;
	transform: scale(1);

}
.picture-upload:hover .upload-icon-wrap {
	opacity: 1;
	transform: scale(1);
}
.col-md-12{
	padding-left: 150px;
	padding-right: 150px;
}
.text-right{
	padding-bottom: 20px;
	padding-right: 30px;
}
</style>
@endpush
@section('content')
<div class="row"> <!-- main row start div -->


	<!-- show Referral vid start bellow -->
	<div class="col-12">
		<div class="card">

			<div class="card-header bg-secondary">
				<div class="d-flex">
					<div class="align-self-center">
						<h3 class="m-b-0 text-white">Create Tour Packages </h3>
					</div>
				</div>
			</div>
			<form id="addForm">
				<input type="hidden" name="edit_id" id="edit_id"/>
				<div class="form-body">
					{{ csrf_field() }}
					<div class="row p-t-20">
						<div class="col-md-12">
							<div class="form-group row">
								<label for="name" class="col-sm-3 control-label">place Image :<span
									class="text-danger">*</span></label>
									<div class="col-sm-9">
										<center class="m-t-30">
											<div class="picture-upload">
												<img id="profile-pic" src="assets/images/man.png" width="150" />
												<span class="upload-icon-wrap"> <i class="upload-icon fas fa-camera"></i></span>
											</div>
											<!-- <h4 class="card-title m-t-10">Hanna Gover</h4> -->
											<input id="hidden_upload" accept=".gif,.png,.jpeg,.jpg" type="file" name="user-picture"
											size="chars">
										</center>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-12">
								<div class="form-group row">
									<label for="name" class="col-sm-3 control-label">Duration :<span
										class="text-danger">*</span></label>
										<div class="col-sm-9">
											<div class="controls">
												<input type="text" name="duration" class="form-control" id="duration"
												placeholder="Duration [ 3 Days & 4 Night ]" required>
											</div>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-12">
									<div class="form-group row">
										<label for="name" class="col-sm-3 control-label">Locations :<span
											class="text-danger">*</span></label>
											<div class="col-sm-9">
												<div class="controls">
													<input type="text" name="locations" class="form-control" id="locations"
													placeholder="Locations" required>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group row">
											<label for="name" class="col-sm-3 control-label">Attractions :<span
												class="text-danger">*</span></label>
												<div class="col-sm-9">
													<div class="controls">
														<textarea type="text"  name="attractions" class="form-control" id="attractions" rows="4"
														placeholder="Attractions [ Tourist Places to Visit ]"required ></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group row">
												<label for="name" class="col-sm-3 control-label">Facilities :<span
													class="text-danger">*</span></label>
													<div class="col-sm-9">
														<div class="controls">
															<textarea type="text"  name="facilities" class="form-control" id="facilities" rows="4"
															placeholder="facilities [facilities provided to tourists]"required ></textarea>
														</div>
													</div>
												</div>
											</div>

											<!--/span-->
											<div class="col-md-12">
												<div class="form-group row">
													<label for="phone" class="col-sm-3 control-label">Travel Date :<span
														class="text-danger">*</span></label>
														<div class="col-sm-9">
															<div class="controls">
																<input type="date" name="travel_date" class="form-control" id="travel_date"
																placeholder="" required>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group row">
														<label for="name" class="col-sm-3 control-label">Cost :<span
															class="text-danger">*</span></label>
															<div class="col-sm-9">
																<div class="controls">
																	<input type="text" name="cost" class="form-control" id="cost"
																	placeholder="Cost [ 10000 tk ]" required>
																</div>
															</div>
														</div>
													</div>

													<!--/span-->
													<div class="col-md-12">
														<div class="form-group row">
															<label for="name" class="col-sm-3 control-label">Travel Agency Name :<span
																class="text-danger">*</span></label>
																<div class="col-sm-9">
																	<div class="controls">
																		<input type="text" name="agencyName" class="form-control" id="agencyName"
																		placeholder="Travel Agency Name" required>
																	</div>
																</div>
															</div>
														</div>

													</div>
													<hr>
													<div class="form-actions text-right">
														<button type="button" class="btn waves-effect waves-light btn-outline-dark"
														data-dismiss="modal">Cancel</button>

														<button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-dark" ><i class="fa fa-check"></i> Save</button>
													</div>
												</div>
											</form>

										</div>
									</div>

								</div> <!-- main row end div -->

								@endsection
								@push('scripts')


								<!-- //javascript code start -->
								<script type="text/javascript">
									$(document).ready(function() {




									});

								</script>
								<!-- //javascript code start -->
								@endpush