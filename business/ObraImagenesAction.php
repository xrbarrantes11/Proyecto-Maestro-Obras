<?php

include './ObraImagenesBusiness.php';

if(isset($_POST['create'])){
    if(isset($_FILES['obraimagen']) && isset($_POST['obraid'])){
        $obraId = $_POST['obraid'];
        $fichero = $_FILES["obraimagen"];
        $directorio = "../cotizacionimages/";
        $nombreArchivo = $_FILES["obraimagen"]["name"];
        $tipoArchivo = $_FILES["obraimagen"]["type"];
        if($tipoArchivo == "image/png"){
        $tipoArchivo = "png";
        }else
        if($tipoArchivo == "image/jpeg"){
        $tipoArchivo = "jpeg";
        }else
        if($tipoArchivo == "application/pdf"){
        $tipoArchivo = "pdf";
        }
        $ObraImagenId = isset($_POST['obraimagenid']);
        $nombre = $ObraImagenId."-".$obraId;

        move_uploaded_file($fichero["tmp_name"], "../cotizacionimages/".$fichero["name"]);
        rename ($directorio.$nombreArchivo, $directorio.$nombre.".".$tipoArchivo);
        $ruta = $directorio.$nombre.".".$tipoArchivo;

        $ObraImagen = new ObraImagenes(0, $obraId, $directorio.$ruta);
        $ObraImagenBusiness = new ObraImagenesBusiness();
        $result = $ObraImagenBusiness->insertCotizacionImagen($ObraImagen);

        if ($result == 1) {
            header("location: ../view/ObraImagenesView.php?success=inserted");
        } else {
            header("location: ../view/ObraImagenesView.php?error=dbError");
        }
    }else {
        header("location: ../view/ObraImagenesView.php?error=error");
    }  
}