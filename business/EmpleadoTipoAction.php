<?php

include './EmpleadoTipoBusiness.php';
include './EmpleadoTipoAsignadoBusiness.php';
include './EmpleadoTipoEmpleadoPagoRangoBusiness.php';

if (isset($_POST['update'])) {

    if (isset($_POST['empleadotipoid']) && isset($_POST['empleadotiponombre']) && isset($_POST['empleadotipodescripcion']) && isset($_POST['empleadotiposalariobase'])) {

        $empleadoTipoId = $_POST['empleadotipoid'];
        $empleadoTipoNombre = $_POST['empleadotiponombre'];
        $empleadoTipoDescripcion = $_POST['empleadotipodescripcion'];
        $empleadoTipoActivo = $_POST['empleadotipoactivo'];
        if (isset($_POST['empleadotipoactivo'])) {
            $empleadoTipoActivo = 1;
        }
        if (!isset($_POST['empleadotipoactivo'])) {
            $empleadoTipoActivo = 0;
        }
        //str_replace('-','',$_POST['tbempleadocedula']);
        $aux = str_replace('₡','',$_POST['empleadotiposalariobase']);
        $empleadoTipoSalarioBase = str_replace('.','',$aux);
        if (strlen($empleadoTipoId) > 0 && strlen($empleadoTipoNombre) > 0 && strlen($empleadoTipoActivo) > 0 && strlen($empleadoTipoDescripcion) > 0 && strlen($empleadoTipoSalarioBase) > 0) {

            if (!is_numeric($empleadoTipoNombre) && ctype_alpha($empleadoTipoNombre)) {
                $EmpleadoTipo = new EmpleadoTipo($empleadoTipoId, $empleadoTipoNombre, $empleadoTipoDescripcion, $empleadoTipoActivo, $empleadoTipoSalarioBase);

                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();

                $result = $EmpleadoTipoBusiness->updateEmpleadoTipo($EmpleadoTipo);
                if ($result == 1) {
                    header("location: ../view/EmpleadoTipoView.php?success=updated");
                } else {
                    header("location: ../view/EmpleadoTipoView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoTipoView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/EmpleadoTipoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/EmpleadoTipoView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['empleadoTipoId'])) {

        $empleadoTipoId = $_POST['empleadoTipoId'];

        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
        $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();
        $result = 0;
        $busqueda = false;
        if($EmpleadoTipoAsignadoBusiness->getTipoAsignado($empleadoTipoId) || $EmpleadoTipoEmpleadoPagoRangoBusiness->buscarEmpleadoTipoEmpleadoPagoRangoRepetido($empleadoTipoId)){
        $busqueda = true;
        }
        if($busqueda == false){
        $result = $EmpleadoTipoBusiness->deleteEmpleadoTipo($empleadoTipoId);
        }
        if ($result == 1) {
            echo "Transaccion realizada";
        } 
        if($busqueda == true){
            echo "El tipo de empleado esta siendo utilizado por otras instancias, no es posible eliminarlo.";
        }
        else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['create'])) {

    if (isset($_POST['empleadotiponombre']) && isset($_POST['empleadotipodescripcion']) && isset($_POST['empleadotiposalariobase'])) {

        $empleadoTipoNombre = $_POST['empleadotiponombre'];
        $empleadoTipoDescripcion = $_POST['empleadotipodescripcion'];
        $empleadoTipoActivo = $_POST['empleadotipoactivo'];
        if ($empleadoTipoActivo != 1) {
            $empleadoTipoActivo = 0;
        }
        $aux = str_replace('₡','',$_POST['empleadotiposalariobase']);
        $empleadoTipoSalarioBase = str_replace('.','',$aux);

        if (
            strlen($empleadoTipoNombre) > 0 && strlen($empleadoTipoDescripcion) > 0
            && strlen($empleadoTipoActivo) > 0 && strlen($empleadoTipoSalarioBase) > 0
        ) {
            if (!is_numeric($empleadoTipoNombre)  && ctype_alpha($empleadoTipoNombre)) {
                $EmpleadoTipo = new EmpleadoTipo(0, $empleadoTipoNombre, $empleadoTipoDescripcion, $empleadoTipoActivo, $empleadoTipoSalarioBase);

                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                $result = 0;
                if ($EmpleadoTipoBusiness->buscarEmpleadoTipo($empleadoTipoNombre) == false) {
                    $result = $EmpleadoTipoBusiness->insertEmpleadoTipo($EmpleadoTipo);
                }


                if ($result == 1) {
                    header("location: ../view/EmpleadoTipoView.php?success=inserted");
                } else {
                    header("location: ../view/EmpleadoTipoView.php?error=dbError&var1=$empleadoTipoNombre&var2=$empleadoTipoDescripcion&var3=$empleadoTipoActivo&var4=$empleadoTipoSalarioBase");
                }
            } else {

               if ((is_numeric($empleadoTipoNombre) || !ctype_alpha($empleadoTipoNombre))) {
                    header("location: ../view/EmpleadoTipoView.php?error=stringFormat&var2=$empleadoTipoDescripcion&var3=$empleadoTipoActivo&var4=$empleadoTipoSalarioBase");
                } 
            }
        } else {
            header("location: ../view/EmpleadoTipoView.php?error=emptyField&var1=$empleadoTipoNombre&var2=$empleadoTipoDescripcion&var3=$empleadoTipoActivo&var4=$empleadoTipoSalarioBase");
        }
    } else {
        header("location: ../view/EmpleadoTipoView.php?error=error&var1=$empleadoTipoNombre&var2=$empleadoTipoDescripcion&var3=$empleadoTipoActivo&var4=$empleadoTipoSalarioBase");
    }
}

if ($_POST['cargar']) {
    if (isset($_POST['tbempleadoid'])) {
        $tbEmpleadoId = $_POST['tbempleadoid'];
        header("location: ../view/AsignarTipoEmpleadoView.php?id=$tbEmpleadoId");
    } else {
        header("location: ../view/AsignarTipoEmpleadoView.php?error=error");
    }
}