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
    document.getElementById("TitleModule").innerHTML = "Lista de Presupuestos";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Listado de Areas</h1>
</div>
<div class="form-group">
    <a href="#logoutModal" data-toggle="modal" class="btn btn-primary">Nuevo Area</a>
</div>

<div class="row">
</div>


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Cod</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
       
        <?php

        include 'conectar.php';
        $sqlquery = "


        SELECT 
id_area,nom_area,descripcion
from 
areas 

";

$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){
    ?>
   <tr>
  <th scope="row"> <?php echo $row['id_area'];?> </th>
  <td> <?php echo $row['nom_area'];?> </td>
  <td > <?php echo $row['descripcion'];?> </td>
 
<td><button type="button" class="btn btn-success edit2" value="<?php echo $row['id_area'];?> ,<?php echo $row['nom_area'];?>,<?php echo $row['descripcion'];?>"><span class="glyphicon glyphicon-edit"></span> modificar</button></td>
  </tr>


<?php }

        ?>


    </tbody>
</table>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="http://localhost/Presupuestos/inc/super/catalogos/procesararead.php">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Area</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
               
                        <label for="inputEmail4">Area:</label>
                 
                        <input type="text" class="form-control" name="area" id="area" placeholder=""
                        value="" 
                        >
                    </div>
                    <div class="form-group col-md-12">
               
                        <label for="inputEmail4">Deacripcion:</label>
                 
                        <textarea class="form-control" placeholder="" name="desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="http://localhost/Presupuestos/inc/super/catalogos/updatearea.php">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mandar a Revisión</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
               
                        <label for="inputEmail4">Area:</label>
                 
                        <input type="text" class="form-control" name="area" id="area" placeholder=""
                        value="" 
                        >
                        <input type="hidden" class="form-control" name="id" id="id" placeholder=""
                        value="" 
                        >
                    </div>
                    <div class="form-group col-md-12">
               
                        <label for="inputEmail4">Deacripcion:</label>
                 
                        <textarea class="form-control" placeholder="" name="desc" id="desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
            </form>
        </div>
    </div>
</div>

