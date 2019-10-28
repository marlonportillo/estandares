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

	$nombre =$_POST["nombre"];
	$pass = $_POST["calve"];
	$apellido =$_POST["apellidos"];
	$usuario =$_POST["usuario"];
	$hoy = date('d-m-Y H:i:s');
	$id = $_SESSION['id'];

$sqlquery = "UPDATE [presupuesto].[dbo].usuarios SET nombre = '$nombre',apellidos='$apellido',
usuario= '$usuario',clave= '$pass' WHERE id_usuario = $id";

$result = sqlsrv_query($conn,$sqlquery);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die("Datos actualizados. Please click on this link: <a href=mainsuper.php?module=editperfil>back </a>");
}
else{
    exit(header("Location: mainsuper.php?module=editperfil"));
}
}

 ?>