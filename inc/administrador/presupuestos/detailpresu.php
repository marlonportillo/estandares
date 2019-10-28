<script>
    document.getElementById("TitleModule").innerHTML = "Ver Presupuesto";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Datos de Presupuesto</h1>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="heading">Titulo</h5>
        <p>Gastos Operativos de Flota</p>

        <h5 class="heading">Descripcion</h5>
        <p>Gastos Operativos de Flota</p>

        <h5 class="heading">Detalle</h3>



        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Rubro</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Vales de Combustible.</td>
                    <td>$3,000</td>
                    <td>Energetico</td>
                    <td> <a href="mainadmin.php?module=updatepresu" class="btn btn-sm btn-warning">Modificar</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Pagos de Cuotas.</td>
                    <td>$10,000</td>
                    <td>Financiero</td>
                    <td> <a href="mainadmin.php?module=updatepresu" class="btn btn-sm btn-warning">Modificar</a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Reparaciones.</td>
                    <td>$1,000</td>
                    <td>Automotriz</td>
                    <td> <a href="mainadmin.php?module=updatepresu" class="btn btn-sm btn-warning">Modificar</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td scope="row"><a href="" class="btn btn-primary">Add+</a></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>