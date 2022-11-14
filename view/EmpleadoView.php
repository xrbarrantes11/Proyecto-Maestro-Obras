<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <title>Lista de Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../business/EmpleadoBusiness.php';
    include '../business/EmpleadoTipoBusiness.php';
    include '../business/EmpleadoTipoAsignadoBusiness.php';
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
                if (isset($_GET['var1'])) {
                    $nombre = $_GET['var1'];
                }
                echo '<input type="text" name="buscar" id = "buscar" required placeholder = "Ingresar busqueda..." value = "' . $nombre . '">';
                ?>
                <input type="button" name="search" id="search" value="Buscar" onclick="getData()">
                <ul id="lista"></ul>
            </div>
        </form>

        <table>
            <tr>

                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Tipo de Empleado</th>
                <th>Activo</th>
            </tr>
            <tbody id=buscar>
                <?php
                $EmpleadoBusiness = new EmpleadoBusiness();
                $EmpleadoTipoAsignadoBusiness = new EmpleadoTipoAsignadoBusiness();
                $allEmpleados = $EmpleadoBusiness->getAllEmpleado();
                foreach ($allEmpleados as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/EmpleadoAction.php">';
                    echo '<input type="hidden" name="tbempleadoid" value="' . $current->getEmpleadoId() . '">';
                    echo '<td><input type="text" name="tbempleadonombre" id="tbempleadonombre" value="' . $current->getEmpleadoNombre() . '"/></td>';
                    echo '<td style="display:none">' . $current->getEmpleadoNombre() . '</td>';
                    echo '<td><input type="text" name="tbempleadoapellidos" id="tbempleadoapellidos" value="' . $current->getEmpleadoApellidos() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="0-0000-0000" minlength="5" maxlength="15" name="tbempleadocedula" id="tbempleadocedula" value="' . $current->getEmpleadoCedula() . '"/></td>';
                    echo '<td><input data-mask="0000-0000" type="text" min="10000000" max = "99999999" name="tbempleadotelefono" id="tbempleadotelefono" value="' . $current->getEmpleadoTelefono() . '"/></td>';
                    echo '<td><input type="text" readonly name="tbempleadotipoempleado" id="tbempleadotipoempleado" value="' . $EmpleadoTipoAsignadoBusiness->getAllEmpleadoTipoAsignado($current->getEmpleadoId()) . '"/></td>';
                  if($current->getEmpleadoActivo() == 1){
                    echo '<td><input type="checkbox" checked name="tbempleadoactivo" id="tbempleadoactivo" value="1"/></td>';
                  }else{
                    echo '<td><input type="checkbox" name="tbempleadoactivo" id="tbempleadoactivo" value="0"/></td>';
                  }
                    echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                    echo '<td><button onclick="eliminarEmpleado(' . $current->getEmpleadoId() . ')">Eliminar</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
                <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#search").on("click", function() {
                            var value = $(buscar).val().toLowerCase();
                            $("#buscar tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
            </tbody>
            </br>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Telefono</th>
                    <th>Tipo de Empleado</th>
                </tr>
                <?php
                $empleadoId = "";
                $empleadoNombre = "";
                $empleadoApellidos = "";
                $empleadoCedula = "";
                $empleadoTelefono = "";
                $empleadoTipo = "";
                $empleadoActivo = 1;
                if (isset($_GET['var'])) {
                    $empleadoNombre = $_GET['var'];
                }
                if (isset($_GET['var2'])) {
                    $empleadoApellidos = $_GET['var2'];
                }
                if (isset($_GET['var3'])) {
                    $empleadoCedula = $_GET['var3'];
                }
                if (isset($_GET['var4'])) {
                    $empleadoTelefono = $_GET['var4'];
                }
                if (isset($_GET['var5'])) {
                    $empleadoTipo = $_GET['var5'];
                }
                if (isset($_GET['var6'])) {
                    $empleadoActivo = $_GET['var6'];
                }
                ?>
                <form method="post" enctype="multipart/form-data" action="../business/EmpleadoAction.php">
                    <tr>
                    <?php
                        echo '<td><input required type="text" name="tbempleadonombre" id="tbempleadonombre" value="' . $empleadoNombre . '"/></td>';
                        echo '<td><input required type="text" name="tbempleadoapellidos" id="tbempleadoapellidos" value="' . $empleadoApellidos . '"/></td>';
                        echo '<td><input required data-mask ="0-0000-0000" type="text" name="tbempleadocedula" id="tbempleadocedula" value="' . $empleadoCedula . '"  maxlength="15" minlength="9"/></td>';
                        echo '<td><input required data-mask ="0000-0000" type="text" name="tbempleadotelefono" id="tbempleadotelefono" value=" ' . $empleadoTelefono . '"   min="10000000" max = "99999999"/></td>';
                        ?>
                        <td><select name="tbempleadotipoempleado" id="" required>
                                <option value="">Seleccionar el tipo de empleado</option>
                                <?php
                                $EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                                $tipoEmpleado = $EmpleadoTipoBusiness->getAllEmpleadoTipo();
                                foreach ($tipoEmpleado as $tipo) { ?>
                                <option value="<?php echo $tipo->getEmpleadoTipoId() ?>"><?php echo $tipo->getEmpleadoTipoNombre() ?></option>
                                <?php } ?>
                            </select></td>
                        <?php
                        if($empleadoActivo == 1){
                            echo '<td><input type="hidden" checked name="tbempleadoactivo" id="tbempleadoactivo" value="' . $empleadoActivo . '"/></td>';
                          }else{
                            echo '<td><input type="hidden" name="tbempleadoactivo" id="tbempleadoactivo" value="' . $empleadoActivo . '"/></td>';
                          }
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
                        } else if ($_GET['error'] == "stringFormat") {
                            echo '<p style="color: red">Error, formato de palabra</p>';
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