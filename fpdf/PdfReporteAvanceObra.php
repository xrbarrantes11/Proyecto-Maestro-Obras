<?php
require('fpdf.php');

class PdfReporteAvanceObra extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Avance de la obra',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(34,10,'Nombre Obra',1,0,'C',0);
    $this->Cell(52,10,'Cantidad Materiales',1,0,'C',0);
    $this->Cell(53,10,'Horas de Empleados',1,0,'C',0);
    $this->Cell(58,10,'Pagos Costo Hora',1,1,'C',0);
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

    $consulta = "SELECT tbobranombre, SUM(tbetapacostoaproximado) sumatoriaMateriales, 
    TIMEDIFF(tbempleadohorafin,tbempleadohorainicio) horas, SUM(tbjornadasemanalsumatoriamontosactividades)
     sumatoriaJornada FROM tbobra INNER JOIN tbobraetapa ON tbobraetapa.tbobraid = tbobra.tbobraid 
     INNER JOIN tbobraetapaempleadotipoasignado ON tbobraetapaempleadotipoasignado.tbobraetapaid = 
     tbobraetapa.tbobraetapaid INNER JOIN tbempleado ON tbempleado.tbempleadoid =
      tbobraetapaempleadotipoasignado.tbempleadoid INNER JOIN tbempleadocostohora ON 
      tbempleadocostohora.tbempleadoid = tbempleado.tbempleadoid INNER JOIN tbjornadasemanal
       ON tbjornadasemanal.empleadoid = tbempleado.tbempleadoid INNER JOIN tbobraetapamateriales 
       ON tbobraetapamateriales.tbetapaid = tbobraetapa.tbobraetapaid WHERE tbobra.tbobraid = 
       ".$idObr.";";
    $result = mysqli_query($conn, $consulta);
    
    $pdf = new PdfReporteAvanceObra();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    
    while($row=$result->fetch_assoc()){
        
        $pdf->Cell(34,10,$row['tbobranombre'],1,0,'C',0);
        $pdf->Cell(52,10,$row['sumatoriaMateriales'],1,0,'C',0);
        $pdf->Cell(53,10,$row['horas'],1,0,'C',0);
        $pdf->Cell(58,10,$row['sumatoriaJornada'],1,1,'C',0);

    }
    
    $pdf->Output();
// Creación del objeto de la clase heredada

?>