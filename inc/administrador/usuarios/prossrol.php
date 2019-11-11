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

	$idmodulo =$_POST["id"];
	$idemp = $_POST["idpresu"];
   

    
	
$sqlquery = "INSERT INTO permisos (id_usuario,id_modulo)
VALUES ($idemp,$idmodulo)
";


$result = sqlsrv_query($conn,$sqlquery);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die(" Please click on this link: <a href=mainadmin.php?module=asignar_rol>back </a>");
}
else{
    exit(header("Location: mainadmin.php?module=detailpresu&id=<?php echo $id ?>"));
}
}

 ?>