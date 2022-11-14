<!DOCTYPE html>
<?php
error_reporting(0);
?>

<head>
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Catalogo de obras</title>
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/ObraCatalogoBusiness.php';
    ?>

</head>

<body>

    <header>
    </header>


    <section id="form">
        <table>

            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Activo</th>
                <th></th>
            </tr>
            <?php
            $ObraCatalogoBusiness = new ObraCatalogoBusiness();
            $allCatalogo = $ObraCatalogoBusiness->getAllObraCatalogo();
            foreach ($allCatalogo as $current) {
                echo '<form method="post" enctype="multipart/form-data" action="../business/ObraCatalogoAction.php">';
                echo '<input type="hidden" name="obracatalogoid" value="' . $current->getObraCatalogoId() . '">';
                echo '<td><input type="text" name="obracatalogonombre" id="obracatalogonombre" value="' . $current->getObraCatalogoNombre() . '"/></td>';
                echo '<td><input type="text" size ="60" name="obracatalogodescripcion" id="obracatalogodescripcion" value="' . $current->getObraCatalogoDescripcion() . '"/></td>';
                if ($current->getObraCatalogoActivo() == 1) {
                    echo '<td><input type="checkbox" checked name="obracatalogoactivo" id="obracatalogoactivo"  value="1"/></td>';
                } else {
                    echo '<td><input type="checkbox" name="obracatalogoactivo" id="obracatalogoactivo" value="0"/></td>';
                }
                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><button onclick="eliminarCatalogo(' . $current->getObraCatalogoId() . ')">Eliminar</button></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>
        </table>
        </br>
        <table>

            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th></th>
            </tr>

            <?php
            $obraCatalogoId = "";
            $obraCatalogoNombre = "";
            $obraCatalogoDescripcion = "";
            $obraCatalogoActivo = "";

            if (isset($_GET['var1'])) {
                $obraCatalogoNombre = $_GET['var1'];
            }
            if (isset($_GET['var2'])) {
                $obraCatalogoDescripcion = $_GET['var2'];
            }
            if (isset($_GET['var3'])) {
                $obraCatalogoActivo = $_GET['var3'];
            }
            ?>
            <form method="post" enctype="multipart/form-data" action="../business/ObraCatalogoAction.php">
                <tr>
                    <?php
                    echo '<td><input required type="hidden" name="obracatalogoid" id="obracatalogoid" value="0"/></td>';
                    echo '<td><input required type="text" name="obracatalogonombre" id="obracatalogonombre" value="' . $obraCatalogoNombre . '"/></td>';
                    echo '<td><input required type="text" size ="60" name="obracatalogodescripcion" id="obracatalogodescripcion" value="' . $obraCatalogoDescripcion . '"/></td>';
                    echo '<td><input type="hidden" name="obracatalogoactivo" id="obracatalogoactivo"  value="1"/></td>';
                
                 ?>
                    <td><input type="submit" value="Ingresar" name="create" id="create" /></td>
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