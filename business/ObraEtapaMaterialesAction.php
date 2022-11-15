<?php

include './ObraEtapaMaterialesBusiness.php';

if (isset($_POST['actualizar'])) {
    if (
        isset($_POST['etapamaterialid']) && isset($_POST['nombreetapa']) && isset($_POST['nombrematerial']) && isset($_POST['cantidadmaterial'])
        && isset($_POST['montoaproximado'])
    ) {
        $etapaMaterialId = $_POST['etapamaterialid'];
        $nombreEtapaMat =  $_POST['nombreetapa'];
        $nombreMaterial = $_POST['nombrematerial'];
        $cantidadMaterial = $_POST['cantidadmaterial'];

        $auxiliar = str_replace('₡', '', $_POST['montoaproximado']);
        $montoAproximado = str_replace('.', '',$aux);

        if (
            strlen($nombreEtapaMat) > 0 && strlen($nombreMaterial) > 0 && strlen($cantidadMaterial) > 0
            && strlen($montoAproximado) > 0
        ) {
            if (!is_numeric($nombreMaterial)) {
                $ObraEtapaMat = new ObraEtapaMaterialesBusiness($etapaMaterialId, $nombreEtapaMat, $nombreMaterial, $cantidadMaterial, $montoAproximado);

                $ObraEtapaMaterialesBusiness = new ObraEtapaMaterialesBusiness();

                $result = $ObraEtapaMaterialesBusiness->updateObraEtapaMateriales($ObraEtapaMat);
                if ($result == 1) {
                    header("location: ../view/ObraEtapaMaterialesView.php?success=updated");
                } else {
                    header("location: ../view/ObraEtapaMaterialesView.php?error=dbError");
                }
            } else {
                header("location: ../view/ObraEtapaMaterialesView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/ObraEtapaMaterialesView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ObraEtapaMaterialesView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['etapamaterialid'])) {

        $obraEtapaMaterialesId = $_POST['etapamaterialid'];

        $ObraEtapa = new ObraEtapaMaterialesBusiness();

        $result = $ObraEtapa->deleteObraEtapa($obraEtapaMaterialesId);

        if ($result == 1) {
            echo "Transaccion realizada y borrada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} 

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
