<?php

include '../data/JornadaSemanalDetalleData.php';

class JornadaSemanalDetalleBusiness {

    private $JornadaSemanalDetalleData;

    public function JornadaSemanalDetalleBusiness() {
        $this->JornadaSemanalDetalleData = new JornadaSemanalDetalleData();
    }

    public function insertJornadaSemanalDetalle($JornadaSemanalDetalle) {
        return $this->JornadaSemanalDetalleData->insertJornadaSemanalDetalle($JornadaSemanalDetalle);
    }

    public function getAllJornadasSemanales($idJornadaSemanal) {
        return $this->JornadaSemanalDetalleData->getAllJornadasSemanales($idJornadaSemanal);
    }


}