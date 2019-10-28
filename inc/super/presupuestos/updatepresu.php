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

    $id = $_GET['id'];
    include 'conectar.php';
    $sqlquery = "SELECT 
id_presupuesto,
titulo,
descripcion,
fecha_publicacion
from 
presupuesto
WHERE id_presupuesto = $id
";
$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){

      $_SESSION['titu'] = $row['titulo'];
       $_SESSION['desc'] = $row['descripcion'];
       $_SESSION['idpre'] = $row['id_presupuesto'];

     
 }


    # code.
    if (isset($_GET['module']) && !empty($_GET['module']))
     :
    $module = $_GET['module'];
   

endif;
}
?>


<script>
    document.getElementById("TitleModule").innerHTML = "Modificar Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Complete la siguiente información</h1>
</div>
<form  method="POST" action="mainsuper.php?module=procesarpres">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label>Titulo:</label>
            <input type="text" name="titulo" class="form-control" value="<?php echo $_SESSION['titu'] ?>" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputEmail4">Descripción:  </label>
            <textarea class="form-control" name="descripcion" placeholder=""><?php echo $_SESSION['desc'] ?></textarea>
        </div>
    </div>
    <input type="hidden" class="form-control" name="idpresu" id="inputEmail4" value="<?php echo $_SESSION['idpre'] ?>" placeholder="">
  
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>