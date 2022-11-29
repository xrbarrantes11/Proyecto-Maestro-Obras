<?php

include '../data/ObraEtapaData.php';

class ObraEtapaBusiness {

    private $ObraEtapaData;

    public function ObraEtapaBusiness() {
        $this->ObraEtapaData = new ObraEtapaData();
    }

    public function insertObraEtapa($ObraEtapa, $idObra) {
        return $this->ObraEtapaData->insertObraEtapa($ObraEtapa, $idObra);
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

    public function getAllObraEtapa($idObra) {
        return $this->ObraEtapaData->getAllObraEtapa($idObra);
    }

    public function getAllEtapa() {
        return $this->ObraEtapaData->getAllEtapa();
    }

}