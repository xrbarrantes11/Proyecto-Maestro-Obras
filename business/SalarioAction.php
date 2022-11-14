<?php
include './SalarioBusiness.php';
include './EmpleadoCostoHoraBusiness.php';
include './EmpleadoBusiness.php';
include './EmpleadoTipoBusiness.php';
include './EmpleadoTipoAsignadoBusiness.php';
include './PlanillaBusiness.php';

if (isset($_POST['create'])) {

    if (isset($_POST['empleadonombre']) && isset($_POST['horainicio']) && isset($_POST['horafin']) && isset($_POST['horasextra']) && isset($_POST['bonificacion'])) {
        $EmpleadoCostoHoraBusiness = new EmpleadoCostoHoraBusiness();    
        $EmpleadoBusiness = new EmpleadoBusiness();
        $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
        $idEmpleado = $EmpleadoBusiness->getIdEmpleado($_POST['empleadonombre']);
        $idEmpleadoTipo = $EmpleadoTipoAsignadoBusiness->getEmpleadoTipoAsignado($idEmpleado);
        $salarioFechaInicio = $_POST['horainicio'];
        $salarioFechaFin = $_POST['horafin'];
        $salarioHorasExtra = $_POST['horasextra'];
        $salarioBonificacion = str_replace('%','',$_POST['bonificacion']);
        $salarioDiasLaborados = $EmpleadoCostoHoraBusiness->getDiasTrabajados($idEmpleado);
        

        if (strlen($idEmpleadoTipo) > 0 && strlen($idEmpleado) > 0 && strlen($salarioFechaInicio) > 0 && strlen($salarioFechaFin) > 0 && strlen($salarioHorasExtra) > 0 && strlen($salarioBonificacion) > 0 && strlen($salarioDiasLaborados) > 0) {
            if (is_numeric($idEmpleado)) {
                $SalarioBusiness = new SalarioBusiness();
                $PlanillaBusiness = new PlanillaBusiness();
                $Salario = new Salario(0, $idEmpleado, $idEmpleadoTipo, $salarioFechaInicio, $salarioFechaFin, $salarioDiasLaborados, $salarioHorasExtra, $salarioBonificacion);
                
                $horasTrabajadas = $EmpleadoCostoHoraBusiness->getHorasTrabajadas($idEmpleado,$salarioFechaInicio,$salarioFechaFin);
                $planillaTotal = 0; //Horas trabajadas * monto salarial 
                $fecha = date('m/d/y');
                $Planilla = new Planilla(0,0,$horasTrabajadas,$fecha,$salarioHorasExtra, $idEmpleado, $planillaTotal);
                $PlanillaBusiness->insertPlanilla($Planilla);
                $result = $SalarioBusiness->insertSalario($Salario);

                if ($result == 1) {
                    header("location: ../view/PagoPeriodoView.php?success=inserted");
                } else {
                    header("location: ../view/PagoPeriodoView.php?error=dbError");
                }
            } else {
                header("location: ../view/PagoPeriodoView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/PagoPeriodoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/PagoPeriodoView.php?error=error");
    }
}