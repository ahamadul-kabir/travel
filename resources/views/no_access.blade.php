<!DOCTYPE html>
<html>
<head>
	<title>No access</title>
</head>
<body>
	
</body>
</html>

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
			<div class="card-header" style="background-color: #b90300">
				<h4 style="text-align: center;" class="m-b-0 text-white">Sorry you don't have access to this page !!! <br> If you really need to access then please contact with the admin.</h4>
			</div>
		</div>
	</div>
</div>


@endsection


@push('scripts')

<script>

</script>


@endpush