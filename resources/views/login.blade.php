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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>NGO Login</title>
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
    <style>

    .bg-image{
        background-image:url(assets/images/background/travell.jpg);
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
            <div class="login-box card view ">
                <div class="card-body ">

                    <form class="form-horizontal form-material" id="login_form">
                        {{ csrf_field() }}


                        <h3 class="box-title p-t-10 m-b-20 text-white font-weight-bold text-center">Login</h3>


                        <div class="form-group p-t-20">

                            <span class="fas fa-user input-group-text icon"></span>
                            <input id="email" type="email" class="form-input" name="email" placeholder="Phone Number or Email" 
                            value="{{ old('email') }}" required autofocus>

                        </div>


                        <div class="form-group">

                            <span class="fas fa-lock input-group-text icon"></span>
                            <input id="password" type="password" class="form-input" name="password" placeholder="Password" required>

                        </div>



                        <div style="display: none;" class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group text-center">
                            <button class="btn-outline-light rounded btn btn-md font-weight-bold" type="submit">Log In</button>

                        </div>

                        <div class="row justify-content-center">
                            <h4 id="forget_password" style="cursor: pointer;" class="text-white">
                            Forgot password?</h4> 
                        </div>

                    </form>


                    <form class="form-horizontal" id="recoverform" >
                        <div class="form-group col-xs-12">


                            <h3 id="recevory_title" class="text-white">Recover Password</h3>
                            <p id="recovery_message" class="text-white">Enter your Email and instructions will be sent to you! </p>

                        </div>
                        <div  id="recovery_input_section">
                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="email" name="recovery_email"id="recovery_email" required placeholder="Email Address"> </div>
                                </div>

                                <div class="form-group text-center m-t-20">
                                    <div class="col-xs-12">
                                        <button id="button_emailsend" class="btn btn-outline-light btn-md text-uppercase font-weight-bold"
                                        type="submit">send</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <h4 id="login_back" style="cursor: pointer;" class="text-white">
                                        Are you want to <b>Login?</b></h4> 
                                    </div>
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

            <script src="assets/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

            <!--Custom JavaScript -->
            <!--   <script src="{{asset('assets/js/custom.js')}}"></script> -->
            <script src="{{asset('assets/js/toastr.js')}}"></script>
            <!-- Popup message jquery -->
            <script src="{{asset('assets/plugins/toast-master/js/jquery.toast.js')}}"></script>

            <script src="{{asset('assets/js/validation.js')}}"></script>

            <!--Custom JavaScript -->
            <script type="text/javascript">
                jQuery(document).ready(function ($) {


                   $(function () {
                    $(".preloader").fadeOut();
                });
                   $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });

                   $('#forget_password').on("click", function (event) {
                    event.preventDefault();
                    $('#login_form').toggle();
                    $('#recoverform').show(500); 
                });

                   $('#login_back').on("click", function (event) {
                    event.preventDefault();
                    $('#recoverform').toggle(); 
                    $('#login_form').show(500);
                });


                   $("#login_form").on('submit', function (event) {
                    event.preventDefault();

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    var email = $("#email").val();
                    var password = $("#password").val();
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/loginCheck') }}",
                        data: {
                            'email': email,
                            'password': password,
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (data) {
                            if (data.result == "error") {

                                showNotification('error','Invalid email or password.');
                            } else if (data.result == "empty") {

                                showNotification('error','Email or password can not be empty.');
                            } else if (data.result == "success") {

                                window.location = '{{ url("/dashboard") }}';

                            }
                        }
                    });

                });


                   $("#recoverform").on('submit', function (event) {
                    event.preventDefault();
                    $("#button_emailsend").prop("disabled", true);
                    $("#button_emailsend").text("Please wait...");

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    var email = $("#recovery_email").val();
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/sendemail') }}",
                        data: {
                            'email': email,
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (data) {
                            if (data.result == "error") {
                                showNotification(data.result,data.message);

                                $("#button_emailsend").prop("disabled", false);
                                $("#button_emailsend").text("send"); 
                            }else if (data.result == "success") {

                                hideinputSection(data.message);

                            }
                        }
                    });
                });

                   function hideinputSection($message) {
                    $('#recovery_input_section').hide(100); 
                    $('#recevory_title').text("E-mail Send Successfully");                        
                    $('#recovery_message').text($message); 
                    showNotification("success",$message);
                }

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
                ! function (window, document, $) {
                    "use strict";
                    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
                }(window, document, jQuery);
            </script>
        </body>

        </html>