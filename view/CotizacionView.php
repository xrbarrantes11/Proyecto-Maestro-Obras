<!DOCTYPE html>

<html lang="en">

<head>
    <script src="../js/Function.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones</title>

    <?php
    include '../business/ObrasBusiness.php';
    include '../business/CotizacionBusiness.php';
    include '../business/ProveedorBusiness.php';
    include '../business/CotizacionImagenBusiness.php';
    ?>

</head>

<body>

    <section id="form">
        <table>

            <tr>
                <th></th>
                <th>Proveedor</th>
                <th>Obra</th>
                <th>Imagen</th>
                <th></th></tr>
                <?php
                $CotizacionBusiness = new CotizacionBusiness();
                $ProveedorBusiness = new ProveedorBusiness();
                $ObrasBusiness = new ObrasBusiness();
                $allCotizacion = $CotizacionBusiness->getAllCotizacion();
                foreach ($allCotizacion as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/CotizacionAction.php">';
                    echo '<td><input readonly type="hidden" name="cotizacionid" id="cotizacionid" value="' . $current->getCotizacionId() . '"/></td>';
                    echo '<td><input type="text" readonly name="proveedorid" id="proveedorid" value="' . $ProveedorBusiness->getProveedor($current->getProveedorId()) . '"/></td>';
                    echo '<td><input type="text" readonly name="obraid" id="obraid" value="' . $ObrasBusiness->getObra($current->getObraId()) . '"/></td>';
                    echo '<td><button onclick="eliminarCotizacion(' . $current->getCotizacionId() . ')">Eliminar</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th></th>
                <th>Proveedor</th>
                <th>Obra</th>
                <th>Imagen</th>
                <th></th>
            </tr>
            <form method="post" enctype="multipart/form-data" action="../business/CotizacionAction.php">
                <tr>
                    <td><input required type="hidden" name="cotizacionid" id="cotizacionid" /></td>
                    <td><select name="proveedorid" id="" required>
                            <option value="">Seleccionar el proveedor</option>
                            <?php
                            $ProveedorBusiness = new ProveedorBusiness();
                            $proveedores = $ProveedorBusiness->getAllProveedor();
                            foreach ($proveedores as $tipo) { ?>
                                <option value="<?php echo $tipo->getProveedorId() ?>"><?php echo $tipo->getProveedorNombre() ?> <?php echo $tipo->getProveedorApellido() ?></option>
                            <?php } ?>
                        </select></td>
                    <td><select name="obraid" id="" required>
                            <option value="">Seleccionar la obra</option>
                            <?php
                            $ObrasBusiness = new ObrasBusiness();
                            $obras = $ObrasBusiness->getAllObra();
                            foreach ($obras as $tipo) { ?>
                                <option value="<?php echo $tipo->getObraId() ?>"><?php echo $tipo->getObraNombre() ?></option>
                            <?php } ?>
                        </select></td>
                        <td><input type="file" name="cotizacionImagen" id=cotizacionImagen></td>
                        <td><input type="submit" value="Ingresar" name="crear" id="crear"/></td>
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