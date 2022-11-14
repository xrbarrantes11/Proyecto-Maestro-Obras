<?php

include_once 'data.php';
//include '../domain/JornadaSemanalDetalle.php';

class JornadaSemanalDetalleData extends Data {

    public function insertJornadaSemanalDetalle($JornadaSemanalDetalle) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbjornadasemanaldetalleid) AS tbjornadasemanaldetalleid  FROM tbjornadasemanaldetalle";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbjornadasemanaldetalle VALUES (" . $nextId . "," .
                $JornadaSemanalDetalle->getJornadaSemanalId() . ",'" .
                $JornadaSemanalDetalle->getJornadaSemanalFechaInicio() . "','" .
                $JornadaSemanalDetalle->getJornadaSemanalFechaFin() . "'," .
                $JornadaSemanalDetalle->getJornadaSemanalSumatoriaMontosActividades() . "," .
                $JornadaSemanalDetalle->getJornadaSemanalTipoEmpleado() . "," .
                $JornadaSemanalDetalle->getCantHoras() . "," .
                $JornadaSemanalDetalle->getCantDias() . "," .
                $JornadaSemanalDetalle->getPorSemana() . "," .
                $JornadaSemanalDetalle->getPorTarea() . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }
}
