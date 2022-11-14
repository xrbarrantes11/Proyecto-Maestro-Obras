<?php

class  ObraEtapa{

    private $obraEtapaId;
    private $obraId;
    private $obraEtapaNombre;
    private $obraEtapaDescripcion;
    private $obraEtapaDuracionAproximada;

    function ObraEtapa($obraEtapaId, $obraId, $obraEtapaNombre,$obraEtapaDescripcion,$obraEtapaDuracionAproximada){
        $this->obraEtapaId = $obraEtapaId;
        $this->obraId = $obraId;
        $this->obraEtapaNombre = $obraEtapaNombre;
        $this->obraEtapaDescripcion = $obraEtapaDescripcion;
        $this->obraEtapaDuracionAproximada = $obraEtapaDuracionAproximada;
    }

    function getObraEtapaId(){
        return $this -> obraEtapaId;
    }

    function getObraId(){
        return $this -> obraId;
    }

    function getObraEtapaNombre(){
        return $this -> obraEtapaNombre;
    }

    function getObraEtapaDescripcion(){
        return $this -> obraEtapaDescripcion;
    }

    function getObraEtapaDuracionAproximada(){
        return $this -> obraEtapaDuracionAproximada;
    }

    function setObraEtapaId($obraEtapaId){
     $this->obraEtapaId = $obraEtapaId;
    }

    function setObraId($obraId){
        $this -> obraId = $obraId;
    }

    function setObraEtapaNombre($obraEtapaNombre){
        $this -> obraEtapaNombre = $obraEtapaNombre;
    }

    function setObraEtapaDescripcion($obraEtapaDescripcion){
        $this -> obraEtapaDescripcion = $obraEtapaDescripcion;
    }

    function setObraEtapaDuracionAproximada($obraEtapaDuracionAproximada){
        $this -> obraEtapaDuracionAproximada = $obraEtapaDuracionAproximada;
    }
    
}