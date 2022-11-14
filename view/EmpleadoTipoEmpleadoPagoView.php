<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Monto pago por hora de empleados</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../business/EmpleadoTipoEmpleadoPagoBusiness.php';
    include '../business/EmpleadoBusiness.php';
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
                <th>Empleado</th>
                <th>Tipo de Empleado</th>
                <th>Monto Hora</th>
            </tr>
            <tbody id=buscar>
                <?php
                $EmpleadoTipoEmpleadoPagoBusiness = new EmpleadoTipoEmpleadoPagoBusiness();
                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                $EmpleadoBusiness = new EmpleadoBusiness();
                $allPagosEmpleado = $EmpleadoTipoEmpleadoPagoBusiness->getAllEmpleadoTipoEmpleadoPago();
                foreach ($allPagosEmpleado as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoEmpleadoPagoAction.php">';
                    echo '<td><input type="text" readonly name="empleadonombreid" id="empleadonombreid" value="' . $EmpleadoBusiness->getNombreEmpleado($current->getEmpleadoNombreId()) . '"/></td>';
                    echo '<td><input type="text" readonly name="empleadotipoid" id="empleadotipoid" value="' . $EmpleadoTipoBusiness->getEmpleadoTipo($current->getEmpleadoTipoId()) . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="empleadomonto" id="empleadomonto" value="₡ ' . $current->getEmpleadoMonto() . '"/></td>';
                    echo '<td><input type="submit" value="Actualizar" name="actualiza" id="actualiza"/></td>';
                    echo '<td><button onclick="eliminarPagoEmpleado(' . $current->getEmpleadoNombreId() . ',' . $current->getEmpleadoTipoId() . ')">Eliminar</button></td>';
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
                <th>Empleado</th>
                <th>Tipo de Empleado</th>
                <th>Monto Hora</th>
                </tr>

                <form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoEmpleadoPagoAction.php">
                    <tr>
                        <td><select name="empleadonombreid" id="" required>
                                <option value="">Seleccionar el empleado</option>
                                <?php
                                $EmpleadoBusiness = new EmpleadoBusiness();
                                $empleado = $EmpleadoBusiness->getAllEmpleado();
                                foreach ($empleado as $tipo) { ?>
                                    <option value="<?php echo $tipo->getEmpleadoId() ?>"><?php echo $tipo->getEmpleadoNombre() ?> <?php echo $tipo->getEmpleadoApellidos() ?></option>
                                <?php } ?>
                            </select></td>
                        <td><select name="empleadotipoid" id="" required>
                                <option value="">Seleccionar el tipo de empleado</option>
                                <?php
                                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                                $tipoEmpleado = $EmpleadoTipoBusiness->getAllEmpleadoTipo();
                                foreach ($tipoEmpleado as $tipo) { ?>
                                    <option value="<?php echo $tipo->getEmpleadoTipoId() ?>"><?php echo $tipo->getEmpleadoTipoNombre() ?></option>
                                <?php } ?>
                            </select></td>
                        <td><input required type="text" data-mask  ="₡ #.##0,00" name="empleadomonto" id="empleadomonto" value="₡ " min="1" max="99999999" /></td>
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
                        } else if ($_GET['error'] == "valor") {
                            echo '<p style="color: red">Error, El monto debe estar dentro del rango de salario del tipo de empleado seleccionado.</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<p style="color: red">Error al procesar la transacción</p></center>';
                        } else if ($_GET['error'] == "repite") {
                            echo '<p style="color: red">Ya existe un registro con los datos ingresados!</p></center>';
                        } else if ($_GET['error'] == "empty") {
                            echo '<p style="color: red">El empleado seleccionado no se encuentra registrado con el tipo seleccionado!</p></center>';
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