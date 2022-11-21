<?php

class EmpleadoCostoHora{

    private $empleadoId;
    
    private $empleadoFechaActual;
    private $empleadoHoraInicio;
    private $empleadoHoraFin;
    private $empleadoEstado;
    

    function EmpleadoCostoHora($empleadoId,$empleadoFechaActual,$empleadoHoraInicio,$empleadoHoraFin,$empleadoEstado) {
        $this->empleadoId = $empleadoId;
        $this->empleadoFechaActual = $empleadoFechaActual;
        $this->empleadoHoraInicio = $empleadoHoraInicio;
        $this->empleadoHoraFin = $empleadoHoraFin;
        $this->empleadoEstado = $empleadoEstado;
    }

    function getEmpleadoId() {
        return $this->empleadoId;
    }

   

    function getEmpleadoFechaActual() {
        return $this->empleadoFechaActual;
    }

    function getEmpleadoHoraInicio() {
        return $this->empleadoHoraInicio;
    }

    function getEmpleadoHoraFin() {
        return $this->empleadoHoraFin;
    }
    
    function getEmpleadoEstado() {
        return $this->empleadoEstado;
    }

    function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }

   
    function setEmpleadoFechaActual($empleadoFechaActual) {
        $this->empleadoFechaActual = $empleadoFechaActual;
    }

    function setEmpleadoHoraInicio($empleadoHoraInicio) {
        $this->empleadoHoraInicio = $empleadoHoraInicio;
    }

    function setEmpleadoHoraFin($empleadoHoraFin) {
        $this->empleadoHoraFin = $empleadoHoraFin;
    }

    function setEmpleadoEstado($empleadoEstado) {
        $this->empleadoEstado = $empleadoEstado;
    }
}

?>