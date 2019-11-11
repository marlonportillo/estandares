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
                <a href="#logoutModal" data-toggle="modal" class="btn btn-success mr-2 ml-2">Aprobados</a>
                <a href="#logoutModal2" data-toggle="modal"  class="btn btn-warning mr-2 ml-2">Revisión</a>
                <a href="#logoutModal3" data-toggle="modal"  class="btn btn-danger mr-2 ml-2">Rechazados</a>
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
                <a href="#logoutModal4" data-toggle="modal"  class="btn btn-success mr-2 ml-2">Presupuestos</a>
                
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
                <a  href="#logoutModal6" data-toggle="modal" class="btn btn-success mr-2 ml-2">Presupuestos</a>
                
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
                <a href="#logoutModal5" data-toggle="modal" class="btn btn-success mr-2 ml-2">Consolidado</a>             
            </div>
        </form>
    </div>
 </div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="GET" action="http://localhost/Presupuestos/inc/super/reportes/report_preacept.php" target="_blank">
            <div class="modal-header">
                
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Seleccione Año :</label>
                        <select id="inputState" class="form-control" name="id" id="id"  >
                <option value="0">Seleccione</option>
                    <?php  
                    $desde = 2010;
                    $hasta = date('Y');

                    while ($desde < $hasta)
                    {
                        $desde =  $desde +1
                    

                    ?>
                  <option  value="<?php echo $desde ?>"><?php echo $desde ?></option>

                   <?php
                }
                   ?>
            </select>
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



<div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="GET" action="http://localhost/Presupuestos/inc/super/reportes/report_revi.php" target="_blank">
            <div class="modal-header">
               
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Seleccione Año :</label>
                        <select id="inputState" class="form-control" name="id" id="id"  >
                <option value="0">Seleccione</option>
                    <?php  
                    $desde = 2010;
                    $hasta = date('Y');

                    while ($desde < $hasta)
                    {
                        $desde =  $desde +1
                    

                    ?>
                  <option  value="<?php echo $desde ?>"><?php echo $desde ?></option>

                   <?php
                }
                   ?>
            </select>
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

 

<div class="modal fade" id="logoutModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="GET" action="http://localhost/Presupuestos/inc/super/reportes/repor_recha.php" target="_blank">
            <div class="modal-header">
                
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Seleccione Año :</label>
                        <select id="inputState" class="form-control" name="id" id="id"  >
                <option value="0">Seleccione</option>
                    <?php  
                    $desde = 2010;
                    $hasta = date('Y');

                    while ($desde < $hasta)
                    {
                        $desde =  $desde +1
                    

                    ?>
                  <option  value="<?php echo $desde ?>"><?php echo $desde ?></option>

                   <?php
                }
                   ?>
            </select>
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

 



<div class="modal fade" id="logoutModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           
            <div class="modal-header">
                
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <form method="Post" action="mainoperador.php?module=estados">
                        <label for="inputEmail4">Seleccione Año :</label>
                        <select id="inputState" class=" edit4 form-control" name="anio" id="anio"    >
                <option value="0">Seleccione</option>
                    <?php  
                    $desde = 2010;
                    $hasta = date('Y');

                    while ($desde < $hasta)
                    {
                        $desde =  $desde +1
                    

                    ?>
                  <option  value="<?php echo $desde ?>"><?php echo $desde ?></option>

                   <?php
                }
                   ?>
            </select>

          <input type="hidden" name="pp" id="pp">
        </form>
             <label for="inputState">Presupuesto:</label>
              <form method="GET" action="http://localhost/Presupuestos/inc/super/reportes/report_detalle.php" target="_blank">
                
               <div id="rec">
            <select id="inputState" class="form-control" name="id" id="id"   >
                <?php

                if(empty($_COOKIE["var1"]))
                {
                    $ano = 2019;
                }
                else
                {
                    $ano = $_COOKIE["var1"];
                }
                unset ($_COOKIE ["var1"]);
                $iduser =  $_SESSION['id'];
                include 'conectar.php';
                $sqlquery ="
                SELECT 0 AS id_presupuesto,'Seleccione' as titulo
                UNION
                SELECT id_presupuesto,titulo
                    from presupuesto  where estado = 1 and  datepart(year,fecha_publicacion) = $ano
                    
                    ";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                
                <option   value="<?php echo $row['id_presupuesto'] ?>"><?php echo $row['titulo'] ?></option>
             <?php } ?>   
            </select>
            </div>
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

 


<div class="modal fade" id="logoutModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="GET" action="http://localhost/Presupuestos/inc/super/reportes/repo_consoli.php" target="_blank">
            <div class="modal-header">
                
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Seleccione Año :</label>
                        <select id="inputState" class="form-control" name="id" id="id"  >
                <option value="0">Seleccione</option>
                    <?php  
                    $desde = 2010;
                    $hasta = date('Y');

                    while ($desde < $hasta)
                    {
                        $desde =  $desde +1
                    

                    ?>
                  <option  value="<?php echo $desde ?>"><?php echo $desde ?></option>

                   <?php
                }
                   ?>
            </select>
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



<div class="modal fade" id="logoutModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="GET" action="http://localhost/Presupuestos/inc/super/reportes/rep_rubo.php" target="_blank">
            <div class="modal-header">
                
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                                    <label for="inputState">Rubro :</label>
            <select id="inputState" class="form-control" name="id" id="id"  >
                 <?php

                include 'conectar.php';
                $sqlquery ="SELECT id_rubro,nombre from rubro";
                $result = sqlsrv_query($conn,$sqlquery);
                while($row = sqlsrv_fetch_array($result)){
                ?>
                <option  value="<?php echo $row['id_rubro'] ?>"><?php echo $row['nombre'] ?></option>
                

             <?php } ?>    
                
            </select>
           
                        <label for="inputEmail4">Seleccione Año :</label>
                        <select id="inputState" class="form-control" name="anio" id="anio"  >
                <option value="0">Seleccione</option>
                    <?php  
                    $desde = 2010;
                    $hasta = date('Y');

                    while ($desde < $hasta)
                    {
                        $desde =  $desde +1
                    

                    ?>
                  <option  value="<?php echo $desde ?>"><?php echo $desde ?></option>

                   <?php
                }
                   ?>
            </select>
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


