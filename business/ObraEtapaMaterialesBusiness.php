<?php

include '../data/ObraEtapaMaterialesData.php';

class ObraEtapaMaterialesBusiness {

    private $ObraEtapaMaterialesData;

    public function ObraEtapaMaterialesBusiness() {
        $this->ObraEtapaMaterialesData = new ObraEtapaMaterialesData();
    }

    public function insertObraEtapa($ObraEtapa) {
        return $this->ObraEtapaMaterialesData->insertObraEtapa($ObraEtapa);
    }

    public function updateObraEtapa($ObraEtapa) {
        return $this->ObraEtapaMaterialesData->updateObraEtapa($ObraEtapa);
    }

    public function deleteObraEtapa($obraEtapaId)  {
        return $this->ObraEtapaMaterialesData->deleteObraEtapa($obraEtapaId) ;
    }

    public function getNombreEtapa($idEtapa)  {
        return $this->ObraEtapaMaterialesData->getNombreEtapa($idEtapa) ;
    }

    public function getAllObraEtapaMateriales() {
        return $this->ObraEtapaMaterialesData->getAllObraEtapaMateriales();
    }
}