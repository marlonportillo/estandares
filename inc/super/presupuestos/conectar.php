<?php
$serverName = 'DESKTOP-0MSFA00\SQLEXPRESS'; //serverName\instanceName
$connectionInfo = array( "Database"=>"presupuesto", "UID"=>"marlon", "PWD"=>"marlon321");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    // echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>