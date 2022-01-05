<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ATT - Dashboard</title>
    <!-- Favicon  -->
    <link rel="icon" href="/images/admin/pixlr-bg-result.png">

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/admin/sb-admin-2.css" rel="stylesheet">
    <link href="/css/admin/styles.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/register-content/vendor/select2/select2.min.css">
    <!-- CKEditor Pluggin - para ingresar texto interactivo -->
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
            <div class="sidebar-brand-icon ">
                <img width="50%" src="/images/admin/pixlr-bg-result.png" alt="">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-home"></i>
                <span>Home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Panel de control
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <!-- Noticias -->
        <li class="nav-item active">
            <a class="nav-link" href="/tournaments">
                <i class="fas fa-newspaper"></i>
                <span>Torneos</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="/achievements">
                <i class="fas fa-trophy"></i>
                <span>
                    @can('haveaccess','achievementsown.show')
                        Mis
                    @endcan
                     Logros
                </span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Nav Item - Pages Collapse Menu -->
        <!-- Nav Item - Charts -->
        @can('haveaccess','user.index')
        <!-- Heading -->
            <div class="sidebar-heading">
                Administación
            </div>
        <li class="nav-item active">
            <a class="nav-link" href="/users">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Usuarios</span></a>
        </li>
        @endcan
        @can('haveaccess','role.index')
        <li class="nav-item active">
            <a class="nav-link" href="/roles">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Roles</span></a>
        </li>
        @endcan
        @can('haveaccess','permission.index')
        <li class="nav-item active">
            <a class="nav-link" href="/permissions">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Permisos</span></a>
        </li>
        @endcan
        @can('haveaccess','clubs.index')
        <!-- Clubs -->
        <li class="nav-item active">
            <a class="nav-link" href="/clubs">
                <i class="fas fa-passport"></i>
                <span>Clubs</span></a>
        </li>
        @endcan
        @can('haveaccess','levels.index')
        <!-- Levels -->
        <li class="nav-item active">
            <a class="nav-link" href="/levels">
                <i class="fas fa-passport"></i>
                <span>Categoria por nivel</span></a>
        </li>
        @endcan
        @can('haveaccess','categories.index')
        <!-- Categorias -->
        <li class="nav-item active">
            <a class="nav-link" href="/categories">
                <i class="fas fa-passport"></i>
                <span>Categoria por edad</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        @endcan
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{asset('/storage/images/users_images/'.Auth::user()->image_url)}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Salir
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2021 - Un aporte de <a target="_blank" href="https://iconosistemas.com.ec/portal/">Icono Sistemas</a> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Salir</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">Ha seleccionado salir ¿Desea cerrar sesión?</div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Salir
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/vendor/jquery/jquery.js"></script>

<script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>

<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/admin/sb-admin-2.js"></script>

<!-- Page level plugins -->
<script src="/vendor/chart.js/Chart.js"></script>

<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="/register-content/vendor/select2/select2.min.js"></script>
<!-- Page level custom scripts -->
<script src="/js/admin/demo/datatables-demo.js"></script>

@yield('js_post_page')
</body>
@include('sweetalert::alert')
</html>
