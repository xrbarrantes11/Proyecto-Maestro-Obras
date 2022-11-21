<?php
require('fpdf.php');

class PdfObraRetraso extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de Retrasos en la Obra',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(45,10,'Nombre Obra',1,0,'C',0);
    $this->Cell(45,10,'Dias de retraso',1,0,'C',0);
    $this->Cell(48,10,'Costo de ganancia',1,0,'C',0);
    $this->Cell(48,10,'Costo de perdida',1,1,'C',0);
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
$idObr = 0;
if (isset($_GET['id'])) {
    $idObr = $_GET['id'];
}

$conn = mysqli_connect("127.0.0.1", "root", "", "bdmaestroobras");
    $conn->set_charset('utf8');

    $consulta = "SELECT tbobranombre, tbobradiasfinalizacionatrasado, tbobraganancia, tbobraperdida FROM tbobra WHERE tbobraid=".$idObr.";";
    $result = mysqli_query($conn, $consulta);
    
    $pdf = new PdfObraRetraso();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    
    while($row=$result->fetch_assoc()){
        
        $pdf->Cell(45,10,$row['tbobranombre'],1,0,'C',0);
        $pdf->Cell(45,10,$row['tbobradiasfinalizacionatrasado'],1,0,'C',0);
        $pdf->Cell(48,10,$row['tbobraganancia'],1,0,'C',0);
        $pdf->Cell(48,10,$row['tbobraperdida'],1,1,'C',0);
    }
    
    $pdf->Output();
// Creación del objeto de la clase heredada
//include '../data/data.php';

?>