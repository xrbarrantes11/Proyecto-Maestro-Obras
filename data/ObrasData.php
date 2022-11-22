<?php
include_once 'data.php';
include '../domain/Obra.php';

class ObrasData extends Data {

    public function insertObra($Obra) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbobraid) AS tbobraid  FROM tbobra";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbobra VALUES (" . $nextId . ",'" .
                $Obra->getObraNombre() . "','" .
                $Obra->getObraDescripcion() . "'," .
                $Obra->getClienteId() . ",'" .
                $Obra->getObraFechaInicio() . "','" .
                $Obra->getObraFechaEntrega() . "','".
                $Obra->getObraFechaEstimadaFinalizacion() . "'," .
                $Obra->getObraCostoEstimado() . "," .
                $Obra->getObraCostoFinalizado() . "," .
                $Obra->getObraDiasFinalizacionAnticipada() . "," .
                $Obra->getObraDiasFinalizacionAtrasado() . "," .
                $Obra->getObraGanancia() . "," .
                $Obra->getObraPerdida() . "," .
                $Obra->getObraDiasEstimadoObra() . "," .
                $Obra->getObraFinalizada() . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateObra($Obra) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbobra SET tbobranombre='" . $Obra->getObraNombre() .
                "', tbobradescripcion='" . $Obra->getObraDescripcion() .
                "', tbclienteid=" . $Obra->getClienteId() .
                ", tbobrafechainicio='" . $Obra->getObraFechaInicio() .
                "', tbobrafechaentrega='" . $Obra->getObraFechaEntrega() .
                "', tbobrafechaestimadofinalizacion	='" . $Obra->getObraFechaEstimadaFinalizacion() .
                "', tbobracostoestimado=" . $Obra->getObraCostoEstimado() .
                ", tbobracostofinalizado=" . $Obra->getObraCostoFinalizado() .
                ", tbobradiasfinalizacionanticipada=" . $Obra->getObraDiasFinalizacionAnticipada() .
                ", tbobradiasfinalizacionatrasado=" . $Obra->getObraDiasFinalizacionAtrasado() .
                ", tbobraganancia=" . $Obra->getObraGanancia() .
                ", tbobraperdida=" . $Obra->getObraPerdida() .
                ", tbobradiasestimadoobra=" . $Obra->getObraDiasEstimadoObra() .
                ", tbobrafinalizada=" . $Obra->getObraFinalizada() .
                " WHERE tbobraid=" . $Obra->getObraId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteObra($obraId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbobra where tbobraid=" . $obraId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllObra() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobra;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Obras = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentObra = new Obra($row['tbobraid'], $row['tbobranombre'], $row['tbobradescripcion'], 
            $row['tbclienteid'], $row['tbobrafechainicio'], $row['tbobrafechaentrega'], $row['tbobrafechaestimadofinalizacion'], $row['tbobracostoestimado']
            , $row['tbobracostofinalizado'], $row['tbobradiasfinalizacionanticipada'], $row['tbobradiasfinalizacionatrasado'], $row['tbobraganancia'], $row['tbobraperdida']
            , $row['tbobradiasestimadoobra'], $row['tbobrafinalizada']);
            array_push($Obras, $currentObra);
        }
        return $Obras;
    }

    public function getObra($obraId)
    {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobra WHERE tbobraid = " . $obraId . " ;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $nombreObra = "";
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbobraid'] == $obraId){
            $nombreObra = $row['tbobranombre'];
            }
        }
        return $nombreObra;
    }

    public function getNombreObras($idObras) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbobranombre FROM tbobra WHERE tbobraid = '". $idObras ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $nombreObras = "";
        while ($row = mysqli_fetch_array($result)) {
            $nombreObras = $row['tbobranombre'];
        }
        return $nombreObras;
    }

    public function getObrasPendientes() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbobra where tbobrafinalizada = 0;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Obras = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentObra = new Obra($row['tbobraid'], $row['tbobranombre'], $row['tbobradescripcion'], 
            $row['tbclienteid'], $row['tbobrafechainicio'], $row['tbobrafechaentrega'], $row['tbobrafechaestimadofinalizacion'], $row['tbobracostoestimado']
            , $row['tbobracostofinalizado'], $row['tbobradiasfinalizacionanticipada'], $row['tbobradiasfinalizacionatrasado'], $row['tbobraganancia'], $row['tbobraperdida']
            , $row['tbobradiasestimadoobra'], $row['tbobrafinalizada']);
            array_push($Obras, $currentObra);
        }
        return $Obras;
    }

    public function finalizarObra($ObraId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbobra SET tbobrafinalizada=1 WHERE tbobraid=" . $ObraId . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }
    public function buscarTipoAsignadoCliente($obraNombre, $clienteId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $querySelect = "SELECT * FROM tbobra WHERE tbobraid = ". $obraNombre .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            if($clienteId == $row['tbclienteid']){
            $busqueda = true;
            }
        }
        return $busqueda;
    }

}
