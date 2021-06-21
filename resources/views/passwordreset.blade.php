<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>Password Reset</title>
    <!-- Bootstrap Core CSS -->
    
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- page css -->
    <link href="{{ asset('assets/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="{{ asset('assets/css/colors/default-dark.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

    .bg-image{
        background-image:url("{{asset('assets/images/background/login-img.jpg')}}");

    }
    .view{
        background-color: rgb(0,0,0,0.6);
        border-radius: 3%;
    }
    .form-input{
        width: 100%;
        height: 40px;
        padding-left: 45px;
        border: 0; 
        border-radius: 4px;
    }
    .icon{
        position: absolute;
        padding-top: 10px;
        height: 40px;
        color: #000;
    }

</style>
</head>
<!-- login-register -->
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" id="pre_loader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">TRAVEL WORLD</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register bg-image" >
            <div class="login-box card view">

                <div class="card-body">


                    <form class="form-horizontal" id="resetform" >
                     {{ csrf_field() }}

                     <div class="form-group col-12 text-center"> 

                        <h3 class="text-white">Password Reset</h3>

                    </div>

                    <div class="form-group col-12">

                        <input class="form-control" type="password" name="password"id="password" required placeholder="New Password"> 
                    </div>
                    <div class="form-group col-12">

                        <input class="form-control" type="password" name="con_password"id="con_password" required placeholder="Re-enter password"> 
                    </div>

                    <div class="form-group text-center m-t-20 col-12">
                        <button id="button_reset" class="btn btn-outline-light btn-md text-uppercase font-weight-bold"
                        type="submit">Submit</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js" type="text/javascript"></script>

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--Custom JavaScript -->
<!--     <script src="{{asset('assets/js/custom.js')}}"></script> -->
<script src="{{asset('assets/js/toastr.js')}}"></script>
<!-- Popup message jquery -->
<script src="{{asset('assets/plugins/toast-master/js/jquery.toast.js')}}"></script>

<script src="{{asset('assets/js/validation.js')}}"></script>

<!--Custom JavaScript -->
<script type="text/javascript">
    $(document).ready(function() {


        $(function () {
            $(".preloader").fadeOut();
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


        $("#resetform").on('submit', function (event) {
            event.preventDefault();
            $("#button_reset").prop("disabled", true);
            var access_token = window.location;
            var split = String(access_token).split('token=')
            var password = $("#password").val();
            var con_password = $("#con_password").val();
            $.ajax({
                url: "{{ url('/passwordreset') }}",
                type: "POST",
                data: {
                    'password': password,
                    'con_password': con_password,
                    'email_token': split[1],
                    '_token': '{{csrf_token()}}'
                },
                success: function(data) {
                    if (data.result == "error") {
                        showNotification(data.result,data.message);
                        $("#button_reset").prop("disabled", false);
                        setTimeout(function() {
                           window.location = '{{ url("/login") }}';
                       },3200);
                        
                    }else if (data.result == "success") {

                        showNotification(data.result,data.message);
                        setTimeout(function() {
                         window.location = '{{ url("/login") }}';
                     },3000);
                    }
                }
            });

        });


        function showNotification(type, message) {
          $.toast({
            heading: message,
            position: 'bottom-right',
            loaderBg: '#ff6849',
            icon: type,
            hideAfter: 3000,
            stack: 1
        });
      }

  });

</script>
</body>

</html>