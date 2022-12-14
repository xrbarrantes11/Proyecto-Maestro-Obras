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

    public function updateObraEtapaMateriales($ObraEtapa) {
        return $this->ObraEtapaMaterialesData->updateObraEtapaMateriales($ObraEtapa);
    }

    public function deleteObraEtapa($obraEtapaMaterialesId)  {
        return $this->ObraEtapaMaterialesData->deleteObraEtapa($obraEtapaMaterialesId) ;
    }

    public function getNombreEtapa($idEtapa)  {
        return $this->ObraEtapaMaterialesData->getNombreEtapa($idEtapa) ;
    }

    public function getAllObraEtapaMateriales() {
        return $this->ObraEtapaMaterialesData->getAllObraEtapaMateriales();
    }

    public function getAllObraEtapaMateriales2($id) {
        return $this->ObraEtapaMaterialesData->getAllObraEtapaMateriales2($id);
    }
}