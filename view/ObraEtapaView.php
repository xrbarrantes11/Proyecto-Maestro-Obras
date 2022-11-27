<!DOCTYPE html>
<?php
error_reporting(0);
$id = $_GET['id'];
?>

<head>
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Etapas de la Obra</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/ObraEtapaBusiness.php';
    include '../business/ObrasBusiness.php'
    ?>

</head>

<body>

    <header>
    </header>
    
    <div id="form">
        <table>
            <tr>
                <th>Nombre Obra</th>
                <th>Nombre Etapa</th>
                <th>Descripcion</th>
                <th>Duracion Aproximada</th>
                <th></th>
            </tr>
            <?php
            $ObrasBusiness = new ObrasBusiness();
            $ObraEtapaBusiness = new ObraEtapaBusiness();
            $allObraEtapa = $ObraEtapaBusiness->getAllObraEtapa($id);
            foreach ($allObraEtapa as $current) {
                echo '<form method="post" enctype="multipart/form-data" action="../business/ObraEtapaAction.php">';
                echo '<input type="hidden" name="tbobraetapaid" value="' . $current->getObraEtapaId() . '">';
                echo '<td><input type="text" readonly name="tbobraid" id="tbobraid" value="' . $ObrasBusiness->getObra($current->getObraId())  . '"/></td>';
                echo '<td><input type="text"  name="tbobraetapanombre" id="tbobraetapanombre" value="' . $current->getObraEtapaNombre() . '"/></td>';
                echo '<td><input type="text" size ="60" name="tbobraetapadescricion" id="tbobraetapadescricion" value="' . $current->getObraEtapaDescripcion() . '"/></td>';
                echo '<td><input type="text" data-mask  ="00000" name="tbobraetapaduracionaproximada" id="tbobraetapaduracionaproximada" value="' . $current->getObraEtapaDuracionAproximada() . '"/></td>';
                echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                echo '<td><button onclick="eliminarObraEtapa(' . $current->getObraEtapaId() . ')">Eliminar</button></td>';
                echo '<td><input type="hidden"  name="tbobra" id="tbobra" value="' . $current->getObraId() . '"/></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>
        </table>
        </br>
        <table>

            <tr>
                <th></th>
                <th></th>
                <th>Nombre Etapa</th>
                <th>Descripcion</th>
                <th>Duracion Aproximada</th>

            </tr>

            <?php
            $tbObraEtapaId;
            $tbObraEtapaNombre = "";
            $tbObraEtapaDescripcion = "";
            $tbObraEtapaDuracionAproximada = "";

            if (isset($_GET['var2'])) {
                $tbObraEtapaNombre = $_GET['var2'];
            }
            if (isset($_GET['var3'])) {
                $tbObraEtapaDescripcion = $_GET['var3'];
            }
            if (isset($_GET['var4'])) {
                $tbObraEtapaDuracionAproximada = $_GET['var4'];
            }
            ?>
            <form method="post" enctype="multipart/form-data" action="../business/ObraEtapaAction.php">
                <tr>
                    <?php
                    echo '<td><input type="hidden" name="tbobraetapaid" id="tbobraetapaid"value="' . $tbObraEtapaId . '"/></td>';
                    echo '<td><input type="hidden" name="tbobraid" id="tbobraid"value="' . $id . '"/></td>';
                    echo '<td><input required type="text" name="tbobraetapanombre" id="tbobraetapanombre" value="' . $tbObraEtapaNombre . '"/></td>';
                    echo '<td><input required type="text" size ="60" name="tbobraetapadescricion" id="tbobraetapadescricion" value="' . $tbObraEtapaDescripcion . '"/></td>';
                    echo '<td><input required type="text" data-mask  ="0000" name="tbobraetapaduracionaproximada" id="tbobraetapaduracionaproximada" value="' . $tbObraEtapaDuracionAproximada . '"/></td>';

                    ?>
                    <td><input type="submit" value="Ingresar" name="crear" id="crear" /></td>
                </tr>
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
    </div>

    <footer>
    </footer>

    <form action="../view/ObraEtapaPrincipalView.php" method="POST">
        <button type="submit" name="regresar"> Regresar</button>
    </form>

    <?php
    if (isset($_GET['message'])) {
        echo $_GET['message'];
    }
    ?>

</body>

</html>