<?php
if (!$_SESSION['user']) {
    echo "<script>alert('no haz iniciado sesion ');</script>";
    header("Location:login.php");
} else {
    # code.
    if (isset($_GET['module']) && !empty($_GET['module'])) :
        $module = $_GET['module'];
    endif;
}
?>
<script>
    document.getElementById("TitleModule").innerHTML = "Mi Perfil";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Información de Usuario</h1>
</div>
<form method="POST" action="mainsuper.php?module=updateperfil">
    <div class="card">
        <div class="card-header mx-auto">
            <button id="btnmodi" type="button" onclick="toEdit()" class="btn btn-warning">
                Modificar mis datos
            </button>
            <button id="btncancel" type="button" onclick="cancel()" class="btn btn-dark" style="display:none">
                Cancelar
            </button>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="nombre" placeholder="" value=<?php

                                                                                                                            include 'conectar.php';
                                                                                                                            $id = $_SESSION['id'];
                                                                                                                            $sqlquery = "SELECT 
               nombre,apellidos,usuario,clave
                FROM 
            [presupuesto].[dbo].usuarios
        WHERE id_usuario = $id ";
                                                                                                                            $result = sqlsrv_query($conn, $sqlquery);

                                                                                                                            #creates sessions
                                                                                                                            while ($row = sqlsrv_fetch_array($result)) {

                                                                                                                                $_SESSION['nameedit'] = $row['nombre'];
                                                                                                                                $_SESSION['lastnameedit'] = $row['apellidos'];
                                                                                                                                $_SESSION['useredit'] = $row['usuario'];
                                                                                                                                $_SESSION['passwedit'] = $row['clave'];
                                                                                                                            }
                                                                                                                            echo $_SESSION['nameedit']


                                                                                                                            ?> disabled>
                </div>
                <div class="col col-md-6">
                    <label for="inputPassword4">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="" value=<?php echo $_SESSION['lastnameedit'] ?> disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Usuario:</label>
                    <input type="text" class="form-control" id="inputEmail4" name="usuario" placeholder="" value=<?php echo $_SESSION['useredit']  ?> disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Contraseña:</label>
                    <input type="password" class="form-control" id="inputPassword4" name="calve" placeholder="" value=<?php echo $_SESSION['passwedit']  ?> disabled>
                </div>

            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <button id="btnsave" type="submit" class="btn btn-success btn-lg" style="display:none">Guardar</button>
    </div>

</form>

<script>
    function toEdit() {
        $('.form-control').prop("disabled", false);
        $('#btnmodi').hide();
        $('#btncancel').show();
        $('#btnsave').show();
    }

    function cancel() {
        $('.form-control').prop("disabled", true);
        $('#btnmodi').show();
        $('#btncancel').hide();
        $('#btnsave').hide();
    }
</script>