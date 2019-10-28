<?php 
if (!isset($_SESSION)) {
    # code...
    session_start();
}

if (@!$_SESSION['user']) {
    echo "<script>alert('no haz iniciado sesion ');</script>";
    header("Location:login.php");
}
else{
    # code.
    if (isset($_GET['module']) && !empty($_GET['module']))
     :
    $module = $_GET['module'];
   

endif;
}
include 'conectar.php';

	$Titulo =$_POST["Titulo"];
	$description = $_POST["Descripción"];
    $desde =$_POST["desde"];
    $hasta = $_POST["hasta"];
    $id = $_SESSION['id'];
    $idarea = $_POST["area"];
	
$sqlquery = "INSERT INTO presupuesto (titulo,descripcion,fecha_publicacion,fecha_vencimiento,id_usuario,estado,id_empresa,presu_id_area)
VALUES ('$Titulo','$description','$desde','$hasta',$id,0,1,$idarea)
";

$result = sqlsrv_query($conn,$sqlquery);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die("presupuesto creado. Please click on this link: <a href=mainsuper.php?module=listpresu>back </a>");
}
else{
    exit(header("Location: mainsuper.php?module=editperfil"));
}
}

 ?>