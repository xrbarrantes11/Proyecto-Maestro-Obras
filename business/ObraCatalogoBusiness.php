<?php

include '../data/ObraCatalogoData.php';

class ObraCatalogoBusiness {

    private $ObraCatalogoData;

    public function ObraCatalogoBusiness() {
        $this->ObraCatalogoData = new ObraCatalogoData();
    }

    public function insertObraCatalogo($ObraCatalogo) {
        return $this->ObraCatalogoData->insertObraCatalogo($ObraCatalogo);
    }

    public function updateObraCatalogo($ObraCatalogo) {
        return $this->ObraCatalogoData->updateObraCatalogo($ObraCatalogo);
    }

    public function deleteObraCatalogo($obraCatalogoId) {
        return $this->ObraCatalogoData->deleteObraCatalogo($obraCatalogoId);
    }

    public function getAllObraCatalogo() {
        return $this->ObraCatalogoData->getAllObraCatalogo();
    }
    public function buscarObraCatalogo($obraCatalogoNombre) {
        return $this->EmpleadoData->buscarObraCatalogo($obraCatalogoNombre);
    }
}