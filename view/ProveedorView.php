<!DOCTYPE html>
<?php
error_reporting(0);
?>

<html lang="en">
<head>
    <script src="../js/FunctionProyecto.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <title>Lista Proveedor</title>

    <?php
    include '../business/ProveedorBusiness.php';
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
                echo '<input type="text" name="buscarProveedores" id = "buscarProveedores" required placeholder = "Ingresar busqueda..." value = "' . $nombre . '">';
                ?>
                <input type="button" name="search" id="search" value="Buscar" onclick="getData()">
                <ul id="lista"></ul>
            </div>
        </form>
        </br>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Comercio</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th></th>
            </tr>
            <tbody id=buscarProveedores>
                <?php
                $ProveedorBusiness = new ProveedorBusiness();
                $allProveedor = $ProveedorBusiness->getAllProveedor();
                foreach($allProveedor as $current){
                    echo '<form method="post" enctype="multipart/form-data" action="../business/ProveedorAction.php">';
                    echo '<input type="hidden" name="tbproveedorid" value="' . $current->getProveedorId() . '">';
                    echo '<td><input type="text" name="tbproveedornombre" id="tbproveedornombre" value="' . $current->getProveedorNombre() . '"/></td>';
                    echo '<td style="display:none">' . $current->getProveedorNombre() . '</td>';
                    echo '<td><input type="text" name="tbproveedorapellido" id="tbproveedorapellido" value="' . $current->getProveedorApellido() . '"/></td>';
                    echo '<td><input type="text" name="tbproveedorcomercio" id="tbproveedorcomercio" value="' . $current->getProveedorComercio() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="0-0000-0000" minlength="5" maxlength="12" name="tbproveedorcedula" id="tbproveedorcedula" value="' . $current->getProveedorCedula() . '"/></td>';
                    echo '<td><input type="text" data-mask= "0000-0000" min="10000000" max = "99999999" maxlength="10" name="tbproveedortelefono" id="tbproveedortelefono" value="' . $current->getProveedorTelefono() . '"/></td>';
                    echo '<td><input type="email" name="tbproveedorcorreo" id="tbproveedorcorreo" value="' . $current->getProveedorCorreo() . '"/></td>';
                    echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                    echo '<td><button onclick="eliminarProveedor(' . $current->getProveedorId() . ')">Eliminar</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }   
                ?>
                <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#search").on("click", function() {
                            var value = $(buscarProveedores).val().toLowerCase();
                            $("#buscarProveedores tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
            </tbody>    
        </table>
        <br>
        <table>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Comercio</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th></th>
            </tr>
            <?php
                $proveedorId = "";
                $proveedorNombre = "";
                $proveedorApellidos = "";
                $proveedorCedula = "";
                $proveedorTelefono = "";
                $proveedorCorreo = "";
                $proveedorComercio = "";
                if (isset($_GET['var1'])) {
                    $proveedorNombre = $_GET['var1'];
                }
                if (isset($_GET['var2'])) {
                    $proveedorApellidos = $_GET['var2'];
                }
                if (isset($_GET['var3'])) {
                    $proveedorCedula = $_GET['var3'];
                }
                if (isset($_GET['var4'])) {
                    $proveedorTelefono = $_GET['var4'];
                }
                if (isset($_GET['var5'])) {
                    $proveedorCorreo = $_GET['var5'];
                }
                if (isset($_GET['var6'])) {
                    $proveedorComercio = $_GET['var5'];
                }
                ?>
            <form method="post" enctype="multipart/form-data" action="../business/ProveedorAction.php">
                <tr>
                    <?php
                    echo '<td><input required type="hidden" name="tbproveedorid" id="tbproveedorid" value="' . $proveedorId . '" required/></td>';
                    echo '<td><input required type="text" name="tbproveedornombre" id="tbproveedornombre" value="' . $proveedorNombre . '" required/></td>';
                    echo '<td><input required type="text" name="tbproveedorapellido" id="tbproveedorapellido" value="' . $proveedorApellidos . '" required/></td>';
                    echo '<td><input required type="text" name="tbproveedorcomercio" id="tbproveedorcomercio" value="' . $proveedorComercio . '" required/></td>';
                    echo '<td><input required data-mask  ="0-0000-0000" type="text" minlength="5" maxlength="12" name="tbproveedorcedula" id="tbproveedorcedula" value="' . $proveedorCedula . '" required /></td>';
                    echo '<td><input required data-mask="0000-0000" type="text" min="10000000" max = "99999999" maxlength="10" name="tbproveedortelefono" id="tbproveedortelefono" value="' . $proveedorTelefono . '" required/></td>';
                    echo '<td><input required type="text" placeholder ="...@dominio.com" name="tbproveedorcorreo" id="tbproveedorcorreo" value="' . $proveedorCorreo . '" required/></td>';
                    ?>
                    <td><input type="submit" value="Ingresar" name="crear" id="crear" /></td>
                </tr>
            </form>

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
    </section>

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