<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/Function.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma Pagos</title>
    <?php
    include '../business/EmpleadoBusiness.php';
    include '../business/EmpleadoTipoBusiness.php';
    include '../business/JornadaSemanalBusiness.php';
    include '../business/JornadaSemanalDetalleBusiness.php';
    include '../domain/JornadaSemanalDetalle.php';

    ?>
</head>

<body>
    <h2>Cromograma Semanal de Pagos</h2>
    <form method="post" enctype="multipart/form-data" action="../business/JornadaSemanalDetalleAction.php">
        <tr>
            <select name="tbempleadoid" id="" required>
                <option value="">Empleados</option>
                <?php
                $EmpleadoBusiness = new EmpleadoBusiness();
                $nombreEmpleado = $EmpleadoBusiness->getAllEmpleado();

                foreach ($nombreEmpleado as $nombre) {
                    $id = $nombre->getEmpleadoId();
                    $name = $nombre->getEmpleadoNombre();
                    $apellido = $nombre->getEmpleadoApellidos(); ?>
                    <option value="<?php echo $id ?>"><?php echo $name ?> <?php echo $apellido ?></option>
                <?php } ?>
            </select></td>
            <input type="submit" value="Mostrar" name="mostrar" id="mostrar" /></td>
        </tr>
    </form>
    <br><br>
    <div id='pai'>
        <div>
            <table border="1" cellspacing="0">
                <tr>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Monto Ganado</th>
                    <th>Tipo de Empleado</th>
                    <th>Cantidad de Horas</th>
                    <th>Cantidad de Días</th>
                    <th>Semana</th>
                    <th>Tarea</th>
                </tr>
                <tbody>
                    <?php
                    $JornadaSemanalBusiness = new JornadaSemanalBusiness();
                    $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                    $idEmpleado = 0;
                    if (isset($_GET['id'])) {
                        $idEmpleado = $_GET['id'];
                    }
                    $allJornadas = $JornadaSemanalBusiness->getAllJornadaSemanal($idEmpleado);
                    foreach ($allJornadas as $current) {
                        echo '<input type="hidden" name="tbjornadasemanaldetalleid" value="' . $current->getJornadaSemanalDetalleId() . '">';
                        echo '<input type="hidden" name="tbjornadasemanalid" value="' . $current->getJornadaSemanalId() . '">';
                        echo '<td><input type="text" readonly name="tbjornadasemanaldetallefechainicio" id="tbjornadasemanaldetallefechainicio" value="' . $current->getJornadaSemanalFechaInicio() . '"/></td>';
                        echo '<td><input type="text" readonly name="tbjornadasemanaldetallefechafin" id="tbjornadasemanaldetallefechafin" value="' . $current->getJornadaSemanalFechaFin() . '"/></td>';
                        echo '<td><input type="text" readonly name="tbjornadasemanaldetallemontoganadoactividad" id="tbjornadasemanaldetallemontoganadoactividad" value="' . $current->getJornadaSemanalSumatoriaMontosActividades() . '"/></td>';
                        echo '<td><input type="text" readonly name="tbjornadasemanaldetalletipoempleado" id="tbjornadasemanaldetalletipoempleado" value="' . $EmpleadoTipoBusiness->getEmpleadoTipo($current->getJornadaSemanalTipoEmpleado()) . '"/></td>';
                        echo '<td><input type="text" readonly name="tbjornadasemanaldetallecantidadhoras" id="tbjornadasemanaldetallecantidadhoras" value="' . $current->getCantHoras() . '"/></td>';
                        echo '<td><input type="text" readonly name="tbjornadasemanaldetallecantidaddias" id="tbjornadasemanaldetallecantidaddias" value="' . $current->getCantDias() . '"/></td>';
                        if ($current->getPorSemana() == 1) {
                            echo '<td><input type="checkbox" readonly checked name="tbjornadasemanaldetalleporsemana" id="tbjornadasemanaldetalleporsemana" value="1"/></td>';
                        } else {
                            echo '<td><input type="checkbox" readonly name="tbjornadasemanaldetalleporsemana" id="tbjornadasemanaldetalleporsemana" value="0"/></td>';
                        }
                        if ($current->getPorTarea() == 1) {
                            echo '<td><input type="checkbox" readonly checked name="tbjornadasemanaldetalleportarea" id="tbjornadasemanaldetalleportarea" value="1"/></td>';
                        } else {
                            echo '<td><input type="checkbox" readonly name="tbjornadasemanaldetalleportarea" id="tbjornadasemanaldetalleportarea" value="0"/></td>';
                        }
                        echo '</tr>';
                        echo '</form>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <tr>
        <td></td>
        <td>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "dbError") {
                    echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                }
            } else if (isset($_GET['success'])) {
                echo '<p style="color: green">Transacción realizada</p>';
            }
            ?>
        </td>
    </tr>
    
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