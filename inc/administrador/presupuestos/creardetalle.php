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
    document.getElementById("TitleModule").innerHTML = "Crear Detalle";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detalle Presupuesto</h1>
</div>
<form method="POST" action="mainadmin.php?module=procdetall">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Detalle:</label>
            <input type="text" class="form-control" name="Detalle" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Costo:</label>
            <input type="number" step="any" class="form-control" name="Costo" id="inputEmail4" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Rubro:</label>
            <select id="inputState" class="form-control" name="rubro">
                <?php
                include 'conectar.php';
                $sqlquery ="SELECT id_rubro,nombre from rubro";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                <option  value="<?php echo $row['id_rubro'] ?>"><?php echo $row['nombre'] ?></option>
                

             <?php } ?>   
            </select>
            <input type="hidden" class="form-control" name="idpresu" id="inputEmail4" value="<?php echo $_GET['id'] ?>" placeholder="">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Ingresar</button>
</form>