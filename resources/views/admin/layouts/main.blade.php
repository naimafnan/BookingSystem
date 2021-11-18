<!doctype html>
<html class="no-js" lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Doctor</title>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <link rel="icon" href="favicon.ico" type="image/x-icon" />

      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
      
      <link rel="stylesheet" href="{{asset('template/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/icon-kit/dist/css/iconkit.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/ionicons/dist/css/ionicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/jvectormap/jquery-jvectormap.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/weather-icons/css/weather-icons.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/c3/c3.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
      <script src="{{asset('template/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
  </head>

  <body>
      <div class="wrapper">
          <header class="header-top" header-theme="light">
              <div class="container-fluid">
                  <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                      <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                      <div class="header-search">
                          <div class="input-group">
                              <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                              <input type="text" class="form-control">
                          </div>
                      </div>
                  </div>
                      <div class="top-menu d-flex align-items-center">
                      </div>
                      <div class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <strong>{{ ucfirst(Auth::user()->name) }}</strong>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="{{ url('/user-profile') }}">
                              <i class="ik ik-users dropdown-icon"></i>
                              Profile
                            </a>
                        </div>
                      </div>
                  </div>
              </div>
          </header>

          <div class="page-wrap">
              <div class="app-sidebar colored">
                  <div class="sidebar-header">
                    <a href="" style="color: white">Welcome, {{ ucfirst(Auth::user()->name) }}</a>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                  </div>
                  
                  <div class="sidebar-content">
                      <div class="nav-container">
                          <nav id="main-menu-navigation" class="navigation-main">
                              <div class="nav-item active">
                                  <a href="{{ url('/dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                              </div>
                              @if (auth()->check()&& auth()->user()->role->name === 'doctor')
                                <div class="nav-item has-sub">
                                <div class="nav-lavel">Create Appointment</div>
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Appointment Time</span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('doctor.index') }}" class="menu-item">Schedule Timings</a>
                                        {{-- <a href="" class="menu-item">Check</a> --}}
                                    </div>
                                </div>
                              @endif
                              @if (auth()->check()&& auth()->user()->role->name === 'doctor')
                                <div class="nav-lavel">Patients</div>
                                <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-box"></i><span>Patient</span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('patientToday.index') }}" class="menu-item">Today</a>
                                        <a href="{{ route('allPatient.index') }}" class="menu-item">Upcoming</a>
                                        <a href="{{ route('expired.index') }}" class="menu-item">Expired</a>
                                    </div>
                                </div>
                              @endif
                              @if (auth()->check()&& auth()->user()->role->name === 'Admin')
                                <div class="nav-lavel">Doctor List</div>
                                <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-box"></i><span>Doctor</span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('admin.create') }}" class="menu-item">Create</a>
                                        <a href="{{ route('admin.index') }}" class="menu-item">View</a>
                                    </div>
                                </div>
                              @endif
                              @if (auth()->check()&& auth()->user()->role->name === 'Admin')
                                <div class="nav-lavel">Patients List</div>
                                <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-box"></i><span>Patient</span></a>
                                    <div class="submenu-content">
                                        <a href="" class="menu-item">Today</a>
                                    </div>
                                </div>
                              @endif
                              <div class="nav-item active">
                                <a onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                  </form>
                            </div>
                          </nav>
                      </div>
                  </div>
              </div>
              <div class="main-content">
                  @yield('content')
              </div>
              <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block"><p>Copyright 2021 © <strong>FOMEMA IOT Sdn. Bhd. </strong>All Rights Reserved.</p></span>
                </div>
              </footer>
          </div>
      </div>
      
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
      <script src="{{asset('template/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
      <script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
      <script src="{{asset('template/plugins/screenfull/dist/screenfull.js')}}"></script>
      <script src="{{asset('template/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('template/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('template/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
      <script src="{{asset('template/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
      <script src="{{asset('template/plugins/jvectormap/jquery-jvectormap.min.js')}}"></script>
      <script src="{{asset('template/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')}}"></script>
      <script src="{{asset('template/plugins/moment/moment.js')}}"></script>
      <script src="{{asset('template/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
      <script src="{{asset('template/plugins/d3/dist/d3.min.js')}}"></script>
      <script src="{{asset('template/plugins/c3/c3.min.js')}}"></script>
      <script src="{{asset('template/js/tables.js')}}"></script>
      <script src="{{asset('template/js/widgets.js')}}"></script>
      <script src="{{asset('template/js/charts.js')}}"></script>
      <script src="{{asset('template/dist/js/theme.min.js')}}"></script>
      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
      <script>
        $(document).ready(function() {
          $('#example').DataTable();
        } );
      </script>
  </body>
</html>
