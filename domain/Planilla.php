<?php

class Planilla {

    private $planillaId;
    private $planillaDeducciones;
    private $planillaHorasTrabajadas;
    private $planillaFecha;
    private $planillaHorasExtra;
    private $empleadoId;
    private $planillaTotal;


    function Planilla($planillaId, $planillaDeducciones ,$planillaHorasTrabajadas, $planillaFecha, $planillaHorasExtra, $empleadoId, $planillaTotal) {
        $this->planillaId = $planillaId;
        $this->planillaDeducciones = $planillaDeducciones;
        $this->planillaHorasTrabajadas = $planillaHorasTrabajadas;
        $this->planillaFecha = $planillaFecha;
        $this->planillaHorasExtra = $planillaHorasExtra;
        $this->empleadoId = $empleadoId;
        $this->planillaTotal = $planillaTotal;
    }

    function getPlanillaId() {
        return $this->planillaId;
    }
    
    public function getPlanillaDeducciones() {
        return $this->planillaDeducciones;
    }

    function getPlanillaHorasTrabajadas() {
        return $this->planillaHorasTrabajadas;
    }

    function getPlanillaFecha() {
        return $this->planillaFecha;
    }

    function getPlanillaHorasExtra() {
        return $this->planillaHorasExtra;
    }

    function getEmpleadoId() {
        return $this->empleadoId;
    }

    function getPlanillaTotal() {
        return $this->planillaTotal;
    }

    function setPlanillaId($planillaId) {
        $this->planillaId = $planillaId;
    }

    function setPlanillaDeducciones($planillaDeducciones) {
        $this->planillaDeducciones = $planillaDeducciones;
    }

    function setPlanillaHorasTrabajadas($planillaHorasTrabajadas) {
        $this->planillaHorasTrabajadas = $planillaHorasTrabajadas;
    }

    function setPlanillaFecha($planillaFecha) {
        $this->planillaFecha = $planillaFecha;
    }

    function setPlanillaHorasExtra($planillaHorasExtra) {
        $this->planillaHorasExtra = $planillaHorasExtra;
    }

    function setEmpleadoId($empleadoId) {
        $this->empleadoId = $empleadoId;
    }

    function setPlanillaTotal($planillaTotal) {
        $this->planillaTotal = $planillaTotal;
    }
}
