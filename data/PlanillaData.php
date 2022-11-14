<?php

include_once 'data.php';
include '../domain/Planilla.php';

class PlanillaData extends Data {

    public function insertPlanilla($Planilla) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Get the last id
        $queryGetLastId = "SELECT MAX(tbplanillaid) AS tbplanillaid  FROM tbplanilla";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;
        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbplanilla(tbplanillaid, tbplanilladeducciones, tbplanillahorastrabajadas, tbplanillafecha, tbplanillahorasextra, tbempleadoid, tbplanillatotal) VALUES (" . $nextId . "," .
                $Planilla->getPlanillaDeducciones() . "," .
                $Planilla->getPlanillaHorasTrabajadas() . ",'" .
                $Planilla->getPlanillaFecha() . "'," .
                $Planilla->getPlanillaHorasExtra() . "," .
                $Planilla->getEmpleadoId() . "," .
                $Planilla->getPlanillaTotal() . ");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    /*public function insertPlanilla($Planilla) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        //Get the last id
        $queryGetLastId = "SELECT MAX(tbplanillaid) AS tbplanillaid  FROM tbplanilla";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;
        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $mysqli = new mysqli($this->server, $this->user, $this->password);
        $mysqli->select_db($this->db);
        $mysqli->query("CALL sp_insertar_planilla(" . $nextId  . "," . $Planilla->getPlanillaDeducciones() . "," . $Planilla->getPlanillaHorasTrabajadas() .",CURDATE(),". $Planilla->getPlanillaHorasExtra() .",". $Planilla->getEmpleadoId() .",". $Planilla->getPlanillaTotal() .")");
        $result = mysqli_query($conn, $queryGetLastId);
        mysqli_close($conn);
        return $result;
    } */

    
}
