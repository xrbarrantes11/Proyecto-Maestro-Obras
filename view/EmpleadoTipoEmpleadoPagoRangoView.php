<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/FunctionProyectos.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rango pago por hora de un tipo de empleado</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../business/EmpleadoTipoEmpleadoPagoRangoBusiness.php';
    include '../business/EmpleadoTipoBusiness.php';
    ?>
</head>

<body>

    <header>
    </header>


    <section id="form">
        </br>
        <table>
            <tr>
                <th></th>
                <th>Tipo de Empleado</th>
                <th>Rango Inferior</th>
                <th>Rango Superior</th>
            </tr>
            <tbody id=buscar>
                <?php
                $EmpleadoTipoEmpleadoPagoRangoBusiness = new EmpleadoTipoEmpleadoPagoRangoBusiness();
                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                $allPagoRangoEmpleado = $EmpleadoTipoEmpleadoPagoRangoBusiness->getAllEmpleadoTipoEmpleadoPagoRango();
                foreach ($allPagoRangoEmpleado as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoEmpleadoPagoRangoAction.php">';
                    echo '<td><input type="text" hidden name="empleadotiporangoid" id="empleadotiporangoid" value="' . $current->getEmpleadoTipoEmpleadoPagoRangoId() . '"/></td>';
                    echo '<td><input type="text" readonly name="empleadotipoid" id="empleadotipoid" value="' . $EmpleadoTipoBusiness->getEmpleadoTipo($current->getEmpleadoTipoId()) . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="rangoinferior" id="rangoinferior" value="₡ ' . $current->getEmpleadoTipoEmpleadoPagoRangoInferior() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="rangosuperior" id="rangosuperior" value="₡ ' . $current->getEmpleadoTipoEmpleadoPagoRangoSuperior() . '"/></td>';
                    echo '<td><input type="submit" value="Actualizar" name="actualiza" id="actualiza"/></td>';
                    echo '<td><button onclick="eliminarPagoRangoTipoEmpleado(' . $current->getEmpleadoTipoId() . ')">Eliminar</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
            </tbody>
            </br>
            <table>
                <tr>
                    <th></th>
                </tr>
                <th>Tipo de Empleado</th>
                <th>Rango Inferior</th>
                <th>Rango Superior</th>
                </tr>

                <form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoEmpleadoPagoRangoAction.php">
                    <tr>
                        <td><select name="empleadotipoid" id="" required>
                                <option value="">Seleccionar el tipo de empleado</option>
                                <?php
                                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                                $tipoEmpleado = $EmpleadoTipoBusiness->getAllEmpleadoTipo();
                                foreach ($tipoEmpleado as $tipo) { ?>
                                    <option value="<?php echo $tipo->getEmpleadoTipoId() ?>"><?php echo $tipo->getEmpleadoTipoNombre() ?></option>
                                <?php } ?>
                            </select></td>
                            <td><input required type="text" data-mask  ="₡ #.##0,00" name="rangoinferior" id="rangoinferior" value="₡ " min="1" max="99999999" /></td>
                            <td><input required type="text" data-mask  ="₡ #.##0,00" name="rangosuperior" id="rangosuperior" value="₡ " min="1" max="99999999" /></td>
                        <td><input type="submit" value="Ingresar" name="crear" id="crear" /></td>
                    </tr>
                </form>
            </table>


            <tr>
                <td></td>
                <td>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "numberFormat") {
                            echo '<p style="color: red">Error, formato de monto</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<p style="color: red">Error al procesar la transacción</p></center>';
                        } else if ($_GET['error'] == "repite") {
                            echo '<p style="color: red">Ya existe un registro para el tipo de empleado seleccionado!</p></center>';
                        } else if ($_GET['error'] == "monto") {
                            echo '<p style="color: red">El monto inferior no puede ser mayor al  superior!</p></center>';
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