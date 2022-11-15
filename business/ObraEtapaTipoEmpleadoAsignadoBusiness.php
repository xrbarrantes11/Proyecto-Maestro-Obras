<?php

include '../data/ObraEtapaTipoEmpleadoAsignadoData.php';

class ObraEtapaTipoEmpleadoAsignadoBusiness {

    private $ObraEtapaTipoEmpleadoAsignadoData;

    public function ObraEtapaTipoEmpleadoAsignadoBusiness() {
        $this->ObraEtapaTipoEmpleadoAsignadoData = new ObraEtapaTipoEmpleadoAsignadoData();
    }

    public function insertObraTipoEmpleadoAsignado($tbobraetapaid, $empleadoId, $empleadoTipoId) {
        return $this->ObraEtapaTipoEmpleadoAsignadoData->insertObraTipoEmpleadoAsignado($tbobraetapaid, $empleadoId, $empleadoTipoId);
    }

    public function getAllObraTipoEmpleadoAsignado(){
        return $this->ObraEtapaTipoEmpleadoAsignadoData->getAllObraTipoEmpleadoAsignado();
    }

    public function deleteObraTipoEmpleadoAsignado($ObraEtapaTipoEmpleadoId){
        return $this->ObraEtapaTipoEmpleadoAsignadoData->deleteObraTipoEmpleadoAsignado($ObraEtapaTipoEmpleadoId);
    }

}