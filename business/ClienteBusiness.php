<?php

include '../data/ClienteData.php';

class ClienteBusiness {

    private $ClienteData;

    public function ClienteBusiness() {
        $this->ClienteData = new ClienteData();
    }

    public function insertCliente($Cliente) {
        return $this->ClienteData->insertCliente($Cliente);
    }

    public function updateCliente($Cliente) {
        return $this->ClienteData->updateCliente($Cliente);
    }

    public function deleteCliente($clienteId) {
        return $this->ClienteData->deleteCliente($clienteId);
    }

    public function getAllCliente() {
        return $this->ClienteData->getAllCliente();
    }

    public function buscarCliente($clienteCedula) {
        return $this->ClienteData->buscarCliente($clienteCedula);
    }

    public function getClienteId($clienteId) {
        return $this->ClienteData->getClienteId($clienteId);
    }

    
}