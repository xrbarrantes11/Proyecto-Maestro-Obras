<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obras</title>

    <?php
    include '../business/ObraEtapaBusiness.php';
    include '../business/ObrasBusiness.php';
    include '../business/ClienteBusiness.php';
    ?>
</head>

<body>
    <h3>Lista de Obras</h3>
    <table>
        <tr>
            <th>Obras</th>
        </tr>

        <form method="post" enctype="multipart/form-data" action="../business/ObraEtapaTipoEmpleadoAsignadoAction.php">
            <tr>
                <td><select required name="tbobraid" id="tbobraid">
                        <option value="">Seleccionar la obra</option>
                        <?php
                        $ObrasBusiness = new ObrasBusiness();
                        $obras = $ObrasBusiness->getAllObra();
                        foreach ($obras as $tipo) { ?>
                            <option value="<?php echo $tipo->getObraId() ?>"><?php echo $tipo->getObraNombre() ?> - <?php echo $ObrasBusiness->getNombreCliente($tipo->getObraId()) ?></option>
                        <?php } ?>
                    </select></td>
                <td><input type="submit" value="Gestionar información de los empleados asignados" name="gestion" id="gestion" /></td>
            </tr>
        </form>
    </table>
    <br>
    <br>
    <form action="../business/HomeAction.php" method="POST">
        <button type="submit" name="regresar"> Regresar</button>
    </form>
</body>

</html>