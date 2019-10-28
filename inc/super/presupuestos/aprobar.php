<?php
include 'conectar.php';

	
	
    $id = $_POST["idpresu"];
    $coment = $_POST["mejoras"];
    $iduser = $_POST["id"];
    $hoy = date('y-m-d');
    $sql="SELECT estado FROM presupuesto where id_presupuesto = $id ";
    $result3 = sqlsrv_query($conn,$sql);

    
while($row = sqlsrv_fetch_array($result3)){

	$estado= $row['estado'];

}
if ($estado != 1 ) 
{
	# code...
	if ($estado == 2) {
		# code...

		echo " El presupuesto  fue Rechazado <a href=mainsuper.php?module=listpresu>back </a>";
	}
	else
	{
		
  	  $sqlquery = "INSERT INTO aprovados (id_presupuesto,estado,fecha,id_user,comentarion)
   	 VALUES ($id,1,'$hoy',$iduser,'$coment')";

	$sqlquery2 = "UPDATE presupuesto SET estado = 1 where id_presupuesto = $id" ; 



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


}


	}

else
{
	echo " El presupuesto ya fue elvaluado <a href=mainsuper.php?module=listpresu>back </a>";
}

?>