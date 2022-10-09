<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ebook Admin</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ebook Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Main Menu
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('books.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Books</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('diskusi.index') }}">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Diskusi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('event.index') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Event</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('karya_tulis.index') }}">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Karya Tulis</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengguna.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengguna</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('perpus.index') }}">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Perpus</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('saran.index') }}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Saran</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ url('assets/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">