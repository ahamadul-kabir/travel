@extends('includes.header')
@section('pageTitle', 'Doctor Room')
@section('content')
<div class="row">
	<div class="col-md-6 col-sm-12">
		<div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Add new Room</h4>
            </div>
            <div class="card-body">
                <form id="room_add_form">
                    <div class="form-body">
                        {{ csrf_field() }}
                        <!--/row-->
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="room-no" class="col-sm-3 control-label">Room name / no.: <span
										class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" min="1" maxlength="10" class="form-control"
                                            name="room_name" id="room_name" placeholder="Room no"
                                            onKeyUp="if(this.value<0){this.value='0';}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="remark" class="col-sm-3 control-label">Remark: </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea type="text" maxlength="256" rows="3" class="form-control"
                                            name="remark" id="remark" placeholder="Remark"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>
                    <hr>
                    <div class="form-actions text-right">
                        <button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-info"> <i
                            class="fa fa-check"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">Room List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="roomList" class="p-l-0 p-r-0 table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Actions</th>
                                    <th>Room Name/No.</th>
                                    <th>Remark</th>
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
    <div id="deleteDoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="tooltipmodel">Are you sure to delete this room?</h4>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#room_add_form").on('submit', function(event) {
                event.preventDefault();
                $("#add_save_btn").prop("disabled", true);

                var form_data = document.getElementById("room_add_form");
                var fd = new FormData(form_data);
                $.ajax({
                    url: "{{ url('/addNewRoom') }}",
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                        console.log(data);
                        if (data.result == "success") {
                            $('#room_add_form')[0].reset();
                            table.ajax.reload(null, false);
                            $.toast({
                                heading: data.message,
                                position: 'bottom-right',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 3000,
                                stack: 6
                            });

                            $('#roomList').DataTable();
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
                        $("#add_save_btn").prop("disabled", false);
                    }
                });

            });

    // list data
    var table = $('#roomList').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('roomList') }}",
            type: 'GET',
        },
        "order": [
        [1, 'asc']
        ],
        columns: [
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },
        {
            data: 'room_name',
            name: 'room_name'
        },
        {
            data: 'remark',
            name: 'remark'
        },
        
        ]
    });

    // delete data
    var id_doctor_for_delete = "";
    $('body').on('click', '.deleteData', function() {
        id_doctor_for_delete = $(this).data('id');
        $('#deleteDoc').modal('show');
    });

    // delete yes click
    $("#delete_yes").click(function(event) {
        $.post("{{ url('/deleteRoom') }}", {
            "_token": "{{ csrf_token() }}",
            'id': id_doctor_for_delete,
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

});
</script>
@endpush