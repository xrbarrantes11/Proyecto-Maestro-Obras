<?php

include '../data/JornadaSemanalData.php';

class JornadaSemanalBusiness {

    private $JornadaSemanalData;

    public function JornadaSemanalBusiness() {
        $this->JornadaSemanalData = new JornadaSemanalData();
    }

    public function insertJornadaSemanal($JornadaSemanal) {
        return $this->JornadaSemanalData->insertJornadaSemanal($JornadaSemanal);
    }

    public function getUltimoId() {
        return $this->JornadaSemanalData->getUltimoId();
    }

    public function getAllJornadaSemanal($idEmpleado) {
        return $this->JornadaSemanalData->getAllJornadaSemanal($idEmpleado);
    }
}