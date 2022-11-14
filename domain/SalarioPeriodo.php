<?php

class SalarioPeriodo{

    private $salarioPeriodoId;
    private $salarioPeriodoCategoria;
    private $salarioPeriodoTipo;
    private $salarioPeriodoDescripcion;
    private $salarioPeriodoActivo;

	function SalarioPeriodo($salarioPeriodoId, $salarioPeriodoCategoria, $salarioPeriodoTipo, $salarioPeriodoDescripcion, $salarioPeriodoActivo){
        $this->salarioPeriodoId = $salarioPeriodoId;
        $this->salarioPeriodoCategoria = $salarioPeriodoCategoria;
        $this->salarioPeriodoTipo = $salarioPeriodoTipo;
        $this->salarioPeriodoDescripcion = $salarioPeriodoDescripcion;
        $this->salarioPeriodoActivo = $salarioPeriodoActivo;
    }

    function getSalarioPeriodoId(){
        return $this->salarioPeriodoId;
    }

    function getSalarioPeriodoCategoria(){
        return $this->salarioPeriodoCategoria;
    }

    function getSalarioPeriodoTipo(){
        return $this->salarioPeriodoTipo;
    }

    function getSalarioPeriodoDescripcion(){
        return $this->salarioPeriodoDescripcion;
    }

    function getSalarioPeriodoActivo(){
        return $this->salarioPeriodoActivo;
    }

    function setSalarioPeriodoId($salarioPeriodoId){
        $this->salarioPeriodoId = $salarioPeriodoId;
    }

    function setSalarioPeriodoCategoria($salarioPeriodoCategoria){
        $this->salarioPeriodoCategoria = $salarioPeriodoCategoria;
    }

    function setSalarioPeriodoTipo($salarioPeriodoTipo){
        $this->salarioPeriodoTipo = $salarioPeriodoTipo;
    }

    function setSalarioPeriodoDescripcion($salarioPeriodoDescripcion){
        $this->salarioPeriodoDescripcion = $salarioPeriodoDescripcion;
    }

    function setSalarioPeriodoActivo($salarioPeriodoActivo){
        $this->salarioPeriodoActivo = $salarioPeriodoActivo;
    }


    
	
}


?>