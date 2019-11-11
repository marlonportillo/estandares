<?php
include 'conectar.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$pass = $_POST['contra'];
$estado = $_POST['estado'];
$idmodulo = $_POST['rol'];
$idemp = $_POST['idemp'];
 $hoy = date('Y-m-d H:i:s');


$sql = " UPDATE usuarios SET nombre = '$nombre',apellidos = '$apellido',usuario = '$usuario',clave= '$pass',estado = $estado,creacion ='$hoy' where id_usuario= $idemp ";
$sql2 = "UPDATE permisos set id_modulo = $idmodulo where id_usuario= $idemp  ";
$result = sqlsrv_query($conn,$sql);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die("  Datos actualizados. Please click on this link: <a href=mainsuper.php?module=listuser>back </a>");
}
else{
    exit(header("Location: mainsuper.php?module=detailpresu&id=<?php echo $id ?>"));
}
}


?>