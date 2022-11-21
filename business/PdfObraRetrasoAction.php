<?php

include '../fpdf/PdfObraRetraso.php';

if ($_POST['mostrar']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId = $_POST['tbobraid'];
                
        header("location: ../fpdf/PdfObraRetraso.php?id=$tbObraId");
        
    } 
        
}