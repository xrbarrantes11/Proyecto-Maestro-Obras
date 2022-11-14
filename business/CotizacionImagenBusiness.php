<?php


include '../data/CotizacionImagenData.php';

class CotizacionImagenBusiness{

    private $CotizacionImagenData;

    public function CotizacionImagenBusiness(){
        $this->CotizacionImagenData = new CotizacionImagenData();
    }

    public function insertCotizacionImagen($CotizacionImagen){
        return $this->CotizacionImagenData->insertCotizacionImagen($CotizacionImagen);
    }

    public function getAllCotizacionImagen(){
        return $this->CotizacionImagenData->getAllCotizacionImagen();
    }

    public function getIdCotizacionImagen($CotizacionImagen){
        return $this->CotizacionImagenData->getIdCotizacionImagen($CotizacionImagen);
    }

    public function getCotizacionImagen($cotizacionimagenId){
        return $this->CotizacionImagenData->getCotizacionImagen($cotizacionimagenId);
    }

    public function deleteCotizacionImagen($cotizacionimagenId) {
        return $this->CotizacionImagenData->deleteCotizacionImagen($cotizacionimagenId);
    }
}