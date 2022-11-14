<?php
require '../data/database.php';

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

if(isset($_POST["buscarProveedores"])){
    $con = new Database();
    $pdo = $con->conectar();
    $palabra = $_POST["buscarProveedores"];
    $sql = "SELECT tbproveedornombre, tbproveedorcedula FROM tbproveedor WHERE tbproveedornombre LIKE ? ORDER BY tbproveedornombre ASC LIMIT 0, 5;";
    $query = $pdo->prepare($sql);
    $query->execute([$palabra . '%']);
    $result = "";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $result .= "<li onclick=\"mostrarProveedor('". $row["tbproveedornombre"] ."')\">".$row["tbproveedornombre"] . " - " . $row["tbproveedorcedula"] . "</li>";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if(isset($_POST["buscarCliente"])){
    $con = new Database();
    $pdo = $con->conectar();
    $palabra = $_POST["buscarCliente"];
    $sql = "SELECT tbclientenombre, tbclientecedula FROM tbcliente WHERE tbclientenombre LIKE ? ORDER BY tbclientenombre ASC LIMIT 0, 5;";
    $query = $pdo->prepare($sql);
    $query->execute([$palabra . '%']);
    $result = "";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $result .= "<li onclick=\"mostrarCliente('". $row["tbclientenombre"] ."')\">".$row["tbclientenombre"] . " - " . $row["tbclientecedula"] . "</li>";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST["buscarObra"])) {
    $con = new Database();
    $pdo = $con->conectar();
    $palabra = $_POST["buscarObra"];
    $sql = "SELECT tbobranombre FROM tbobra WHERE tbobranombre LIKE ? ORDER BY tbobranombre ASC LIMIT 0, 5;";
    $query = $pdo->prepare($sql);
    $query->execute([$palabra . '%']);
    $result = "";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $result .= "<li onclick=\"mostrarObra('" . $row["tbobranombre"] . "')\">". $row["tbobranombre"] ."</li>";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}



if(isset($_POST["buscarHora"])){
    $con = new Database();
    $pdo = $con->conectar();
    $palabra = $_POST["buscarHora"];
    $sql = "SELECT tbempleadonombre, tbempleadocedula FROM tbempleado WHERE tbempleadonombre LIKE ? ORDER BY tbempleadonombre ASC LIMIT 0, 5;";
    $query = $pdo->prepare($sql);
    $query->execute([$palabra . '%']);
    $result = "";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $result .= "<li onclick=\"mostrarEmpleados('". $row["tbempleadonombre"] ."')\">".$row["tbempleadonombre"] . " - " . $row["tbempleadocedula"] . "</li>";
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
