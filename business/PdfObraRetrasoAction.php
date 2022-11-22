<?php

include '../fpdf/PdfObraRetraso.php';
include './business/ObrasBusiness.php';

if ($_POST['mostrar']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId = $_POST['tbobraid'];

        header("location: ../fpdf/PdfObraRetraso.php?id=$tbObraId");
    }
} else if ($_POST['ver']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId1 = $_POST['tbobraid'];

        header("location: ../fpdf/PdfReporteObraPago.php?id=$tbObraId1");
    }
} else if ($_POST['observar']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId2 = $_POST['tbobraid'];

        header("location: ../fpdf/PdfReporteObraCostoTotal.php?id=$tbObraId2");
    }
} else if ($_POST['analizar']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId3 = $_POST['tbobraid'];
    
        $ObrasBusiness = new ObrasBusiness();
        $result = 0;
        if ($ObrasBusiness->buscarTipoAsignadoCliente($tbObraId3, $clienteId) == true) {
            $result = header("location: ../fpdf/PdfReporteAvanceObra.php?id=$tbObraId3");
        } else if ($result == 1) {
            if ($ObrasBusiness->buscarTipoAsignadoCliente($tbObraId3, $clienteId) == true) {
                header("location: ../view/PdfAvanceObraView.php?error=empty");
            }
        }
    }
}
