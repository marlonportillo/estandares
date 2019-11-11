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
   $nombre = $_POST['area'];
   $des = $_POST['desc'];
   include 'conectar.php';
$sql ="INSERT INTO areas (nom_area,descripcion)
VALUES ('$nombre','$des')
 " ;

$result = sqlsrv_query($conn,$sql);


if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

	if (headers_sent()) {
	    die(" Location: mainsuper.php?module=area");
	}
	else{
	    exit(header("Location: http://localhost/Presupuestos/mainsuper.php?module=area"));
	}

}


}