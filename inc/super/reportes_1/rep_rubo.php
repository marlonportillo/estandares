<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    include '../../../conectar.php';



     $idp = $_GET['id'];
     $ano = $_GET['anio'];
     $sql = "SELECT nombre FROM rubro where id_rubro  = $idp  ";
        $result = sqlsrv_query($conn,$sql);     
         while($row = sqlsrv_fetch_array($result)){
            $nombre = $row["nombre"];
         }
        // Título
    $this->Cell(50);
       $this ->Image('fpdf/logo.png' , 0 ,2, 35 , 38);
     $this->SetFont('Arial','B',10);
     $this->Cell(100,10,'Empresa Fantasma S.A de C.V ',0,1,'C');
     $this->SetFont('Arial','B',15);
    // Arial bold 15

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(100,10,'Consolidado Por Rubro ',0,1,'C');
    $this->SetFont('Arial','B',15);
    $this->Cell(200,10, $nombre,0,1,'C');
    $this->Cell(200,10, utf8_decode("Para el Año :").$ano,0,1,'C');
    // Salto de línea
   
     
  $this->SetFont('Arial','B',15);
     $this->Cell(50);
    $this->Cell(100,10,'_________________________________________________________________',0,1,'C');
    // Salto de línea
    $this ->Cell(50,10,'Detalle: ',0,1,'C',0);
    $this->Ln(5);
     $this->SetFont('Arial','B',9);
     $this->SetFillColor(164, 171, 172);
    $this->Cell(10,10,'Cod',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(20,10,'Detalle',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(40,10,'Costo Estimado',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(50,10,'Rubro',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(20,10,'Costo Real',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(40,10,'Descripcion',1,1,'C',true);
   



}
function cabeceraHorizontal()
{
   
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

include '../../../conectar.php';
  $idp = $_GET['id'];
       $ano = $_GET['anio'];
                
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

                                where b.id_rubro =  $idp  and   datepart(year,fecha_publicacion) = $ano  ";

$result = sqlsrv_query($conn,$sqlquery);
$sql = "SELECT 
sum(costo_estimado) as costo_estimados,
sum(costo_real) as costo_reals
from 
detalle a 
join ejecucion b on a.id_detalle = b.id_detalle
where a.id_rubro = $idp
";
$result2 = sqlsrv_query($conn,$sql);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf ->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);

 while($row = sqlsrv_fetch_array($result)){

 	$pdf -> Cell(10,10,$row['id_detalle'],1,0,'C',0);
 	$pdf -> Cell(20,10,$row['deta_pre'],1,0,'C',0);
 	$pdf -> Cell(40,10,'$ '.$row['costo_estimado'],1,0,'C',0);
    $pdf -> Cell(50,10,$row['nombre'],1,0,'C',0);
    $pdf -> Cell(20,10,'$ '.$row['costo_real'],1,0,'C',0);
    $pdf -> Cell(40,10,$row['deta_rea'],1,1,'C',0);
 	
 }
 while($row = sqlsrv_fetch_array($result2)){
    $pdf -> Cell(10,10,'',1,0,'C',0);
    $pdf -> Cell(20,10,'Total:',1,0,'C',0);
    $pdf -> Cell(40,10,'$ '.$row['costo_estimados'],1,0,'C',0);
    $pdf -> Cell(50,10,'Total:',1,0,'C',0);
    $pdf -> Cell(20,10,'$ '.$row['costo_reals'],1,0,'C',0);
    $pdf -> Cell(40,10,'',1,1,'C',0);
    
    
}
$pdf->Output();
?>