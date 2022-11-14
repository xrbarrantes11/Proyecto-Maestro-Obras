<?php

class EmpleadoTipoEmpleadoPago {

    private $empleadoNombreId;
    private $empleadoTipoId;
    private $empleadoMonto;
    

    function EmpleadoTipoEmpleadoPago($empleadoNombreId, $empleadoTipoId,$empleadoMonto) {
        $this->empleadoNombreId = $empleadoNombreId;
        $this->empleadoTipoId = $empleadoTipoId;
        $this->empleadoMonto = $empleadoMonto;
    }

    function getEmpleadoTipoId() {
        return $this->empleadoTipoId;
    }
    
    public function getEmpleadoNombreId() {
        return $this->empleadoNombreId;
    }

    function getEmpleadoMonto() {
        return $this->empleadoMonto;
    }

    function setEmpleadoTipoId($empleadoTipoId) {
        $this->empleadoTipoId = $empleadoTipoId;
    }

    function setEmpleadoNombreId($empleadoNombreId) {
        $this->empleadoNombreId = $empleadoNombreId;
    }

    function setEmpleadoMonto($empleadoMonto) {
        $this->empleadoMonto = $empleadoMonto;
    }
}
