<?php

class Cotizacion{

    private $cotizacionId;
    private $proveedorId;
    private $obraId;
    private $cotizacionImagenId;
    function Cotizacion($cotizacionId, $proveedorId, $obraId, $cotizacionImagenId){
        $this->cotizacionId = $cotizacionId;
        $this->proveedorId = $proveedorId;
        $this->obraId = $obraId;
        $this->cotizacionImagenId = $cotizacionImagenId;
    }

    function getCotizacionId() {
        return $this->cotizacionId;
    }

    function setCotizacionId($cotizacionId) {
        $this->cotizacionId = $cotizacionId;
    }

    function getProveedorId() {
        return $this->proveedorId;
    }

    function setProveedorId($proveedorId) {
        $this->proveedorId = $proveedorId;
    }

    function getObraId() {
        return $this->obraId;
    }

    function setObraId($obraId) {
        $this->obraId = $obraId;
    }

	function getCotizacionImagenId() {
		return $this->cotizacionImagenId;
	}
	
	function setCotizacionImagenId($cotizacionImagenId) {
		$this->cotizacionImagenId = $cotizacionImagenId;
		
	}
}