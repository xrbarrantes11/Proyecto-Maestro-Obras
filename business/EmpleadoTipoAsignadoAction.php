<?php

include './EmpleadoTipoBusiness.php';
include './EmpleadoTipoAsignadoBusiness.php';
include './EmpleadoTipoEmpleadoPagoRangoBusiness.php';

if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['empleadoTipoId'])&&isset($_POST['empleadoId'])) {

        $empleadoTipoId = $_POST['empleadoTipoId'];
        $empleadoId = $_POST['empleadoId'];
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
        $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();
        $result = 0;
        $result = $EmpleadoTipoAsignadoBusiness->deleteEmpleadoTipoAsignado($empleadoTipoId,$empleadoId);
        if ($result == 1) {
            echo "Transaccion realizada";
        } 
        else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['crear'])) {

    if (isset($_POST['empleadotipoempleado']) && isset($_POST['empleadoid'])) {

        $empleadoTipo = $_POST['empleadotipoempleado'];
        $empleadoId = $_POST['empleadoid'];
   
        if (true/*Validar que no se repita el tipo ingresado*/) {
                $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
                $result = 0;
                if ($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoId,$empleadoTipo) == false) {
                    $result = $EmpleadoTipoAsignadoBusiness->insertEmpleadoTipoAsignado($empleadoId,$empleadoTipo);
                }
                if ($result == 1) {
                    header("location: ../view/AsignarTipoEmpleadoView.php?success=inserted&id=$empleadoId");
                } else {
                    header("location: ../view/AsignarTipoEmpleadoView.php?error=dbError&id=$empleadoId");
                }
        } else {
            header("location: ../view/AsignarTipoEmpleadoView.php?error=emptyField&id=$empleadoId");
        }
    } else {
        header("location: ../view/AsignarTipoEmpleadoView.php?error=error&id=$empleadoId");
    }
}