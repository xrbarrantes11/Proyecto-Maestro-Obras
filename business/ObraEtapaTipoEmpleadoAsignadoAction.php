<?php

include './EmpleadoBusiness.php';
include './EmpleadoTipoBusiness.php';
include './ObraEtapaBusiness.php';
include './ObraEtapaTipoEmpleadoAsignadoBusiness.php';
include './EmpleadoTipoEmpleadoPagoBusiness.php';

if (isset($_POST['crear'])) {

    if (isset($_POST['etapanombreid']) && isset($_POST['empleadonombreid']) && isset($_POST['empleadotipoid'])) {
        $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();
        $etapaNombre = $_POST['etapanombreid'];
        $empleadoNombreId = $_POST['empleadonombreid'];
        $empleadoTipo = $_POST['empleadotipoid'];

        if (strlen($etapaNombre) > 0 && strlen($empleadoNombreId) > 0 && strlen($empleadoTipo) > 0) {
            if (!$EmpleadoTipoEmpleadoPagoBusiness->buscarRegistroRepetido($empleadoTipo, $empleadoNombreId)) {
                $EmpleadoTipo = new ObraEtapaTipoEmpleadoAsignado(0, $etapaNombre, $empleadoNombreId, $empleadoTipo);
                $ObraEtapaTipoEmpleadoAsignadoBusiness = new ObraEtapaTipoEmpleadoAsignadoBusiness();

                if ($EmpleadoTipoEmpleadoPagoBusiness->buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipo) == false) {
                    if ($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoNombreId, $empleadoTipo) == true) {
                        $result = $ObraEtapaTipoEmpleadoAsignadoBusiness->insertObraTipoEmpleadoAsignado($etapaNombre, $empleadoNombreId, $empleadoTipo);
                    }
                }
                if ($result == 1) {
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?success=inserted");
                } else if ($EmpleadoTipoEmpleadoPagoBusiness->buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipoId) == true) {
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=repite");
                } else if($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoNombreId, $empleadoTipoId) == false){
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=empty");
                } else {
                    header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=repite");
            }
        } else {
            header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=stringFormat");
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
}
