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
    document.getElementById("TitleModule").innerHTML = "Registrar usuario";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Listado de Usuarios</h1>
</div>
<div class="form-group">
    <a href="mainsuper.php?module=createuser" class="btn btn-primary">Nuevo Usuario</a>
</div>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Cod</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Tipo Usuario</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            include 'conectar.php';


            $sql="
SELECT a.id_usuario,a.nombre,a.apellidos,isnull(c.titulo,'no asignado') as titulo  from usuarios a
left join permisos b on b.id_usuario = a.id_usuario
left join modulos c on b.id_modulo = c.id_modulo
 ";
    $result = sqlsrv_query($conn,$sql);

     while($row = sqlsrv_fetch_array($result)){

            ?>
            <td><?php echo $row['id_usuario'];?></td>
            <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['apellidos'];?></td>
            <td><?php echo $row['titulo'];?></td>
            <td><a href="mainsuper.php?module=updateuser&id=<?php echo $row['id_usuario'];?>" class="btn btn-warning btn-sm">Modificar Usuario</a></td>
          
        </tr>
        <?php   }?>
        
    </tbody>
</table>