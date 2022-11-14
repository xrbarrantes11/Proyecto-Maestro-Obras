<?php

class ObraEtapaTipoEmpleadoAsignado {

    private $obraEtapaTipoEmpleadoId;
    private $obraEtapaId;
    private $empleadoId;
    private $empleadoTipoId;


    function ObraEtapaTipoEmpleadoAsignado($obraEtapaTipoEmpleadoId, $obraEtapaId,$empleadoId, $empleadoTipoId) {
        $this->obraEtapaTipoEmpleadoId = $obraEtapaTipoEmpleadoId;
        $this->obraEtapaId = $obraEtapaId;
        $this->empleadoId = $empleadoId;
        $this->empleadoTipoId = $empleadoTipoId;
    }

    function getObraEtapaTipoEmpleadoId() {
        return $this->obraEtapaTipoEmpleadoId;
    }
    
    public function getObraEtapaId() {
        return $this->obraEtapaId;
    }

    function getEmpleadoId() {
        return $this->empleadoId;
    }

    function getEmpleadoTipoId() {
        return $this->empleadoTipoId;
    }

    function setObraEtapaTipoEmpleadoId($obraEtapaTipoEmpleadoId) {
        $this->obraEtapaTipoEmpleadoId = $obraEtapaTipoEmpleadoId;
    }

    function setObraEtapaId($obraEtapaId) {
        $this->obraEtapaId = $obraEtapaId;
    }

    function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }

    function setEmpleadoTipoId($empleadoTipoId) {
        $this->empleadoTipoId = $empleadoTipoId;
    }

}
