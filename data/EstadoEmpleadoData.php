<?php

include_once 'data.php';
include '../domain/Empleado.php';

class EstadoEmpleadoData extends Data {

    public function updateEstadoEmpleado($empleadoId, $empleadoActivo) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $nuevoEstado = 0;
        if($empleadoActivo == 0){
        $nuevoEstado = 1;    
        }
        $queryUpdate = "UPDATE tbempleado SET tbempleadoActivo=" . $nuevoEstado .
                " WHERE tbempleadoid=" . $empleadoId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function getEmpleados() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbempleado;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Empleados = [];
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbempleadoactivo'] == 0){
            $currentEmpleado = new Empleado($row['tbempleadoid'], $row['tbempleadonombre'], $row['tbempleadoapellidos'], 
            $row['tbempleadocedula'], $row['tbempleadotelefono'], $row['tbempleadoactivo']);
            array_push($Empleados, $currentEmpleado);
            }
        }
        return $Empleados;
    }
}
