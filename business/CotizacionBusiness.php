<?php

include '../data/CotizacionData.php';

class CotizacionBusiness {

    private $CotizacionData;

    public function CotizacionBusiness() {
        $this->CotizacionData = new CotizacionData();
    }

    public function insertCotizacion($obraId, $proveedorId, $cotizacionImagenId) {
        return $this->CotizacionData->insertCotizacion($obraId, $proveedorId, $cotizacionImagenId);
    }

    public function updateCotizacion($Cotizacion) {
        return $this->CotizacionData->updateCotizacion($Cotizacion);
    }

    public function deleteCotizacion($cotizacionimagenId) {
        return $this->CotizacionData->deleteCotizacion($cotizacionimagenId);
    }

    public function getAllCotizacion() {
        return $this->CotizacionData->getAllCotizacion();
    }
 
}