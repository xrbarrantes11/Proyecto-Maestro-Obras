<?php

include_once 'data.php';
include '../domain/Proveedor.php';

class ProveedorData extends Data{

    public function insertProveedor($Proveedor) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbproveedorid) AS tbproveedorid  FROM tbproveedor";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbproveedor VALUES (" . $nextId . ",'" .
                $Proveedor->getProveedorNombre() . "','" .
                $Proveedor->getProveedorApellido() . "','" .
                $Proveedor->getProveedorComercio() . "','" .
                $Proveedor->getProveedorCedula() . "','" .
                $Proveedor->getProveedorTelefono() . "','" .
                $Proveedor->getProveedorCorreo() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateProveedor($Proveedor) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbproveedor SET tbproveedornombre='" . $Proveedor->getProveedorNombre() .
                "', tbproveedorapellido='" . $Proveedor->getProveedorApellido() .
                "', tbproveedorcomercio='" . $Proveedor->getProveedorComercio() .
                "', tbproveedorcedula='" . $Proveedor->getProveedorCedula() .
                "', tbproveedortelefono='" . $Proveedor->getProveedorTelefono() .
                "', tbproveedorcorreo='" . $Proveedor->getProveedorCorreo() .
                "' WHERE tbproveedorid=" . $Proveedor->getProveedorId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteProveedor($proveedorId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbproveedor where tbproveedorid =" . $proveedorId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllProveedor() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbproveedor;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Proveedores = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentProveedor = new Proveedor($row['tbproveedorid'], $row['tbproveedornombre'], $row['tbproveedorapellido'], $row['tbproveedorcomercio'], $row['tbproveedorcedula'],
            $row['tbproveedortelefono'], $row['tbproveedorcorreo']);
            array_push($Proveedores, $currentProveedor);
        }
        return $Proveedores;
    }

    public function getProveedor($provedoorId)
    {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbproveedor WHERE tbproveedorid = " . $provedoorId . " ;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $nombreProveedor = "";
        while ($row = mysqli_fetch_array($result)) {
            if($row['tbproveedorid'] == $provedoorId){
            $nombreProveedor = $row['tbproveedornombre'];
            }
        }
        return $nombreProveedor;
    }

    public function buscarProveedorDuplicado($proveedorCedula) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbproveedorcedula FROM tbproveedor WHERE tbproveedorcedula = '". $proveedorCedula ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $busqueda = false;
        while ($row = mysqli_fetch_array($result)) {
            $busqueda = true;
        }
        return $busqueda;
    }

   
}

if(isset($_POST["buscar"])){
    $con = new Database();
    $pdo = $con->conectar();
    $palabra = $_POST["buscar"];
    $sql = "SELECT tbproveedornombre, tbproveedorcedula FROM tbproveedor WHERE tbproveedornombre LIKE ? ORDER BY tbproveedornombre ASC LIMIT 0, 5;";
    $query = $pdo->prepare($sql);
    $query->execute([$palabra . '%']);
    $result = "";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $result .= "<li onclick=\"mostrarProveedor('". $row["tbproveedornombre"] ."')\">".$row["tbproveedornombre"] . " - " . $row["tbproveedorcedula"] . "</li>";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}



