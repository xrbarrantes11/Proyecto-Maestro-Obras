<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizacion Imagen</title>
    <?php
       include '../business/ObrasBusiness.php';
       include '../business/CotizacionBusiness.php';
       include '../business/ProveedorBusiness.php';
       include '../business/CotizacionImagenBusiness.php';
    ?>
</head>
<body>
    <table>
    <tr>
        <th></th>
        <th>Proveedor</th>
        <th>Obra</th>
        <th>Imagen</th>
        <th></th>
        <th></th>
        <th>Eliminar</th>
        <th>Descargar</th>
        </tr>
        <tbody id="buscar">
        <?php
            $CotizacionBusiness = new CotizacionBusiness();
            $CotizacionImagenBusiness = new CotizacionImagenBusiness();
            $ProveedorBusiness = new ProveedorBusiness();
            $ObrasBusiness = new ObrasBusiness();
            $allCotizacion = $CotizacionBusiness->getAllCotizacion();
            foreach ($allCotizacion as $current) {
                    echo '<form method="POST" enctype="multipart/form-data" action="../business/CotizacionImagenAction.php">';
                    echo '<td><input readonly type="hidden" name="cotizacionid" id="cotizacionid" value="' . $current->getCotizacionId() . '"/></td>';
                    echo '<td><input type="text" readonly name="proveedorid" id="proveedorid" value="' . $ProveedorBusiness->getProveedor($current->getProveedorId()) . '"/></td>';
                    echo '<td><input type="text" readonly name="obraid" id="obraid" value="' . $ObrasBusiness->getObra($current->getObraId()) . '"/></td>';             
                    echo '<td><img src="../cotizacionimages/'.$CotizacionImagenBusiness->getCotizacionImagen($current->getCotizacionImagenId()).'" name="idCotizacionimagen" id="idCotizacionimagen" alt="" value="" width="150" height="150"></td>'; 
                    echo '<td><input readonly type="hidden" name="cotizacionimagenid" id="cotizacionimagenid" value="' . $CotizacionImagenBusiness->getIdCotizacionImagen($CotizacionImagenBusiness->getCotizacionImagen($current->getCotizacionImagenId())) . '"/></td>';
                    echo '<td><input readonly type="hidden" name="cotizacionimagen" id="cotizacionimagen" value="' . $CotizacionImagenBusiness->getCotizacionImagen($current->getCotizacionImagenId()) . '"/></td>';
                    echo '<td><button type="submit" name="delete" id="delete">Eliminar</button></td>';
                    echo '<td><button type="submit" name="download" id="download">Descargar</button></td>';
                    echo '</tr>';
                    echo '</form>';
               
                }
                ?>

        </tbody>
    </table>
    <br><br>
    <table>
        <tr>
        <th></th>
        <th>Proveedor</th>
        <th>Obra</th>
        <th>Imagen Cotizacion</th>
        </tr>

        <form method="post" enctype="multipart/form-data" action="../business/CotizacionImagenAction.php">
            <tr>
                <td><input required type="hidden" name="cotizacionimagenid" id="cotizacionimagenid" /></td>
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
                <td><input type="file" required name="cotizacionimagen" id="cotizacionimagen"></td>
                <td><input type="text"></td>
                <?php
                $cotizacionimagenactivo = 1;
                    if ($cotizacionimagenactivo == 1) {
                        echo '<td><input type="hidden" checked name="activoimagen" id="activoimagen" value="1"/></td>';
                    } else {
                        echo '<td><input type="hidden" name="activoimagen" id="activoimagen" value="0"/></td>';
                    }
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