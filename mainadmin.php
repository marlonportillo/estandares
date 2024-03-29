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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="mainadmin.php?module=index">
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
                        <a class="collapse-item" href="mainadmin.php?module=listpresu">Listado General</a>
                        <a class="collapse-item" href="mainadmin.php?module=createpresu">Crear Presupuesto</a>
                        <a class="collapse-item" href="mainadmin.php?module=estados">Reportes</a>
                        <a class="collapse-item" href="mainadmin.php?module=seguimiento">Ejecucion Presupuesto</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="mainadmin.php?module=listuser">Listado General</a>
                        <a class="collapse-item" href="mainadmin.php?module=createuser">Crear Usuario</a>
                         <a class="collapse-item" href="mainadmin.php?module=asignar_rol">Asignar Rol</a>
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
                                <a class="dropdown-item" href="mainadmin.php?module=editperfil">
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
                            include "inc/administrador/usuarios/listuser.php";
                        endif;
                        if ($module == "updateuser") :
                            include "inc/administrador/usuarios/updateuser.php";
                        endif;
                        if ($module == "createuser") :
                            include "inc/administrador/usuarios/createuser.php";
                        endif;
                        if ($module == "procesauser") :
                            include "inc/administrador/usuarios/insertausuario.php";
                        endif;
                        if ($module == "asignar_rol") :
                            include "inc/administrador/usuarios/asignar_permisos.php";
                        endif;
                        if ($module == "procesrol") :
                            include "inc/administrador/usuarios/prossrol.php";
                        endif;
                        if ($module == "procesuser") :
                            include "inc/administrador/usuarios/procesupdaetuser.php";
                        endif;
                        

                        //Modules for Presupuesto Function
                        if ($module == "createpresu") :
                            include "inc/administrador/presupuestos/createpresu.php";
                        endif;
                        if ($module == "insertpresu") :
                            include "inc/administrador/presupuestos/insert.php";
                        endif;
                        if ($module == "updatepresu") :
                            include "inc/administrador/presupuestos/updatepresu.php";
                        endif;
                        if ($module == "listpresu") :
                            include "inc/administrador/presupuestos/listpresu.php";
                        endif;
                        if ($module == "detailpresu") :
                            include "inc/administrador/presupuestos/detailpresu.php";
                        endif;
                        if ($module == "procdetall") :
                            include "inc/administrador/presupuestos/procesardetalle.php";
                        endif;
                        if ($module == "updtdet") :
                            include "inc/administrador/presupuestos/updatedetalle.php";
                        endif;
                        if ($module == "procesarupddt") :
                            include "inc/administrador/presupuestos/procesardettup.php";
                        endif;
                        if ($module == "procesarpres") :
                            include "inc/administrador/presupuestos/procesarpresu.php";
                        endif;
                        if ($module == "creardetal") :
                            include "inc/administrador/presupuestos/creardetalle.php";
                        endif;
                        if ($module == "evaluatepresu") :
                            include "inc/administrador/presupuestos/evaluatepresu.php";
                        endif;
                        // procesamiento de revision de presupuestos 
                        if ($module == "rechazar") :
                            include "inc/administrador/presupuestos/rechazar.php";
                        endif;
                        if ($module == "revisa") :
                            include "inc/administrador/presupuestos/revisar.php";
                        endif;
                        if ($module == "aprovar") :
                            include "inc/administrador/presupuestos/aprobar.php";
                        endif;
                        if ($module == "estados") :
                            include "inc/administrador/presupuestos/estados_presu.php";
                        endif;
                        // segumiento
                        if ($module == "seguimiento") :
                            include "inc/administrador/presupuestos/Seguimiento_presu.php";
                        endif;
                        if ($module == "segui_detalle") :
                            include "inc/administrador/presupuestos/seguimi_detalle.php";
                        endif;
                        if ($module == "segui_proc") :
                            include "inc/administrador/presupuestos/seguimi_procesa.php";
                        endif;
                        // reportes
                        if ($module == "rep_det") :
                            include "inc/administrador/presupuestos/selectpresu.php";
                        endif;
                        if ($module == "rep_aprov") :
                            include "inc/administrador/presupuestos/report_preacept.php";
                        endif;
                        if ($module == "rep_rub") :
                            include "inc/administrador/presupuestos/selectrub.php";
                        endif;
                        if ($module == "selectyear") :
                            include "inc/administrador/presupuestos/selectyear.php";
                        endif;
                        if ($module == "selectyearrev") :
                            include "inc/administrador/presupuestos/select_year_rev.php";
                        endif;
                        if ($module == "selectyearrech") :
                            include "inc/administrador/presupuestos/select_year_rech.php";
                        endif;
                        if ($module == "selectyeargener") :
                            include "inc/administrador/presupuestos/selectyear_gene.php";
                        endif;



                        //Modules Prefil 
                        if ($module == "editperfil") :
                            include "inc/administrador/perfil/editperfil.php";
                        endif;
                        if ($module == "updateperfil") :
                            include "inc/administrador/perfil/update.php";
                        endif;
                        // modulos de catalogos 
                        if ($module == "area") :
                            include "inc/administrador/catalogos/areas.php";
                        endif;
                        if ($module == "roles") :
                            include "inc/administrador/catalogos/roles.php";
                        endif;
                        if ($module == "rubros") :
                            include "inc/administrador/catalogos/rubros.php";
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
    
    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    
    <script src="moda.js"></script>
    <script src="modal2.js"></script>
</body>

</html>