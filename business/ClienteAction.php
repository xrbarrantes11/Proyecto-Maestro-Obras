<?php

include './ClienteBusiness.php';

if (isset($_POST['actualizar'])) {
    if (
        isset($_POST['tbclienteid']) && isset($_POST['tbclientecedula']) && isset($_POST['tbclientenombre']) && isset($_POST['tbclienteapellidos'])
        && isset($_POST['tbclientetelefono']) && isset($_POST['tbclientecorreo'])
    ) {
        $tbClienteId = $_POST['tbclienteid'];
        $tbClienteCedula = str_replace('-', '', $_POST['tbclientecedula']);
        $tbClienteNombre = str_replace(' ', 'OOO',$_POST['tbclientenombre']);
        $tbClienteApellidos = str_replace(' ', 'OOO', $_POST['tbclienteapellidos']);
        $tbClienteTelefono = str_replace('-', '', $_POST['tbclientetelefono']);
        $tbClienteCorreo = $_POST['tbclientecorreo'];

        if (
            strlen($tbClienteId) > 0 && strlen($tbClienteCedula) > 0 && strlen($tbClienteNombre) > 0 && strlen($tbClienteApellidos) > 0 && strlen($tbClienteTelefono) > 0
            && strlen($tbClienteCorreo) > 0
        ) {
            if (!is_numeric($tbClienteNombre) && !is_numeric($tbClienteApellidos) && ctype_alpha($tbClienteNombre) && ctype_alpha($tbClienteApellidos)) {
                if (filter_var($tbClienteCorreo, FILTER_VALIDATE_EMAIL)) {
                    $tbClienteNombre = str_replace('OOO', ' ',$_POST['tbclientenombre']);
                    $tbClienteApellidos = str_replace('OOO', ' ', $tbClienteApellidos);
                    $Cliente = new Cliente($tbClienteId, $tbClienteCedula, $tbClienteNombre, $tbClienteApellidos, $tbClienteTelefono, $tbClienteCorreo);
                    $ClienteBusiness = new ClienteBusiness();
                    $resultado = $ClienteBusiness->updateCliente($Cliente);
                    if ($resultado == 1) {
                        header("location: ../view/ClienteView.php?success=updated");
                    } else {
                        header("location: ../view/ClienteView.php?error=dbError");
                    }
                } else {
                    header("location: ../view/ClienteView.php?error=emailError");
                }
            } else {
                header("location: ../view/ClienteView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/ClienteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ClienteView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['idCliente'])) {

        $clienteId = $_POST['idCliente'];

        $ClienteBusiness = new ClienteBusiness();
        $result = $ClienteBusiness->deleteCliente($clienteId);


        if ($result == 1) {
            echo "Transaccion realizada y borrada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['crear'])) {

    if (
        isset($_POST['tbclienteid']) && isset($_POST['tbclientecedula']) && isset($_POST['tbclientenombre']) && isset($_POST['tbclienteapellidos'])
        && isset($_POST['tbclientetelefono']) && isset($_POST['tbclientecorreo'])
    ) {
        $tbClienteCedula = str_replace('-', '', $_POST['tbclientecedula']);
        $tbClienteNombre = str_replace(' ', 'OOO',$_POST['tbclientenombre']);
        $tbClienteApellidos = str_replace(' ', 'OOO', $_POST['tbclienteapellidos']);
        $tbClienteTelefono = str_replace('-', '', $_POST['tbclientetelefono']);
        $tbClienteCorreo = $_POST['tbclientecorreo'];

        if (
            strlen($tbClienteCedula) > 0 && strlen($tbClienteNombre) > 0
            && strlen($tbClienteApellidos) > 0 && strlen($tbClienteTelefono) > 0 && strlen($tbClienteCorreo) > 0
        ) {
            if (!is_numeric($tbClienteNombre) && !is_numeric($tbClienteApellidos) && ctype_alpha($tbClienteNombre) && ctype_alpha($tbClienteApellidos)) {
                if (filter_var($tbClienteCorreo, FILTER_VALIDATE_EMAIL)) {
                    $tbClienteNombre = str_replace('OOO', ' ',$_POST['tbclientenombre']);
                    $tbClienteApellidos = str_replace('OOO', ' ', $tbClienteApellidos);
                    $Cliente = new Cliente(0, $tbClienteCedula, $tbClienteNombre, $tbClienteApellidos, $tbClienteTelefono, $tbClienteCorreo);
                    $ClienteBusiness = new ClienteBusiness();
                    $result = 0;
                    if ($ClienteBusiness->buscarCliente($tbClienteCedula) == false) {
                        $result = $ClienteBusiness->insertCliente($Cliente);
                    }
                    if ($result == 1) {
                        header("location: ../view/ClienteView.php?success=inserted");
                    } else {
                        header("location: ../view/ClienteView.php?error=idError&var2=$tbClienteNombre&var3=$tbClienteApellidos&var4=$tbClienteTelefono&var5=$tbClienteCorreo");
                    }
                } else {
                    header("location: ../view/ClienteView.php?error=emailError&var1=$tbClienteCedula&var2=$tbClienteNombre&var3=$tbClienteApellidos&var4=$tbClienteTelefono");
                }
            } else {
                if ((is_numeric($tbClienteNombre) || !ctype_alpha($tbClienteNombre)) && (is_numeric($tbClienteApellidos) || !ctype_alpha($tbClienteApellidos))) {
                    header("location: ../view/ClienteView.php?error=stringFormat&var1=$tbClienteCedula&var4=$tbClienteTelefono&var5=$tbClienteCorreo");
                } else
                        if (is_numeric($tbClienteNombre) || !ctype_alpha($tbClienteNombre)) {
                    header("location: ../view/ClienteView.php?error=stringFormat&var1=$tbClienteCedula&var3=$tbClienteApellidos&var4=$tbClienteTelefono&var5=$tbClienteCorreo");
                } else
                        if (is_numeric($tbClienteApellidos) || !ctype_alpha($tbClienteApellidos)) {
                    header("location: ../view/ClienteView.php?error=stringFormat&var1=$tbClienteCedula&var2=$tbClienteNombre&var4=$tbClienteTelefono&var5=$tbClienteCorreo");
                }
            }
        } else {
            header("location: ../view/ClienteView.php?error=emptyField&var1=$tbClienteCedula&var2=$tbClienteNombre&var3=$tbClienteApellidos&var4=$tbClienteTelefono&var5=$tbClienteCorreo");
        }
    } else {
        header("location: ../view/ClienteView.php?error=error&var1=$tbClienteCedula&var2=$tbClienteNombre&var3=$tbClienteApellidos&var4=$tbClienteTelefono&var5=$tbClienteCorreo");
    }
}
