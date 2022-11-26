<?php

include '../data/EmpleadoTipoAsignadoData.php';

class EmpleadoTipoAsignadoBusiness {

    private $EmpleadoTipoAsignadoData;

    public function EmpleadoTipoAsignadoBusiness() {
        $this->EmpleadoTipoAsignadoData = new EmpleadoTipoAsignadoData();
    }

    public function insertEmpleadoTipoAsignado($empleadoId, $empleadoTipoid) {
        return $this->EmpleadoTipoAsignadoData->insertEmpleadoTipoAsignado($empleadoId,$empleadoTipoid);
    }

    public function getAllEmpleadoTipoAsignado($empleadoId) {
        return $this->EmpleadoTipoAsignadoData->getAllEmpleadoTipoAsignado($empleadoId);
    }

    public function getAllEmpleadoTipoAsignados($empleadoId) {
        return $this->EmpleadoTipoAsignadoData->getAllEmpleadoTipoAsignados($empleadoId);
    }

    public function getEmpleadoTipoAsignado($empleadoId) {
        return $this->EmpleadoTipoAsignadoData->getEmpleadoTipoAsignado($empleadoId);
    }

    public function deleteAllEmpleadoTipoAsignado($empleadoId) {
        return $this->EmpleadoTipoAsignadoData->deleteAllEmpleadoTipoAsignado($empleadoId);
    }

    public function deleteEmpleadoTipoAsignado($empleadoTipoId,$empleadoId) {
        return $this->EmpleadoTipoAsignadoData->deleteEmpleadoTipoAsignado($empleadoTipoId,$empleadoId,);
    }

    public function getTipoAsignado($empleadoTipoId) {
        return $this->EmpleadoTipoAsignadoData->getTipoAsignado($empleadoTipoId);
    }

    public function buscarTipoAsignado($empleadoNombreId, $empleadoTipoId) {
        return $this->EmpleadoTipoAsignadoData->buscarTipoAsignado($empleadoNombreId, $empleadoTipoId);
    }
}