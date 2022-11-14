<?php

include_once 'data.php';
include '../domain/Salario.php';

class SalarioData extends Data {

    public function insertSalario($Salario) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbsalarioid) AS tbsalarioid  FROM tbsalario";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbsalario VALUES (" . $nextId . "," .
                $Salario->getEmpleadoId() . "," .
                $Salario->getEmpleadoTipoId() . ",'" .
                $Salario->getSalarioFechaInicio() . "','" .
                $Salario->getSalarioFechaFin() . "',".
                $Salario->getSalarioDiasLaborados() . ",".
                $Salario->getSalarioHorasLaboradasExtra() . ",".
                $Salario->getSalarioBonificacion() . ");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateSalario($Salario) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbsalario SET tbempleadoid=" . $Salario->getEmpleadoId() .
                ", tbempleadotipoid=" . $Salario->getEmpleadoTipoId() .
                ", tbsalariofechainicio='" . $Salario->getSalarioFechaInicio() .
                "', tbsalariofechafin='" . $Salario->getSalarioFechaFin() .
                "', tbsalariodiaslaborados=" . $Salario->getSalarioDiasLaborados() .
                ", tbsalariohoraslaboradasextra=" . $Salario->getSalarioHorasLaboradasExtra() .
                ", tbsalariobonificacion=" . $Salario->getSalarioBonificacion() .
                " WHERE tbsalarioid=" . $Salario->getSalarioId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteSalario($salarioId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbsalario where tbsalarioid=" . $salarioId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllSalario() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbsalario;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $salarios = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentSalario = new Salario($row['tbsalarioid'], $row['tbempleadoid'], $row['tbempleadotipoid'], $row['tbsalariofechainicio'], $row['tbsalariofechafin'], $row['tbsalariodiaslaborados'], $row['tbsalariohoraslaboradasextra'], $row['tbsalariobonificacion']);
            array_push($salarios, $currentSalario);
        }
        return $salarios;
    }

}
