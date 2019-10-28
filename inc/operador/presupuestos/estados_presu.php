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
    document.getElementById("TitleModule").innerHTML = "Lista de Presupuestos";
</script>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Listado de presupuestos </h1>
</div>


 <div>
   <div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="mx-auto">
                <a href="mainreport.php?module=selectyear" target="_blank" onClick="window.open(this.href, this.target, 'width=700,height=700'); return false;" class="btn btn-success mr-2 ml-2">Aprobados</a>
                <a href="mainreport.php?module=selectyearrev" target="_blank" onClick="window.open(this.href, this.target, 'width=700,height=700'); return false;"  class="btn btn-warning mr-2 ml-2">Revisión</a>
                <a href="mainreport.php?module=selectyearrech" target="_blank" onClick="window.open(this.href, this.target, 'width=700,height=700'); return false;"  class="btn btn-danger mr-2 ml-2">Rechazados</a>
            </div>
        </form>
    </div>
 </div>
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Comparativo de presupuestos </h1>
</div>


 <div>
   <div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="mx-auto">
                <a href="mainreport.php?module=rep_det" target="_blank" onClick="window.open(this.href, this.target, 'width=700,height=700'); return false;" class="btn btn-success mr-2 ml-2">Presupuestos</a>
                
            </div>
        </form>
    </div>
 </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Consolidado por Rubro  </h1>
</div>


 <div>
   <div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="mx-auto">
                <a href="mainreport.php?module=rep_rub" target="_blank" onClick="window.open(this.href, this.target, 'width=700,height=700'); return false;" class="btn btn-success mr-2 ml-2">Presupuestos</a>
                
            </div>
        </form>
    </div>
 </div>
<div>
   </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h5 mb-0 text-gray-800">Consolidado General  </h1>
</div>
   <div class="card">
    <div class="card-header">
        <form class="form-inline">
            <div class="mx-auto">
                <a href="mainreport.php?module=selectyeargener" target="_blank" onClick="window.open(this.href, this.target, 'width=700,height=700'); return false;" class="btn btn-success mr-2 ml-2">Consolidado</a>             
            </div>
        </form>
    </div>
 </div>


