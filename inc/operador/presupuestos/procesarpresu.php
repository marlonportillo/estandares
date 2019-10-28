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

	$titu =$_POST["titulo"];
	$desc = $_POST["descripcion"];
    $id = $_POST["idpresu"]; 

    $sqlquery= "UPDATE  
presupuesto SET titulo = '$titu',
descripcion = '$desc' WHERE id_presupuesto = $id  ";

$result = sqlsrv_query($conn,$sqlquery);

if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die(" Datos actualizados. Please click on this link: <a href=mainoperario.php?module=listpresu>back </a>");
}
else{
    exit(header("Location: mainsuper.php?module=detailpresu&id=<?php echo $id ?>"));
}
}

?>