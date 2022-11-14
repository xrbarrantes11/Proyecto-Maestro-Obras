<?php

class JornadaSemanalDetalle {

    private $JornadaSemanalDetalleId;
    private $JornadaSemanalId;
    private $JornadaSemanalFechaInicio;
    private $JornadaSemanalFechaFin;
    private $JornadaSemanalSumatoriaMontosActividades;
    private $EmpleadoTipoId;
    private $cantHoras;
    private $cantDias;
    private $porSemana;
    private $porTarea;


    function JornadaSemanalDetalle($JornadaSemanalDetalleId, $JornadaSemanalId, $JornadaSemanalFechaInicio, $JornadaSemanalFechaFin, $JornadaSemanalSumatoriaMontosActividades, $EmpleadoTipoId, $cantHoras, $cantDias, $porSemana, $porTarea) {
        $this->JornadaSemanalDetalleId = $JornadaSemanalDetalleId;
        $this->JornadaSemanalId = $JornadaSemanalId;
        $this->JornadaSemanalFechaInicio = $JornadaSemanalFechaInicio;
        $this->JornadaSemanalFechaFin = $JornadaSemanalFechaFin;
        $this->JornadaSemanalSumatoriaMontosActividades = $JornadaSemanalSumatoriaMontosActividades;
        $this->EmpleadoTipoId = $EmpleadoTipoId;
        $this->cantHoras = $cantHoras;
        $this->cantDias = $cantDias;
        $this->porSemana = $porSemana;
        $this->porTarea = $porTarea;
    }

    function getJornadaSemanalDetalleId() {
        return $this->JornadaSemanalDetalleId;
    }

    function getJornadaSemanalId() {
        return $this->JornadaSemanalId;
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

    function getJornadaSemanalTipoEmpleado() {
        return $this->EmpleadoTipoId;
    }

    function getCantHoras() {
        return $this->cantHoras;
    }

    function getCantDias() {
        return $this->cantDias;
    }

    function getPorSemana() {
        return $this->porSemana;
    }

    function getPorTarea() {
        return $this->porTarea;
    }

    function setJornadaSemanalDetalleId($JornadaSemanalDetalleId) {
        return $this->JornadaSemanalDetalleId;
    }

    function setJornadaSemanalId($JornadaSemanalId) {
        $this->JornadaSemanalId = $JornadaSemanalId;
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

    function setJornadaSemanalTipoEmpleado($EmpleadoTipoId) {
        $this->EmpleadoTipoId = $EmpleadoTipoId;
    }

    function setCantHoras($cantHoras) {
        return $this->cantHoras;
    }

    function setCantDias($cantDias) {
        return $this->cantDias;
    }

    function setPorSemana($porSemana) {
        return $this->porSemana;
    }

    function setPorTarea($porTarea) {
        return $this->porTarea;
    }
}
