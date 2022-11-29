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

    public function buscarRegistroRepetidoEmpleados($empleadoTipoId, $empleadoNombreId){
        return $this->ObraEtapaTipoEmpleadoAsignadoData->buscarRegistroRepetidoEmpleados($empleadoTipoId, $empleadoNombreId);
    }

    public function buscarEmpleadoTipoEmpleadoObraRepetido($empleadoNombreId, $empleadoTipoId) {
        return $this->ObraEtapaTipoEmpleadoAsignadoData->buscarEmpleadoTipoEmpleadoObraRepetido($empleadoNombreId, $empleadoTipoId);
    }

    public function getAllObraTipoEmpleadoAsignado2($idObra) {
        return $this->ObraEtapaTipoEmpleadoAsignadoData->getAllObraTipoEmpleadoAsignado2($idObra);
    }

}