<?php

include_once 'data.php';
include '../domain/EmpleadoTipoEmpleadoPagoRango.php';

class EmpleadoTipoEmpleadoPagoRangoData extends Data {

    public function insertEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryGetLastId = "SELECT MAX(tbempleadocostohorarangoid) AS tbempleadocostohorarangoid  FROM tbempleadocostohorarango";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }

        $queryInsert = "INSERT INTO tbempleadocostohorarango VALUES (" . $nextId . "," .
                $EmpleadoTipoEmpleadoPagoRango->getEmpleadoTipoId() . "," .
                $EmpleadoTipoEmpleadoPagoRango->getEmpleadoTipoEmpleadoPagoRangoInferior() . "," .
                $EmpleadoTipoEmpleadoPagoRango->getEmpleadoTipoEmpleadoPagoRangoSuperior() . ");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateEmpleadoTipoEmpleadoPagoRango($EmpleadoTipoEmpleadoPagoRango) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbempleadocostohorarango SET tbempleadotipoid=" . $EmpleadoTipoEmpleadoPagoRango->getEmpleadoTipoId() .
                ", tbempleadocostohorarangoinferior=" . $EmpleadoTipoEmpleadoPagoRango->getEmpleadoTipoEmpleadoPagoRangoInferior() .
                ", tbempleadocostohorarangosuperior=" . $EmpleadoTipoEmpleadoPagoRango->getEmpleadoTipoEmpleadoPagoRangoSuperior() .
                " WHERE tbempleadocostohorarangoid=" . $EmpleadoTipoEmpleadoPagoRango->getEmpleadoTipoEmpleadoPagoRangoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteEmpleadoTipoEmpleadoPagoRango($empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbempleadocostohorarango where tbempleadotipoid=" . $empleadoTipoId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllEmpleadoTipoEmpleadoPagoRango() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadocostohorarango;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $EmpleadoTipoEmpleadosPagoRango = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentEmpleadoTipoEmpleadoPagoRango = new EmpleadoTipoEmpleadoPagoRango($row['tbempleadocostohorarangoid'], $row['tbempleadotipoid'], $row['tbempleadocostohorarangoinferior'], $row['tbempleadocostohorarangosuperior']);
            array_push($EmpleadoTipoEmpleadosPagoRango, $currentEmpleadoTipoEmpleadoPagoRango);
        }
        return $EmpleadoTipoEmpleadosPagoRango;
    }

    public function buscarEmpleadoTipoEmpleadoPagoRangoRepetido($empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadocostohorarango;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbempleadotipoid'] == $empleadoTipoId){
                $busqueda = true;
            }
        }
        return $busqueda;
    }

    public function obtenerPagoHoraRangoInferior($empleadoTipoId){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadocostohorarango;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $monto = 0;
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbempleadotipoid'] == $empleadoTipoId){
                $monto = $row['tbempleadocostohorarangoinferior'];
            }
        }
        return $monto;
    }

    public function obtenerPagoHoraRangoSuperior($empleadoTipoId){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadocostohorarango;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $monto = 0;
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbempleadotipoid'] == $empleadoTipoId){
                $monto = $row['tbempleadocostohorarangosuperior'];
            }
        }
        return $monto;
    }
}
