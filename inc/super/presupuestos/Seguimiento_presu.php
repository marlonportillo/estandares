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
    document.getElementById("TitleModule").innerHTML = "Lista de Presupuestos";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Listado de presupuestos por evaluar</h1>
</div>
<div class="form-group col-md-3">
<form method="POST" action="mainsuper.php?module=seguimiento" >

    
    Año:
    <select  id="inputState" class="form-control" name="anio" onchange="this.form.submit()">
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
</form>
</div>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Cod</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha Publicación</th>
            <th scope="col">Estados</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
       
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
        $sqlquery = "SELECT 
id_presupuesto,
titulo,
descripcion,
fecha_publicacion,
case when estado = 0 then 'no evaluado'
 when estado =  1 then 'Aprobado'
    when estado =  2 then 'Rechazado'
    when estado =  3 then 'Revision'  end as estados ,estado
from 
presupuesto WHERE estado = 1 and datepart(year,fecha_publicacion) =$ano ";
$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){
    ?>
   <tr>
  <th scope="row"> <?php echo $row['id_presupuesto'];?> </th>
  <td> <?php echo $row['titulo'];?> </td>
  <td> <?php echo $row['descripcion'];?> </td>
  <td> <?php echo   $row['fecha_publicacion']->format('d/m/Y');?> </td>
   <td> <?php echo $row['estados'];?> </td>
  <td>
   
                <a href="mainsuper.php?module=segui_detalle&id=<?php echo $row['id_presupuesto'];?> " class="btn btn-sm btn-dark">Ver detalle</a>

               
                
</td>
  </tr>


<?php }

        ?>


    </tbody>
</table>