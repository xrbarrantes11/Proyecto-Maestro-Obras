<?php

include '../data/ProveedorData.php';

class ProveedorBusiness{

    private $ProveedorData;

    public function ProveedorBusiness() {
        $this->ProveedorData = new ProveedorData();
    }

    public function insertProveedor($Proveedor) {
        return $this->ProveedorData->insertProveedor($Proveedor);
    }

    public function updateProveedor($Proveedor) {
        return $this->ProveedorData->updateProveedor($Proveedor);
    }

    public function deleteProveedor($proveedorId) {
        return $this->ProveedorData->deleteProveedor($proveedorId);
    }

    public function getAllProveedor() {
        return $this->ProveedorData->getAllProveedor();
    }

    public function getProveedor($proveedorId) {
        return $this->ProveedorData->getProveedor($proveedorId);
    }

    public function buscarProveedorDuplicado($proveedorCedula){
        return $this->ProveedorData->buscarProveedorDuplicado($proveedorCedula);
    }

    
}





?>