<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('datatables/jquery.dataTables.js') }}" defer></script>
    <script src="{{ asset('datatables-bs4/js/dataTables.bootstrap4.js') }}" defer></script>
    <script src="{{ asset('summernote/summernote-bs4.min.js') }}" defer></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}" defer></script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="https://assets.exova.id/img/1.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
<body  class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Navbar -->
    <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-id-card"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://assets.exova.id/img/1.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Ngurah Krisna
                </h3>
                <p class="text-sm">Submit a report</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Report</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://assets.exova.id/img/1.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" role="button" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i
            class="fas fa-power-off"></i></a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </ul>
  </nav>
</div>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="https://assets.exova.id/img/1.png" alt="Exova Indonesia" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Exova Indonesia</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Layanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/jasaexova" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jasa Exova</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/invitationsexova" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exova Undangan Online</p>
                </a>
              </li> -->
            </ul>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Users
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/seler" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Seler
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/employees" class="nav-link">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                        Data Karyawan
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/blog" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Blogs
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/add/employees" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        Tambah Karyawan
                    </p>
                    </a>
                </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
        <main>
            @yield('content')
        </main>
    </div>
    <script>
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      @if(session('status'))
        Toast.fire({
          icon: 'success',
          title: '{{ session('status') }}',
        })
      @endif
      @if(session('error'))
        Toast.fire({
          icon: 'error',
          title: '{{ session('error') }}',
        })
      @endif
    })
    </script>
</body>
</html>
