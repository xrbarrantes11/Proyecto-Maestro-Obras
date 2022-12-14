<?php

include './ObraEtapaBusiness.php';

if (isset($_POST['actualizar'])) {
    if (
        isset($_POST['tbobraetapaid']) && isset($_POST['tbobra']) && isset($_POST['tbobraetapanombre']) && isset($_POST['tbobraetapadescricion'])
        && isset($_POST['tbobraetapaduracionaproximada'])
    ) {
        $tbObraEtapaId = $_POST['tbobraetapaid'];
        $tbObraId =  $_POST['tbobra'];
        echo $tbObraId;
        $tbObraEtapaNombre = str_replace(' ', 'OOO', $_POST['tbobraetapanombre']);
        $tbObraEtapaDescripcion = $_POST['tbobraetapadescricion'];
        $tbObraEtapaDuracionAproximada = $_POST['tbobraetapaduracionaproximada'];

        if (
            strlen($tbObraEtapaId) > 0 && strlen($tbObraId) > 0 && strlen($tbObraEtapaNombre) > 0 && strlen($tbObraEtapaDescripcion) > 0
            && strlen($tbObraEtapaDuracionAproximada) > 0
        ) {
            if (!is_numeric($tbObraEtapaNombre) && ctype_alpha($tbObraEtapaNombre)) {
                $tbObraEtapaNombre = str_replace('OOO', ' ', $_POST['tbobraetapanombre']);
                $ObraEtapa = new ObraEtapa($tbObraEtapaId, $tbObraId, $tbObraEtapaNombre, $tbObraEtapaDescripcion, $tbObraEtapaDuracionAproximada);

                $ObraEtapaBusiness = new ObraEtapaBusiness();

                $result = $ObraEtapaBusiness->updateObraEtapa($ObraEtapa);
                if ($result == 1) {
                    header("location: ../view/ObraEtapaView.php?success=updated&id=$tbObraId");
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
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['obraEtapaId'])) {

        $obraEtapaId = $_POST['obraEtapaId'];

        $ObraEtapaBusiness = new ObraEtapaBusiness();

        $result = $ObraEtapaBusiness->deleteObraEtapa($obraEtapaId);

        if ($result == 1) {
            echo "Transaccion realizada y borrada";
        } else {
            echo "Error al procesar la transacci??n";
        }
    } else {
        echo "Error de informacion";
    }
} else if ($_POST['gestion']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId = $_POST['tbobraid'];

        header("location: ../view/ObraEtapaView.php?id=$tbObraId");
    }
} else if (isset($_POST['crear'])) {

    if (
        isset($_POST['tbobraetapaid']) && isset($_POST['tbobraid']) && isset($_POST['tbobraetapanombre']) && isset($_POST['tbobraetapadescricion'])
        && isset($_POST['tbobraetapaduracionaproximada'])
    ) {
        $tbObraEtapaId = $_POST['tbobraetapaid'];
        $tbObraId =  $_POST['tbobraid'];
        $tbObraEtapaNombre = str_replace(' ', 'OOO', $_POST['tbobraetapanombre']);
        $tbObraEtapaDescripcion = $_POST['tbobraetapadescricion'];
        $tbObraEtapaDuracionAproximada = $_POST['tbobraetapaduracionaproximada'];


        if (
            strlen($tbObraId) > 0 && strlen($tbObraEtapaNombre) > 0 && strlen($tbObraEtapaDescripcion) > 0
            && strlen($tbObraEtapaDuracionAproximada) > 0
        ) {

            if (!is_numeric($tbObraEtapaNombre) && ctype_alpha($tbObraEtapaNombre)) {
                $tbObraEtapaNombre = str_replace('OOO', ' ', $_POST['tbobraetapanombre']);
                $ObraEtapa = new ObraEtapa(0, $tbObraId, $tbObraEtapaNombre, $tbObraEtapaDescripcion, $tbObraEtapaDuracionAproximada);

                $ObraEtapaBusiness = new ObraEtapaBusiness();

                $result = $ObraEtapaBusiness->insertObraEtapa($ObraEtapa, $tbObraId);

                if ($result == 1) {
                    header("location: ../view/ObraEtapaView.php?success=inserted&id=$tbObraId");
                } else {
                    header("location: ../view/ObraEtapaView.php?error=dbError&var1=$tbObraId&var2=$tbObraEtapaNombre&var3=$tbObraEtapaDescripcion&var4=$tbObraEtapaDuracionAproximada");
                }
            } else {
                if ((is_numeric($tbObraEtapaNombre) || !ctype_alpha($tbObraEtapaNombre))) {
                    header("location: ../view/ObraEtapaView.php?error=stringFormat&var3=$tbObraEtapaDescripcion&var4=$tbObraEtapaDuracionAproximada");
                }
            }
        } else {
            header("location: ../view/ObraEtapaView.php?error=emptyField&var1=$tbObraId&var2=$tbObraEtapaNombre&var3=$tbObraEtapaDescripcion&var4=$tbObraEtapaDuracionAproximada");
        }
    } else {
        header("location: ../view/ObraEtapaView.php?error=error&var1=$tbObraId&var2=$tbObraEtapaNombre&var3=$tbObraEtapaDescripcion&var4=$tbObraEtapaDuracionAproximada");
    }
}
