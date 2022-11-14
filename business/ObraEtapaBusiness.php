<?php

include '../data/ObraEtapaData.php';

class ObraEtapaBusiness {

    private $ObraEtapaData;

    public function ObraEtapaBusiness() {
        $this->ObraEtapaData = new ObraEtapaData();
    }

    public function insertObraEtapa($ObraEtapa) {
        return $this->ObraEtapaData->insertObraEtapa($ObraEtapa);
    }

    public function updateObraEtapa($ObraEtapa) {
        return $this->ObraEtapaData->updateObraEtapa($ObraEtapa);
    }

    public function deleteObraEtapa($obraEtapaId)  {
        return $this->ObraEtapaData->deleteObraEtapa($obraEtapaId) ;
    }


    public function getNombreEtapa($obraEtapaId)  {
        return $this->ObraEtapaData->getNombreEtapa($obraEtapaId) ;
    }

    public function getAllObraEtapa() {
        return $this->ObraEtapaData->getAllObraEtapa();
    }
}