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
    <h1 class="h3 mb-0 text-gray-800">Asignacion de Rol  a Usuarios</h1>
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
SELECT a.id_usuario,a.nombre,a.apellidos,isnull(c.titulo,'no asignado') as titulo, c.id_modulo  from usuarios a
left join permisos b on b.id_usuario = a.id_usuario
left join modulos c on b.id_modulo = c.id_modulo
where c.titulo is null
 ";
    $result = sqlsrv_query($conn,$sql);

     while($row = sqlsrv_fetch_array($result)){

            ?>
            <td><?php echo $row['id_usuario'];?></td>
            <td ><?php echo $row['nombre'];?></td>
            <td><?php echo $row['apellidos'];?></td>
            <td> <span id="titu <?php echo $row['id_usuario'];?>" > <?php echo $row['titulo'];?></span> </td>
          
            <td><button type="button" class="btn btn-success edit" value="<?php echo $row['id_modulo'];?>,<?php echo $row['id_usuario']; ?>"><span class="glyphicon glyphicon-edit"></span> Rol</button></td>
                
          
        </tr>
        <?php   }?>
        
    </tbody>
</table>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="mainadmin.php?module=procesrol">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mandar a Revisión</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
               
                        <label for="inputEmail4">Rol:</label>
                         <select id="inputState" class="form-control" name="id" id="id"  >
                 <?php

                include 'conectar.php';
                $sqlquery ="SELECT id_modulo,titulo from modulos";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                <option  value="<?php echo $row['id_modulo'] ?>"><?php echo $row['titulo'] ?></option>
                

             <?php } ?>    
                
            </select>
                        <input type="hidden" class="form-control" name="idpresu" id="idemp" placeholder=""
                        value="" 
                        >
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

