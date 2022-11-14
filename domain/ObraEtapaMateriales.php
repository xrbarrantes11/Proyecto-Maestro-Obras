<?php

class ObraEtapaMateriales{

    private $obraEtapaMaterialesId;
    private $etapaId;
    private $etapaNombreMateriales;
    private $etapaCantidad;
    private $etapaCostoAproximado;


    function ObraEtapaMateriales($obraEtapaMaterialesId, $etapaId,$etapaNombreMateriales, $etapaCantidad, $etapaCostoAproximado) {
        $this->obraEtapaMaterialesId = $obraEtapaMaterialesId;
        $this->etapaId = $etapaId;
        $this->etapaNombreMateriales = $etapaNombreMateriales;
        $this->etapaCantidad = $etapaCantidad;
        $this->etapaCostoAproximado = $etapaCostoAproximado;
    }

    function getObraEtapaMaterialesId() {
        return $this->obraEtapaMaterialesId;
    }
    
    public function getEtapaId() {
        return $this->etapaId;
    }

    function getEtapaNombreMateriales() {
        return $this->etapaNombreMateriales;
    }

    function getEtapaCantidad() {
        return $this->etapaCantidad;
    }

    function getEtapaCostoAproximado() {
        return $this->etapaCostoAproximado;
    }

    function setObraEtapaMaterialesId($obraEtapaMaterialesId) {
        $this->obraEtapaMaterialesId = $obraEtapaMaterialesId;
    }

    function setEtapaId($etapaId) {
        $this->etapaId = $etapaId;
    }

    function setEtapaNombreMateriales($etapaNombreMateriales) {
        $this->etapaNombreMateriales = $etapaNombreMateriales;
    }

    function setEtapaCantidad($etapaCantidad) {
        $this->etapaCantidad = $etapaCantidad;
    }

    function setEtapaCostoAproximado($etapaCostoAproximado) {
        $this->etapaCostoAproximado = $etapaCostoAproximado;
    }

}
