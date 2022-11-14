<!DOCTYPE html>
<?php
error_reporting(0);
?>

<head>
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SalarioPeriodo</title>
    <link rel="icon" href="../resources/icons/tipoEmpleado.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/SalarioPeriodoBusiness.php';
    ?>

</head>

<body>

    <header>
    </header>
    </br>
    <table>
        <tr>
            <th>Categoria</th>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Activo</th>
            <th></th>
        </tr>

        <?php
        $SalarioPeriodoBusiness = new SalarioPeriodoBusiness();
        $allSalarioPeriodo = $SalarioPeriodoBusiness->getAllSalarioPeriodo();
        foreach ($allSalarioPeriodo as $current) {
            echo '<form method="post" enctype="multipart/form-data" action="../business/SalarioPeriodoAction.php">';
            echo '<input type="hidden" name="tbsalarioperiodoid" value="' . $current->getSalarioPeriodoId() . '">';
            echo '<td><input type="text" name="tbsalarioperiodocategoria" id="tbsalarioperiodocategoria" value="' . $current->getSalarioPeriodoCategoria() . '"/></td>';
            echo '<td><input type="text" name="tbsalarioperiodotipo" id="tbsalarioperiodotipo" value="' . $current->getSalarioPeriodoTipo() . '"/></td>';
            echo '<td><input type="text" name="tbsalarioperiododescripcion" id="tbsalarioperiododescripcion" value="' . $current->getSalarioPeriodoDescripcion() . '"/></td>';
            if ($current->getSalarioPeriodoActivo() == 1) {
                echo '<td><input type="checkbox" checked name="tbsalarioperiodoactivo" id="tbsalarioperiodoactivo" value="1"/></td>';
            } else {
                echo '<td><input type="checkbox" name="tbsalarioperiodoactivo" id="tbsalarioperiodoactivo" value="0"/></td>';
            }
            echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
            echo '<td><button onclick="eliminarSalarioPeriodo(' . $current->getSalarioPeriodoId() . ')">Eliminar</button></td>';
            echo '</tr>';
            echo '</form>';
        }
        ?>
        <tr>
            <td></td>
            <td>
                </br>
    </table>
    <section id="form">
        <table>
            <tr>
                <th></th>
                <th>Categoria</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th></th>
            </tr>
            
            <form method="post" enctype="multipart/form-data" action="../business/SalarioPeriodoAction.php">
                <tr>
                    <?php
                    echo '<td><input required type="hidden" name="tbsalarioperiodoid" id="tbsalarioperiodoid" /></td>';
                    echo '<td><select name="tbsalarioperiodocategoria" id="tbsalarioperiodocategoria" required>
                            <option value="">Seleccione el tipo fecha</option>
                            <option value="Hora">Hora</option>
                            <option value="Dia">Dia</option>
                            <option value="Semana">Semana</option>
                            <option value="Quincena">Quincena</option>
                            <option value="Mensual">Mensual</option>
                        </select></td>';
                    echo '<td><select name="tbsalarioperiodotipo" id="tbsalarioperiodotipo" required>
                            <option value="">Seleccion el tipo</option>
                            <option value="Contrato"> Por Contrato</option>
                            <option value="Periodo">Por Periodo</option>
                        </select></td>';
                    echo '<td><input required type="text"name="tbsalarioperiododescripcion" id="tbsalarioperiododescripcion"/></td>';
                    $salarioPeriodoActivo = 1;
                    if ($salarioPeriodoActivo == 1) {
                        echo '<td><input type="hidden" checked name="tbsalarioperiodoactivo" id="tbsalarioperiodoactivo" value="1"/></td>';
                    } else {
                        echo '<td><input type="hidden" name="tbsalarioperiodoactivo" id="tbsalarioperiodoactivo" value="0"/></td>';
                    }
                    ?>
                    <td><input type="submit" value="Ingresar" name="create" id="create" /></td>
                </tr>
            </form>
            
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