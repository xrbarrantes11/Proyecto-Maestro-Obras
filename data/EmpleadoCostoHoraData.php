<?php
//require 'database.php';
include '../domain/EmpleadoCostoHora.php';
include_once 'data.php';

class EmpleadoCostoHoraData extends Data{


    public function verificarRegistroHora($id, $fechaActual){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $consulta = 'SELECT EXISTS (SELECT 1 FROM tbempleadocostohora WHERE tbempleadoid = '.$id.' AND tbempleadofechaactual = \''.$fechaActual.'\') AS resultado';
        $result = mysqli_query($conn, $consulta);
        if($row = mysqli_fetch_array($result)[0] == 0){
            return 0;
        }else{
            return 1;
        }
    }   



    public function verificarEstadoHoraEmpleado($id, $fechaActual){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
       
        $consulta = 'SELECT * FROM tbempleadocostohora WHERE tbempleadoid = '.$id.' AND tbempleadofechaactual = \''.$fechaActual.'\'  AND tbempleadoestado = 1';
      
        $resultado = mysqli_query($conn, $consulta);
       
        if($resultado->num_rows == 0){
            return 0;
        }else{
            return 1;
        }
        
    
    }     


    public function verificarHoraFinEmpleado($id, $fechaActual){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $consulta = 'SELECT * FROM tbempleadocostohora WHERE tbempleadohorafin IS NULL AND tbempleadoid='.$id.' AND tbempleadofechaactual=\''.$fechaActual.'\'';
        $resultado = mysqli_query($conn, $consulta);
        if($resultado->num_rows == 0){
            return 0;
        }else{
            return 1;
        }
    }





    public function obtenerHoraEmpleado($id,$fechaActual){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
         $consulta = 'SELECT * FROM `tbempleadocostohora` WHERE `tbempleadoid` = '.$id.' AND `tbempleadofechaactual` = \''.$fechaActual.'\'';
     
        $resultado = mysqli_query($conn, $consulta);
        $datos = $row = mysqli_fetch_array($resultado);
        $hora = array();
        $hora = new EmpleadoCostoHora($datos['tbempleadoid'],$datos['tbempleadonombre'],$datos['tbempleadofechaactual'],$datos['tbempleadohorainicio'],$datos['tbempleadohorafin'],$datos['tbempleadoestado']);

        return $hora;

        
    }



    public function insertEmpleadoCostoHora($EmpleadoCostoHora) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        
        //Get the last id
        $queryGetLastId = "SELECT MAX(tbcostohoraid) AS tbcostohoraid  FROM tbempleadocostohora";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }

        echo $queryInsert = "INSERT INTO tbempleadocostohora (`tbcostohoraid`, `tbempleadoid`, 
        `tbempleadonombre`, `tbempleadofechaactual`, `tbempleadohorainicio`)
        VALUES (" . $nextId . "," . $EmpleadoCostoHora->getEmpleadoId() . ",'" .
        $EmpleadoCostoHora->getEmpleadoNombre() . "','" .
        $EmpleadoCostoHora->getEmpleadoFechaActual() . "','" .
        $EmpleadoCostoHora->getEmpleadoHoraInicio() . "');";
        echo $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    

    
    public function updateEmpleadoCostoHora($Empleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        
        $queryUpdate = "UPDATE tbempleadocostohora SET tbempleadohorafin='" . $Empleado->getEmpleadoHoraFin() .
                "', tbempleadoestado=" . $Empleado->getEmpleadoEstado() .
                " WHERE tbempleadoid=" . $Empleado->getEmpleadoId() .  " AND tbempleadofechaactual = 
                '" .$Empleado->getEmpleadoFechaActual() . "';";

       $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }


    
    public function getAllEmpleadoCostoHora() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleadocostohora;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Empleado = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentEmpleado= new EmpleadoCostoHora($row['tbempleadoid'], $row['tbempleadonombre'], $row['tbempleadocanthoras'], $row['tbempleadofechainicio'], $row['tbempleadofechafin'], $row['tbempleadosalario']);
            array_push($Empleado, $currentEmpleado);
        }
        return $Empleado;
    }

    public function getDiasEmpleado($idEmpleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $cantDias = 0;
        $querySelect = "SELECT * FROM tbempleadocostohora WHERE tbempleadoid = ". $idEmpleado .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        while ($row = mysqli_fetch_array($result)) {
        $cantDias++;
        }
        return $cantDias;
    }

    public function getHorasEmpleadoEntreFechas($idEmpleado, $fechaInicio, $fechaFin) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $cantHoras = 0;
        $querySelect = "SELECT * FROM tbempleadocostohora WHERE tbempleadoid = ". $idEmpleado ." AND tbempleadofechaactual <= '". $fechaFin ."' AND tbempleadofechaactual >= '". $fechaInicio ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        while ($row = mysqli_fetch_array($result)) {
        $cantHoras += cantidadHoras($row['tbempleadohorainicio'], $row['tbempleadohorafin'], 60);
        }
        return $cantHoras;
    }
}

function cantidadHoras($horaInicio, $horaFin, $intervalo) {
    $cantidad = 0;
    $horaInicio = new DateTime( $horaInicio );
    $horaFin    = new DateTime( $horaFin );
    $horaFin->modify('+1 second');  
    $intervalo = new DateInterval('PT'.$intervalo.'M');
    $periodo   = new DatePeriod($horaInicio, $intervalo, $horaFin);        
    foreach( $periodo as $hora ) {
        $cantidad += 1;
    }
    return $cantidad;
}

