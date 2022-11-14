<?php

include '../data/EmpleadoTipoData.php';

class EmpleadoTipoBusiness {

    private $EmpleadoTipoData;

    public function EmpleadoTipoBusiness() {
        $this->EmpleadoTipoData = new EmpleadoTipoData();
    }

    public function insertEmpleadoTipo($EmpleadoTipo) {
        return $this->EmpleadoTipoData->insertEmpleadoTipo($EmpleadoTipo);
    }

    public function updateEmpleadoTipo($EmpleadoTipo) {
        return $this->EmpleadoTipoData->updateEmpleadoTipo($EmpleadoTipo);
    }

    public function deleteEmpleadoTipo($empleadoTipoId) {
        return $this->EmpleadoTipoData->deleteEmpleadoTipo($empleadoTipoId);
    }

    public function getAllEmpleadoTipo() {
        return $this->EmpleadoTipoData->getAllEmpleadoTipo();
    }
    
    public function getEmpleadoTipo($empleadoTipoId) {
        return $this->EmpleadoTipoData->getEmpleadoTipo($empleadoTipoId);
    }

     public function buscarEmpleadoTipo($empleadoTipoNombre) {
        return $this->EmpleadoTipoData->buscarEmpleadoTipo($empleadoTipoNombre);
    }

    public function getIdEmpleadoTipo($nombreEmpleadoTipo) {
        return $this->EmpleadoTipoData->getIdEmpleadoTipo($nombreEmpleadoTipo);
    }
    
}