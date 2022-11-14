<?php

include '../data/EmpleadoCostoHoraData.php';

class EmpleadoCostoHoraBusiness{

    private $EmpleadoCostoHoraData;

    public function EmpleadoCostoHoraBusiness(){
        $this->EmpleadoCostoHoraData = new EmpleadoCostoHoraData();
    }

    public function insertEmpleadoCostoHora($Empleado) {
        return $this->EmpleadoCostoHoraData->insertEmpleadoCostoHora($Empleado);
    }

    public function updateEmpleadoCostoHora($Empleado) {
        return $this->EmpleadoCostoHoraData->updateEmpleadoCostoHora($Empleado);
    }

    public function getAllEmpleadoCostoHora() {
        return $this->EmpleadoCostoHoraData->getAllEmpleadoCostoHora();
    }

    public function getDiasTrabajados($idEmpleado) {
        return $this->EmpleadoCostoHoraData->getDiasEmpleado($idEmpleado);
    }

    public function getHorasTrabajadas($idEmpleado, $fechaInicio, $fechaFin) {
        return $this->EmpleadoCostoHoraData->getHorasEmpleadoEntreFechas($idEmpleado, $fechaInicio, $fechaFin);
    }
    
    public function verificarRegistroHora($id, $fechaActual){
        return $this->EmpleadoCostoHoraData->verificarRegistroHora($id, $fechaActual);
    }

    public function verificarEstadoHoraEmpleado($id, $fechaActual){
        return $this->EmpleadoCostoHoraData->verificarEstadoHoraEmpleado($id, $fechaActual);
    }

    public function verificarHoraFinEmpleado($id, $fechaActual){
        return $this->EmpleadoCostoHoraData->verificarHoraFinEmpleado($id, $fechaActual);
    }

     public function obtenerHoraEmpleado($id,$fechaActual){
        return $this->EmpleadoCostoHoraData->obtenerHoraEmpleado($id,$fechaActual);
     }


    


}




?>