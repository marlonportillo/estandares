<?php
session_start();
if (!$_SESSION['user']) {
    #Redirect to page login cacaso
    echo "<script>alert('no haz iniciado sesion ');</script>";
    header("Location:login.php");
} else {
    #obtener modulo a mostrar
    if (isset($_GET['module']) && !empty($_GET['module'])) :
        $module = $_GET['module'];
    endif;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Estadares de Programación">
    <meta name="author" content="Utec">
    <link rel="icon" type="image/png" href="favicon.png" />

    <title>Sistema de Presupuestos</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="mainsuper.php?module=index">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Presupuestos <sup>by utec</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-coins"></i>
                    <span>Presupuestos</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="mainoperador.php?module=listpresu">Listado General</a>
                        <a class="collapse-item" href="mainoperador.php?module=createpresu">Crear Presupuesto</a>
                        <a class="collapse-item" href="mainoperador.php?module=estados">Reportes</a>
                        <a class="collapse-item" href="mainoperador.php?module=seguimiento">Ejecucion Presupuesto</a>

                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Salir</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <span id="TitleModule"></span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user'] ?></span>
                                <i class="fas fa-caret-down fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="mainsuper.php?module=editperfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (!empty($module)) :
                        //Modules for Usuario Function
                        if ($module == "listuser") :
                            include "inc/super/usuarios/listuser.php";
                        endif;
                        if ($module == "updateuser") :
                            include "inc/super/usuarios/updateuser.php";
                        endif;
                        if ($module == "createuser") :
                            include "inc/super/usuarios/createuser.php";
                        endif;

                        //Modules for Presupuesto Function
                        if ($module == "createpresu") :
                            include "inc/operador/presupuestos/createpresu.php";
                        endif;
                        if ($module == "insertpresu") :
                            include "inc/operador/presupuestos/insert.php";
                        endif;
                        if ($module == "updatepresu") :
                            include "inc/operador/presupuestos/updatepresu.php";
                        endif;
                        if ($module == "listpresu") :
                            include "inc/operador/presupuestos/listpresu.php";
                        endif;
                        if ($module == "detailpresu") :
                            include "inc/operador/presupuestos/detailpresu.php";
                        endif;
                        if ($module == "procdetall") :
                            include "inc/operador/presupuestos/procesardetalle.php";
                        endif;
                        if ($module == "updtdet") :
                            include "inc/operador/presupuestos/updatedetalle.php";
                        endif;
                        if ($module == "procesarupddt") :
                            include "inc/operador/presupuestos/procesardettup.php";
                        endif;
                        if ($module == "procesarpres") :
                            include "inc/operador/presupuestos/procesarpresu.php";
                        endif;
                        if ($module == "creardetal") :
                            include "inc/operador/presupuestos/creardetalle.php";
                        endif;
                        if ($module == "evaluatepresu") :
                            include "inc/operador/presupuestos/evaluatepresu.php";
                        endif;
                        // procesamiento de revision de presupuestos 
                        if ($module == "rechazar") :
                            include "inc/operador/presupuestos/rechazar.php";
                        endif;
                        if ($module == "revisa") :
                            include "inc/operador/presupuestos/revisar.php";
                        endif;
                        if ($module == "aprovar") :
                            include "inc/operador/presupuestos/aprobar.php";
                        endif;
                        if ($module == "estados") :
                            include "inc/operador/presupuestos/estados_presu.php";
                        endif;
                        // segumiento
                        if ($module == "seguimiento") :
                            include "inc/operador/presupuestos/Seguimiento_presu.php";
                        endif;
                        if ($module == "segui_detalle") :
                            include "inc/operador/presupuestos/seguimi_detalle.php";
                        endif;
                        if ($module == "segui_proc") :
                            include "inc/operador/presupuestos/seguimi_procesa.php";
                        endif;
                        // reportes
                        if ($module == "rep_det") :
                            include "inc/operador/presupuestos/selectpresu.php";
                        endif;
                        if ($module == "rep_aprov") :
                            include "inc/super/presupuestos/report_preacept.php";
                        endif;
                        if ($module == "rep_rub") :
                            include "inc/operador/presupuestos/selectrub.php";
                        endif;
                        if ($module == "selectyear") :
                            include "inc/super/presupuestos/selectyear.php";
                        endif;
                        if ($module == "selectyearrev") :
                            include "inc/super/presupuestos/select_year_rev.php";
                        endif;
                        if ($module == "selectyearrech") :
                            include "inc/super/presupuestos/select_year_rech.php";
                        endif;
                        if ($module == "selectyeargener") :
                            include "inc/super/presupuestos/selectyear_gene.php";
                        endif;



                        //Modules Prefil 
                        if ($module == "editperfil") :
                            include "inc/super/perfil/editperfil.php";
                        endif;
                        if ($module == "updateperfil") :
                            include "inc/super/perfil/update.php";
                        endif;


                    endif;
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistema de Presupuestos 2019</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estas Seguro?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona cerrra sesión para confirmar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="desconectar.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>