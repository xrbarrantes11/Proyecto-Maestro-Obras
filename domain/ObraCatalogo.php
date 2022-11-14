<?php

class ObraCatalogo {

    private $obraCatalogoId;
    private $obraCatalogoNombre;
    private $obraCatalogoDescripcion;
    private $obraCatalogoActivo;


    function ObraCatalogo($obraCatalogoId, $obraCatalogoNombre, $obraCatalogoDescripcion, $obraCatalogoActivo) {
        $this->obraCatalogoId = $obraCatalogoId;
        $this->obraCatalogoNombre = $obraCatalogoNombre;
        $this->obraCatalogoDescripcion = $obraCatalogoDescripcion;
        $this->obraCatalogoActivo = $obraCatalogoActivo;
    }

    function getObraCatalogoId() {
        return $this->obraCatalogoId;
    }
    
    public function getObraCatalogoNombre() {
        return $this->obraCatalogoNombre;
    }

    function getObraCatalogoDescripcion() {
        return $this->obraCatalogoDescripcion;
    }

    function getObraCatalogoActivo() {
        return $this->obraCatalogoActivo;
    }

    function setObraCatalogoId($obraCatalogoId) {
        $this->obraCatalogoId = $obraCatalogoId;
    }

    function setObraCatalogoNombre($obraCatalogoNombre) {
        $this->obraCatalogoNombre = $obraCatalogoNombre;
    }

    function setObraCatalogoDescripcion($obraCatalogoDescripcion) {
        $this->obraCatalogoDescripcion = $obraCatalogoDescripcion;
    }

    function setObraCatalogoActivo($obraCatalogoActivo) {
        $this->obraCatalogoActivo = $obraCatalogoActivo;
    }
}
