<?php

include_once 'data.php';
include '../domain/EmpleadoTipoEmpleadoPago.php';

class EmpleadoTipoEmpleadoPagoData extends Data {

    public function insertEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryInsert = "INSERT INTO tbempleadotipoempleadopago VALUES (" .
                $EmpleadoTipoEmpleadoPago->getEmpleadoNombreId() . "," .
                $EmpleadoTipoEmpleadoPago->getEmpleadoTipoId() . "," .
                $EmpleadoTipoEmpleadoPago->getEmpleadoMonto() . ");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateEmpleadoTipoEmpleadoPago($EmpleadoTipoEmpleadoPago) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbempleadotipoempleadopago SET tbempleadoid=" . $EmpleadoTipoEmpleadoPago->getEmpleadoNombreId() .
                ", tbtipoempleadoid=" . $EmpleadoTipoEmpleadoPago->getEmpleadoTipoId() .
                ", tbempleadotipoempleadopagohora=" . $EmpleadoTipoEmpleadoPago->getEmpleadoMonto() .
                " WHERE tbempleadoid=" . $EmpleadoTipoEmpleadoPago->getEmpleadoNombreId() . " AND tbtipoempleadoid=" . $EmpleadoTipoEmpleadoPago->getEmpleadoTipoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteEmpleadoTipoEmpleadoPago($empleadoTipoId, $empleadoNombreId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbempleadotipoempleadopago where tbtipoempleadoid=" . $empleadoTipoId . " AND tbempleadoid=" . $empleadoNombreId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllEmpleadoTipoEmpleadoPago() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadotipoempleadopago;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $EmpleadoTipoEmpleadosPago = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentEmpleadoTipoEmpleadoPago = new EmpleadoTipoEmpleadoPago($row['tbempleadoid'], $row['tbtipoempleadoid'], $row['tbempleadotipoempleadopagohora']);
            array_push($EmpleadoTipoEmpleadosPago, $currentEmpleadoTipoEmpleadoPago);
        }
        return $EmpleadoTipoEmpleadosPago;
    }

    public function buscarEmpleadoTipoEmpleadoPagoRepetido($empleadoNombreId, $empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadotipoempleadopago;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbempleadoid'] == $empleadoNombreId && $row['tbtipoempleadoid'] == $empleadoTipoId){
                $busqueda = true;
            }
        }
        return $busqueda;
    }

    public function obtenerPagoHora($empleadoTipoId, $empleadoNombreId){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadotipoempleadopago;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $monto = 0;
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbempleadoid'] == $empleadoNombreId && $row['tbtipoempleadoid'] == $empleadoTipoId){
                $monto = $row['tbempleadotipoempleadopagohora'];
            }
        }
        return $monto;
    }

    public function buscarRegistroRepetido($empleadoTipoId, $empleadoNombreId){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadotipoempleadopago;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $result = false;
        while ($row = $result) {
            if($row['tbempleadoid'] == $empleadoNombreId && $row['tbtipoempleadoid'] == $empleadoTipoId){
                $result = true;
            }
        }
        return $result;
    }
}
