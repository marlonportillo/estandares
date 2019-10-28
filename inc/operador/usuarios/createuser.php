<script>
    document.getElementById("TitleModule").innerHTML = "Crear Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Información de Usuario</h1>
</div>
<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre:</label>
            <input type="text" class="form-control" placeholder="">
        </div>
        <div class="col col-md-6">
            <label for="inputPassword4">Apellidos:</label>
            <input type="text" class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Usuario:</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Contraseña:</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Tipo de Usuario:</label>
            <select id="inputState" class="form-control">
                <option selected>Seleccione...</option>
                <option>Operador</option>
                <option>Administrador</option>
                <option>Super Administrador</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Estado:</label>
            <select id="inputState" class="form-control">
                <option selected>Seleccione...</option>
                <option>Activo</option>
                <option>Inactivo</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar datos de usuario</button>
</form>