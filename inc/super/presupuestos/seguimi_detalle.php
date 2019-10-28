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
    include 'conectar.php';
    $idp = $_GET['id'];
     $sqlquery = "SELECT 
id_presupuesto,
titulo,
descripcion,
fecha_publicacion
from 
presupuesto
WHERE id_presupuesto = $idp
";
$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){

      $_SESSION['titu'] = $row['titulo'];
       $_SESSION['desc'] = $row['descripcion'];
       $_SESSION['idpre'] = $row['id_presupuesto'];

     
 }
    if (isset($_GET['module']) && !empty($_GET['module']))
     :
    $module = $_GET['module'];
   

endif;
}
?>
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
        <p><?php echo $_SESSION['titu'] ?></p>

        <h5 class="heading">Descripcion</h5>
        <p><?php echo $_SESSION['desc'] ?></p>

        <h5 class="heading">Detalle</h3>


            <form method="POST" action="mainsuper.php?module=segui_proc"  enctype="multipart/form-data">
        <table class="table" id="tablapost">
            <thead class="thead-light">
                <tr>
                    <th style="font-size: 15px" scope="col">Cod</th>
                    <th style="font-size: 15px" scope="col">Detalle</th>
                    <th style="font-size: 15px" scope="col">Costo</th>
                    <th style="font-size: 15px" scope="col">Rubro</th>
                    <th style="font-size: 15px" scope="col">Costo Real</th>
                    <th style="font-size: 15px" scope="col">Detalle</th>
                     <th style="font-size: 15px" scope="col">Archivo</th>
                    
                </tr>
            </thead>
            <tbody>

                <tr>
                    <?php include 'conectar.php';

                    $idp = $_GET['id'];

                        $sql = " IF  exists( SELECT * FROM ejecucion WHERE id_presupuesto = $idp )
                                    SELECT  1 as num
                                else 
                                    SELECT  0 as num"; 
                             $result2 = sqlsrv_query($conn,$sql);   
                              while($rows = sqlsrv_fetch_array($result2)){
                                $ejecu = $rows['num'];
                              }    
                        if ($ejecu == 0 )
                        { 


                     
                        $sqlquery = "SELECT a.id_presupuesto,a.id_detalle,a.detalle,a.costo_estimado,b.descripcion from 
                                    detalle a
                                    join rubro b on a.id_rubro = b.id_rubro
                                    where a.id_presupuesto = $idp ";
                                    $result = sqlsrv_query($conn,$sqlquery);
                                    while($row = sqlsrv_fetch_array($result)){

                         ?>
                         <th style="font-size: 15px" scope="row"><?php echo $row['id_detalle']?></th>
                         <td style="font-size: 15px" ><?php echo $row['detalle']?></td>
                         <td style="font-size: 15px">$<?php   echo $row['costo_estimado']?></td>
                         <td style="font-size: 15px"><?php echo $row['descripcion']?></td>
                         <td> <input type="number" step="any" style="width:75px;height:25px" name="costereal[]"> </td>
                         <td> <input type="tex" name="detalle_real[]"> </td>
                         <td> <input type="file" style="width:200px;height:25px;font-size: 15px" name="archivo[]" id="archivo" >
                                <input type="hidden" name="id[]" value="<?php echo $row['id_presupuesto']?>">
                                 <input type="hidden" name="iddta[]" value="<?php echo $row['id_detalle']?>">

                                   <input type="hidden" name="si" value=""> 

                          </td>
                        

                </tr>
                
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <button class="btn btn-sm btn-dark" type="submit" id="idejecu" name="boton"> Cerrar Ejecucion </button> </td>
                    <td></td>
                    
                    <td></td>
                </tr> 
           <?php }
            else
            {
                $idp = $_GET['id'];
                include 'conectar.php';
                $sqlquery =  "
                                SELECT DISTINCT
                                b.id_detalle ,
                                b.detalle as deta_pre,
                                b.costo_estimado,
                                d.nombre,
                                c.costo_real,
                                c.detalle as deta_rea,
                                c.archivo
                                from 
                                presupuesto a
                                join detalle b on a.id_presupuesto = b.id_presupuesto
                                join ejecucion c on b.id_detalle = c.id_detalle
                                join rubro d on b.id_rubro = d.id_rubro

                                where c.id_presupuesto =  $idp        ";

                                $result = sqlsrv_query($conn,$sqlquery);
                                    while($row = sqlsrv_fetch_array($result)){

                ?>

                     <th style="font-size: 15px" scope="row"><?php echo $row['id_detalle']?></th>
                         <td style="font-size: 15px" ><?php echo $row['deta_pre']?></td>
                         <td style="font-size: 15px">$<?php   echo $row['costo_estimado']?></td>
                         <td style="font-size: 15px"><?php echo $row['nombre']?></td>
                         <td style="font-size: 15px"> $<?php echo $row['costo_real']?> </td>
                         <td style="font-size: 15px"> <?php echo $row['deta_rea']?>  </td>
                         <td style="font-size: 15px"> 
                        <a href="<?php echo $row['archivo'] ?>"target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=600'); return false;">img  </a>
                          </td>
                             </tr>


                <?php

            }?>
               <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><a href="http://localhost/Presupuestos/inc/super/reportes/report_detalle.php?id=<?php echo $_GET['id']?>" target="_blank" onClick="window.open(this.href, this.target, 'width=700,height=700'); return false;" class="btn btn-success mr-2 ml-2">Genera Reporte</a></td>
                             </tr>
       <?php }
                ?>
               
            </tbody>
        </table>
        </form>
    </div>
</div>