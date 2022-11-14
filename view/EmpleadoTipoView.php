<!DOCTYPE html>
<?php
error_reporting(0);
?>

<head>
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tipo Empleados</title>
    <link rel="icon" href="../resources/icons/tipoEmpleado.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="https://jsuites.net/v4/jsuites.js"></script>
   
    <?php
    include '../business/EmpleadoTipoBusiness.php';
    ?>

</head>

<body>

    <header>
    </header>
    </br>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Activo</th>
            <th>Salario Base</th>
            <th></th>
        </tr>

        <?php
        $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
        $allEmpleados = $EmpleadoTipoBusiness->getAllEmpleadoTipo();
        foreach ($allEmpleados as $current) {
            echo '<form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoAction.php">';
            echo '<input type="hidden" name="empleadotipoid" value="' . $current->getEmpleadoTipoId() . '">';
            echo '<td><input type="text" name="empleadotiponombre" id="empleadotiponombre" value="' . $current->getEmpleadoTipoNombre() . '"/></td>';
            echo '<td><input type="text" size = "60" name="empleadotipodescripcion" id="empleadotipodescripcion" value=" ' . $current->getEmpleadoTipoDescripcion() . '"/></td>';
            if ($current->getEmpleadoTipoActivo() == 1) {
                echo '<td><input type="checkbox" checked name="empleadotipoactivo" id="empleadotipoactivo" value="1"/></td>';
            } else {
                echo '<td><input type="checkbox" name="empleadotipoactivo" id="empleadotipoactivo" value="0"/></td>';
            }
            echo '<td><input type="text" min="1000" data-mask  ="₡ #.##0,00" max = "99999999" name="empleadotiposalariobase" id="empleadotiposalariobase" value="₡ ' . $current->getEmpleadoTipoSalarioBase() . '"/></td>';
            echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
            echo '<td><button onclick="deleteEmpleadoTipo(' . $current->getEmpleadoTipoId() . ')">Eliminar</button></td>';
            echo '</tr>';
            echo '</form>';
        }
        ?>
        <tr>
            <td></td>
            <td>
                </br>
    </table>
    <section id="form">
        <table>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Salario Base</th>
                <th></th>
            </tr>
            <?php
            $empleadoTipoId = "";
            $empleadoTipoNombre = "";
            $empleadoTipoDescripcion = "";
            $empleadoTipoActivo = 1;
            $empleadoTipoSalarioBase = "";


            if (isset($_GET['var1'])) {
                $empleadoTipoNombre = $_GET['var1'];
            }
            if (isset($_GET['var2'])) {
                $empleadoTipoDescripcion = $_GET['var2'];
            }
            if (isset($_GET['var3'])) {
                $empleadoTipoActivo = $_GET['var3'];
            }
            if (isset($_GET['var4'])) {
                $empleadoTipoSalarioBase = $_GET['var4'];
            }
            ?>
            <form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoAction.php">
                <tr>
                    <?php
                    echo '<td><input required type="hidden" name="empleadotipoid" id="empleadotipoid" value="' . $empleadoTipoId . '"/></td>';
                    echo '<td><input required  type="text" name="empleadotiponombre" id="empleadotiponombre"  value="' . $empleadoTipoNombre . '"/></td>';
                    echo '<td><input required size = "60" type="text"name="empleadotipodescripcion" id="empleadotipodescripcion" value="' . $empleadoTipoDescripcion . '"/></td>';
                    echo '<td><input required type="text" data-mask  ="₡ #.##0,00" name="empleadotiposalariobase" id="empleadotiposalariobase" value=₡ ' . $empleadoTipoSalarioBase . '"   min="1000" max = "99999999"/></td>';
                    ?>
                    <?php
                    if ($empleadoTipoActivo == 1) {
                        echo '<td><input type="hidden" checked name="empleadotipoactivo" id="empleadotipoactivo"  value="' . $empleadoTipoActivo . '"/></td>';
                    } else {
                        echo '<td><input type="hidden" name="empleadotipoactivo" id="empleadotipoactivo"  value="' . $empleadoTipoActivo . '"/></td>';
                    }
                    ?>
                    <td><input type="submit" value="Ingresar" name="create" id="create" /></td>
                </tr>
            </form>
            
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyField") {
                    echo '<p style="color: red">Campo(s) vacio(s)</p>';
                } else if ($_GET['error'] == "numberFormat") {
                    echo '<p style="color: red">Error, formato de numero</p>';
                } else if ($_GET['error'] == "dbError") {
                    echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                }
            } else if (isset($_GET['success'])) {
                echo '<p style="color: green">Transacción realizada</p>';
            }
            ?>
            </td>
            </tr>
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