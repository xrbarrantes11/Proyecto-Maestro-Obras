<?php

include_once 'data.php';
include '../domain/ObraCatalogo.php';

class ObraCatalogoData extends Data {

    public function insertObraCatalogo($ObraCatalogo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbobratipoid) AS tbobratipoid  FROM tbobratipo";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbobratipo VALUES (" . $nextId . ",'" .
                $ObraCatalogo->getObraCatalogoNombre() . "','" .
                $ObraCatalogo->getObraCatalogoDescripcion() . "'," .
                $ObraCatalogo->getObraCatalogoActivo() .");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateObraCatalogo($ObraCatalogo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbobratipo SET tbobratiponombre='" . $ObraCatalogo->getObraCatalogoNombre() .
                "', tbobratipodescripcion='" . $ObraCatalogo->getObraCatalogoDescripcion() .
                "', tbobratipoactivo=" . $ObraCatalogo->getObraCatalogoActivo() .
                " WHERE tbobratipoid=" . $ObraCatalogo->getObraCatalogoId() . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteObraCatalogo($obraCatalogoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbobratipo where tbobratipoid=" . $obraCatalogoId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllObraCatalogo() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        
        $querySelect = "SELECT * FROM tbobratipo;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $obracatalogo = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentObracatalogo = new ObraCatalogo($row['tbobratipoid'], $row['tbobratiponombre'], $row['tbobratipodescripcion'], $row['tbobratipoactivo']);
            array_push($obracatalogo, $currentObracatalogo);
        }
        return $obracatalogo;
    }

        
    public function buscarObraCatalogo($obraCatalogoNombre) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbobratiponombre FROM tbobratipo WHERE tbobratiponombre ='". $obraCatalogoNombre ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            $busqueda = true;
        }
        return $busqueda;
    }

}