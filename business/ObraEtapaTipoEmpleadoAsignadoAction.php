<?php

include './EmpleadoBusiness.php';
include './EmpleadoTipoBusiness.php';
include './ObraEtapaBusiness.php';
include './ObraEtapaTipoEmpleadoAsignadoBusiness.php';

if (isset($_POST['crear'])) {

    if (isset($_POST['etapanombreid']) && isset($_POST['empleadonombreid']) && isset($_POST['empleadotipoid'])) {

        $etapaNombre = $_POST['etapanombreid'];
        $empleadoNombreId = $_POST['empleadonombreid'];
        $empleadoTipo = $_POST['empleadotipoid'];

        if (strlen($etapaNombre) > 0 && strlen($empleadoNombreId) > 0 && strlen($empleadoTipo) > 0) {
            $EmpleadoTipo = new ObraEtapaTipoEmpleadoAsignado(0, $etapaNombre, $empleadoNombreId, $empleadoTipo);

            $ObraEtapaTipoEmpleadoAsignadoBusiness = new ObraEtapaTipoEmpleadoAsignadoBusiness();
            $result = $ObraEtapaTipoEmpleadoAsignadoBusiness->insertObraTipoEmpleadoAsignado($etapaNombre, $empleadoNombreId, $empleadoTipo);

            if ($result == 1) {
                header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?success=inserted");
            } else {
                header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=dbError");
            }
        } else {
            header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ObraEtapaEmpleadoAsignadoView.php?error=stringFormat");
    }
}