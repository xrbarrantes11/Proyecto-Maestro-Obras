<?php
include_once 'data.php';
include '../domain/Empleado.php';

class EmpleadoData extends Data {

    public function insertEmpleado($Empleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(tbempleadoid) AS tbempleadoid  FROM tbempleado";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbempleado VALUES (" . $nextId . ",'" .
                $Empleado->getEmpleadoNombre() . "','" .
                $Empleado->getEmpleadoApellidos() . "','" .
                $Empleado->getEmpleadoCedula() . "','" .
                $Empleado->getEmpleadoTelefono() . "'," .
                $Empleado->getEmpleadoActivo() . ");";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
    }

    public function updateEmpleado($Empleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbempleado SET tbempleadonombre='" . $Empleado->getEmpleadoNombre() .
                "', tbempleadoapellidos='" . $Empleado->getEmpleadoApellidos() .
                "', tbempleadocedula='" . $Empleado->getEmpleadoCedula() .
                "', tbempleadotelefono='" . $Empleado->getEmpleadoTelefono() .
                "', tbempleadoactivo=" . $Empleado->getEmpleadoActivo() .
                " WHERE tbempleadoid=" . $Empleado->getEmpleadoId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;
    }

    public function deleteEmpleado($empleadoId) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbempleado where tbempleadoid=" . $empleadoId . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getAllEmpleado() {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleado;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $Empleados = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentEmpleado = new Empleado($row['tbempleadoid'], $row['tbempleadonombre'], $row['tbempleadoapellidos'], 
            $row['tbempleadocedula'], $row['tbempleadotelefono'], $row['tbempleadoactivo']);
            array_push($Empleados, $currentEmpleado);
        }
        return $Empleados;
    }

    public function getIdEmpleado($nombreEmpleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbempleadoid FROM tbempleado WHERE tbempleadonombre = '". $nombreEmpleado ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $idEmpleado = 0;
        while ($row = mysqli_fetch_array($result)) {
            $idEmpleado = $row['tbempleadoid'];
        }
        return $idEmpleado;
    }

    public function getNombreEmpleado($idEmpleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbempleadonombre FROM tbempleado WHERE tbempleadoid = '". $idEmpleado ."';";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $nombreEmpleado = "";
        while ($row = mysqli_fetch_array($result)) {
            $nombreEmpleado = $row['tbempleadonombre'];
        }
        return $nombreEmpleado;
    }

    public function buscarEmpleado($cedulaEmpleado) {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT tbempleadocedula FROM tbempleado WHERE tbempleadocedula = '". $cedulaEmpleado ."';";
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
    $sql = "SELECT tbempleadonombre, tbempleadocedula FROM tbempleado WHERE tbempleadonombre LIKE ? ORDER BY tbempleadonombre ASC LIMIT 0, 5;";
    $query = $pdo->prepare($sql);
    $query->execute([$palabra . '%']);
    $result = "";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $result .= "<li onclick=\"mostrar('". $row["tbempleadonombre"] ."')\">".$row["tbempleadonombre"] . " - " . $row["tbempleadocedula"] . "</li>";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}