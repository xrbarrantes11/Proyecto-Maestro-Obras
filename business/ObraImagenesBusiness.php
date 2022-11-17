<?php

include '../data/ObraImagenesData.php';

class ObraImagenesBusiness{

    private $ObraImagenesData;

    public function ObraImagenesBusiness(){
        $this->ObraImagenesData = new ObraImagenesData();
    }

    public function insertObraImagenes($obraImagenes){
        $this->ObraImagenesData->insertCotizacionImagen($obraImagenes);
    }

    public function deleteObraImagenes($obraImagenesId){
        $this->ObraImagenesData->deleteObraImagenes($obraImagenesId);
    }

    public function getAllObraImagenes(){
        $this->ObraImagenesData->getAllObraImagenes();
    }
    
}