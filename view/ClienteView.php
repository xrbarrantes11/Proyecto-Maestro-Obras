<!DOCTYPE html>
<?php
error_reporting(0);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lista de Clientes</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../business/ClienteBusiness.php';
    ?>
    <style type="text/css">
        ul {
            list-style-type: none;
            width: 250px;
            height: auto;
            position: absolute;
            z-index: 10;
            padding: 10px;
        }

        li {
            background-color: #EEEEEE;
            border-top: 1px solid #9e9e9e;
            padding: 10px;
            width: 100%;
            float: left;

        }
    </style>
</head>

<body>

    <header>
    </header>

    <section id="form">
        </br>
        <form action="" method="post" autocomplete="off">
            <div>
                Buscar:
                <?php
                $nombre = "";
                if (isset($_GET['var'])) {
                    $nombre = $_GET['var'];
                }
                echo '<input type="text" name="buscarCliente" id = "buscarCliente" required placeholder = "Ingresar busqueda..." value = "' . $nombre . '">';
                ?>
                <input type="button" name="search" id="search" value="Buscar" onclick="getData()">
                <ul id="listaCliente"></ul>
            </div>
        </form>
        </br>
       
        <table>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Correo</th>
            </tr>
            <tbody id=buscarCliente>
                <?php
                $ClienteBusiness = new ClienteBusiness();
                $allCliente = $ClienteBusiness->getAllCliente();
                foreach ($allCliente as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/ClienteAction.php">';
                    echo '<input type="hidden" name="tbclienteid" value="' . $current->getClienteId() . '">';
                    echo '<td><input type="text" data-mask ="0-0000-0000" minlength="5" maxlength="15" name="tbclientecedula" id="tbclientecedula" value="' . $current->getClienteCedula() . '"/></td>';
                    echo '<td><input type="text" name="tbclientenombre" id="tbclientenombre" value="' . $current->getClienteNombre() . '"/></td>';
                    echo '<td style="display:none">' . $current->getClienteNombre() . '</td>';
                    echo '<td><input type="text" name="tbclienteapellidos" id="tbclienteapellidos" value="' . $current->getClienteApellidos() . '"/></td>';
                    echo '<td><input type="text" data-mask ="0000-0000" min="10000000" max = "99999999" maxlength="10" name="tbclientetelefono" id="tbclientetelefono" value="' . $current->getClienteTelefono() . '"/></td>';
                    echo '<td><input type="text" size ="30" name="tbclientecorreo" id="tbclientecorreo" value="' . $current->getClienteCorreo() . '"/></td>';
                    echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                    echo '<td><button onclick="eliminarCliente(' . $current->getClienteId() . ')">Eliminar</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
                <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#search").on("click", function() {
                            var value = $(buscarCliente).val().toLowerCase();
                            $("#buscarCliente tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
            </tbody>
            </br>


            <tr>
                <td></td>
                <td>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "stringFormat") {
                            echo '<p style="color: red">Error, formato de palabra</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                        }else if ($_GET['error'] == "emailError") {
                            echo '<center><p style="color: red">Error de formato de email</p></center>';
                        }else if ($_GET['error'] == "idError") {
                            echo '<center><p style="color: red">Error cedula duplicada</p></center>';
                        }
                    } else if (isset($_GET['success'])) {
                        echo '<p style="color: green">Transacción realizada</p>';
                    }
                    ?>
                </td>
            </tr>
        </table>

        <table>
                <tr>
                    <th></th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                </tr>
                <?php
                $clienteId = "";
                $clienteCedula = "";
                $clienteNombre = "";
                $clienteApellidos = "";
                $clienteTelefono = "";
                $clienteCorreo = "";
                if (isset($_GET['var'])) {
                    $clienteCedula = $_GET['var1'];
                }
                if (isset($_GET['var2'])) {
                    $clienteNombre = $_GET['var2'];
                }
                if (isset($_GET['var3'])) {
                    $clienteApellidos = $_GET['var3'];
                }
                if (isset($_GET['var4'])) {
                    $clienteTelefono = $_GET['var4'];
                }
                if (isset($_GET['var5'])) {
                    $clienteCorreo = $_GET['var5'];
                }
                ?>
                <form method="post" enctype="multipart/form-data" action="../business/ClienteAction.php">
                    <tr>
                        <?php
                            echo '<td><input required type="hidden" name="tbclienteid" id="tbclienteid" value="' . $clienteId . '"/></td>';
                            echo '<td><input required data-mask ="0-0000-0000" type="text" name="tbclientecedula" id="tbclientecedula" value="'. $clienteCedula .'" maxlength="12" minlength="9" /></td>';
                            echo '<td><input required type="text" name="tbclientenombre" id="tbclientenombre" value="'.$clienteNombre.'" /></td>';
                            echo '<td><input required type="text" name="tbclienteapellidos" id="tbclienteapellidos" value="'.$clienteApellidos.'" /></td>';
                            echo '<td><input required data-mask ="0000-0000" type="text" name="tbclientetelefono" id="tbclientetelefono" value="'.$clienteTelefono.'" min="10000000" max = "99999999"/></td>';
                            echo '<td><input required size ="30" placeholder = "...@dominio.com" type="text" name="tbclientecorreo" id="tbclientecorreo" value="'.$clienteCorreo.'"/></td>';
                        ?>
                        <td><input type="submit" value="Ingresar" name="crear" id="crear" /></td>
                    </tr>
                </form>
            </table>
    </section>

    <footer>
    </footer>
    
    <form action ="../business/HomeAction.php" method = "POST">
    <button type="submit" name="regresar"> Regresar</button>
    </form>

    <?php
    if(isset($_GET['message'])){
    echo $_GET['message'];
    }
    ?>

</body>

</html>