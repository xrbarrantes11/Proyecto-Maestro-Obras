<?php

include '../data/EmpleadoData.php';

class EmpleadoBusiness {

    private $EmpleadoData;

    public function EmpleadoBusiness() {
        $this->EmpleadoData = new EmpleadoData();
    }

    public function insertEmpleado($Empleado) {
        return $this->EmpleadoData->insertEmpleado($Empleado);
    }

    public function updateEmpleado($Empleado) {
        return $this->EmpleadoData->updateEmpleado($Empleado);
    }

    public function deleteEmpleado($empleadoId) {
        return $this->EmpleadoData->deleteEmpleado($empleadoId);
    }

    public function getAllEmpleado() {
        return $this->EmpleadoData->getAllEmpleado();
    }

    public function getIdEmpleado($nombreEmpleado) {
        return $this->EmpleadoData->getIdEmpleado($nombreEmpleado);
    }

    public function getNombreEmpleado($idEmpleado) {
        return $this->EmpleadoData->getNombreEmpleado($idEmpleado);
    }

    public function buscarEmpleado($cedulaEmpleado) {
        return $this->EmpleadoData->buscarEmpleado($cedulaEmpleado);
    }
 
}