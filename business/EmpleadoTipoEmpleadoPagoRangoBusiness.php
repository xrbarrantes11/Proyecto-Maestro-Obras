<?php

include '../data/EmpleadoTipoEmpleadoPagoRangoData.php';

class EmpleadoTipoEmpleadoPagoRangoBusiness {

    private $EmpleadoTipoEmpleadoPagoRangoData;

    public function EmpleadoTipoEmpleadoPagoRangoBusiness() {
        $this->EmpleadoTipoEmpleadoPagoRangoData = new EmpleadoTipoEmpleadoPagoRangoData();
    }

    public function insertEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango) {
        return $this->EmpleadoTipoEmpleadoPagoRangoData->insertEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango);
    }

    public function updateEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango) {
        return $this->EmpleadoTipoEmpleadoPagoRangoData->updateEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango);
    }

    public function deleteEmpleadoTipoEmpleadoPagoRango($empleadoTipoId) {
        return $this->EmpleadoTipoEmpleadoPagoRangoData->deleteEmpleadoTipoEmpleadoPagoRango($empleadoTipoId);
    }

    public function buscarEmpleadoTipoEmpleadoPagoRangoRepetido($empleadoTipoId) {
        return $this->EmpleadoTipoEmpleadoPagoRangoData->buscarEmpleadoTipoEmpleadoPagoRangoRepetido($empleadoTipoId);
    }

    public function getAllEmpleadoTipoEmpleadoPagoRango() {
        return $this->EmpleadoTipoEmpleadoPagoRangoData->getAllEmpleadoTipoEmpleadoPagoRango();
    }

    public function obtenerPagoHoraRangoInferior($empleadoTipoId) {
        return $this->EmpleadoTipoEmpleadoPagoRangoData->obtenerPagoHoraRangoInferior($empleadoTipoId);
    }
    
    public function obtenerPagoHoraRangoSuperior($empleadoTipoId) {
        return $this->EmpleadoTipoEmpleadoPagoRangoData->obtenerPagoHoraRangoSuperior($empleadoTipoId);
    }
    
}