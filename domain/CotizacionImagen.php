<?php


class CotizacionImagen{

    private $cotizacionImagenId;
    private $cotizacionImagenRuta;
    private $cotizacionImagenActivo;


    function CotizacionImagen($cotizacionImagenId, $cotizacionImagenRuta, $cotizacionImagenActivo){
        $this->cotizacionImagenId = $cotizacionImagenId;
        $this->cotizacionImagenRuta = $cotizacionImagenRuta;
        $this->cotizacionImagenActivo = $cotizacionImagenActivo;
    }

    function getCotizacionImagenId() {
        return $this->cotizacionImagenId;
    }

    function setCotizacionImagenId($cotizacionImagenId) {
        $this->cotizacionImagenId = $cotizacionImagenId;
    }

    function getCotizacionImagenRuta() {
        return $this->cotizacionImagenRuta;
    }

    function setCotizacionImagenRuta($cotizacionImagenRuta) {
        $this->cotizacionImagenRuta = $cotizacionImagenRuta;
    }

    function getCotizacionImagenActivo() {
        return $this->cotizacionImagenActivo;
    }

    function setCotizacionImagenActivo($cotizacionImagenActivo) {
        $this->cotizacionImagenActivo = $cotizacionImagenActivo;
    }
}