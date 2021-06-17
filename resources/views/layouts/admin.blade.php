<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  
{{--   <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css"> --}}

  {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  {{-- <link rel="stylesheet" href="css/style.css"> --}}
  {!! Html::style('melody/css/style.css') !!}
  @yield('styles')
  <!-- endinject -->
  <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>
<body>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                @if($business)
                    @foreach($business as $business)
                        <a class="navbar-brand brand-logo" href="{{route('home.index')}}">
                            <img src="{{asset('image/'.$business->logo)}}" alt="{{$business->name}}" />
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="{{route('home.index')}}">
                            <img src="{{asset('image/'.$business->logo)}}" alt="{{$business->name}}"/>
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    @yield('create')
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            {{auth()->user()->username}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{route('users.edit', auth()->user() )}}">
                                <i class="fas fa-cog text-primary"></i>Editar mi usuario
                            </a>
                            <div class="dropdown-divider"></div>
                            <div>
                                <form class="dropdown-item" action="{{route('logout')}}" method="POST">
                                @csrf
                                    <span class="dropdown-item" href="{{route('logout')}}">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-power-off text-primary"></i> LogOut
                                        </button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" 
                    type="button" data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @yield('preference')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts._nav')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                            Copyright © 2018. All rights reserved.
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-uppercase">
                            {{$business->name}} <i class="far fa-heart text-danger"></i>
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                            Codigo hecho por Emmanuel Hernandez <i class="far fa-heart text-danger"></i>
                        </span>
                    </div>
                </footer>
            <!-- partial -->
            </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
        {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
        {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
    {{--   <script src="vendors/js/vendor.bundle.base.js"></script>
        <script src="vendors/js/vendor.bundle.addons.js"></script> --}}
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        {!! Html::script('melody/js/off-canvas.js') !!}
        {!! Html::script('melody/js/hoverable-collapse.js') !!}
        {!! Html::script('melody/js/misc.js') !!}
        {!! Html::script('melody/js/settings.js') !!}
        {!! Html::script('melody/js/todolist.js') !!}
        {{--   <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script> --}}
        <!-- endinject -->
        <!-- Custom js for this page-->
        {!! Html::script('melody/js/dashboard.js') !!}
        {{-- <script src="js/dashboard.js"></script> --}}
        <!-- End custom js for this page-->
        @yield('scripts')
</body>


</html>
