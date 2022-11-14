<?php

include './EstadoEmpleadoBusiness.php';

if (strcmp($_POST['action'], 'cambiar') == 0) {

    if (isset($_POST['empleadoActivo'])) {
            
        $empleadoId = $_POST['idEmpleado'];
        $empleadoActivo = $_POST['empleadoActivo'];
        
        if (strlen($empleadoId) > 0 && strlen($empleadoActivo) > 0) {

                $EstadoEmpleadoBusiness = new EstadoEmpleadoBusiness();

                $result = $EstadoEmpleadoBusiness->updateEstadoEmpleado($empleadoId,$empleadoActivo);
                if ($result == 1) {
                    echo "Transaccion realizada";
                } else {
                    echo "Error al procesar la transacción";
                }
        } else {
            echo "Error de informacion";
        }
    } else {
        echo "Error datos incorrectos";
    }
}