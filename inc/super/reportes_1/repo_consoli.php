<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $anio = $_GET['id'];
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
    $this->Cell(100,10,'Reporte de Presupuestos Cosolidado',0,1,'C');
    $this->Cell(200,10,utf8_decode('Para el Año '.$anio),0,1,'C');
    // $this->Cell(200,10,utf8_decode('Para el Año '.$anio),0,0,'C');
    // Salto de línea
    $this->Ln(10);
     $this->Cell(50);
    $this->Cell(100,10,'_________________________________________________________________',0,0,'C');
    // Salto de línea
    $this->Ln(20);
   



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
$anio = $_GET['id'];
include '../../../conectar.php';
$sql = "SELECT 
d.titulo,
b.costo_estimado,
b.detalle,
a.costo_real,
a.detalle as det,
d.fecha_publicacion
from ejecucion a
join detalle b  on a.id_detalle = b.id_detalle
join rubro c  on b.id_rubro = c.id_rubro
join presupuesto d on  a.id_presupuesto = d.id_presupuesto and datepart(year,fecha_publicacion) = $anio ";
$result = sqlsrv_query($conn,$sql);
$sqlqueri ="SELECT 
sum(b.costo_estimado) as suma_estimado,
sum(a.costo_real) as suma_real
from ejecucion a
join detalle b  on a.id_detalle = b.id_detalle
join rubro c  on b.id_rubro = c.id_rubro
join presupuesto d on  a.id_presupuesto = d.id_presupuesto and datepart(year,fecha_publicacion) = $anio ";

$result2 = sqlsrv_query($conn,$sqlqueri);
function report_table_header ($Pdf) {
  $Pdf-> SetFont ('Helvetica', 'B', 10);
  $Pdf-> Cell (30, 7, 'Costo Estimado', 1);
  $Pdf-> Cell (40, 7, 'Detalle', 1);
  $Pdf-> Cell (30, 7, 'Costo Real', 1);
  $Pdf-> Cell (60, 7, 'Detalle', 1);
  $Pdf-> Ln ();
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf ->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$LastProductCode = null;
$BreakProduct = true;
$ProductTotal = null;
$datos = sqlsrv_fetch_array($result);

 
 while($row = sqlsrv_fetch_array($result)){
    $group = $row ['titulo'];
    if(empty($nextgruoup))
    {
        $nextgruoup = null;

    }
    if ($group != $nextgruoup)
    {
         $pdf->Cell(160,10,'Presupuesto: '.$group,1,1,'L');
       report_table_header($pdf); 

    }
    
 	$pdf-> Cell (30, 7,'$'. $row ['costo_estimado'], 1);
  $pdf-> Cell (40, 7, $row ['detalle'], 1);
  $pdf-> Cell (30, 7, '$'.$row ['costo_real'], 1);
  $pdf-> Cell (60, 7, $row ['det'], 1,1);
  $nextgruoup = $row ['titulo'];


 }
 while ($row2 =  sqlsrv_fetch_array($result2)) {
    $pdf-> Cell (30, 7,'Total: $'.$row2['suma_estimado'], 1);
     $pdf-> Cell (40, 7,'', 1);
     $pdf-> Cell (30, 7,'Total: $'.$row2['suma_real'], 1);
    $pdf-> Cell (60, 7,'', 1);
     # code...
 }

$pdf->Output();
?>