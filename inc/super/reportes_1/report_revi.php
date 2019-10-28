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
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(100,10,'Reporte de Presupuestos en Revision',0,1,'C');
    $this->Cell(200,10,utf8_decode('Para el Año '.$anio),0,0,'C');
    // Salto de línea
    $this->Ln(10);
     $this->Cell(50);
    $this->Cell(100,10,'_________________________________________________________________',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->SetFillColor(164, 171, 172);
    $this->Cell(30,10,'Codigo',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(50,10,'Titulo',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(70,10,'descripcion',1,0,'C',true);
     $this->SetFillColor(164, 171, 172);
    $this-> Cell(30,10,'Fecha',1,1,'C',true);





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
b.id_presupuesto,
titulo,
descripcion,
fecha_publicacion
from 
[dbo].presupuesto b
join revisiones a on b.id_presupuesto = a.id_presupuesto and datepart(year,fecha_publicacion) = $anio";
$result = sqlsrv_query($conn,$sql);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf ->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

 while($row = sqlsrv_fetch_array($result)){

 	$pdf -> Cell(30,10,$row['id_presupuesto'],1,0,'C',0);
 	$pdf -> Cell(50,10,$row['titulo'],1,0,'C',0);
 	$pdf -> Cell(70,10,$row['descripcion'],1,0,'C',0);
 	$pdf -> Cell(30,10,$row['fecha_publicacion']->format('d/m/Y'),1,1,'C',0);
 }
$pdf->Output();
?>