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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>NGO Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="{{ asset('../../assets/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">NGO</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">

                    <form class="form-horizontal form-material" id="loginform"  >
                        {{ csrf_field() }}
                        <!-- //method="POST" action="{{ route('login') }}" -->

                        <h3 class="box-title m-b-20">Sign In</h3>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">E-Mail Address</label>

                            <div class="col-xs-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Password</label>

                            <div class="col-xs-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>



                        <div style="display: none;" class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div style="display: none;" class="form-group row">
                            <div class="col-md-12">
                             <a href="" id="to-recover" class="text-muted float-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                             <!-- {{ route('password.request') }} -->
                         </div>
                         <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>

                    </form>


                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
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
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!--Custom JavaScript -->
        <script type="text/javascript">
            $(function() {
                $(".preloader").fadeOut();
            });
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html>