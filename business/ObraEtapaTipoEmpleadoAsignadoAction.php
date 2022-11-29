<?php

include './EmpleadoBusiness.php';
include './EmpleadoTipoBusiness.php';
include './ObraEtapaBusiness.php';
include './ObraEtapaTipoEmpleadoAsignadoBusiness.php';
include './EmpleadoTipoEmpleadoPagoBusiness.php';
include './EmpleadoTipoAsignadoBusiness.php';

if (isset($_POST['crear'])) {

    if (isset($_POST['etapanombreid']) && isset($_POST['empleadonombreid']) && isset($_POST['empleadotipoid'])) {
        $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();
        $ObraEtapaTipoEmpleadoAsignadoBusiness = new ObraEtapaTipoEmpleadoAsignadoBusiness();
        $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
        $idE = $_POST['idE'];
        $etapaNombre = $_POST['etapanombreid'];
        $empleadoNombreId = $_POST['empleadonombreid'];
        $empleadoTipo = $_POST['empleadotipoid'];

        if (strlen($etapaNombre) > 0 && strlen($empleadoNombreId) > 0 && strlen($empleadoTipo) > 0) {
            if (!$ObraEtapaTipoEmpleadoAsignadoBusiness->buscarRegistroRepetidoEmpleados($empleadoTipo, $empleadoNombreId)) {
                $EmpleadoTipo = new ObraEtapaTipoEmpleadoAsignado(0, $etapaNombre, $empleadoNombreId, $empleadoTipo);
                $result = 0;
                if ($ObraEtapaTipoEmpleadoAsignadoBusiness->buscarEmpleadoTipoEmpleadoObraRepetido($empleadoNombreId, $empleadoTipo) == false) {
                    if ($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoNombreId, $empleadoTipo) == true) {
                        $result = $ObraEtapaTipoEmpleadoAsignadoBusiness->insertObraTipoEmpleadoAsignado($etapaNombre, $empleadoNombreId, $empleadoTipo);
                    }
                }
                if ($result == 1) {
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$idE&success=inserted");
                } else if ($ObraEtapaTipoEmpleadoAsignadoBusiness->buscarEmpleadoTipoEmpleadoObraRepetido($empleadoNombreId, $empleadoTipoId) == true) {
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$idE&error=repite");
                } else if($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoNombreId, $empleadoTipoId) == false){
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$idE&error=empty");
                } else {
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$idE&error=dbError");
                }
            } else {
                header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$idE&error=repite");
            }
        } else {
            header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$idE&error=emptyField");
        }
    } else {
        header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$idE&error=stringFormat");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['tbobraetapaempleadotipoasignadoid'])) {

        $obraTipoEmpleadoId = $_POST['tbobraetapaempleadotipoasignadoid'];

        $ObraEtapaTipoEmpleadoAsignadoBusiness = new ObraEtapaTipoEmpleadoAsignadoBusiness();
        $result = $ObraEtapaTipoEmpleadoAsignadoBusiness->deleteObraTipoEmpleadoAsignado($obraTipoEmpleadoId);


        if ($result == 1) {
            echo "Transaccion realizada y borrada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
}else if ($_POST['gestion']) {

    if (isset($_POST['tbobraid'])) {
        $tbObraId = $_POST['tbobraid'];

        header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?id=$tbObraId");
    }
}
