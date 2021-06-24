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
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/hiking.png')}}">
    <title>@yield('pageTitle') - Travel Trek </title>


    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
    <!-- datatable css -->
    <link rel="stylesheet" type="text/css"
    href="{{asset('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

    <!-- toast CSS -->
    <link href="{{asset('assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">


    <!-- my styles -->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <!-- all other page specific style here -->
    @stack('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
    </head>
    <!-- end of header -->

    <body class="fix-header fix-sidebar card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">LOADING Travel Trek</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" id="headIcon">
                            <!-- Logo icon -->
                            <b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{asset('assets/images/hiking.png')}}" alt="homepage" class="dark-logo" />
                                <!--  Light Logo icon -->
                                <img src="{{asset('assets/images/hiking.png')}}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                                <!-- dark Logo text -->
                                <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="{{asset('assets/images/logo-text.png')}}" class="light-logo"
                                alt="homepage" /></span> </a>
                            </div>
                            <!-- ============================================================== -->
                            <!-- End Logo -->
                            <!-- ============================================================== -->
                            <div class="navbar-collapse">
                                <!-- ============================================================== -->
                                <!-- toggle and nav items -->
                                <!-- ============================================================== -->
                                <ul class="navbar-nav mr-auto">
                                    <!-- This is  -->
                                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark"
                                            href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                                            <li class="nav-item hidden-sm-down"></li>
                                        </ul>
                                        <!-- ============================================================== -->
                                        <!-- User profile and search -->
                                        <!-- ============================================================== -->
                                        <ul class="navbar-nav my-lg-0">

                                            <!-- ============================================================== -->
                                            <!-- Comment -->
                                            <!-- ============================================================== -->
                                            <li class="nav-item dropdown">
                                                <a href="javascript:;" class="right-side-toggle nav-link waves-effect waves-dark"><span
                                                    class="mdi mdi-brush text-white"></span></a>
                                                </li>
                                                <!-- ============================================================== -->
                                                <!-- End Comment -->
                                                <!-- ============================================================== -->

                                                <!-- ============================================================== -->
                                                <!-- Profile -->
                                                <!-- ============================================================== -->
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:;" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"><img src="" alt="user"
                                                    class="profile-pic" /></a>
                                                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                                        <ul class="dropdown-user">
                                                            <li>
                                                                <div class="dw-user-box">
                                                                    <div class="u-img"><img src="" class="profile-pic" alt="user"></div>
                                                                    <div class="u-text">
                                                                        <h4 id="name"></h4>
                                                                        <p class="text-muted" id="email"></p>
                                                                        <a href="{{ url('/myProfile') }}"
                                                                        class="btn  btn-success btn-sm">View Profile</a>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li role="separator" class="divider"></li>
                                                            <li><a href="{{ url('/logout/') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </header>
                                <!-- ============================================================== -->
                                <!-- End Topbar header -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                                <!-- ============================================================== -->
                                <aside class="left-sidebar">
                                    <!-- Sidebar scroll-->
                                    <div class="scroll-sidebar">
                                        <!-- Sidebar navigation-->
                                        <nav class="sidebar-nav">

                                            <ul id="sidebarnav">

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/dashboard') }}" aria-expanded="false">
                                                    <i data-icon="P" class="linea-icon  icon-home">
                                                    </i>
                                                    <span class="hide-menu">Dashboard</span></a>
                                                </li>  

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/createpackages')}}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-user-follow"></i><span class="hide-menu"> Create Packages </span></a>

                                                </li> 

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/tourpackages')}}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-user-follow"></i><span class="hide-menu"> Tour Packages </span></a>

                                                </li> 

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/booking') }}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-layers"></i><span
                                                    class="hide-menu">Bookings</span></a>

                                                </li> 

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/hotels') }}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-layers"></i><span
                                                    class="hide-menu">Hotels</span></a>

                                                </li>

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/restaurants') }}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-layers"></i><span
                                                    class="hide-menu">Restaurants</span></a>

                                                </li> 

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/travelgear') }}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-layers"></i><span
                                                    class="hide-menu">Travel Gear</span></a>

                                                </li>

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/travelers') }}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-layers"></i><span
                                                    class="hide-menu">Travellers</span></a>

                                                </li> 

                                                <li> <a class="waves-effect waves-dark" href="{{ url('/touragency') }}" aria-expanded="false"><i
                                                    data-icon="P" class="linea-icon  icon-layers"></i><span
                                                    class="hide-menu">Tour Agency </span></a>

                                                </li> 
                                                



                                          <!--   <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                                data-icon="P" class="linea-icon linea-basic"></i><span class="hide-menu">Settings</span></a>
                                                <ul aria-expanded="false" class="collapse">

                                                    <li><a href="{{ url('/user') }}">User</a></li>
                                                  

                                               </ul>
                                           </li> -->


                                       </ul>
                                   </nav>
                                   <!-- End Sidebar navigation -->
                               </div>
                               <!-- End Sidebar scroll-->
                           </aside>
                           <!-- ============================================================== -->
                           <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                           <!-- ============================================================== -->
                           <!-- ============================================================== -->
                           <!-- Page wrapper  -->
                           <!-- ============================================================== -->
                           <div class="page-wrapper">
                            <!-- ============================================================== -->
                            <!-- Container fluid  -->
                            <!-- ============================================================== -->
                            <div class="container-fluid">
                                <!-- ============================================================== -->
                                <!-- End PAge Content -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- Bread crumb and right sidebar toggle -->
                                <!-- ============================================================== -->
                                <div class="row page-titles">

                    <!-- <div>
                        <button
                        class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i
                        class="ti-settings text-white"></i></button>
                    </div> -->
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                @yield('content')



                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Color Panel <span><i class="ti-close right-side-toggle"></i></span>
                        </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark"
                                    class="default-dark-theme working">7</a></li>
                                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                                    </li>
                                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                                    </li>
                                    <li><a href="javascript:void(0)" data-theme="purple-dark"
                                        class="purple-dark-theme">11</a></li>
                                        <li><a href="javascript:void(0)" data-theme="megna-dark"
                                            class="megna-dark-theme ">12</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- End Right sidebar -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Container fluid  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- footer -->
                        <!-- ============================================================== -->
                        <footer class="footer">
                            © <?php echo date("Y"); ?> Travel Trek Developed by Travel Trek</a>
                        </footer>
                        <!-- ============================================================== -->
                        <!-- End footer -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Page wrapper  -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Wrapper -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- All Jquery -->
                <!-- ============================================================== -->
                <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
                <!-- Bootstrap popper Core JavaScript -->
                <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
                <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
                <!-- slimscrollbar scrollbar JavaScript -->
                <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
                <!--Wave Effects -->
                <script src="{{asset('assets/js/waves.js')}}"></script>
                <!-- data table -->
                <script src="{{asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
                <!--Menu sidebar -->
                <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
                <!--Custom JavaScript -->
                <script src="{{asset('assets/js/custom.js')}}"></script>
                <script src="{{asset('assets/js/toastr.js')}}"></script>
                <!-- Popup message jquery -->
                <script src="{{asset('assets/plugins/toast-master/js/jquery.toast.js')}}"></script>
                <script src="{{asset('assets/plugins/keyboardshortcut.js')}}"></script>

                <!-- ============================================================== -->
                <!-- This page plugins -->
                <!-- ============================================================== -->
                @stack('scripts')


                <!-- ============================================================== -->
                <!-- Style switcher -->
                <!-- ============================================================== -->
                <script>
    // Theme color settings
    $(document).ready(function() {
        function store(name, val) {
            if (typeof(Storage) !== "undefined") {
                localStorage.setItem(name, val);
            } else {
                window.alert('Please use a modern browser to properly view this template!');
            }
        }
        $("*[data-theme]").click(function(e) {
            e.preventDefault();
            var currentStyle = $(this).attr('data-theme');
            store('theme', currentStyle);
            $('#theme').attr({
                href: "{{asset('assets/css/colors') }}" + "/" + currentStyle + ".css"
            })
        });

        var currentTheme = localStorage.getItem('theme');
        if (currentTheme) {
            $('#theme').attr({
                href: "{{asset('assets/css/colors') }}" + "/" + currentTheme + ".css"
            });
        }
        // color selector
        $('#themecolors').on('click', 'a', function() {
            $('#themecolors li a').removeClass('working');
            $(this).addClass('working')
        });

    });
    $.get("{{ url('/myProfileData') }}", function(data) {
        if (data[0].image !== null) {
            $(".profile-pic").attr("src", "uploads/userimages/" + data[0].image);
        } else if (data[0].image == null) {

            $(".profile-pic").attr("src", "assets/images/man.png");
        }

        $('#name').html(data[0].name);
        $('#eamil').html(data[0].eamil);
        if(data[0].user_type == 4){
            $('#admini').hide();
        }
    });


    shortcut.add("Ctrl+O", function() {
        window.location = '{{ url("/receptionopd") }}';
    });

    shortcut.add("Ctrl+I", function() {
        window.location = '{{ url("/receptionipd") }}';
    });

    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide'); 
    });

    

</script>

</body>

</html>