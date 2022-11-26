<?php
include_once 'data.php';
//include '../business/EmpleadoTipoBusiness.php';

class EmpleadoTipoAsignadoData extends Data {

    public function insertEmpleadoTipoAsignado($empleadoId, $empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbempleadotipoasignadoid) AS tbempleadotipoasignadoid FROM tbempleadotipoasignado";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbempleadotipoasignado VALUES (" . $nextId . "," .
                $empleadoId . "," .
                $empleadoTipoId . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function getAllEmpleadoTipoAsignado($empleadoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $querySelect = "SELECT * FROM tbempleadotipoasignado WHERE tbempleadoid = ". $empleadoId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $TiposAsignados = "";
        while ($row = mysqli_fetch_array($result)) {
            $TiposAsignados .="[". $EmpleadoTipoBusiness->getEmpleadoTipo($row['tbempleadotipoid']) . "] ";
        }
        return $TiposAsignados;
    }

    public function getAllEmpleadoTipoAsignados($empleadoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $querySelect = "SELECT * FROM tbempleadotipoasignado WHERE tbempleadoid = ". $empleadoId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $TiposAsignados = [];
        while ($row = mysqli_fetch_array($result)) {
            $CurrentTiposAsignados = new EmpleadoTipo($row['tbempleadotipoid'],$EmpleadoTipoBusiness->getEmpleadoTipo($row['tbempleadotipoid']),"",0,0);
            array_push($TiposAsignados, $CurrentTiposAsignados);
        }
        return $TiposAsignados;
    }

    public function getEmpleadoTipoAsignado($empleadoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $querySelect = "SELECT * FROM tbempleadotipoasignado WHERE tbempleadoid = ". $empleadoId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $TiposAsignados = "";
        while ($row = mysqli_fetch_array($result)) {
            $TiposAsignados = $row['tbempleadotipoid'];
        }
        return $TiposAsignados;
    }

    public function deleteAllEmpleadoTipoAsignado($empleadoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "DELETE FROM tbempleadotipoasignado WHERE tbempleadoid = ". $empleadoId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        return $result;
    }

    public function  deleteEmpleadoTipoAsignado($empleadoTipoId,$empleadoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "DELETE FROM tbempleadotipoasignado WHERE tbempleadoid = ". $empleadoId ." AND tbempleadotipoid = ". $empleadoTipoId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        return $result;
    }

    public function getTipoAsignado($empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbempleadotipoasignado WHERE tbempleadotipoid = ". $empleadoTipoId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $TiposAsignados = false;
        while ($row = mysqli_fetch_array($result)) {
            $TiposAsignados = true;
        }
        return $TiposAsignados;
    }

    public function buscarTipoAsignado($empleadoNombreId, $empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbempleadotipoasignado WHERE tbempleadoid = ". $empleadoNombreId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            if($empleadoTipoId == $row['tbempleadotipoid']){
            $busqueda = true;
            }
        }
        return $busqueda;
    }

}
