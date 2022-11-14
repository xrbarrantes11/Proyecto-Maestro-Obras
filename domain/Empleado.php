<?php

class Empleado {

    private $empleadoId;
    private $empleadoNombre;
    private $empleadoApellidos;
    private $empleadoCedula;
    private $empleadoTelefono;
    private $empleadoActivo;


    function Empleado($empleadoId, $empleadoNombre,$empleadoApellidos, $empleadoCedula, $empleadoTelefono, $empleadoActivo) {
        $this->empleadoId = $empleadoId;
        $this->empleadoNombre = $empleadoNombre;
        $this->empleadoApellidos = $empleadoApellidos;
        $this->empleadoCedula = $empleadoCedula;
        $this->empleadoTelefono = $empleadoTelefono;
        $this->empleadoActivo = $empleadoActivo;
    }

    function getEmpleadoId() {
        return $this->empleadoId;
    }
    
    public function getEmpleadoNombre() {
        return $this->empleadoNombre;
    }

    function getEmpleadoApellidos() {
        return $this->empleadoApellidos;
    }

    function getEmpleadoCedula() {
        return $this->empleadoCedula;
    }

    function getEmpleadoTelefono() {
        return $this->empleadoTelefono;
    }

    function getEmpleadoActivo() {
        return $this->empleadoActivo;
    }

    function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }

    function setEmpleadoNombre($empleadoNombre) {
        $this->empleadoNombre = $empleadoNombre;
    }

    function setEmpleadoApellidos($empleadoApellidos) {
        $this->empleadoApellidos = $empleadoApellidos;
    }

    function setEmpleadoCedula($empleadoCedula) {
        $this->empleadoCedula = $empleadoCedula;
    }

    function setEmpleadoTelefono($empleadoTelefono) {
        $this->empleadoTelefono = $empleadoTelefono;
    }

    function setEmpleadoActivo($empleadoActivo) {
        $this->empleadoActivo = $empleadoActivo;
    }

}
