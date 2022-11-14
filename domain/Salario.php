<?php

class Salario {

    private $salarioId;
    private $empleadoId; //FK
    private $empleadoTipoId; //FK
    private $salarioFechaInicio;
    private $salarioFechaFin;
    private $salarioDiasLaborados;
    private $salarioHorasLaboradasExtra;
    private $salarioBonificacion;


    function Salario($salarioId, $empleadoId,$empleadoTipoId, $salarioFechaInicio, $salarioFechaFin, $salarioDiasLaborados, $salarioHorasLaboradasExtra, $salarioBonificacion) {
        $this->salarioId = $salarioId;
        $this->empleadoId = $empleadoId;
        $this->empleadoTipoId = $empleadoTipoId;
        $this->salarioFechaInicio = $salarioFechaInicio;
        $this->salarioFechaFin = $salarioFechaFin;
        $this->salarioDiasLaborados = $salarioDiasLaborados;
        $this->salarioHorasLaboradasExtra = $salarioHorasLaboradasExtra;
        $this->salarioBonificacion = $salarioBonificacion;
    }

    function getEmpleadoId() {
        return $this->empleadoId;
    }
    
    public function getEmpleadoTipoId() {
        return $this->empleadoTipoId;
    }

    function getSalarioId() {
        return $this->salarioId;
    }

    function getSalarioFechaInicio() {
        return $this->salarioFechaInicio;
    }

    function getSalarioFechaFin() {
        return $this->salarioFechaFin;
    }

    function getSalarioDiasLaborados() {
        return $this->salarioDiasLaborados;
    }

    function getSalarioHorasLaboradasExtra() {
        return $this->salarioHorasLaboradasExtra;
    }

    function getSalarioBonificacion() {
        return $this->salarioBonificacion;
    }

    function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }

    function setEmpleadoTipoId($empleadoTipoId) {
        $this->empleadoTipoId = $empleadoTipoId;
    }

    function setSalarioId($salarioId) {
        $this->salarioId = $salarioId;
    }

    function setSalarioFechaInicio($salarioFechaInicio) {
        $this->salarioFechaInicio = $salarioFechaInicio;
    }

    function setSalarioFechaFin($salarioFechaFin) {
        $this->salarioFechaFin = $salarioFechaFin;
    }

    function setSalarioDiasLaborados($salarioDiasLaborados) {
        $this->salarioDiasLaborados = $salarioDiasLaborados;
    }

    function setSalarioHorasLaboradasExtra($salarioHorasLaboradasExtra) {
        $this->salarioHorasLaboradasExtra = $salarioHorasLaboradasExtra;
    }
    function setSalarioBonificacion($salarioBonificacion) {
        $this->salarioBonificacion = $salarioBonificacion;
    }
}
