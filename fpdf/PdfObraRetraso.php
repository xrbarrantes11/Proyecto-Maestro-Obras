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

    $this->Cell(60,10,'Dias de retraso',1,0,'C',0);
    $this->Cell(60,10,'Costo de ganancia',1,0,'C',0);
    $this->Cell(60,10,'Costo de perdida',1,1,'C',0);
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
$conn = mysqli_connect("127.0.0.1", "root", "", "bdmaestroobras");
    $conn->set_charset('utf8');

    $consulta = "SELECT tbobradiasfinalizacionatrasado, tbobraganancia, tbobraperdida FROM tbobra WHERE tbobraid=".$obraId.";";
    $result = mysqli_query($conn, $consulta);
    
    $pdf = new PdfObraRetraso();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    
    while($row=$result->fetch_assoc()){
        $pdf->Cell(60,10,$row['tbobradiasfinalizacionatrasado'],1,0,'C',0);
        $pdf->Cell(60,10,$row['tbobraganancia'],1,0,'C',0);
        $pdf->Cell(60,10,$row['tbobraperdida'],1,1,'C',0);
    }
    
    $pdf->Output();
// Creación del objeto de la clase heredada
//include '../data/data.php';

?>