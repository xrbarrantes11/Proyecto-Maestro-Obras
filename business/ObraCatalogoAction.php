<?php

include './ObraCatalogoBusiness.php';

if (isset($_POST['update'])) {

    if (isset($_POST['obracatalogoid']) && isset($_POST['obracatalogonombre']) && isset($_POST['obracatalogodescripcion'])) {

        $obraCatalogoId = $_POST['obracatalogoid'];
        $obraCatalogoNombre = $_POST['obracatalogonombre'];
        $obraCatalogoDescripcion = $_POST['obracatalogodescripcion'];
        $obraCatalogoActivo = $_POST['obracatalogoactivo'];

        if (isset($_POST['obracatalogoactivo'])) {
            $obraCatalogoActivo = 1;
        }
        if (!isset($_POST['obracatalogoactivo'])) {
            $obraCatalogoActivo = 0;
        }

        if (strlen($obraCatalogoId) > 0 && strlen($obraCatalogoNombre) > 0 && strlen($obraCatalogoActivo) > 0 && strlen($obraCatalogoDescripcion) > 0) {
            if (!is_numeric($obraCatalogoNombre)) {
                $ObraCatalogo = new ObraCatalogo($obraCatalogoId, $obraCatalogoNombre, $obraCatalogoDescripcion, $obraCatalogoActivo);

                $ObraCatalogoBusiness = new ObraCatalogoBusiness();

                $result = $ObraCatalogoBusiness->updateObraCatalogo($ObraCatalogo);
                if ($result == 1) {
                    header("location: ../view/ObraCatalogoView.php?success=updated");
                } else {
                    header("location: ../view/ObraCatalogoView.php?error=dbError");
                }
            } else {
                header("location: ../view/ObraCatalogoView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/ObraCatalogoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ObraCatalogoView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['idObraCatalogo'])) {

        $obraCatalogoId = $_POST['idObraCatalogo'];

        $ObraCatalogoBusiness = new ObraCatalogoBusiness();
        $result = $ObraCatalogoBusiness->deleteObraCatalogo($obraCatalogoId);

        if ($result == 1) {
            echo "Transaccion realizada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['create'])) {

    if (isset($_POST['obracatalogonombre']) && isset($_POST['obracatalogodescripcion'])) {

        
        $obraCatalogoId = $_POST['obracatalogoid'];
        $obraCatalogoNombre = $_POST['obracatalogonombre'];
        $obraCatalogoDescripcion = $_POST['obracatalogodescripcion'];
        $obraCatalogoActivo = $_POST['obracatalogoactivo'];
        
        if (
            strlen($obraCatalogoNombre) > 0 && strlen($obraCatalogoDescripcion) > 0
            && strlen($obraCatalogoActivo) > 0
        ) {

            if (!is_numeric($obraCatalogoNombre) && ctype_alpha($obraCatalogoNombre)) {

                $ObraCatalogo = new ObraCatalogo($obraCatalogoId, $obraCatalogoNombre, $obraCatalogoDescripcion, $obraCatalogoActivo);
                $ObraCatalogoBusiness = new ObraCatalogoBusiness();
                $result = $ObraCatalogoBusiness->insertObraCatalogo($ObraCatalogo);

                if ($result == 1) {
                    header("location: ../view/ObraCatalogoView.php?success=inserted");
                } else {
                    header("location: ../view/ObraCatalogoView.php?error=dbError&var1=$obraCatalogoNombre&var2=$obraCatalogoDescripcion&var3$obraCatalgoActivo");
                }
            } else {
                if ((is_numeric($obraCatalogoNombre) || !ctype_alpha($obraCatalogoNombre))) {
                    header("location: ../view/ObraCatalogoView.php?error=stringFormat&var2=$obraCatalogoDescripcion&var3$obraCatalgoActivo");
                }
            }
        } else {
            header("location: ../view/ObraCatalogoView.php?error=emptyField&var1=$obraCatalogoNombre&var2=$obraCatalogoDescripcion&var3$obraCatalgoActivo");
        }
    } else {
        header("location: ../view/ObraCatalogoView.php?error=error&var1=$obraCatalogoNombre&var2=$obraCatalogoDescripcion&var3$obraCatalgoActivo");
    }
}
