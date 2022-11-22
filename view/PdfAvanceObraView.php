<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/Function.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avance Obras</title>
    <?php
    include '../business/ClienteBusiness.php';
    include '../business/ObrasBusiness.php';

    ?>
</head>
<body>
    <h2>Lista de Obras</h2>
    <form method="post" enctype="multipart/form-data" action="../business/PdfObraRetrasoAction.php">
        <tr>
            <td><select required name="tbclienteid" id="" required>
                    <option value="">Cliente</option>
                    <?php
                    $ClienteBusiness = new ClienteBusiness();
                    $cliente = $ClienteBusiness->getAllCliente();
                    foreach ($cliente as $tipo) { ?>
                        <option value="<?php echo $tipo->getClienteId() ?>"><?php echo $tipo->getClienteNombre() ?> <?php echo $tipo->getClienteApellidos() ?></option>
                    <?php } ?>
                </select></td>

        <tr>
            <select name="tbobraid" id="" required>
                <option value="">Obras</option>
                <?php
                $ObrasBusiness = new ObrasBusiness();
                $nombreOobras = $ObrasBusiness->getAllObra();

                foreach ($nombreOobras as $nombre) {
                    $id = $nombre->getObraId();
                    $name = $nombre->getObraNombre(); ?>
                    <option value="<?php echo $id ?>"><?php echo $name ?></option>
                <?php } ?>
            </select></td>
            <input type="submit" value="Generar PDF" name="analizar" id="analizar" /></td>
        </tr>
    </form>
    <br><br>
    <tr>
        <td></td>
        <td>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "dbError") {
                    echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                }else if ($_GET['error'] == "empty") {
                    echo '<p style="color: red">El cliente seleccionado no se encuentra registrado con el tipo de obra seleccionada!</p></center>';
                }
            } else if (isset($_GET['success'])) {
                echo '<p style="color: green">Transacción realizada</p>';
            }   
            ?>
        </td>
    </tr>

    <form action="../business/HomeAction.php" method="POST">
        <button type="submit" name="regresar"> Regresar</button>
    </form>

    <?php
    if (isset($_GET['message'])) {
        echo $_GET['message'];
    }
    ?>

</body>

</html>