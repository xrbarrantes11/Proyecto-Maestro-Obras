<?php

class EmpleadoTipo {

    private $empleadoTipoId;
    private $empleadoTipoNombre;
    private $empleadoTipoDescripcion;
    private $empleadoTipoActivo;
    private $empleadoTipoSalarioBase;


    function EmpleadoTipo($empleadoTipoId, $empleadoTipoNombre,$empleadoTipoDescripcion, $empleadoTipoActivo, $empleadoTipoSalarioBase) {
        $this->empleadoTipoId = $empleadoTipoId;
        $this->empleadoTipoNombre = $empleadoTipoNombre;
        $this->empleadoTipoDescripcion = $empleadoTipoDescripcion;
        $this->empleadoTipoActivo = $empleadoTipoActivo;
        $this->empleadoTipoSalarioBase = $empleadoTipoSalarioBase;
    }

    function getEmpleadoTipoId() {
        return $this->empleadoTipoId;
    }
    
    public function getEmpleadoTipoNombre() {
        return $this->empleadoTipoNombre;
    }

    function getEmpleadoTipoDescripcion() {
        return $this->empleadoTipoDescripcion;
    }

    function getEmpleadoTipoActivo() {
        return $this->empleadoTipoActivo;
    }

    function getEmpleadoTipoSalarioBase() {
        return $this->empleadoTipoSalarioBase;
    }

    function setEmpleadoTipoId($empleadoTipoId) {
        $this->empleadoTipoId = $empleadoTipoId;
    }

    function setEmpleadoTipoNombre($empleadoTipoNombre) {
        $this->empleadoTipoNombre = $empleadoTipoNombre;
    }

    function setEmpleadoTipoDescripcion($empleadoTipoDescripcion) {
        $this->empleadoTipoDescripcion = $empleadoTipoDescripcion;
    }

    function setEmpleadoTipoActivo($empleadoTipoActivo) {
        $this->empleadoTipoActivo = $empleadoTipoActivo;
    }

    function setEmpleadoTipoSalarioBase($empleadoTipoSalarioBase) {
        $this->empleadoTipoSalarioBase = $empleadoTipoSalarioBase;
    }

}
