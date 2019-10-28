<?php
include 'conectar.php';

	
	$desc = $_POST["mejoras"];
    $id = $_POST["idpresu"];
    $hoy = date('y-m-d');

    $sqlquery = "INSERT INTO revisiones (id_presupuesto,mejoras_requeridas,estado,fecha)
    VALUES ($id,'$desc',1,'$hoy')";
    $sqlquery2 = "UPDATE presupuesto SET estado = 3 where id_presupuesto = $id" ; 



$result = sqlsrv_query($conn,$sqlquery);
$result2 = sqlsrv_query($conn,$sqlquery2);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die("   Please click on this link: <a href=mainsuper.php?module=listpresu>back </a>");
}
else{
    exit(header("Location: mainsuper.php?module=detailpresu&id=<?php echo $id ?>"));
}
}


?>