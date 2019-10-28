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

    include 'conectar.php';

    $id = $_GET['id'];
    $sqlquery = "SELECT 
id_presupuesto,
titulo,
descripcion,
fecha_publicacion
from 
presupuesto WHERE id_presupuesto = $id ";

$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){

      $_SESSION['titu'] = $row['titulo'];
       $_SESSION['desc'] = $row['descripcion'];
       $_SESSION['idpre'] = $row['id_presupuesto'];

     
 }

    if (isset($_GET['module']) && !empty($_GET['module']))
     :
    $module = $_GET['module'];
   

endif;
}
?>




<script>
    document.getElementById("TitleModule").innerHTML = "Evaluar Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Datos de Presupuesto</h1>
</div>
<div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="mx-auto">
                <a href="#apro" data-toggle="modal" class="btn btn-success mr-2 ml-2">Aprobar</a>
                <a href="#logoutModal" data-toggle="modal" class="btn btn-warning mr-2 ml-2">Revisión</a>
                <a href="#rech" data-toggle="modal" class="btn btn-danger mr-2 ml-2">Rechazar</a>
            </div>
        </form>
    </div>
    <div class="card-body">

        <h5 class="heading">Titulo</h5>
        <p><?php echo $_SESSION['titu']?></p>

        <h5 class="heading">Descripcion</h5>
        <p><?php echo $_SESSION['desc']?></p>

        <h5 class="heading">Detalle</h3>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Rubro</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                 
                    <tr>
                    <?php include 'conectar.php';
                     $idp = $_GET['id'];
                        $sqlquery = "SELECT a.id_detalle,a.detalle,a.costo_estimado,b.descripcion from 
                                    detalle a
                                    join rubro b on a.id_rubro = b.id_rubro
                                    where a.id_presupuesto = $idp ";
                                    $result = sqlsrv_query($conn,$sqlquery);
                                    while($row = sqlsrv_fetch_array($result)){

                         ?>
                         <th scope="row"><?php echo $row['id_detalle']?></th>
                         <td><?php echo $row['detalle']?></td>
                         <td>$<?php echo $row['costo_estimado']?></td>
                         <td><?php echo $row['descripcion']?></td>
                         
                </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="mainsuper.php?module=revisa">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mandar a Revisión</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Mejoras Requeridas:</label>
                        <textarea class="form-control" placeholder="" name="mejoras"></textarea>
                        <input type="hidden" class="form-control" name="idpresu" id="inputEmail4" value="<?php echo $_SESSION['idpre'] ?>" placeholder="">
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
<div class="modal fade" id="apro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="mainsuper.php?module=aprovar">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aprobado</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">comentario:</label>
                        <textarea class="form-control" placeholder="" name="mejoras"></textarea>
                        <input type="hidden" class="form-control" name="idpresu" id="inputEmail4" value="<?php echo $_SESSION['idpre'] ?>" placeholder="">
                         <input type="hidden" class="form-control" name="id" id="inputEmail4" value="<?php echo $_SESSION['id'] ?>" placeholder="">
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
<div class="modal fade" id="rech" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="mainsuper.php?module=rechazar">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rechazar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">comentario:</label>
                        <textarea class="form-control" placeholder="" name="mejoras"></textarea>
                        <input type="hidden" class="form-control" name="idpresu" id="inputEmail4" value="<?php echo $_SESSION['idpre'] ?>" placeholder="">
                         <input type="hidden" class="form-control" name="id" id="inputEmail4" value="<?php echo $_SESSION['id'] ?>" placeholder="">
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