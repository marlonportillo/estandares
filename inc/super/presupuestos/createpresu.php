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
    document.getElementById("TitleModule").innerHTML = "Crear Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Complete la siguiente información</h1>
</div>
<form method="POST" action="mainsuper.php?module=insertpresu">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label>Titulo:</label>
            <input type="text" class="form-control" name="Titulo" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputEmail4">Descripción:</label>
            <textarea class="form-control" placeholder="" name="Descripción"></textarea>
        </div>
    </div>
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Area:</label>
            <select id="inputState" class="form-control" name="area">
                <?php
                include 'conectar.php';
                $sqlquery ="
                SELECT 0 AS id_area,'Seleccione' as nom_area
                UNION
                SELECT id_area,nom_area from areas";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                <option  value="<?php echo $row['id_area'] ?>"><?php echo $row['nom_area'] ?></option>
                

             <?php } ?>   
            </select>
            <input type="hidden" class="form-control" name="id" id="inputEmail4" value="<?php echo $_SESSION['id'] ?>" placeholder="">
            
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Inicio:</label>
           <input type="Date" class="form-control" name="desde" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Fin:</label>
            <input type="Date" class="form-control" name="hasta" placeholder="">
        </div>
    </div>

    
    <button type="submit" class="btn btn-primary"> Registrar Presupuesto</button>
</form>