<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link  href="../img/logo.png" />

    <title>SIAKAD | {{ $title }} </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                @if(Auth::guard('TU')->user()->foto =='default.png')
                <img src="../img/default.png" alt="..." class="img-circle profile_img">
                @else
                <img src="{{ asset('storage/' . Auth::guard('TU')->user()->foto) }}" alt="..." class="img-circle profile_img">
                @endif
              </div>
              <div class="profile_info">
                @if (Str::length(Auth::guard('guru')->user())>0)
                <h2 style="margin-top: 5px">{{ Auth::guard('guru')->user()->nama_guru }} </h2>
                @elseif (Str::length(Auth::guard('siswa')->user())>0)
                <h2 style="margin-top: 5px">{{ Auth::guard('siswa')->user()->nama_siswa }} </h2>
                @elseif (Str::length(Auth::guard('TU')->user())>0)
                <h2 style="margin-top: 5px">{{ Auth::guard('TU')->user()->nama_guru }} </h2>
                @endif
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" style="margin-top:20px;" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="/profile"><i class="fa fa-user"></i> Profile </a>
                  </li>
                  <li><a href="/jadwal"><i class="fa fa-home"></i>Dashboard</a>
                  </li>
                  <li><a href="/dataKelas"><i class="fa fa-graduation-cap"></i> Data Siswa </a>
                  </li>
                  <li><a href="/dataGuru"><i class="fa fa-table"></i> Data Guru </a>
                  </li>
                  <li><a><i class="fa fa-users"></i> Registrasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/registrasi/TU">Tata Usaha</a></li>
                      <li><a href="/registrasi">Guru</a></li>
                      <li><a href="/registrasi/siswa">Siswa</a></li>
                    </ul>
                  </li>
                  <li><a href="/kelasNilai"><i class="fa fa-file-excel-o"></i>Nilai</a>
                  </li>
                  <li><a href="/logout"><i class="fa fa-sign-out"></i>Logout </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu" style="background-color: blanchedalmond;">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <div style="margin:10px">
                <nav class="nav navbar-nav" style="display: contents;">
                <img style="width: 40px; height: 50px;" src="../img/logo.png" alt=""><b style="font-size:20px; margin-left:6px;">SMA Negeri 1 Darul Imarah</b>
                </nav>
              </div>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('container') 
        <!-- /page content -->
        
        <br/>
        </div>
        
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <span>Copyright &copy; Muhammad Fajar Ash Shiddiq <?= date('Y'); ?></span>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
	
  </body>
</html>
