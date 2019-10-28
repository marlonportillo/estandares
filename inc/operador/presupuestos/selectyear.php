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

<form method="Get" action="http://localhost/Presupuestos/inc/super/reportes/report_preacept.php">
  
    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputState">Año:</label>
            <select id="inputState" class="form-control" name="id" id="id" onchange="this.form.submit()" >
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
            </select>
           
        </div>
    </div>
    
  
</form>


