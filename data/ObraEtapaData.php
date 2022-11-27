<?php
include_once 'data.php';
include '../domain/ObraEtapa.php';

class ObraEtapaData extends Data {

    public function insertObraEtapa($ObraEtapa, $idObra) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbobraetapaid) AS tbobraetapaid  FROM tbobraetapa";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbobraetapa VALUES (" . $nextId . ",'" . $idObra . "','" .
                $ObraEtapa->getObraEtapaNombre() . "','" .
                $ObraEtapa->getObraEtapaDescripcion() . "','" .
                $ObraEtapa->getObraEtapaDuracionAproximada() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateObraEtapa($ObraEtapa) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbobraetapa SET tbobraid='" . $ObraEtapa->getObraId() .
                "', tbobraetapanombre='" . $ObraEtapa->getObraEtapaNombre() .
                "', tbobraetapadescricion='" . $ObraEtapa->getObraEtapaDescripcion() .
                "', tbobraetapaduracionaproximada='" . $ObraEtapa->getObraEtapaDuracionAproximada() .
                "' WHERE tbobraetapaid=" . $ObraEtapa->getObraEtapaId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteObraEtapa($obraEtapaId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbobraetapa where tbobraetapaid =" . $obraEtapaId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllObraEtapa($idObra) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobraetapa WHERE tbobraid IN (SELECT tbobraid FROM tbobra WHERE tbobraid = '". $idObra ."');";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $ObraEtapa = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentObraEtapa = new ObraEtapa($row['tbobraetapaid'],$row['tbobraid'], $row['tbobraetapanombre'], $row['tbobraetapadescricion'], 
            $row['tbobraetapaduracionaproximada']);
            array_push($ObraEtapa, $currentObraEtapa);
        }
        return $ObraEtapa;
    }

    public function getNombreEtapa($idEtapa) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT 	tbobraetapanombre FROM tbobraetapa WHERE tbobraetapaid  = '". $idEtapa ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $nombreEmpleado = "";
        while ($row = mysqli_fetch_array($result)) {
            $nombreEmpleado = $row['tbobraetapanombre'];
        }
        return $nombreEmpleado;
    }
}    