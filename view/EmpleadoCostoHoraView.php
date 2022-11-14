<!DOCTYPE html>

<?php
error_reporting(0);       
?>
<head>
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Empleados</title>
    <link rel="icon" href="../resources/icons/tipoEmpleado.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../business/EmpleadoBusiness.php';
    include '../business/EmpleadoTipoAsignadoBusiness.php';
    include '../business/EmpleadoTipoBusiness.php'; 
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

    <header> 
    </header>


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
                echo '<input type="text" name="buscarHora" id = "buscarHora" required placeholder = "Ingresar busqueda..." value = "' . $nombre . '">';
                ?>
                <input type="button" name="search" id="search" value="Buscar" onclick="getData()">
                <ul id="listaEmpleado"></ul>
            </div>
        </form>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Tipo Empleado</th>
                <th>Accion</th>
                <th></th>
            </tr>
            <form method="post" enctype="multipart/form-data" action="../business/EmpleadoCostoHoraAction.php">
                <tr>
                </tr>
            </form>
            <tbody id=buscarHora>
            <?php
            $empleadoBusiness = new EmpleadoBusiness();
            $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
            $allEmpleados = $empleadoBusiness->getAllEmpleado();
            foreach ($allEmpleados as $current) {
                
                echo '<form method="post" enctype="multipart/form-data" action="../business/EmpleadoCostoHoraAction.php">'; 
                echo '<input type="hidden" readonly name="tbempleadoid" value="' . $current->getEmpleadoId() . '">';
                echo '<td style="display:none">' . $current->getEmpleadoNombre() . '</td>';
                echo '<td><input type="text" readonly name="tbempleadonombre" id="tbempleadonombre" value="' . $current->getEmpleadoNombre() . '"/></td>';
                echo '<td><input type="text" readonly name="tbempleadoapellidos" id="tbempleadoapellidos" value="' . $current->getEmpleadoApellidos() . '"/></td>';
                echo '<td><input type="text" readonly name="tbempleadocedula" id="tbempleadocedula" value="' . $current->getEmpleadoCedula() . '"/></td>';
                echo '<td><input type="text" readonly name="tbempleadotipoempleado" id="tbempleadotipoempleado" value="' . $EmpleadoTipoAsignadoBusiness->getAllEmpleadoTipoAsignado($current->getEmpleadoId()) . '"/></td>';
                echo '<td><input type="submit" value="Ingresar Horas" name="seleccionar" id="seleccionar"/></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>
                <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#search").on("click", function() {
                            var value = $(buscarHora).val().toLowerCase();
                            $("#buscarHora tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
            </tbody>

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