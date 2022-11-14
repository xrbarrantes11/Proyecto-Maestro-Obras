<?php


include_once 'data.php';
include '../domain/CotizacionImagen.php';

class CotizacionImagenData extends Data{
    public function insertCotizacionImagen($CotizacionImagen) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbcotizacionimagenid) AS tbcotizacionimagenid  FROM tbcotizacionimagen";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbcotizacionimagen VALUES (" . $nextId . ",'" .
                $CotizacionImagen->getCotizacionImagenRuta() . "','" .
                $CotizacionImagen->getCotizacionImagenActivo() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function getAllCotizacionImagen() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcotizacionimagen;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Cotizaciones = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentCotizacion = new CotizacionImagen($row['tbcotizacionimagenid'], $row['tbcotizacionimagenruta'], 
            $row['tbcotizacionimagenactivo']);
            array_push($Cotizaciones, $currentCotizacion);
        }
        return $Cotizaciones;
    }

    public function getIdCotizacionImagen($CotizacionImagen) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbcotizacionimagenid FROM tbcotizacionimagen WHERE tbcotizacionimagenruta = '". $CotizacionImagen ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $idCotizacion = 0;
        while ($row = mysqli_fetch_array($result)) {
            $idCotizacion = $row['tbcotizacionimagenid'];
        }
        return $idCotizacion;
    }

    public function getCotizacionImagen($cotizacionimagenId)
    {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcotizacionimagen WHERE tbcotizacionimagenid = " . $cotizacionimagenId . " ;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $cotizacionimagen = "";
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbcotizacionimagenid'] == $cotizacionimagenId){
            $cotizacionimagen = $row['tbcotizacionimagenruta'];
            }
        }
        return $cotizacionimagen;
    }

    public function deleteCotizacionImagen($cotizacionimagenId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbcotizacionimagen where tbcotizacionimagenid =" . $cotizacionimagenId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }
}