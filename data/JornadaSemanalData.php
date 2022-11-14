<?php

include_once 'data.php';
include '../domain/JornadaSemanal.php';
//include '../business/JornadaSemanalDetalleBusiness.php';

class JornadaSemanalData extends Data {

    public function insertJornadaSemanal($JornadaSemanal) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbjornadasemanalid) AS tbjornadasemanalid  FROM tbjornadasemanal";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbjornadasemanal VALUES (" . $nextId . "," .
                $JornadaSemanal->getEmpleadoId() . ",'" .
                $JornadaSemanal->getJornadaSemanalFechaInicio() . "','" .
                $JornadaSemanal->getJornadaSemanalFechaFin() . "'," .
                $JornadaSemanal->getJornadaSemanalSumatoriaMontosActividades() . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }
    
    public function getUltimoId() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryGetLastId = "SELECT MAX(tbjornadasemanalid) AS tbjornadasemanalid  FROM tbjornadasemanal";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;
        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]);
        }
        mysqli_close($conn);
        return $nextId;
    }

    public function getAllJornadaSemanal($idEmpleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbjornadasemanaldetalle WHERE tbjornadasemanalid IN (SELECT tbjornadasemanalid FROM tbjornadasemanal where empleadoid = '". $idEmpleado."');";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Jornadas = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentJornadas = new JornadaSemanalDetalle($row['tbjornadasemanaldetalleid'], $row['tbjornadasemanalid'], $row['tbjornadasemanaldetallefechainicio'], 
            $row['tbjornadasemanaldetallefechafin'], $row['tbjornadasemanaldetallemontoganadoactividad'], $row['tbjornadasemanaldetalletipoempleado'], $row['tbjornadasemanaldetallecantidadhoras'], $row['tbjornadasemanaldetallecantidaddias'], 
            $row['tbjornadasemanaldetalleporsemana'], $row['tbjornadasemanaldetalleportarea']);
            array_push($Jornadas, $currentJornadas);
        }
        return $Jornadas;
    }
}
