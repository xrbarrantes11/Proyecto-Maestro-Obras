<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/Function.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma Pagos</title>
    <?php
    include '../business/ObrasBusiness.php';

    ?>
</head>

<body>
    <h2>Lista de Obras</h2>
    <form method="post" enctype="multipart/form-data" action="../business/PdfObraRetrasoAction.php">
        <tr>
            <select name="tbobraid" id="">
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
            <input type="submit" value="Generar PDF" name="ver" id="ver" /></td>
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
                }
            } else if (isset($_GET['success'])) {
                echo '<p style="color: green">Transacción realizada</p>';
            }
            ?>
        </td>
    </tr>
    
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