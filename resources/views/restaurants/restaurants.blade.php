@extends('includes.header')
@section('pageTitle', 'Restaurants')
@push('styles')
<style type="text/css">

.addBtn{
    font-size: 18px;
    font-style: normal;
    font-weight: bold;

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
                    <h3 class="m-b-0 text-white">Show All Restaurant List</h3>
                </div>

            </div>
        </div>
        <div class="card-body">
           <div class="table-responsive">
            <table id="referralList" class="p-l-0 p-r-0 table table-bordered table-striped">
             <thead>
                <tr>

                    <th>Restaurants Name</th>
                    <th>Restaurants Address</th>
                    <th>Restaurants Phone Number</th>
                    <th>Restaurants Review</th>
                    <th width="10%">Action</th>
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
<!-- show Referral vid end here -->

</div> <!-- main row end div -->





@endsection
@push('scripts')


<!-- //javascript code start -->
<script type="text/javascript">
    $(document).ready(function() {


        $('#addBtn').click(function(event) {
            $('#modalHeader').html('booking Hotel');
            $('#addModal').modal('show');
        }) 

    });

</script>
<!-- //javascript code start -->
@endpush