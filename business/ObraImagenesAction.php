<?php

include './ObraImagenesBusiness.php';

if(isset($_POST['create'])){
    if(isset($_FILES['obraimagen']) && isset($_POST['obraid'])){

        $obraId = $_POST['obraid'];
        $fichero = $_FILES["obraimagen"];
        $obraimagenId = isset($_POST['obraimagenid']);

        foreach($fichero["tmp_name"] as $key => $image){
            $nombreArchivo = $_FILES["obraimagen"]["name"][$key];
            $tipoArchivo = $_FILES["obraimagen"]["type"][$key];
            $tmpArchivo = $_FILES["obraimagen"]["tmp_name"][$key];
            $directorio = "../obraimagenes/";
            $nombre = $obraimagenId."-".$obraId;

            move_uploaded_file($tmpArchivo, "../obraimagenes/".$nombreArchivo);
            rename($directorio.$nombreArchivo, $directorio.$nombre.".".$tipoArchivo);
            $ruta = $directorio.$nombre.".".$tipoArchivo;
            $ObraImagen = new ObraImagenes(0, $obraId, $directorio.$ruta);
            $ObraImagenBusiness = new ObraImagenesBusiness();
            $result = $ObraImagenBusiness->insertObraImagenes($ObraImagen);

        }

        if ($result == 1) {
            header("location: ../view/ObraImagenesView.php?success=inserted");
        } else {
            header("location: ../view/ObraImagenesView.php?error=dbError");
        }
    }else {
        header("location: ../view/ObraImagenesView.php?error=error");
    }  
}else if (isset($_POST['delete'])) {

    $obraimagenId = $_POST['obraimagenid'];
    $obraimagenRuta = $_POST['obraimagen'];

    $ObraImagenBusiness = new ObraImagenesBusiness();
    $result = $ObraImagenBusiness->deleteObraImagenes($obraimagenId);
    
    if ($result == 1) {
        unlink("../obraimagenes/".$obraimagenRuta);
        echo "Transaccion realizada";
        header("location: ../view/ObraImagenesView.php");
    } else {
        echo "Error al procesar la transacción";
    }
} else {
    echo "Error de informacion";
}