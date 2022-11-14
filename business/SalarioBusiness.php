<?php

include '../data/SalarioData.php';

class SalarioBusiness {

    private $SalarioData;

    public function SalarioBusiness() {
        $this->SalarioData = new SalarioData();
    }

    public function insertSalario($Salario) {
        return $this->SalarioData->insertSalario($Salario);
    }

    public function diasTrabajados($fechaInicial, $fechaFinal){
        $segundosFechaInicial = strtotime($fechaInicial);
        $segundosFechaFinal = strtotime($fechaFinal);
        $segundosTranscurridos = $segundosFechaFinal - $segundosFechaInicial;
        $diasTranscurridos = $segundosTranscurridos / 86400;
        return $diasTranscurridos;
    }
}