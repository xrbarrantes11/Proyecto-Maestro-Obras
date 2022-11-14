<?php

include './CotizacionImagenBusiness.php';
include './CotizacionBusiness.php';


if(isset($_POST['create'])){
    if(isset($_FILES['cotizacionimagen']) && isset($_POST['proveedorid']) && isset($_POST['obraid'])){

        $proveedorId = $_POST['proveedorid'];
        $obraId = $_POST['obraid'];
        $activo = isset($_POST['activoimagen']);
        $fichero = $_FILES["cotizacionimagen"];
        $directorio = "../cotizacionimages/";
        $nombreArchivo = $_FILES["cotizacionimagen"]["name"];
        $tipoArchivo = $_FILES["cotizacionimagen"]["type"];
        if($tipoArchivo == "image/png"){
        $tipoArchivo = "png";
        }else
        if($tipoArchivo == "image/jpeg"){
        $tipoArchivo = "jpeg";
        }else
        if($tipoArchivo == "application/pdf"){
        $tipoArchivo = "pdf";
        }
        $nombre = $obraId."-".$proveedorId;
        move_uploaded_file($fichero["tmp_name"], "../cotizacionimages/".$fichero["name"]);
        rename ($directorio.$nombreArchivo, $directorio.$nombre.".".$tipoArchivo);
        $ruta = $directorio.$nombre.".".$tipoArchivo;

            $CotizacionImagen = new CotizacionImagen(0, $directorio.$ruta, $activo);
            $CotizacionImagenBusiness = new CotizacionImagenBusiness();
            $CotizacionBusiness = new CotizacionBusiness();
            $result = $CotizacionImagenBusiness->insertCotizacionImagen($CotizacionImagen);
            $cotizacionImagenId = $CotizacionImagenBusiness->getIdCotizacionImagen($directorio.$ruta);
            $CotizacionBusiness->insertCotizacion($obraId, $proveedorId, $cotizacionImagenId);

            if ($result == 1) {
                header("location: ../view/CotizacionImagenView.php?success=inserted");
                
          
        }else{
            echo 'Arhcivo pesado';
        }
    }else {
        header("location: ../view/CotizacionImagenView.php?error=error");
    }   
}else if (isset($_POST['delete'])) {

        $cotizacionImagenId = $_POST['cotizacionimagenid'];
        $cotizacionimagenRuta = $_POST['cotizacionimagen'];

        $CotizacionImagenBusiness = new CotizacionImagenBusiness();
        $CotizacionBusiness = new CotizacionBusiness();
        $result = $CotizacionImagenBusiness->deleteCotizacionImagen($cotizacionImagenId);
        $CotizacionBusiness->deleteCotizacion($cotizacionImagenId);
        
        if ($result == 1) {
            unlink("../cotizacionimages/".$cotizacionimagenRuta);
            echo "Transaccion realizada";
            header("location: ../view/CotizacionImagenView.php");
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
}
if(isset($_POST['download'])){
    $cotizacionimagenRuta = $_POST['cotizacionimagen'];
    $file = "../cotizacionimages/".$cotizacionimagenRuta;

    if(file_exists($file)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/image');
        header('Content-Disposition: attachment;filename="'.basename($file).'"');
        header('Content-Length:'.filesize($file));
        readfile($file);
    }else{
        echo "No";
    }
}


            