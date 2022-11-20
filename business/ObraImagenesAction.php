<?php

include './ObraImagenesBusiness.php';

if(isset($_POST['create'])){
    if(isset($_FILES['obraimagen']) && isset($_POST['obraid'])){

        $obraId = $_POST['obraid'];
        $fichero = $_FILES["obraimagen"];
        $img = '';

        foreach($fichero["tmp_name"] as $key => $image){
            $nombreArchivo = $_FILES["obraimagen"]["name"][$key];
            $tipoArchivo = $_FILES["obraimagen"]["type"][$key];
            $tmpArchivo = $_FILES["obraimagen"]["tmp_name"][$key];
            $directorio = "../cotizacionimages/";

            $img = $nombreArchivo.',';

            move_uploaded_file($tmpArchivo, "../cotizacionimages/".$nombreArchivo);
            $ruta = $directorio.$nombreArchivo.".".$tipoArchivo;
            $ObraImagen = new ObraImagenes(0, $obraId, $directorio.$img);
            $ObraImagenBusiness = new ObraImagenesBusiness();
            $result = $ObraImagenBusiness->insertObraImagenes($ObraImagen);

        }

        //$ruta = $directorio.$nombre.".".$tipoArchivo;
        //rename ($directorio.$nombreArchivo, $directorio.$nombre.".".$tipoArchivo);
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
        unlink("../cotizacionimages/".$obraimagenRuta);
        echo "Transaccion realizada";
        header("location: ../view/ObraImagenesView.php");
    } else {
        echo "Error al procesar la transacción";
    }
} else {
    echo "Error de informacion";
}