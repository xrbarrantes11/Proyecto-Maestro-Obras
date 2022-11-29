<?php

include_once 'data.php';
include '../domain/ObraEtapaMateriales.php';

class ObraEtapaMaterialesData extends Data {

    public function insertObraEtapa($ObraEtapa) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbetapamaterialesid) AS tbetapamaterialesid  FROM tbobraetapamateriales";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbobraetapamateriales VALUES (" . $nextId . "," .
                $ObraEtapa->getEtapaId() . ",'" .
                $ObraEtapa->getEtapaNombreMateriales() . "'," .
                $ObraEtapa->getEtapaCantidad() . "," .
                $ObraEtapa->getEtapaCostoAproximado() . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateObraEtapaMateriales($ObraEtapaMat) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbobraetapamateriales SET tbetapanombremateriales='" . $ObraEtapaMat->getEtapaNombreMateriales() .
                "', tbetapacantidad='" . $ObraEtapaMat->getEtapaCantidad() .
                "', tbetapacostoaproximado='" . $ObraEtapaMat->getEtapaCostoAproximado() .
                "' WHERE tbetapamaterialesid='" . $ObraEtapaMat->getObraEtapaMaterialesId() . "';";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteObraEtapa($obraEtapaMaterialesId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbobraetapamateriales where tbetapamaterialesid=" . $obraEtapaMaterialesId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllObraEtapaMateriales() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobraetapamateriales;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $obraMateriales = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentEtapa = new ObraEtapaMateriales($row['tbetapamaterialesid'], $row['tbetapaid'], $row['tbetapanombremateriales'], $row['tbetapacantidad'], $row['tbetapacostoaproximado']);
            array_push($obraMateriales, $currentEtapa);
        }
        return $obraMateriales;
    }

    public function getEmpleadoTipo($empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadotipo WHERE tbempleadotipoid = ". $empleadoTipoId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $tipoEmpleado = "";
        while ($row = mysqli_fetch_array($result)) {
            $tipoEmpleado = $row['tbempleadotiponombre'];
        }
        return $tipoEmpleado;
    }

    public function getIdEmpleadoTipo($nombreEmpleadoTipo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadotipo WHERE tbempleadotiponombre = '". $nombreEmpleadoTipo ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $tipoEmpleado = "";
        while ($row = mysqli_fetch_array($result)) {
            $tipoEmpleado = $row['tbempleadotipoid'];
        }
        return $tipoEmpleado;
    }


    
    
    public function buscarEmpleadoTipo($empleadoTipoNombre) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbempleadotiponombre FROM tbempleadotipo WHERE tbempleadotiponombre ='". $empleadoTipoNombre ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            $busqueda = true;
        }
        return $busqueda;
    }



    public function getAllObraEtapaMateriales2($idObra) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobraetapamateriales WHERE tbetapaid IN (SELECT tbetapaid FROM tbobraetapa WHERE tbetapaid = '". $idObra ."');";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $ObraEtapa = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentObraEtapa = new ObraEtapaMateriales($row['tbetapamaterialesid'],$row['tbetapaid'], $row['tbetapanombremateriales'], $row['tbetapacantidad'], 
            $row['tbetapacostoaproximado']);
            array_push($ObraEtapa, $currentObraEtapa);
        }
        return $ObraEtapa;
    }
}


