<?php

include '../data/SalarioPeriodoData.php';

class SalarioPeriodoBusiness {

    private $SalarioPeriodoData;

    public function SalarioPeriodoBusiness() {
        $this->SalarioPeriodoData = new SalarioPeriodoData();
    }

    public function insertSalarioPeriodo($SalarioPeriodo) {
        return $this->SalarioPeriodoData->insertSalarioPeriodo($SalarioPeriodo);
    }

    public function updateSalarioPeriodo($SalarioPeriodo) {
        return $this->SalarioPeriodoData->updateSalarioPeriodo($SalarioPeriodo);
    }

    public function deleteSalarioPeriodo($salarioId) {
        return $this->SalarioPeriodoData->deleteSalarioPeriodo($salarioId);
    }

    public function getAllSalarioPeriodo() {
        return $this->SalarioPeriodoData->getAllSalarioPeriodo();
    }
 
}









