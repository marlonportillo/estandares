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
include 'conectar.php';
$id = $_GET['id'];

            $sql="
SELECT a.id_usuario,a.nombre,a.apellidos,a.usuario,isnull(c.titulo,'no asignado') as titulo ,c.id_modulo,a.clave,a.estado from usuarios a
left join permisos b on b.id_usuario = a.id_usuario
left join modulos c on b.id_modulo = c.id_modulo
where a.id_usuario = $id
 ";
    $result = sqlsrv_query($conn,$sql);
    while($row = sqlsrv_fetch_array($result)){
        $_SESSION['name'] = $row['nombre'];
        $_SESSION['apell'] = $row['apellidos'];
        $_SESSION['use'] = $row['usuario'];
        $_SESSION['pass'] = $row['clave'];
        $_SESSION['mod'] = $row['id_modulo'];
        $_SESSION['estado'] = $row['estado'];
    }

}
?>

<script>
    document.getElementById("TitleModule").innerHTML = "Modificar usuario";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Información de Usuario</h1>
</div>
<form method="POST" action="mainadmin.php?module=procesuser">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre:</label>
            <input type="text" class="form-control" placeholder="" name="nombre" value="<?php echo   $_SESSION['name']?>">
             <input type="hidden" class="form-control" placeholder="" name="idemp" value="<?php echo   $_SESSION['idemp']?>">
        </div>
        <div class="col col-md-6">
            <label for="inputPassword4">Apellidos:</label>
            <input type="text" class="form-control" placeholder="" name="apellidos" value="<?php echo   $_SESSION['apell']?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Usuario:</label>
            <input type="text" class="form-control" id="inputEmail4" name="usuario" placeholder="" value="<?php echo   $_SESSION['use']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Contraseña:</label>
            <input type="password" class="form-control" id="inputPassword4"  name="contra" placeholder="" value="<?php echo   $_SESSION['pass']?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Tipo de Usuario:</label>
            <select id="inputState" class="form-control" name="rol">
                  <?php
                    $idmo = $_SESSION['mod'];
                include 'conectar.php';
                $sqlquery ="

                SELECT id_modulo,titulo from modulos where id_modulo  in ($idmo)
                union
                SELECT id_modulo,titulo from modulos where id_modulo not in ($idmo)";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                <option  value="<?php echo $row['id_modulo'] ?>"><?php echo $row['titulo'] ?></option>
                

             <?php } ?> 
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Estado:</label>
            <select id="inputState" class="form-control" name="estado">
                
                <?php  
                if ( $_SESSION['estado'] == 1)
                {
                    $estado_user = 'Activo';
                }
                else
                {
                    $estado_user = 'Inactivo';
                
                }
                if($estado_user =='Activo' )
                {
                    $estado_ = 'Inactivo';
                }
                else
                {
                    $estado_ = 'Activo';
                }

                ?>
                <option><?php echo $estado_user ?></option>
                <option><?php echo $estado_ ?></option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar datos de usuario</button>
</form>