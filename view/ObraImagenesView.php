<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obra Imagenes</title>
    <?php
        include '../business/ObraImagenesBusiness.php';
        include '../business/ObrasBusiness.php';
    ?>
</head>
<body>
<table>
    <tr>
        <th></th>
        <th>Obra</th>
        <th>Imagen Obra</th>
        <th></th>
        <th></th>
        <th>Eliminar</th>
        </tr>
        <tbody id="buscar">
        <?php
            
            $ObraImagenBusiness = new ObraImagenesBusiness();
            $ObrasBusiness = new ObrasBusiness();
            $allObras = $ObraImagenBusiness->getAllObraImagenes();
            foreach ($allObras as $current) {
                    echo '<form method="POST" enctype="multipart/form-data" action="../business/ObraImagenesAction.php">';
                    echo '<td><input readonly type="hidden" name="obraimagenid" id="obraimagenid" value="' . $current->getObraImagenesId() . '"/></td>';
                    echo '<td><input type="text" readonly name="obraid" id="obraid" value="' . $ObrasBusiness->getObra($current->getObraId()) . '"/></td>';             
                    echo '<td><img src="../cotizacionimages/'.$current->getObraImagenesRuta().'" name="obraimagen[]"  alt="" value="" width="150" height="150"></td>'; 
                    echo '<td><input readonly type="hidden" name="obraimagenid" id="obraimagenid" value="' . $current->getObraImagenesId()  . '"/></td>';
                    echo '<td><input readonly type="hidden" name="obraimagen[]" value="' . $current->getObraImagenesRuta() . '"/></td>';
                    echo '<td><button type="submit" name="delete" id="delete">Eliminar</button></td>';
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
            <th>Obra</th>
            <th>Imagen Obra</th>
            </tr>

            <form method="post" enctype="multipart/form-data" action="../business/ObraImagenesAction.php">
                <tr>
                    <td><input required type="hidden" name="obraimagenid" id="obraimagenid" /></td>
                        <td><select name="obraid" id="" required>
                                <option value="">Seleccionar la obra</option>
                                <?php
                                $ObrasBusiness = new ObrasBusiness();
                                $obras = $ObrasBusiness->getAllObra();
                                foreach ($obras as $tipo) { ?>
                                    <option value="<?php echo $tipo->getObraId() ?>"><?php echo $tipo->getObraNombre() ?></option>
                                <?php } ?>
                            </select></td>
                    <td><input required type="file" name="obraimagen[]" multiple></td>
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
        <br>
        
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