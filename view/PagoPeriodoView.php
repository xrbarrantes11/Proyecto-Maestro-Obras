<!DOCTYPE html>
<?php
error_reporting(0);
?>

<head>
    <script src="../js/Function.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <title>Pago de Periodo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../business/SalarioBusiness.php';
    include '../business/EmpleadoBusiness.php';
    include '../view/SalarioAction.php';
    ?>
</head>

<table>
    <tr>
        <th></th>
        <th>Fecha Inicial</th>
        <th>Fecha Final</th>
        <th>Horas Extra</th>
        <th>Bonificacion</th>
        <th></th>
    </tr>
    <form method="post" enctype="multipart/form-data" action="../business/SalarioAction.php">
        <tr>
            <td><select name="empleadonombre" id="" required>
                    <option value="">Seleccionar el empleado</option>

                    <?php
                    $EmpleadoBusiness = new EmpleadoBusiness();
                    $empleado = $EmpleadoBusiness->getAllEmpleado();
                    foreach ($empleado as $emp) { ?>
                        <option value="<?php echo $emp->getEmpleadoNombre() ?>"><?php echo $emp->getEmpleadoNombre() ?> <?php echo $emp->getEmpleadoApellidos() ?></option>
                    <?php } ?>
                </select></td>
            <?php

            echo '<td><input required type="date" name="horainicio" id="horainicio"/></td>';
            echo '<td><input type="date" name="horafin" id="horafin"/></td>';
            echo '<td><input required size = "7" type="text"  value="" name="horasextra" id="horasextra"/></td>';
            echo '<td><input required size = "5.5" placeholder = "             %" type="text" data-mask="00000%" value="" name="bonificacion" id="bonificacion"/></td>';
            echo '<td><input type="submit" value="Pagar" name="create" id="create"/></td></tr>';
            ?>

    </form>


    <tr>
        <td></td>
        <td>
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
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#create").on("click", function() {
                    var inicio = new Date($('#horainicio').val());
                    var final = new Date($('#horafin').val());

                    if (inicio > final) {
                        alert("La fecha inicial no puede ser mayor a la fecha final");
                        event.preventDefault();
                    }
                });
            });
        </script>

<form action ="../business/HomeAction.php" method = "POST">
    <button type="submit" name="regresar"> Regresar</button>
    </form>

    <?php
    if(isset($_GET['message'])){
    echo $_GET['message'];
    }
    ?>

</html>