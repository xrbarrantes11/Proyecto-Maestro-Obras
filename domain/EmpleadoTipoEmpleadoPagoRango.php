<?php

class EmpleadoTipoEmpleadoPagoRango {

    private $empleadoTipoEmpleadoPagoRangoId;
    private $empleadoTipoId;
    private $empleadoTipoEmpleadoPagoRangoInferior;
    private $empleadoTipoEmpleadoPagoRangoSuperior;
    

    function EmpleadoTipoEmpleadoPagoRango($empleadoTipoEmpleadoPagoRangoId, $empleadoTipoId, $empleadoTipoEmpleadoPagoRangoInferior,$empleadoTipoEmpleadoPagoRangoSuperior) {
        $this->empleadoTipoEmpleadoPagoRangoId = $empleadoTipoEmpleadoPagoRangoId;
        $this->empleadoTipoId = $empleadoTipoId;
        $this->empleadoTipoEmpleadoPagoRangoInferior = $empleadoTipoEmpleadoPagoRangoInferior;
        $this->empleadoTipoEmpleadoPagoRangoSuperior = $empleadoTipoEmpleadoPagoRangoSuperior;
    }

    function getEmpleadoTipoEmpleadoPagoRangoId() {
        return $this->empleadoTipoEmpleadoPagoRangoId;
    }

    function getEmpleadoTipoId() {
        return $this->empleadoTipoId;
    }
    
    public function getEmpleadoTipoEmpleadoPagoRangoInferior() {
        return $this->empleadoTipoEmpleadoPagoRangoInferior;
    }

    function getEmpleadoTipoEmpleadoPagoRangoSuperior() {
        return $this->empleadoTipoEmpleadoPagoRangoSuperior;
    }

    function setEmpleadoTipoEmpleadoPagoRangoId($empleadoTipoEmpleadoPagoRangoId) {
        $this->empleadoTipoEmpleadoPagoRangoId = $empleadoTipoEmpleadoPagoRangoId;
    }

    function setEmpleadoTipoId($empleadoTipoId) {
        $this->empleadoTipoId = $empleadoTipoId;
    }

    function setEmpleadoTipoEmpleadoPagoRangoInferior($empleadoTipoEmpleadoPagoRangoInferior) {
        $this->empleadoTipoEmpleadoPagoRangoInferior = $empleadoTipoEmpleadoPagoRangoInferior;
    }

    function setEmpleadoTipoEmpleadoPagoRangoSuperior($empleadoTipoEmpleadoPagoRangoSuperior) {
        $this->empleadoTipoEmpleadoPagoRangoSuperior = $empleadoTipoEmpleadoPagoRangoSuperior;
    }
}
