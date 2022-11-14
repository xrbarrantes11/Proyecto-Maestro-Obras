<!DOCTYPE html>
<?php
error_reporting(0);
       
?>
<head>
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Activar Empleados</title>
    <link rel="icon" href="../resources/icons/tipoEmpleado.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/EmpleadoTipoBusiness.php'; 
    include '../business/EstadoEmpleadoBusiness.php';
    include '../business/EmpleadoTipoAsignadoBusiness.php';
    ?>

</head>

<body>

    <header> 
    </header>


    <section id="form">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de Empleado</th>
                <th>Estado</th>
                <th></th>
            </tr>
            <?php
            $EstadoEmpleadoBusiness = new EstadoEmpleadoBusiness();
            $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
            $allEmpleados = $EstadoEmpleadoBusiness->getEmpleados();
            foreach ($allEmpleados as $current) {
                echo '<form method="post" enctype="multipart/form-data" action="../business/EstadoEmpleadoAction.php">';
                echo '<input type="hidden" name="empleadoid" value="' . $current->getEmpleadoId() . '">';
                echo '<tr>';
                echo '<td><input type="text" readonly name="empleadonombre" id="empleadonombre" value="' . $current->getEmpleadoNombre() . '"/></td>';
                echo '<td><input type="text" readonly name="empleadoapellidos" id="empleadoapellidos" value="' . $current->getEmpleadoapellidos() . '"/></td>';
                echo '<td><input type="text" readonly name="empleadotipoempleado" id="empleadotipoempleado" value="' . $EmpleadoTipoAsignadoBusiness->getAllEmpleadoTipoAsignado($current->getEmpleadoId()) . '"/></td>';
                if($current->getEmpleadoActivo() == 1){
                    echo '<td><input type="checkbox" checked name="empleadoactivo" id="empleadoactivo" value="1"/></td>';
                  }else{
                    echo '<td><input type="checkbox" name="empleadoactivo" id="empleadoactivo" value="0"/></td>';
                  }
                echo '<td><button onclick="activarEmpleado('. $current->getEmpleadoId() .','. $current->getEmpleadoActivo() .')">Cambiar Estado</button></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>


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