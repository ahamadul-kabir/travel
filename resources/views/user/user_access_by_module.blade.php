@extends('includes.header')
@section('pageTitle', 'user access by module')
@push('styles')
<style>
    #userEditForm input[readonly],
    #userEditForm select:not(#patient_type)[readonly],
    #userEditForm textarea[readonly] {
        opacity: 1;
        background-color: transparent;
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
        position: absolute !important;
        top: 50%;
        opacity: 1 !important;
        left: 5px !important;
        transform: translateY(-50%);
        background-color: #F44336;
        width: 30px;
        height: 30px;
        border-radius: 40px;
        margin: 0px;
        outline: none;
        transition: background-color .5s;
    }

    .le-checkbox:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(45deg);
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

    .le-checkbox:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

    .le-checkbox:checked {
        background-color: #4CAF50;
    }

    .le-checkbox:checked:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) translate(-4px, 3px) rotate(45deg);
        background-color: #ffffff;
        width: 12px;
        height: 5px;
        border-radius: 40px;
    }

    .le-checkbox:checked:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) translate(3px, 2px) rotate(-45deg);
        background-color: #ffffff;
        width: 16px;
        height: 5px;
        border-radius: 40px;
    }

    .allowAccess,
    .denyAccess {
        justify-content: center;
        align-items: center;
        display: flex;
    }
    button.btn.btn-success.btn-circle.allowAccess {
        background: #06d79c;
    }


    #userAccessList tbody tr td span:before {
        content: "";
        width: 10px;
        border-radius: 50%;
        height: 10px;
        display: inline-block;
        margin-right: .6rem;
    }
    #userAccessList tbody tr td span.Partially.allowed:before{
        background-color: #ffb22b;
    }
    #userAccessList tbody tr td span.All.denied:before{
        background-color: #ef5350;
    }
    #userAccessList tbody tr td span.All.allowed:before{
        background-color: #06d79c;
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
                        <h4 class="m-b-0 text-white">Module wise user access change</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Select user -->
                <div class="row">
                    <div class="col-md-12">
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
            </div>

            <form id="userPasswordChange">
                <div class="form-body">
                    {{ csrf_field() }}

                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="userAccessList" class="p-l-0 p-r-0 table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Modules name</th>
                                            <th>Status</th>
                                            <th>Allow</th>
                                            <th>Deny</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- dynamic table will be load here -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {


        $.get("{{ url('/userList') }}", function (data) {

            var select_html = '';
            $.each(data, function (index, val) {

                if (val.phone == null) {
                    select_html += '<option value = ' + val.id + '>' + val.name + '</option>';
                } else {
                    select_html += '<option value = ' + val.id + '>' + val.name + ' - ' + val
                    .phone + '</option>';
                }

                if (index == 0) {
                    pageListByUserId(val.id);
                }

            });
            $('#userNameDropDown').html(select_html);
        })


        $('#userNameDropDown').on('change', function () {
            pageListByUserId(this.value)
        });


        function pageListByUserId(id_user) {
            $("#userAccessList tbody tr").remove()
            $("#userAccessList").hide();
            $("#userAccessList").show();
            $.get("{{ url('moduleWiseAccessStatus') }}/" + id_user, function (data) {
                console.log("TCL: pageListByUserId -> data", data)
                var finalData = JSON.parse(data);
                $.each(finalData, function (i, value) {
                    if (value.status == 'Allow') {
                        var checked = 'checked';
                    } else {
                        var checked = '';
                    }
                    $('#userAccessList tbody').append('<tr><td>' + value.module_name +
                        '</td><td ><span class="' + value.status + '">' + value.status +
                        '</span></td><td><button type="button" class="btn btn-success btn-circle allowAccess"><i class="fa fa-check"></i></button></td><td><button type="button" class="btn btn-danger btn-circle denyAccess"><i class="fa fa-times"></i></button></td></tr>'
                        );
                });
            });
        }

        var id_user = "";

        $('body').on('click', '.allowAccess', function () {
            var id_user = $('#userNameDropDown').val();
            var module_name = $(this).closest('tr').children('td').first().text();

            $.post("{{ url('/allowOrDenyModuleAccess') }}", {
                "_token": "{{ csrf_token() }}",
                'id_user': id_user,
                'module_name': module_name,
                'allow_deny': 'allow'
            },
            function (data, textStatus, xhr) {
                if (data.result == "success") {
                    pageListByUserId(id_user);
                    $.toast({
                        heading: data.message,
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3000,
                        stack: 6
                    })
                } else if (data.result == "fail") {
                    $.toast({
                        heading: data.message,
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3000,
                        stack: 6
                    })
                }
            });
        });
        $('body').on('click', '.denyAccess', function () {
            id_user = $('#userNameDropDown').val();
            var module_name = $(this).closest('tr').children('td').first().text();

            $.post("{{ url('/allowOrDenyModuleAccess') }}", {
                "_token": "{{ csrf_token() }}",
                'id_user': id_user,
                'module_name': module_name,
                'allow_deny': 'deny'
            },
            function (data, textStatus, xhr) {
                if (data.result == "success") {
                    pageListByUserId(id_user);
                    $.toast({
                        heading: data.message,
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3000,
                        stack: 6
                    })
                } else if (data.result == "fail") {
                    $.toast({
                        heading: data.message,
                        position: 'bottom-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3000,
                        stack: 6
                    })
                }
            });
        });


    });
</script>
@endpush