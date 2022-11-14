<?php

include '../data/ObraEtapaTipoEmpleadoAsignadoData.php';

class ObraEtapaTipoEmpleadoAsignadoBusiness {

    private $ObraEtapaTipoEmpleadoAsignadoData;

    public function ObraEtapaTipoEmpleadoAsignadoBusiness() {
        $this->ObraEtapaTipoEmpleadoAsignadoData = new ObraEtapaTipoEmpleadoAsignadoData();
    }

    public function insertObraTipoEmpleadoAsignado($tbobraetapaid, $empleadoTipoId, $empleadoId) {
        return $this->ObraEtapaTipoEmpleadoAsignadoData->insertObraTipoEmpleadoAsignado($tbobraetapaid, $empleadoTipoId, $empleadoId);
    }

    public function getAllObraTipoEmpleadoAsignado(){
        return $this->ObraEtapaTipoEmpleadoAsignadoData->getAllObraTipoEmpleadoAsignado();
    }

}