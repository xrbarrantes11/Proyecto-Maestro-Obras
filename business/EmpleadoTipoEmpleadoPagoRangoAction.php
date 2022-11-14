<?php

include './EmpleadoTipoEmpleadoPagoRangoBusiness.php';
include './EmpleadoTipoAsignadoBusiness.php';
include './EmpleadoTipoBusiness.php';

if (isset($_POST['actualiza'])) {
    if (isset($_POST['empleadotiporangoid']) && isset($_POST['empleadotipoid']) && isset($_POST['rangoinferior'])&& isset($_POST['rangosuperior'])) {
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $empleadoTipoId = $EmpleadoTipoBusiness->getIdEmpleadoTipo($_POST['empleadotipoid']);
        $empleadoTipoRangoId = $_POST['empleadotiporangoid'];
        $aux1 = str_replace('₡','',$_POST['rangoinferior']);
        $aux2 = str_replace('₡','',$_POST['rangosuperior']);
        $rangoInferior = str_replace('.','',$aux1);
        $rangoSuperior = str_replace('.','',$aux2);
        if($rangoInferior <= $rangoSuperior){
        if (strlen($empleadoTipoId) > 0 && strlen($empleadoTipoRangoId) > 0 && strlen($rangoInferior) > 0 && strlen($rangoSuperior) > 0) {

            if (is_numeric($rangoInferior) && is_numeric($rangoSuperior)) {
                $EmpleadoTipoEmpleadoPagoRango = new EmpleadoTipoEmpleadoPagoRango($empleadoTipoRangoId, $empleadoTipoId, $rangoInferior, $rangoSuperior);

                $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();

                $result = $EmpleadoTipoEmpleadoPagoRangoBusiness->updateEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango);
                if ($result == 1) {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?success=updated");
                } else {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=emptyField");
        }
      }else{
        header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=monto");}
    } else {
        header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['empleadoTipoId'])) {

        $empleadoTipoId = $_POST['empleadoTipoId'];
        $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
        $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();
        $busqueda = $EmpleadoTipoAsignadoBusiness->getTipoAsignado($empleadoTipoId);
        $result = 0;
        if($busqueda == false){
        $result = $EmpleadoTipoEmpleadoPagoRangoBusiness->deleteEmpleadoTipoEmpleadoPagoRango($empleadoTipoId);
        }
        if ($result == 1) {
            echo "Transaccion realizada";
        } else 
        if ($busqueda == true) {
            echo "Un empleado esta utilizando estos datos, el rango no puede ser eliminado.";
        } else {
            echo "Error en la transaccion";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['crear'])) {

    if (isset($_POST['empleadotipoid']) && isset($_POST['rangoinferior']) && isset($_POST['rangosuperior'])) {
        $empleadoTipoId = $_POST['empleadotipoid'];
        $aux1 = str_replace('₡','',$_POST['rangoinferior']);
        $aux2 = str_replace('₡','',$_POST['rangosuperior']);
        $rangoInferior = str_replace('.','',$aux1);
        $rangoSuperior = str_replace('.','',$aux2);
        if($rangoInferior <= $rangoSuperior){
        if (strlen($empleadoTipoId) > 0 && strlen($rangoInferior) > 0 && strlen($rangoSuperior)) {
            if (is_numeric($empleadoTipoId)) {
                $EmpleadoTipoEmpleadoPagoRango = new EmpleadoTipoEmpleadoPagoRango(0, $empleadoTipoId, $rangoInferior, $rangoSuperior);
                $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
                $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();
                $result = 0;
                if ($EmpleadoTipoEmpleadoPagoRangoBusiness->buscarEmpleadoTipoEmpleadoPagoRangoRepetido($empleadoTipoId) == false) {
                    $result = $EmpleadoTipoEmpleadoPagoRangoBusiness->insertEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango);
                }
                if ($result == 1) {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?success=inserted");
                } else if ($EmpleadoTipoEmpleadoPagoRangoBusiness->buscarEmpleadoTipoEmpleadoPagoRangoRepetido($empleadoTipoId) == true) {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=repite");
                }else{
                    header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=dbError");
                }
              }
        } else {
            header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=emptyField");
        }
      }else{
        header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=monto");}
    } else {
        header("location: ../view/EmpleadoTipoEmpleadoPagoRangoView.php?error=error");
    }
}