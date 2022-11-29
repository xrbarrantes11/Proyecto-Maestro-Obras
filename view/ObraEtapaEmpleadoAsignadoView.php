<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/FunctionProyec.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Asignar Tipo de Empleado a Obra</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../business/EmpleadoBusiness.php';
    include '../business/EmpleadoTipoBusiness.php';
    include '../business/ObraEtapaBusiness.php';
    include '../business/ObraEtapaTipoEmpleadoAsignadoBusiness.php';
    include '../business/ObrasBusiness.php';
    $idObrass = $_GET['id'];
    ?>


</head>

<body>

    <header>
    </header>

    <section id="form">
        <table>
            <tr>
                <th></th>
                <th>Etapa</th>
                <th>Nombre de Empleado</th>
                <th>Tipo de Empleado</th>
            </tr>
            <tbody>
                <?php
                $ObraEtapaBusiness = new ObraEtapaBusiness();
                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                $EmpleadoBusiness = new EmpleadoBusiness();
                $ObraTipoEmpleadoAsignado = new ObraEtapaTipoEmpleadoAsignadoBusiness();
                $AllObraTipoEmpleadoAsignado = $ObraTipoEmpleadoAsignado->getAllObraTipoEmpleadoAsignado2($idObrass);
                foreach ($AllObraTipoEmpleadoAsignado as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/ObraEtapaTipoEmpleadoAsignadoAction.php">';
                    echo '<td><input type="hidden" name="tbobraetapaempleadotipoasignadoid" value="' . $current->getObraEtapaTipoEmpleadoId() . '"/></td>';
                    echo '<td><input type="text" readonly name="etapanombreid" id="etapanombreid" value="' . $ObraEtapaBusiness->getNombreEtapa($current->getObraEtapaId()) . '"/></td>';
                    echo '<td><input type="text" readonly name="empleadonombreid" id="empleadonombreid" value="' . $EmpleadoBusiness->getNombreEmpleado($current->getEmpleadoId()) . '"/></td>';
                    echo '<td><input type="text" readonly name="empleadotipoid" id="empleadotipoid" value="' . $EmpleadoTipoBusiness->getEmpleadoTipo($current->getEmpleadoTipoId()) . '"/></td>';
                    echo '<td><button onclick="eliminarObraEtapaTipoEmpleadoAsignado(' .$current->getObraEtapaTipoEmpleadoId() . ','.$idObrass.')">Eliminar</button></td>';
                    echo '<td> <input required type="hidden" style="WIDTH: 300px; HEIGHT: 85px" name="idE" id="idE" value="' . $idObrass . '"/></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
            </tbody>
            </br>
            <table>
                <tr>
                    <th>Etapa</th>
                    <th>Nombre de Empleado</th>
                    <th>Tipo de Empleado</th>
                    <th></th>
                </tr>

                <form method="post" enctype="multipart/form-data" action="../business/ObraEtapaTipoEmpleadoAsignadoAction.php">
                    <tr>
                        <td><select name="etapanombreid" id="" required>
                                <option value="">Seleccionar la etapa</option>
                                <?php
                                $ObraEtapaBusiness = new ObraEtapaBusiness();
                                $ObrasBusiness = new ObrasBusiness();
                                $obraEtapa = $ObraEtapaBusiness->getAllObraEtapa($idObrass);
                                foreach ($obraEtapa as $tipo) { ?>
                                    <option value="<?php echo $tipo->getObraId() ?>"><?php echo $ObrasBusiness->getNombreObras($tipo->getObraId()) ?> - <?php echo $tipo->getObraEtapaNombre() ?></option>
                                <?php } ?>
                            </select></td>
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
                            <?php
                            echo'<td> <input required type="hidden" style="WIDTH: 300px; HEIGHT: 85px" name="idE" id="idE" value="' . $idObrass . '"/></td>';
                            ?>
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
                        } else if ($_GET['error'] == "repite") {
                            echo '<p style="color: red">Ya existe un registro con los datos ingresados!</p></center>';
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

    <form action="../view/ObraEmpleadoAsignadoPrincipalView.php" method="POST">
        <button type="submit" name="regresar"> Regresar</button>
    </form>

    <?php
    if (isset($_GET['message'])) {
        echo $_GET['message'];
    }
    ?>

</body>

</html>