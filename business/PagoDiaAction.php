<?php

include './EmpleadoTipoEmpleadoPagoBusiness.php';
include './JornadaSemanalBusiness.php';
include './JornadaSemanalDetalleBusiness.php';
include '../domain/JornadaSemanalDetalle.php';
include './EmpleadoTipoAsignadoBusiness.php';


if (isset($_POST['create'])) {

    if (isset($_POST['empleadonombreid']) && isset($_POST['empleadotipoid']) && isset($_POST['fechainicio']) && isset($_POST['fechafin'])) {

        $empleadoTipoId = $_POST['empleadotipoid'];
        $empleadoNombreId = $_POST['empleadonombreid'];
        $fechaInicio = $_POST['fechainicio'];
        $fechaFin = $_POST['fechafin'];
        $cantDias = $_POST['dias'];
        $aux = str_replace('₡','',$_POST['monto']);
        $montoGanado = str_replace('.','',$aux);

           if (strlen($empleadoTipoId) > 0 && strlen($empleadoNombreId) > 0
        && strlen($fechaInicio) && strlen($fechaFin) && strlen($cantDias)) {
            if (is_numeric($cantDias)) {
                $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();
                $JornadaSemanalBusiness = new JornadaSemanalBusiness();
                $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
                $JornadaSemanalDetalleBusiness = new JornadaSemanalDetalleBusiness();
                $EmpleadoTipoEmpleadoPago = new EmpleadoTipoEmpleadoPago($empleadoNombreId, $empleadoTipoId, $montoGanado);
                
               // $montoTotal = $cantHoras * $EmpleadoTipoEmpleadoPagoBusiness->obtenerPagoHora($empleadoTipoId, $empleadoNombreId); //* precio de horas
                $JornadaSemanal = new JornadaSemanal(0, $empleadoNombreId, $fechaInicio, $fechaFin, $montoGanado);
                $result = 0;
                //if ($EmpleadoTipoEmpleadoPagoBusiness->buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipoId) == false) {
                    if($EmpleadoTipoAsignadoBusiness->buscarTipoAsignado($empleadoNombreId, $empleadoTipoId) == true){
                    $result = $EmpleadoTipoEmpleadoPagoBusiness->insertEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago);
                    }else{
                        $montoGanado = 0;
                    }
                //}
                if ($montoGanado > 0) {
                $JornadaSemanalBusiness->insertJornadaSemanal($JornadaSemanal);
                $idJornadaSemanal = $JornadaSemanalBusiness->getUltimoId();
                $JornadaSemanalDetalle = new JornadaSemanalDetalle(0,$idJornadaSemanal,$fechaInicio,$fechaFin,$montoGanado,$empleadoTipoId,0,$cantDias,0,0);
                $result = $JornadaSemanalDetalleBusiness->insertJornadaSemanalDetalle($JornadaSemanalDetalle);
                }
                if ($result == 1) {
                    header("location: ../view/PagoDiaView.php?success=inserted");
                } else if ($montoGanado == 0) {
                    header("location: ../view/PagoDiaView.php?error=empty");
                } else{
                    header("location: ../view/PagoDiaView.php?error=dbError+$empleadoTipoId");
                }
            }
        } else {
            header("location: ../view/PagoDiaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/PagoDiaView.php?error=error");
    }
}