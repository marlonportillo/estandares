<?php
if (!isset($_SESSION)) {
    # code...
    session_start();
}

if (!$_SESSION['user']) {
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
<div class="form-group col-md-3">
<form method="get" action="mainreport.php?module=rep_det">

    <input type="hidden" name="module" value="<?php echo $_GET['module']; ?>" />
    Año:
    <select id="inputState" class="form-control" name="anio" onchange="this.form.submit()">
        <option value="0">Seleccione</option>
    <?php  
    $desde = 2011;
    $hasta = date('Y');
    $selected = "";

    while ($desde <= $hasta)
    {
        if(isset($_GET['anio'])){
            if ($desde == $_GET['anio']){
                $selected = "selected";
            }else{
                $selected = "";
            }
        }
        
    ?>
        <option value="<?php echo $desde ?>" <?php echo $selected; ?> > <?php echo $desde ?></option>
    <?php
    $desde++;
    }
    ?>
    </select>
    
</form>
</div>
<form method="GET" action="http://localhost/Presupuestos/inc/super/reportes/report_detalle.php">
  
    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputState">Presupuesto:</label>
            <select id="inputState" class="form-control" name="id" id="id" onchange="this.form.submit()" >
                <?php

                if(empty($_POST["anio"]))
                {
                    $ano = 2019;
                }
                else
                {
                    $ano = $_POST["anio"];
                }
                include 'conectar.php';
                $sqlquery ="
                SELECT 0 AS id_presupuesto,'Seleccione' as titulo
                UNION
                SELECT id_presupuesto,titulo
                    from presupuesto  where estado = 1 and  datepart(year,fecha_publicacion) = $ano
                    ";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                
                <option   value="<?php echo $row['id_presupuesto'] ?>"><?php echo $row['titulo'] ?></option>
             <?php } ?>   
            </select>
           
        </div>
    </div>
</form>


