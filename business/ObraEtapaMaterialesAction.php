<?php

include './ObraEtapaMaterialesBusiness.php';

if (isset($_POST['actualizar'])) {
    if (
        isset($_POST['nombreetapa']) && isset($_POST['nombrematerial']) && isset($_POST['cantidadmaterial'])
        && isset($_POST['montoaproximado'])
    ) {
        $idE = $_POST['idE'];
        $etapaMaterialId = $_POST['etapamaterialid'];
        $nombreEtapaMat =  $_POST['nombreetapa'];
        $nombreMaterial = $_POST['nombrematerial'];
        $cantidadMaterial = $_POST['cantidadmaterial'];

        $auxiliar = str_replace('₡', '', $_POST['montoaproximado']);
        $montoAproximado = str_replace('.', '',$auxiliar);

        if (
            strlen($nombreMaterial) > 0 && strlen($cantidadMaterial) > 0
            && strlen($montoAproximado) > 0
        ) {
            if (!is_numeric($nombreMaterial)) {
                $ObraEtapaMat = new ObraEtapaMateriales($etapaMaterialId, $nombreEtapaMat, $nombreMaterial, $cantidadMaterial, $montoAproximado);

                $ObraEtapaMaterialesBusiness = new ObraEtapaMaterialesBusiness();

                $result = $ObraEtapaMaterialesBusiness->updateObraEtapaMateriales($ObraEtapaMat);
                if ($result == 1) {
                    header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&success=updated");
                } else {
                    header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=dbError");
                }
            } else {
                header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=stringFormat");
            }
        } else {
            header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=emptyField");
        }
    } else {
        header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=error");
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

        $idE = $_POST['idE'];
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
                    header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&success=inserted");
                } else {
                    header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=dbError&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
                }
            } else {
                //if ((is_numeric($materiales))) {
                    header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=stringFormat&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
                //}
            }
        }
        else {
            header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=emptyField&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
        }
    } 
    else {
        header("location: ../view/ObraEtapaMaterialesView.php?id=$idE&error=error&var1=$etapaMaterialId&var2=$nombreEtapa&var3=$materiales&var4=$cantidadmaterial");
    }
}else if ($_POST['gestion']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId = $_POST['tbobraid'];

        header("location: ../view/ObraEtapaMaterialesView.php?id=$tbObraId");
    }
}
