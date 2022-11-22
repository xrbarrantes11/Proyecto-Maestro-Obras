<?php
include_once 'data.php';
include '../domain/Cliente.php';

class ClienteData extends Data {

    public function insertCliente($Cliente) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbclienteid) AS tbclienteid  FROM tbcliente";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbcliente VALUES (" . $nextId . ",'" .
                $Cliente->getClienteCedula() . "','" .
                $Cliente->getClienteNombre() . "','" .
                $Cliente->getClienteApellidos() . "','" .
                $Cliente->getClienteTelefono() . "','" .
                $Cliente->getClienteCorreo() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateCliente($Cliente) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbcliente SET tbclientecedula='" . $Cliente->getClienteCedula() .
                "', tbclientenombre='" . $Cliente->getClienteNombre() .
                "', tbclienteapellidos='" . $Cliente->getClienteApellidos() .
                "', tbclientetelefono='" . $Cliente->getClienteTelefono() .
                "', tbclientecorreo='" . $Cliente->getClienteCorreo() .
                "' WHERE tbclienteid=" . $Cliente->getClienteId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteCliente($clienteId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbcliente where tbclienteid =" . $clienteId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllCliente() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcliente;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Clientes = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentCliente = new Cliente($row['tbclienteid'], $row['tbclientecedula'], $row['tbclientenombre'], 
            $row['tbclienteapellidos'], $row['tbclientetelefono'], $row['tbclientecorreo']);
            array_push($Clientes, $currentCliente);
        }
        return $Clientes;
    }

    public function buscarCliente($clienteCedula) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbclientecedula FROM tbcliente WHERE tbclientecedula = '". $clienteCedula ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            $busqueda = true;
        }
        return $busqueda;
    }

    public function getClienteId($clienteId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcliente WHERE tbclienteid = ". $clienteId .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $nombreCliente = "";
        while ($row = mysqli_fetch_array($result)) {
            $nombreCliente = $row['tbclientenombre'].' '.$row['tbclienteapellidos'];
        }
        return $nombreCliente;
    }

    

}

