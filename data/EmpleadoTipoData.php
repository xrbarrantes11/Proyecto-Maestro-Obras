<?php

include_once 'data.php';
include '../domain/EmpleadoTipo.php';

class EmpleadoTipoData extends Data {

    public function insertEmpleadoTipo($EmpleadoTipo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbempleadotipoid) AS tbempleadotipoid  FROM tbempleadotipo";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbempleadotipo VALUES (" . $nextId . ",'" .
                $EmpleadoTipo->getEmpleadoTipoNombre() . "','" .
                $EmpleadoTipo->getEmpleadoTipoDescripcion() . "'," .
                $EmpleadoTipo->getEmpleadoTipoActivo() . "," .
                $EmpleadoTipo->getEmpleadoTipoSalarioBase() . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateEmpleadoTipo($EmpleadoTipo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbempleadotipo SET tbempleadotiponombre='" . $EmpleadoTipo->getEmpleadoTipoNombre() .
                "', tbempleadotipodescripcion='" . $EmpleadoTipo->getEmpleadoTipoDescripcion() .
                "', tbempleadotipoactivo=" . $EmpleadoTipo->getEmpleadoTipoActivo() .
                ", tbempleadotiposalariobase=" . $EmpleadoTipo->getEmpleadoTipoSalarioBase() .
                " WHERE tbempleadotipoid=" . $EmpleadoTipo->getEmpleadoTipoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteEmpleadoTipo($empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbempleadotipo where tbempleadotipoid=" . $empleadoTipoId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllEmpleadoTipo() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadotipo;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $tipoEmpleados = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentEmpleadoTipo = new EmpleadoTipo($row['tbempleadotipoid'], $row['tbempleadotiponombre'], $row['tbempleadotipodescripcion'], $row['tbempleadotipoactivo'], $row['tbempleadotiposalariobase']);
            array_push($tipoEmpleados, $currentEmpleadoTipo);
        }
        return $tipoEmpleados;
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
}
