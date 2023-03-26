<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <link href="{{ URL::asset('static/concept-master/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/perfil.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/master.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ URL::asset('static/concept-master/assets/libs/css/seatchart.css')}}">
    <link rel="icon" type="image/png" href="{{ URL::asset('static/img/ps_16px.png')}}" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <title>Parking System</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-header" >
            <nav class="navbar navbar-expand-lg fixed-top">
                <a class="navbar-brand" href="/">Parking  <b>System</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">                     
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ URL::asset('static/img/usuarios/'.Auth::user()->img.'')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"> {{Auth::user()->name}} </h5>
                                    <span class="status"></span><span class="ml-2">Disponible</span>
                                </div>
                                @if(Auth::user()->role=="0")
                                    <a class="dropdown-item" href="/admin/perfil"><i class="fas fa-user mr-2"></i>Perfil</a>
                                @elseif(Auth::user()->role=="1")
                                    <a class="dropdown-item" href="/user/perfil"><i class="fas fa-user mr-2"></i>Perfil</a>
                                @endif
                                <a class="dropdown-item" href="/logout"><i class="fas fa-power-off mr-2"></i>Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div> -->
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            
                            @section('content-nav')
                            @show

                            
                        </ul>
                    </div>
                    
                    
                </nav>

            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    
                    @section('content')
                    
                    
                    @show
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer" id="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script>
        @if(Session::has('message1'))
            
            toastr.success("{{ Session::get('message1') }}");

        @endif
        @if(Session::has('message2'))
            
            toastr.success("{{ Session::get('message2') }}");

        @endif
        @if(Session::has('message3'))
            
            toastr.success("{{ Session::get('message3') }}");

        @endif
        /* Se ha registrado la reserva correctamente */
        @if(Session::has('message4'))
            
            toastr.success("{{ Session::get('message4') }}");

        @endif
        /* ----- */
        /* espacio liberado */
        @if(Session::has('message5'))
            
            toastr.success("{{ Session::get('message5') }}");

        @endif
        /* Foto de perfil actualizada correctamente */
        @if(Session::has('message6'))
            toastr.success("{{ Session::get('message6') }}");
        @endif
        
        /*--------*/
        /* Vehiculo actualizado correctamente */
        @if(Session::has('message7'))
            toastr.success("{{ Session::get('message7') }}");
        @endif
        
        /*--------*/
        
        
    </script>
    <script type="text/javascript" src="{{ URL::asset('static/concept-master/assets/libs/js/index.js')}}">
    <script type="text/javascript" src="{{ URL::asset('static/concept-master/assets/libs/js/seatchart.js')}}"></script>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/libs/js/main-js.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/libs/js/admin-dashboard.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/libs/js/dashboard-ecommerce.js')}}"></script>
    <script src="{{ URL::asset('static/concept-master/assets/libs/js/maphilight-master/jquery.maphilight.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        @section('scripts')
        @show

        
    </script>
</body>

</html>
