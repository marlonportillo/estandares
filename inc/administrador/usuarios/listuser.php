<script>
    document.getElementById("TitleModule").innerHTML = "Registrar usuario";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Listado de Usuarios</h1>
</div>
<div class="form-group">
    <a href="mainadmin.php?module=createuser" class="btn btn-primary">Nuevo Usuario</a>
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
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>Operador</td>
            <td><a href="mainadmin.php?module=updateuser" class="btn btn-warning btn-sm">Modificar Usuario</a></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Administrador</td>
            <td><a href="mainadmin.php?module=updateuser" class="btn btn-warning btn-sm">Modificar Usuario</a></td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>Super administrador</td>
            <td><a href="mainadmin.php?module=updateuser" class="btn btn-warning btn-sm">Modificar Usuario</a></td>
        </tr>
    </tbody>
</table>