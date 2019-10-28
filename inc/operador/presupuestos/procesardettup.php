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

	$detalle =$_POST["Detalle"];
	$monto = $_POST["Costo"];
    $rubro =$_POST["rubro"];
    $id = $_POST["idpresu"]; 
    $iddt = $_POST["iddtt"]; 


    echo $id;
	
$sqlquery = "UPDATE detalle  SET detalle='$detalle',costo_estimado='$monto',id_rubro='$rubro'
WHERE id_detalle = $iddt
";

$result = sqlsrv_query($conn,$sqlquery);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die(" <script>alert('Detalle Actualizado');window.opener.location.reload('mainsuper.php?module=listpresu&id=<?php echo $id ?>');self.close();</script>");
}
else{
    exit(header("Location: mainsuper.php?module=detailpresu&id=<?php echo $id ?>"));
}
}

 ?>