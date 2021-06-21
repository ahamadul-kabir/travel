@extends('includes.header')
@section('pageTitle', 'user access')
@push('styles')
<style>
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

    .picture-upload:hover .upload-icon-wrap {
        opacity: 1;
        transform: scale(1);
    }

    .picture-upload:hover .upload-icon {
        opacity: 1;
        transform: scale(1);
    }

    #userEditForm input[readonly],
    #userEditForm select:not(#patient_type)[readonly],
    #userEditForm textarea[readonly] {
        opacity: 1;
        background-color: transparent;
    }

    button.btn.btn-circle.le-checkbox.btn-success {
        background: #06d79c;
    }


    .checkdiv {
        position: relative;
        padding: 4px 8px;
        border-radius: 40px;
        margin-bottom: 4px;
        min-height: 30px;
        padding-left: 40px;
        display: flex;
        align-items: center;
    }

    .le-checkbox {
        justify-content: center;
        align-items: center;
        display: flex;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="d-flex">
                    <div>
                        <h4 class="m-b-0 text-white">Page wise user access change</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Select user -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Select User:</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select id="userNameDropDown" name="userNameDropDown"
                                    class="form-control custom-select">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 control-label">Search page:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" id="customTableSearch" class="form-control" placeholder="Search page">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <form id="userPasswordChange">
                        <div class="form-body">
                            {{ csrf_field() }}

                            <div class="row p-t-20">
                                <div class="table-responsive">
                                    <table id="userAccessList"
                                    class="p-l-0 p-r-0 table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Modules name</th>
                                            <th>Page name</th>
                                            <th>Allow/Deny</th>
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
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {


        $.get("{{ url('/userList') }}", function(data) {
            var select_html = '';
            $.each(data, function(index, val) {
                select_html += '<option value = ' + val.id + '>' + val.name +
                '</option>';
                if (index == 0) {
                    pageListByUserId(val.id);
                }
            });
            $('#userNameDropDown').html(select_html);
        });


        $('#userNameDropDown').on('change', function() {
            pageListByUserId(this.value);
        });


        function pageListByUserId(id_user) {
            $("#userAccessList tbody tr").remove();
            $("#userAccessList").hide();
            $("#userAccessList").show();
            $.get("{{ url('/pageListByUserId') }}/" + id_user, function(data) {
                console.log(data);
                var finalData = JSON.parse(data);
                $.each(finalData, function(i, value) {
                    if (value.status == 'Allow') {
                        var checked = 'btn-success';
                        fonticon = 'fa-check';
                    } else {
                        var checked = 'btn-danger';
                        fonticon = 'fa-times';
                    }
                    $('#userAccessList').append('<tr><td>' + value.module_name +
                        '</td><td>' + value.page_name +
                        '</td><td><div class="checkdiv"><button type="button" class="btn btn-circle le-checkbox ' +
                        checked + '"><i class="fa ' + fonticon +
                        '"></i></button><input type="hidden" value="' + value
                        .id_page_of_page +
                        '"  /></div></td></tr>');
                });
            });
        }

        $('body').on('click', '.le-checkbox', function() {
            var status = '';
            var id_user = $('#userNameDropDown').val();
            var id_page = $(this).next().val();
            var module_name = $(this).closest('tr').children('td').first().text();
            if ($(this).hasClass('btn-success') === true) {
                status = 'deny';
            } else {
                status = 'allow';
            }
            console.log("TCL: status", id_user)

            $.post("{{ url('/allowOrDenyAccess') }}", {
                "_token": "{{ csrf_token() }}",
                'id_user': id_user,
                'id_page': id_page,
                'allow_deny': status,
                'module_name': module_name
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

                    pageListByUserId(id_user);

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


        $(document).ready(function() {
            $("#customTableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#userAccessList tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });


    });
</script>
@endpush