<?php
require('fpdf.php');

class PdfReporteObraPago extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte Semanal Obra pago',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(45,10,'Nombre Obra',1,0,'C',0);
    $this->Cell(50,10,'Total de Pago a Empleados',1,1,'C',0);
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
/*
$idObr = 0;
if (isset($_GET['id'])) {
    $idObr = $_GET['id'];
}*/

$conn = mysqli_connect("127.0.0.1", "root", "", "bdmaestroobras");
    $conn->set_charset('utf8');

    $consulta = "SELECT tbobranombre, tbempleadonombre, tbempleadotiponombre, tbjornadasemanalsumatoriamontosactividades FROM tbobraetapa 
    INNER JOIN tbobra ON tbobra.tbobraid = tbobraetapa.tbobraid 
    INNER JOIN tbobraetapaempleadotipoasignado ON tbobraetapaempleadotipoasignado.tbobraetapaid = tbobraetapa.tbobraetapaid
    INNER JOIN tbempleado ON tbempleado.tbempleadoid = tbobraetapaempleadotipoasignado.tbempleadoid
    INNER JOIN tbjornadasemanal ON tbjornadasemanal.empleadoid = tbobraetapaempleadotipoasignado.tbempleadoid
    INNER JOIN tbempleadotipoasignado ON tbempleadotipoasignado.tbempleadoid = tbobraetapaempleadotipoasignado.tbempleadoid
    INNER JOIN tbempleadotipo ON tbempleadotipo.tbempleadotipoid = tbobraetapaempleadotipoasignado.tbempleadotipoid;";
    $result = mysqli_query($conn, $consulta);
    
    $pdf = new PdfReporteObraPago();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    
    while($row=$result->fetch_assoc()){
        
        $pdf->Cell(45,10,$row['tbobranombre'],1,0,'C',0);
        $pdf->Cell(50,10,$row['tbempleadonombre'],1,1,'C',0);

    }
    
    $pdf->Output();
// Creación del objeto de la clase heredada

?>