<?php

class JornadaSemanal {

    private $JornadaSemanalId;
    private $empleadoId;
    private $JornadaSemanalFechaInicio;
    private $JornadaSemanalFechaFin;
    private $JornadaSemanalSumatoriaMontosActividades;

    function JornadaSemanal($JornadaSemanalId, $empleadoId, $JornadaSemanalFechaInicio, $JornadaSemanalFechaFin, $JornadaSemanalSumatoriaMontosActividades) {
        $this->JornadaSemanalId = $JornadaSemanalId;
        $this->empleadoId = $empleadoId;
        $this->JornadaSemanalFechaInicio = $JornadaSemanalFechaInicio;
        $this->JornadaSemanalFechaFin = $JornadaSemanalFechaFin;
        $this->JornadaSemanalSumatoriaMontosActividades = $JornadaSemanalSumatoriaMontosActividades;
    }

    function getJornadaSemanalId() {
        return $this->JornadaSemanalId;
    }
    
    public function getEmpleadoId() {
        return $this->empleadoId;
    }

    function getJornadaSemanalFechaInicio() {
        return $this->JornadaSemanalFechaInicio;
    }

    function getJornadaSemanalFechaFin() {
        return $this->JornadaSemanalFechaFin;
    }

    function getJornadaSemanalSumatoriaMontosActividades() {
        return $this->JornadaSemanalSumatoriaMontosActividades;
    }

    function setJornadaSemanalId($JornadaSemanalId) {
        $this->JornadaSemanalId = $JornadaSemanalId;
    }

    function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }

    function setJornadaSemanalFechaInicio($JornadaSemanalFechaInicio) {
        $this->JornadaSemanalFechaInicio = $JornadaSemanalFechaInicio;
    }

    function setJornadaSemanalFechaFin($JornadaSemanalFechaFin) {
        $this->JornadaSemanalFechaFin = $JornadaSemanalFechaFin;
    }

    function setJornadaSemanalSumatoriaMontosActividades($JornadaSemanalSumatoriaMontosActividades) {
        $this->JornadaSemanalSumatoriaMontosActividades = $JornadaSemanalSumatoriaMontosActividades;
    }
}
