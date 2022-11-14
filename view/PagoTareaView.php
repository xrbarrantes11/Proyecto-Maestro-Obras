<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <script src="../js/Function.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agregar Pago Semanal</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
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
                <th>Tipo Empleado</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th></th>
                <th>Monto Ganado</th>
                <th></th>
            </tr>
            <form method="post" enctype="multipart/form-data" action="../business/PagoTareaAction.php">
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
                    <?php
                    echo '<td><input required type="date" name="fechainicio" id="fechainicio" value=""/></td>';
                    echo '<td><input required type="date" name="fechafin" id="fechafin" value=""/></td>';
                    echo '<td><input required data-mask="000000" type="hidden" name="tarea" id="tarea" value="1"   min="1" max = "99999999"/></td>';
                    echo '<td><input required data-mask  ="₡ #.##0,00" type="text" name="montos" id="montos" value="₡ "   min="1" max = "99999999"/></td>';

                    ?>
                    <td><input type="submit" value="Ingresar" name="create" id="create" /></td>
                </tr>
            </form>
        </table>

        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#create").on("click", function() {
                    var inicio = new Date($('#fechainicio').val());
                    var final = new Date($('#fechafin').val());

                    if (inicio > final) {
                        alert("La fecha inicial no puede ser mayor a la fecha final");
                        event.preventDefault();
                    }
                });
            });
        </script>


        <tr>
            <td></td>
            <td>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyField") {
                        echo '<p style="color: red">Campo(s) vacio(s)</p>';
                    } else if ($_GET['error'] == "empty") {
                        echo '<p style="color: red">Error, Empleado no coincide con el tipo seleccionado!</p>';
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