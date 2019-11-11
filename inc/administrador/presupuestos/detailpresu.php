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
fecha_publicacion,
estado
from 
presupuesto
WHERE id_presupuesto = $idp
";
$result = sqlsrv_query($conn,$sqlquery);
 while($row = sqlsrv_fetch_array($result)){

      $_SESSION['titu'] = $row['titulo'];
       $_SESSION['desc'] = $row['descripcion'];
       $_SESSION['idpre'] = $row['id_presupuesto'];
       $_SESSION['esta'] = $row['estado'];
       $_SESSION['fecha'] = $row['fecha_publicacion'] ->format('Y-M-d');

     
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
    	<div class="row">
    		<div class="col-md-8">
    			<h5 class="heading">Titulo</h5>
        <p><?php echo $_SESSION['titu'] ?></p>

        <h5 class="heading">Descripcion</h5>
        <p><?php echo $_SESSION['desc'] ?></p>
        <h5>Fecha</h5>
        <p>	<?php echo $_SESSION['fecha'] ?> </p>
    		</div>
    		<div class="col-md-2">
    			
               <?php
            if ($_SESSION['esta'] == 1)
            {
                 $idp = $_GET['id'];
                $sql = "SELECT comentarion ,nombre+' '+apellidos as nombres
                from aprovados 
                join usuarios on  id_usuario =  id_user
                 where id_presupuesto = $idp ";

                 $result = sqlsrv_query($conn,$sql);
                while($row = sqlsrv_fetch_array($result)){
            


            ?>
            <div class="text-center">
            <p>Aprobado por: </br>
            <?php echo $row['nombres'] ?></br>
            Comentario</br>
            <?php echo $row['comentarion'] ?></p>
            </div>

            <?php
                }
            }
            elseif ($_SESSION['esta'] == 2) {
                # code...
                 $idp = $_GET['id'];
                $sql = "SELECT coment ,nombre+' '+apellidos as nombres
                from rechazados 
                join usuarios on  id_usuario =  id_user
                 where id_presupuesto = $idp ";

                 $result = sqlsrv_query($conn,$sql);
                while($row = sqlsrv_fetch_array($result)){
            
            
            ?>
             <div class="text-center">
            <p>Rechazado  por: </br>
            <?php echo $row['nombres'] ?></br>
            Comentario:</br>
            <?php echo $row['coment'] ?></p>
            </div>

            <?php
        }
    }

            ?>
    		</div>
    	</div>
        


        <h5 class="heading">Detalle</h3>


        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Rubro</th>
                    <th scope="col">Opcion</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    if ($_SESSION['esta'] == 3 ||$_SESSION['esta'] == 0) {
                        # code...
                    

                    ?>
                    <tr>
                    <?php include 'conectar.php';
                     $idp = $_GET['id'];
                        $sqlquery = "SELECT a.id_detalle,a.detalle,a.costo_estimado,b.descripcion from 
                                    detalle a
                                    join rubro b on a.id_rubro = b.id_rubro
                                    where a.id_presupuesto = $idp order by b.descripcion asc";
                                    $result = sqlsrv_query($conn,$sqlquery);
                                    while($row = sqlsrv_fetch_array($result)){

                         ?>
                         <th scope="row"><?php echo $row['id_detalle']?></th>
                         <td><?php echo $row['detalle']?></td>
                         <td>$<?php   echo $row['costo_estimado']?></td>
                         <td><?php echo $row['descripcion']?></td>
                         <td> <a href="http://localhost/Presupuestos/mainreport.php?module=updtdet&iddt=<?php echo $row['id_detalle']?>" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=600'); return false;" class="btn btn-sm btn-warning">Modificar</a></td>

                </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td scope="row"><a href=" http://localhost/Presupuestos/mainreport.php?module=creardetal&id=<?php echo $_SESSION['idpre']?>" target="_blank" onClick="window.open(this.href, this.target, 'width=600,height=600'); return false;" class="btn btn-primary">Add+</a></td>
                    <td>
                    	
                
            </div>
        </form>
    </div>
                    </td>
                    <td></td>
                </tr>

                <?php

            }
            else
            {
                ?>

                   <tr>
                    <?php include 'conectar.php';
                     $idp = $_GET['id'];
                        $sqlquery = "SELECT a.id_detalle,a.detalle,a.costo_estimado,b.descripcion from 
                                    detalle a
                                    join rubro b on a.id_rubro = b.id_rubro
                                    where a.id_presupuesto = $idp order by b.descripcion asc";
                                    $result = sqlsrv_query($conn,$sqlquery);
                                    while($row = sqlsrv_fetch_array($result)){

                         ?>
                         <th scope="row"><?php echo $row['id_detalle']?></th>
                         <td><?php echo $row['detalle']?></td>
                         <td>$<?php   echo $row['costo_estimado']?></td>
                         <td><?php echo $row['descripcion']?></td>
                         <td> <a   class="btn btn-sm btn-warning" onclick="confirmar()">Modificar</a></td>

                </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    
                    <td></td>
                    <td></td>
                </tr>


                <?php

            }
                ?>
            
            </tbody>
        </table>
    </div>
</div>
<script language="Javascript"> 
function confirmar(){ 
if(confirm('No se puede Modificar detalle el presupuesto se ha cerrado')){
          
     }
}
</script>