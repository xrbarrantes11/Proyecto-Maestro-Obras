<?php

include '../data/PlanillaData.php';

class PlanillaBusiness {

    private $PlanillaData;

    public function PlanillaBusiness() {
        $this->PlanillaData = new PlanillaData();
    }

    public function insertPlanilla($Planilla) {
        return $this->PlanillaData->insertPlanilla($Planilla);
    }
}