@extends('includes.header')
@section('pageTitle', 'Hotels')
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
                  <h3 class="m-b-0 text-white">Show All Hotel List</h3>
              </div>
          </div>
      </div>
      <div class="card-body">
       <div class="table-responsive">
        <table id="referralList" class="p-l-0 p-r-0 table table-bordered table-striped">
         <thead>
            <tr>

                <th>Hotel Name</th>
                <th>Hotel Address</th>
                <th>Hotel Phone Number</th>
                <!-- <th>Room available</th> -->
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
<div class="col-12">
 <div class="card">

    <div class="card-header bg-secondary">
        <div class="d-flex">
            <div class="align-self-center">
                <h3 class="m-b-0 text-white">Show All Hotel Booking List</h3>
            </div>
            <div class="ml-auto">
              <button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">
              Booking Hotel </button>

          </div>
      </div>
  </div>
  <div class="card-body">
   <div class="table-responsive">
    <table id="referralList" class="p-l-0 p-r-0 table table-bordered table-striped">
     <thead>
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Hotel Name</th>
            <th>Traveler Name</th>
            <th>Traveler Address</th>
            <th>Traveler Phone Number</th>
            <th>Travel Members</th>
            <!-- <th>Room Numbers</th> -->
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

</div> <!-- main row end div -->

<!-- /delete User modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >Are you sure to delete this Booking?</h4>
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

<!-- /add Referral modal -->
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
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 control-label">Start Date:<span
                                            class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <div class="controls">
                                                    <input type="date" name="start_date" class="form-control" id="start_date"
                                                    placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 control-label">End Date:<span
                                                class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="controls">

                                                        <input type="date" name="end_date" class="form-control" id="end_date"
                                                        placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 control-label"> Hotel Name:<span
                                                    class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" id="theName"
                                                            placeholder="Hotel Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-3 control-label">Traveler Name:<span
                                                        class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <div class="controls">
                                                                <input type="text" name="name" class="form-control" id="theName"
                                                                placeholder="Name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="name" class="col-sm-3 control-label">Traveler Address:<span
                                                            class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <div class="controls">
                                                                    <textarea type="text"  name="address" class="form-control" id="address" rows="4"
                                                                    placeholder="Address"required ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-3 control-label">Traveler Phone Number:<span
                                                                class="text-danger">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <div class="controls">
                                                                        <input type="text" name="phoneNum" class="form-control" id="phoneNum"
                                                                        placeholder="Phone Number" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->

                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label for="name" class="col-sm-3 control-label">Members:<span
                                                                    class="text-danger">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <div class="controls">
                                                                            <input type="text" name="members" class="form-control" id="members"
                                                                            placeholder="members" required>
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

                                                            <button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-dark" ><i class="fa fa-check"></i> Save</button>
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