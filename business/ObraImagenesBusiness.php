<?php


include '../data/ObraImagenesData.php';

class ObraImagenesBusiness{

    private $ObraImagenesData;

    public function ObraImagenesBusiness(){
        $this->ObraImagenesData = new ObraImagenesData();
    }

    public function insertObraImagenes($obraImagenes){
        return $this->ObraImagenesData->insertObraImagenes($obraImagenes);
    }

    public function getAllObraImagenes(){
        return $this->ObraImagenesData->getAllObraImagenes();
    }

    public function deleteObraImagenes($obraImagenesId) {
        return $this->ObraImagenesData->deleteObraImagenes($obraImagenesId);
    }
}