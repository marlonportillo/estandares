<?php
include 'conectar.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$estado = $_POST['estado'];
 $hoy = date('Y-m-d H:i:s');


$sql = "INSERT into usuarios (nombre,apellidos,usuario,clave,estado,creacion)
values ('$nombre','$apellido','$usuario','$pass',$estado,'$hoy' )";


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