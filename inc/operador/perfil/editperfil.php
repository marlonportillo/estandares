<script>
    document.getElementById("TitleModule").innerHTML = "Mi Perfil";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Información de Usuario</h1>
</div>
<form>
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
                    <input type="text" class="form-control" placeholder="Luis" disabled>
                </div>
                <div class="col col-md-6">
                    <label for="inputPassword4">Apellidos:</label>
                    <input type="text" class="form-control" placeholder="Flores" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Usuario:</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="jlfv96" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Contraseña:</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="12345" disabled>
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