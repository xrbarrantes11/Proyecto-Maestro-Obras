<?php

include_once 'data.php';
include '../domain/SalarioPeriodo.php';

class SalarioPeriodoData extends Data {

    public function insertSalarioPeriodo($SalarioPeriodo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbsalarioperiodoid) AS tbsalarioperiodoid  FROM tbsalarioperiodo";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbsalarioperiodo VALUES (" . $nextId . ",'" .
                $SalarioPeriodo->getSalarioPeriodoCategoria() . "','" .
                $SalarioPeriodo->getSalarioPeriodoTipo() . "','" .
                $SalarioPeriodo->getSalarioPeriodoDescripcion() . "','" .
                $SalarioPeriodo->getSalarioPeriodoActivo() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateSalarioPeriodo($SalarioPeriodo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbsalarioperiodo SET tbsalarioperiodocategoria='" . $SalarioPeriodo->getSalarioPeriodoCategoria() .
                "', tbsalarioperiodotipo='" . $SalarioPeriodo->getSalarioPeriodoTipo() .
                "', tbsalarioperiododescripcion='" . $SalarioPeriodo->getSalarioPeriodoDescripcion() .
                "', tbsalarioperiodoactivo='" . $SalarioPeriodo->getSalarioPeriodoActivo() .
                "' WHERE tbsalarioperiodoid=" . $SalarioPeriodo->getSalarioPeriodoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteSalarioPeriodo($salarioId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbsalarioperiodo where tbsalarioperiodoid =" . $salarioId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllSalarioPeriodo() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbsalarioperiodo;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $SalarioPeriodos = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentSalarioPeriodo = new SalarioPeriodo($row['tbsalarioperiodoid'], $row['tbsalarioperiodocategoria'], $row['tbsalarioperiodotipo'], 
            $row['tbsalarioperiododescripcion'], $row['tbsalarioperiodoactivo']);
            array_push($SalarioPeriodos, $currentSalarioPeriodo);
        }
        return $SalarioPeriodos;
    }

}
  
