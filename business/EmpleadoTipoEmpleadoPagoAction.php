<?php

include './EmpleadoTipoEmpleadoPagoBusiness.php';
include './EmpleadoTipoEmpleadoPagoRangoBusiness.php';
include './EmpleadoTipoAsignadoBusiness.php';
include './EmpleadoBusiness.php';
include './EmpleadoTipoBusiness.php';

if (isset($_POST['actualiza'])) {
    if (isset($_POST['empleadonombreid']) && isset($_POST['empleadotipoid']) && isset($_POST['empleadomonto'])) {
        $EmpleadoBusiness = new EmpleadoBusiness();
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $empleadoTipoId = $EmpleadoTipoBusiness->getIdEmpleadoTipo($_POST['empleadotipoid']);
        $empleadoNombreId = $EmpleadoBusiness->getIdEmpleado($_POST['empleadonombreid']);
        $aux2 = str_replace('₡','',$_POST['empleadomonto']);
        $empleadoMonto = str_replace('.','',$aux2);

        if (strlen($empleadoTipoId) > 0 && strlen($empleadoNombreId) > 0 && strlen($empleadoMonto) > 0) {
            $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();
            $montoInferior = $EmpleadoTipoEmpleadoPagoRangoBusiness->obtenerPagoHoraRangoInferior($empleadoTipoId);
            $montoSuperior = $EmpleadoTipoEmpleadoPagoRangoBusiness->obtenerPagoHoraRangoSuperior($empleadoTipoId);
            if ($empleadoMonto >= $montoInferior && $empleadoMonto <= $montoSuperior) {
                $EmpleadoTipoEmpleadoPago = new EmpleadoTipoEmpleadoPago($empleadoNombreId, $empleadoTipoId, $empleadoMonto);

                $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();

                $result = $EmpleadoTipoEmpleadoPagoBusiness->updateEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago);
                if ($result == 1) {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?success=updated");
                } else {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=valor");
            }
        } else {
            header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['nombreId'])&&isset($_POST['tipoId'])) {

        $empleadoTipoId = $_POST['tipoId'];
        $empleadoNombreId = $_POST['nombreId'];

        $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();
        $result = $EmpleadoTipoEmpleadoPagoBusiness->deleteEmpleadoTipoEmpleadoPago($empleadoTipoId, $empleadoNombreId);
        if ($result == 1) {
            echo "Transaccion realizada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['crear'])) {

    if (isset($_POST['empleadotipoid']) && isset($_POST['empleadonombreid']) && isset($_POST['empleadomonto'])) {
        $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
        $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();
        $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();
        $empleadoTipoId = $_POST['empleadotipoid'];
        $empleadoNombreId = $_POST['empleadonombreid'];
        $aux = str_replace('₡','',$_POST['empleadomonto']);
        $empleadoMonto = str_replace('.','',$aux);
        if (strlen($empleadoTipoId) > 0 && strlen($empleadoNombreId) > 0 && strlen($empleadoMonto)) {
            if(!$EmpleadoTipoEmpleadoPagoBusiness->buscarRegistroRepetido($empleadoTipoId, $empleadoNombreId)){
                $montoInferior = $EmpleadoTipoEmpleadoPagoRangoBusiness->obtenerPagoHoraRangoInferior($empleadoTipoId);
                $montoSuperior = $EmpleadoTipoEmpleadoPagoRangoBusiness->obtenerPagoHoraRangoSuperior($empleadoTipoId);
                if ($empleadoMonto >= $montoInferior && $empleadoMonto <= $montoSuperior) {
                $EmpleadoTipoEmpleadoPago = new EmpleadoTipoEmpleadoPago($empleadoNombreId, $empleadoTipoId, $empleadoMonto);
                $result = 0;
                if ($EmpleadoTipoEmpleadoPagoBusiness->buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipoId) == false) {
                    if($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoNombreId, $empleadoTipoId) == true){
                    $result = $EmpleadoTipoEmpleadoPagoBusiness->insertEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago);
                    }
                }
                if ($result == 1) {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?success=inserted");
                } else if ($EmpleadoTipoEmpleadoPagoBusiness->buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipoId) == true) {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=repite");
                } else if($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoNombreId, $empleadoTipoId) == false){
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=empty");
                }else{
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=dbError");
                }
              } else {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=valor");
              }
            } else {
                header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=repite");
            }
        } else {
            header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=error");
    }
}