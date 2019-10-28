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

<form method="Get" action="http://localhost/Presupuestos/inc/super/reportes/rep_rubo.php">
  
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Rubro :</label>
            <select id="inputState" class="form-control" name="id" id="id"  >
                 <?php

                include 'conectar.php';
                $sqlquery ="SELECT id_rubro,nombre from rubro";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                <option  value="<?php echo $row['id_rubro'] ?>"><?php echo $row['nombre'] ?></option>
                

             <?php } ?>    
                
            </select>
           
        </div>

    </div>
    <div class="row">
         <div class="form-group col-md-4">
     Año:
    <select  id="inputState" class="form-control" name="anio" required=""  >
        <option value="0">Seleccione</option>
    <?php  
    $desde = 2010;
    $hasta = date('Y');

    while ($desde < $hasta)
    {
        $desde =  $desde +1
    

    ?>
  <option  value="<?php echo $desde ?>"><?php echo $desde ?></option>

   <?php
}
   ?>
    </div>
</select>
</div>
</div>
     <div class=" row">
         
         <div class="col-md-3">
             <button class="btn btn-primary" type="submit">Generar</button>
         </div>
     </div>
  
</form>


