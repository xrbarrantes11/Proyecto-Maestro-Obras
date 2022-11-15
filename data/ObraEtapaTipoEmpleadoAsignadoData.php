<?php
include_once 'data.php';
include '../domain/ObraEtapaTipoEmpleadoAsignado.php';

class ObraEtapaTipoEmpleadoAsignadoData extends Data {

    public function insertObraTipoEmpleadoAsignado($tbobraetapaid, $empleadoId, $empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbobraetapaempleadotipoasignadoid) AS tbobraetapaempleadotipoasignadoid FROM tbobraetapaempleadotipoasignado";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbobraetapaempleadotipoasignado VALUES (" . $nextId . "," .
                $tbobraetapaid . "," .
                $empleadoId . "," .
                $empleadoTipoId . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function getAllObraTipoEmpleadoAsignado() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobraetapaempleadotipoasignado;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $ObraTipoEmpleado = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentObraTipoEmpleado = new ObraEtapaTipoEmpleadoAsignado($row['tbobraetapaempleadotipoasignadoid'], $row['tbobraetapaid'], $row['tbempleadoid'], 
            $row['tbempleadotipoid']);
            array_push($ObraTipoEmpleado, $currentObraTipoEmpleado);
        }
        return $ObraTipoEmpleado;
    }

    public function deleteObraTipoEmpleadoAsignado($ObraEtapaTipoEmpleadoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbobraetapaempleadotipoasignado where tbobraetapaempleadotipoasignadoid =" . $ObraEtapaTipoEmpleadoId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function buscarRegistroRepetidoEmpleados($empleadoTipoId, $empleadoNombreId){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobraetapaempleadotipoasignado;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $result = false;
        while ($row = $result) {
            if($row['tbempleadoid'] == $empleadoNombreId && $row['tbempleadotipoid'] == $empleadoTipoId){
                $result = true;
            }
        }
        return $result;
    }

    public function buscarEmpleadoTipoEmpleadoObraRepetido($empleadoNombreId, $empleadoTipoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobraetapaempleadotipoasignado;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbempleadoid'] == $empleadoNombreId && $row['tbempleadotipoid'] == $empleadoTipoId){
                $busqueda = true;
            }
        }
        return $busqueda;
    }

}