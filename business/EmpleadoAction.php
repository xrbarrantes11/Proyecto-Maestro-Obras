<?php

include './EmpleadoBusiness.php';
include './EmpleadoTipoAsignadoBusiness.php';
include './EmpleadoTipoEmpleadoPagoBusiness.php';
include './EmpleadoTipoBusiness.php';

if (isset($_POST['actualiza'])) {
    if (isset($_POST['empleadonombreid']) && isset($_POST['empleadotipoid']) && isset($_POST['empleadomonto'])) {
        $EmpleadoBusiness = new EmpleadoBusiness();
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $empleadoTipoId = $EmpleadoTipoBusiness->getIdEmpleadoTipo($_POST['empleadotipoid']);
        $empleadoNombreId = $EmpleadoBusiness->getIdEmpleado($_POST['empleadonombreid']);
        $empleadoMonto = $_POST['empleadomonto'];

        if (strlen($empleadoTipoId) > 0 && strlen($empleadoNombreId) > 0 && strlen($empleadoMonto) > 0) {

            if (is_numeric($empleadoMonto)) {
                $EmpleadoTipoEmpleadoPago = new EmpleadoTipoEmpleadoPago($empleadoNombreId, $empleadoTipoId, $empleadoMonto);

                $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();

                $result = $EmpleadoTipoEmpleadoPagoBusiness->updateEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago);
                if ($result == 1) {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?success=updated");
                } else {
                    header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/EmpleadoTipoEmpleadoPagoView.php?error=error");
    }
}

if (isset($_POST['actualizar'])) {
    if (
        isset($_POST['tbempleadoid']) && isset($_POST['tbempleadonombre']) && isset($_POST['tbempleadoapellidos']) && isset($_POST['tbempleadocedula'])
        && isset($_POST['tbempleadotelefono'])) {
        $tbEmpleadoId = $_POST['tbempleadoid'];
        $tbEmpleadoNombre = $_POST['tbempleadonombre'];
        $tbEmpleadoApellidos = $_POST['tbempleadoapellidos'];
        $tbEmpleadoCedula = str_replace('-','',$_POST['tbempleadocedula']);
        $tbEmpleadoTelefono = str_replace('-', '',$_POST['tbempleadotelefono']);
       $tbEmpleadoActivo = $_POST['tbempleadoactivo'];
        if(isset($_POST['tbempleadoactivo'])){
        $tbEmpleadoActivo = 1;
        }
        if (!isset($_POST['tbempleadoactivo'])) {
        $tbEmpleadoActivo = 0; 
        }

        if (
            strlen($tbEmpleadoId) > 0 && strlen($tbEmpleadoNombre) > 0 && strlen($tbEmpleadoApellidos) > 0 && strlen($tbEmpleadoCedula) > 0 && strlen($tbEmpleadoTelefono) > 0
            && strlen($tbEmpleadoActivo) > 0
        ) {
            if (!is_numeric($tbEmpleadoNombre) && ctype_alpha($tbEmpleadoNombre) && ctype_alpha($tbEmpleadoApellidos)) {
                $Empleado = new Empleado($tbEmpleadoId, $tbEmpleadoNombre, $tbEmpleadoApellidos, $tbEmpleadoCedula, $tbEmpleadoTelefono, $tbEmpleadoActivo);

                $EmpleadoBusiness = new EmpleadoBusiness();

                $result = $EmpleadoBusiness->updateEmpleado($Empleado);
                if ($result == 1) {
                    header("location: ../view/EmpleadoView.php?success=updated");
                } else {
                    header("location: ../view/EmpleadoView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/EmpleadoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/EmpleadoView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) {

    if (isset($_POST['idEmpleado'])) {

        $empleadoId = $_POST['idEmpleado'];

        $EmpleadoBusiness = new EmpleadoBusiness();
        $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
        $EmpleadoTipoAsignadoBusiness->deleteAllEmpleadoTipoAsignado($empleadoId);
        $result = $EmpleadoBusiness->deleteEmpleado($empleadoId);
        if ($result == 1) {
            echo "Transaccion realizada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['crear'])) {

    if (isset($_POST['tbempleadonombre']) && isset($_POST['tbempleadoapellidos']) && isset($_POST['tbempleadocedula'])
        && isset($_POST['tbempleadotelefono']) && isset($_POST['tbempleadotipoempleado'])
    ) {
        $tbEmpleadoNombre = $_POST['tbempleadonombre'];
        $tbEmpleadoApellidos = $_POST['tbempleadoapellidos'];
        $tbEmpleadoCedula = str_replace('-','',$_POST['tbempleadocedula']);
        $tbEmpleadoTelefono = str_replace('-', '',$_POST['tbempleadotelefono']);
        $tbEmpleadoTipoEmpleado = $_POST['tbempleadotipoempleado'];
        $tbEmpleadoActivo = $_POST['tbempleadoactivo'];
        if ($tbEmpleadoActivo != 1) {
            $tbEmpleadoActivo = 0;
        }


        if (
            strlen($tbEmpleadoNombre) > 0 && strlen($tbEmpleadoApellidos) > 0
            && strlen($tbEmpleadoCedula) > 0 && strlen($tbEmpleadoTelefono) > 0 && strlen($tbEmpleadoTipoEmpleado) > 0
            && strlen($tbEmpleadoActivo) > 0
        ) {
            if (!is_numeric($tbEmpleadoNombre) && !is_numeric($tbEmpleadoApellidos) && ctype_alpha($tbEmpleadoNombre) && ctype_alpha($tbEmpleadoApellidos)) {
                $Empleado = new Empleado(0, $tbEmpleadoNombre, $tbEmpleadoApellidos, $tbEmpleadoCedula, $tbEmpleadoTelefono, $tbEmpleadoActivo);
                $EmpleadoBusiness = new EmpleadoBusiness();
                $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
                $result = 0;
                if ($EmpleadoBusiness->buscarEmpleado($tbEmpleadoCedula) == false) {
                    $result = $EmpleadoBusiness->insertEmpleado($Empleado);
                    $empleadoId = $EmpleadoBusiness->getIdEmpleado($tbEmpleadoNombre);
                    $EmpleadoTipoAsignadoBusiness->insertEmpleadoTipoAsignado($empleadoId, $tbEmpleadoTipoEmpleado);
                }
                if ($result == 1) {
                    header("location: ../view/EmpleadoView.php?success=inserted");
                } else {
                    header("location: ../view/EmpleadoView.php?error=dbError&var=$tbEmpleadoNombre&var2=$tbEmpleadoApellidos&var4=$tbEmpleadoTelefono&var5=$tbEmpleadoTipoEmpleado&var6=$tbEmpleadoActivo");
                }
            } else {
                if ((is_numeric($tbEmpleadoNombre) || !ctype_alpha($tbEmpleadoNombre)) && (is_numeric($tbEmpleadoApellidos) || !ctype_alpha($tbEmpleadoApellidos))) {
                    header("location: ../view/EmpleadoView.php?error=stringFormat&var3=$tbEmpleadoCedula&var4=$tbEmpleadoTelefono&var5=$tbEmpleadoTipoEmpleado&var6=$tbEmpleadoActivo");
                } else
                if (is_numeric($tbEmpleadoNombre) || !ctype_alpha($tbEmpleadoNombre)) {
                    header("location: ../view/EmpleadoView.php?error=stringFormat&var2=$tbEmpleadoApellidos&var3=$tbEmpleadoCedula&var4=$tbEmpleadoTelefono&var5=$tbEmpleadoTipoEmpleado&var6=$tbEmpleadoActivo");
                } else
                if (is_numeric($tbEmpleadoApellidos) || !ctype_alpha($tbEmpleadoApellidos)) {
                    header("location: ../view/EmpleadoView.php?error=stringFormat&var=$tbEmpleadoNombre&var3=$tbEmpleadoCedula&var4=$tbEmpleadoTelefono&var5=$tbEmpleadoTipoEmpleado&var6=$tbEmpleadoActivo");
                }
            }
        } else {
            header("location: ../view/EmpleadoView.php?error=emptyField&var=$tbEmpleadoNombre&var2=$tbEmpleadoApellidos&var3=$tbEmpleadoCedula&var4=$tbEmpleadoTelefono&var5=$tbEmpleadoTipoEmpleado&var6=$tbEmpleadoActivo");
        }
    } else {
        header("location: ../view/EmpleadoView.php?error=error&var=$tbEmpleadoNombre&var2=$tbEmpleadoApellidos&var3=$tbEmpleadoCedula&var4=$tbEmpleadoTelefono&var5=$tbEmpleadoTipoEmpleado&var6=$tbEmpleadoActivo");
    }
}
