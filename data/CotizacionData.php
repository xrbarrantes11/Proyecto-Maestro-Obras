<?php
require 'database.php';
include_once 'data.php';
include '../domain/Cotizacion.php';

class CotizacionData extends Data {

    public function insertCotizacion($obraId, $proveedorId, $CotizacionImagenId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbcotizacionid) AS tbcotizacionid  FROM tbcotizacion";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }

        $queryInsert = "INSERT INTO tbcotizacion VALUES (" . $nextId . "," . 
                $obraId . "," .
                $proveedorId . "," .
                $CotizacionImagenId . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateCotizacion($Cotizacion) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbcotizacion SET tbproveedorid='" . $Cotizacion->getProveedorId() .
                "', tbobraid='" . $Cotizacion->getObraId() .
                "' WHERE tbcotizacionid=" . $Cotizacion->getCotizacionId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteCotizacion($cotizacionimagenId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbcotizacion where tbcotizacionimagenid =" . $cotizacionimagenId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllCotizacion() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcotizacion;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Cotizaciones = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentCotizacion = new Cotizacion($row['tbcotizacionid'], $row['tbproveedorid'], 
            $row['tbobraid'], $row['tbcotizacionimagenid']);
            array_push($Cotizaciones, $currentCotizacion);
        }
        return $Cotizaciones;
    }

    

}

?>
