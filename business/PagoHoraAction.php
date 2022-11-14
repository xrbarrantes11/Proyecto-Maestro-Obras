<?php

include './EmpleadoTipoEmpleadoPagoBusiness.php';
include './JornadaSemanalBusiness.php';
include './JornadaSemanalDetalleBusiness.php';
include '../domain/JornadaSemanalDetalle.php';


if (isset($_POST['create'])) {

    if (isset($_POST['empleadonombreid']) && isset($_POST['empleadotipoid']) && isset($_POST['fechainicio']) && isset($_POST['fechafin']) && isset($_POST['horas'])) {

        $empleadoTipoId = $_POST['empleadotipoid'];
        $empleadoNombreId = $_POST['empleadonombreid'];
        $fechaInicio = $_POST['fechainicio'];
        $fechaFin = $_POST['fechafin'];
        $cantHoras = $_POST['horas'];

        if (strlen($empleadoTipoId) > 0 && strlen($empleadoNombreId) > 0
        && strlen($fechaInicio) && strlen($fechaFin) && strlen($cantHoras)) {
            if (is_numeric($cantHoras)) {
                $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();
                $JornadaSemanalBusiness = new JornadaSemanalBusiness();
                $JornadaSemanalDetalleBusiness = new JornadaSemanalDetalleBusiness();
                $montoTotal = $cantHoras * $EmpleadoTipoEmpleadoPagoBusiness->obtenerPagoHora($empleadoTipoId, $empleadoNombreId); //* precio de horas
                $JornadaSemanal = new JornadaSemanal(0, $empleadoNombreId, $fechaInicio, $fechaFin, $montoTotal);
                $result = 0;
                if ($montoTotal > 0) {
                $JornadaSemanalBusiness->insertJornadaSemanal($JornadaSemanal);
                $idJornadaSemanal = $JornadaSemanalBusiness->getUltimoId();
                $JornadaSemanalDetalle = new JornadaSemanalDetalle(0,$idJornadaSemanal,$fechaInicio,$fechaFin,$montoTotal,$empleadoTipoId,$cantHoras,0,0,0);
                $result = $JornadaSemanalDetalleBusiness->insertJornadaSemanalDetalle($JornadaSemanalDetalle);
                }
                if ($result == 1) {
                    header("location: ../view/PagoHoraView.php?success=inserted");
                } else if ($montoTotal == 0) {
                    header("location: ../view/PagoHoraView.php?error=empty");
                } else{
                    header("location: ../view/PagoHoraView.php?error=dbError+$empleadoTipoId");
                }
            }
        } else {
            header("location: ../view/PagoHoraView.php?error=emptyField");
        }
    } else {
        header("location: ../view/PagoHoraView.php?error=error");
    }
}