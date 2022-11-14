<?php

include '../data/ObrasData.php';

class ObrasBusiness {

    private $ObrasData;

    public function ObrasBusiness() {
        $this->ObrasData = new ObrasData();
    }

    public function insertObra($Obra) {
        return $this->ObrasData->insertObra($Obra);
    }

    public function updateObra($Obra) {
        return $this->ObrasData->updateObra($Obra);
    }

    public function deleteObra($obraId) {
        return $this->ObrasData->deleteObra($obraId);
    }

    public function getAllObra() {
        return $this->ObrasData->getAllObra();
    }

    public function getObra($obraId){
        return $this->ObrasData->getObra($obraId);
    }
 
}