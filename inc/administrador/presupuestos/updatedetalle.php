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
?>

<script>
    document.getElementById("TitleModule").innerHTML = "Modificar usuario";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detalle Presupuesto</h1>
</div>
<?php 
 include 'conectar.php';
 $idp = $_GET['iddt'];
        $sqlquery = "SELECT a.id_presupuesto,a.id_detalle,a.detalle,a.costo_estimado,b.id_rubro from 
                                    detalle a
                                    join rubro b on a.id_rubro = b.id_rubro
                                    where a.id_detalle = $idp ";
                                    $result = sqlsrv_query($conn,$sqlquery);
                                    while($row = sqlsrv_fetch_array($result)){
                                        
                                    

?>
<form method="POST" action="mainadmin.php?module=procesarupddt">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Detalle:</label>
            <input type="text" class="form-control" name="Detalle" value="<?php echo $row['detalle']?>" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Costo:</label>
            <input type="number" class="form-control" name="Costo" id="inputEmail4" value="<?php echo $row['costo_estimado']?>" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Rubro:</label>
            <select id="inputState" class="form-control" name="rubro" >
                <?php
                include 'conectar.php';
                $sqlquery ="SELECT a.id_rubro,nombre 
                    from rubro a
                    left outer join detalle b  on a.id_rubro = b.id_rubro
                    where b.id_detalle = $idp
                    union all
                    SELECT id_rubro,nombre 
                    from rubro 
                    where id_rubro != (select id_rubro from detalle where id_detalle = $idp)";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                <option   value="<?php echo $row['id_rubro'] ?>"><?php echo $row['nombre'] ?></option>
                

             <?php } ?>   
            </select>
            <input type="hidden" class="form-control" name="idpresu" id="inputEmail4" value="<?php echo $row['id_presupuesto'] ?>" placeholder="">
             <input type="hidden" class="form-control" name="iddtt" id="inputEmail4" value="<?php echo $idp ?>" placeholder="">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>


<?php } ?>
