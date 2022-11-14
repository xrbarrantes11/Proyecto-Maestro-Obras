<?php

include '../data/EstadoEmpleadoData.php';

class EstadoEmpleadoBusiness {

    private $EstadoEmpleadoData;

    public function EstadoEmpleadoBusiness() {
        $this->EstadoEmpleadoData = new EstadoEmpleadoData();
    }

    public function updateEstadoEmpleado($empleadoId, $empleadoActivo) {
        return $this->EstadoEmpleadoData->updateEstadoEmpleado($empleadoId, $empleadoActivo);
    }

    public function getEmpleados() {
        return $this->EstadoEmpleadoData->getEmpleados();
    }
}