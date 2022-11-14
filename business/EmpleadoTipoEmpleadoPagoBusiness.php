<?php

include '../data/EmpleadoTipoEmpleadoPagoData.php';

class EmpleadoTipoEmpleadoPagoBusiness {

    private $EmpleadoTipoEmpleadoPagoData;

    public function EmpleadoTipoEmpleadoPagoBusiness() {
        $this->EmpleadoTipoEmpleadoPagoData = new EmpleadoTipoEmpleadoPagoData();
    }

    public function insertEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago) {
        return $this->EmpleadoTipoEmpleadoPagoData->insertEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago);
    }

    public function updateEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago) {
        return $this->EmpleadoTipoEmpleadoPagoData->updateEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago);
    }

    public function deleteEmpleadoTipoEmpleadoPago($empleadoTipoId,$empleadoNombreId) {
        return $this->EmpleadoTipoEmpleadoPagoData->deleteEmpleadoTipoEmpleadoPago($empleadoTipoId,$empleadoNombreId);
    }

    public function buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipoId) {
        return $this->EmpleadoTipoEmpleadoPagoData->buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipoId);
    }

    public function getAllEmpleadoTipoEmpleadoPago() {
        return $this->EmpleadoTipoEmpleadoPagoData->getAllEmpleadoTipoEmpleadoPago();
    }

    public function obtenerPagoHora($empleadoTipoId, $empleadoNombreId) {
        return $this->EmpleadoTipoEmpleadoPagoData->obtenerPagoHora($empleadoTipoId, $empleadoNombreId);
    }

    public function buscarRegistroRepetido($empleadoTipoId, $empleadoNombreId) {
        return $this->EmpleadoTipoEmpleadoPagoData->buscarRegistroRepetido($empleadoTipoId, $empleadoNombreId);
    }
    
}