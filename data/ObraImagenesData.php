<?php

include_once 'data.php';
include '../domain/ObraImagenes.php';

class ObraImagenesData extends Data{

    public function insertCotizacionImagen($obraImagenes) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
    
        //Get the last id
            $queryGetLastId = "SELECT MAX(tbobraimagenesid) AS tbobraimagenesid  FROM tbobraimagenes";
            $idCont = mysqli_query($conn, $queryGetLastId);
            $nextId = 1;
    
            if ($row = mysqli_fetch_row($idCont)) {
                $nextId = trim($row[0]) + 1;
            }
            $queryInsert = "INSERT INTO tbcotizacionimagen VALUES (" . $nextId . ",'" .
                    $obraImagenes->getObraId() . "','" .
                    $obraImagenes->getObraImagenesRuta() . "');";
    
            $result = mysqli_query($conn, $queryInsert);
            mysqli_close($conn);
            return $result;
    }

    public function getAllObraImagenes() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobraimagenes;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $obraimagenes = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentobra = new ObraImagenes($row['tbobraimagenesid'], $row['tbobraid'], 
            $row['tbobraimagenesruta']);
            array_push($obraimagenes, $currentobra);
        }
        return $obraimagenes;
    }

    public function deleteObraImagenes($obraImagenesId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbobraimagenes where tbobraimagenesid =" . $obraImagenesId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }


}

?>