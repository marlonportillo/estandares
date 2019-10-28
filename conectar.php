<?php
$serverName = 'presuutec.database.windows.net'; //serverName\instanceName
$connectionInfo = array( "Database"=>"presupuesto", "UID"=>"marlon", "PWD"=>"portillo884#");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    // echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>