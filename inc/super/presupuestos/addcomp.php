<?php

$detalle = $_POST['Detalle'];
$costo = $_POST['Costo'];
$rubro = $_POST['rubro']; 
$idpre = $_POST['idpres'];

$nomarch =$_FILES['fact']['name'];
$rutafile = $_FILES['fact']['tmp_name'];
$dirsubida = "C:/xampp/htdocs/Presupuestos/img/";

$imagenRuta = '/Presupuestos/img/'.$nomarch;
move_uploaded_file($_FILES['fact']['tmp_name'],$dirsubida.$nomarch);
include 'conectar.php';

$sqlquery = "INSERT INTO ejecucion (
costo_real,
detalle,
id_rubro,
archivo,
id_presupuesto)  VALUES ($costo,'$detalle',$rubro,'$imagenRuta',$idpre)";

$result = sqlsrv_query($conn,$sqlquery);
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
else{

if (headers_sent()) {
    die("  Location: mainsuper.php?module=segui_detalle&id= $idpre ");
}
else{
    exit(header("Location: mainsuper.php?module=segui_detalle&id=<?php echo $idpre ?>"));
}
}

?>