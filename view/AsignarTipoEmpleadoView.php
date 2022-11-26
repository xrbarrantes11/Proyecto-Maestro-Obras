<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Tipo a Empleados</title>
    <?php
    include '../business/EmpleadoBusiness.php';
    include '../business/EmpleadoTipoBusiness.php';
    include '../business/EmpleadoTipoAsignadoBusiness.php';
    ?>
    <script src="../js/FunctionProyec.js"></script>
</head>

<body>
    <h2>Asignar Tipo a Empleados</h2>
    <form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoAction.php">
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
            <input type="submit" value="Cargar" name="cargar" id="cargar" /></td>
        </tr>
    </form>
    <br><br>
    <?php
    $idEmpleado = 0;
    if (isset($_GET['id'])) {
        $idEmpleado = $_GET['id'];
    }
    echo '<input type="text" name="empleado" value="' .$EmpleadoBusiness->getNombreEmpleado($idEmpleado) . '">';
    ?>
    </br></br>
    <div>
        <div>
            <table border="1" cellspacing="0">
                <tr>
                    <th>Tipos de Empleado Asignado</th>
                </tr>
                <tbody>
                    <?php
                    $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
                    $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                    $allTipos = $EmpleadoTipoAsignadoBusiness->getAllEmpleadoTipoAsignados($idEmpleado);
                    foreach ($allTipos as $current) {
                        echo '<input type="hidden" name="idempleado" value="' . $idEmpleado . '">';
                        echo '<input type="hidden" name="idtipo" value="' . $current->getEmpleadoTipoId() . '">';
                        echo '<td><input type="text" readonly name="tipo" id="tipo" value="' . $EmpleadoTipoBusiness->getEmpleadoTipo($current->getEmpleadoTipoId()) . '"/></td>';
                        echo '<td><button onclick="eliminarTipoEmpleado(' . $current->getEmpleadoTipoId() . ','. $idEmpleado .')">Eliminar</button></td>';
                        echo '</tr>';
                        echo '</form>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div>
    <table>
                <tr>
                    <th></th>
                    <th>Tipo de Empleado</th>
                </tr>
                <form method="post" enctype="multipart/form-data" action="../business/EmpleadoTipoAsignadoAction.php">
                    <tr>
                        <?php
                            echo '<td><input required type="hidden" name="empleadoid" id="empleadoid" value="' . $idEmpleado . '"/></td>';
                        ?>
                        <td><select name="empleadotipoempleado" id="" required>
                                <option value="">Seleccionar el tipo de empleado</option>
                                <?php
                                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                                $tipoEmpleado = $EmpleadoTipoBusiness->getAllEmpleadoTipo();
                                foreach ($tipoEmpleado as $tipo) { ?>
                                <option value="<?php echo $tipo->getEmpleadoTipoId() ?>"><?php echo $tipo->getEmpleadoTipoNombre() ?></option>
                                <?php } ?>
                            </select></td>
                        <td><input type="submit" value="Ingresar" name="crear" id="crear" /></td>
                    </tr>
                </form>
            </table>
    </div>
    <tr>
        <td></td>
        <td>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "dbError") {
                    echo '<center><p style="color: red">El tipo ingresado ya se encuentra registrado para este empleado!</p></center>';
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