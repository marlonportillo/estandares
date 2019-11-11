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
    <h1 class="h3 mb-0 text-gray-800">Información de Usuario</h1>
</div>
<form method="POST" action="mainadmin.php?module=procesauser">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="">
        </div>
        <div class="col col-md-6">
            <label for="inputPassword4">Apellidos:</label>
            <input type="text" class="form-control" name="apellido" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Usuario:</label>
            <input type="text" class="form-control" name="usuario" id="inputEmail4" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Contraseña:</label>
            <input type="password" class="form-control" name="pass" id="inputPassword4" placeholder="">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Estado:</label>
            <select id="inputState" class="form-control" name="estado">
                <option selected>Seleccione...</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar datos de usuario</button>
</form>