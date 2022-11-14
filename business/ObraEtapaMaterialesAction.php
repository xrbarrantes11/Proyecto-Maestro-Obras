<?php

include './ObraEtapaMaterialesBusiness.php';

if (isset($_POST['actualizar'])) {
    if (
        isset($_POST['tbobraetapaid']) && isset($_POST['tbobraid']) && isset($_POST['tbobraetapanombre']) && isset($_POST['tbobraetapadescricion'])
        && isset($_POST['tbobraetapaduracionaproximada'])
    ) {
        $tbObraEtapaId = $_POST['tbobraetapaid'];
        $tbObraId =  $_POST['tbobraid'];
        $tbObraEtapaNombre = $_POST['tbobraetapanombre'];
        $tbObraEtapaDescripcion = $_POST['tbobraetapadescricion'];
        $tbObraEtapaDuracionAproximada = $_POST['tbobraetapaduracionaproximada'];

        if (
            strlen($tbObraEtapaId) > 0 && strlen($tbObraId) > 0 && strlen($tbObraEtapaNombre) > 0 && strlen($tbObraEtapaDescripcion) > 0
            && strlen($tbObraEtapaDuracionAproximada) > 0
        ) {
            if (!is_numeric($tbObraEtapaNombre)) {
                $ObraEtapa = new ObraEtapa($tbObraEtapaId, $tbObraId, $tbObraEtapaNombre, $tbObraEtapaDescripcion, $tbObraEtapaDuracionAproximada);

                $ObraEtapaBusiness = new ObraEtapaBusiness();

                $result = $ObraEtapaBusiness->updateObraEtapa($ObraEtapa);
                if ($result == 1) {
                    header("location: ../view/ObraEtapaView.php?success=updated");
                } else {
                    header("location: ../view/ObraEtapaView.php?error=dbError");
                }
            } else {
                header("location: ../view/ObraEtapaView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/ObraEtapaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ObraEtapaView.php?error=error");
    }
} /*else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['obraEtapaId'])) {

        $obraEtapaId = $_POST['obraEtapaId'];

        $ObraEtapaBusiness = new ObraEtapaBusiness();

        $result = $ObraEtapaBusiness->deleteObraEtapa($obraEtapaId);

        if ($result == 1) {
            echo "Transaccion realizada y borrada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} */


else if (isset($_POST['crear'])) {

    if (
        isset($_POST['nombreetapa']) && isset($_POST['materiales']) && isset($_POST['cantidadmaterial'])
        && isset($_POST['costo'])
    ) {
        $etapaMaterialId = 0;
        $nombreEtapa =  $_POST['nombreetapa'];
        $materiales = $_POST['materiales'];
        $cantidadmaterial = $_POST['cantidadmaterial'];
        $aux = str_replace('₡', '', $_POST['costo']);
        $costo = str_replace('.', '',$aux);
        
        if (strlen($cantidadmaterial) > 0) {

            if (!is_numeric($materiales)) {

                $ObraEtapaMaterial = new ObraEtapaMateriales($etapaMaterialId, $nombreEtapa, $materiales, $cantidadmaterial, $costo);

                $ObraEtapaMaterialesBusiness = new ObraEtapaMaterialesBusiness();

                $result = $ObraEtapaMaterialesBusiness->insertObraEtapa($ObraEtapaMaterial);

                if ($result == 1) {
                    header("location: ../view/ObraEtapaMaterialesView.php?success=inserted");
                } else {
                    header("location: ../view/ObraEtapaMaterialesView.php?error=dbError&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
                }
            } else {
                //if ((is_numeric($materiales))) {
                    header("location: ../view/ObraEtapaMaterialesView.php?error=stringFormat&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
                //}
            }
        }
        else {
            header("location: ../view/ObraEtapaMaterialesView.php?error=emptyField&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
        }
    } 
    else {
        header("location: ../view/ObraEtapaMaterialesView.php?error=error&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
    }
}
