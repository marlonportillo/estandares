<?php
require('conectar.php');
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <br>
            <br>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (!empty($module)) :
                        
                        // reportes
                        if ($module == "rep_det") :
                            include "inc/super/presupuestos/selectpresu.php";
                        endif;
                        if ($module == "rep_aprov") :
                            include "inc/super/presupuestos/report_preacept.php";
                        endif;
                        if ($module == "rep_rub") :
                            include "inc/super/presupuestos/selectrub.php";
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
                        if ($module == "creardetal") :
                            include "inc/super/presupuestos/creardetalle.php";
                        endif;
                        if ($module == "procdetall") :
                            include "inc/super/presupuestos/procesardetalle.php";
                        endif;
                        if ($module == "detailpresu") :
                            include "inc/super/presupuestos/detailpresu.php";
                        endif;
                        if ($module == "updtdet") :
                            include "inc/super/presupuestos/updatedetalle.php";
                        endif;

                    endif;
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>