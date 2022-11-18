<!DOCTYPE html>

<head>
    <script src="../js/FunctionProyectos.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Finalizar Obras</title>
    <link rel="icon" href="../resources/icons/tipoEmpleado.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/ObrasBusiness.php';
    include '../business/ClienteBusiness.php';
    ?>

</head>

<body>
<h1>Finalizar Obra</h1>

    <section id="form">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Cliente</th>
                <th></th>
            </tr>
            <?php
            $ClienteBusiness = new ClienteBusiness();
            $ObrasBusiness = new ObrasBusiness();
            $allObras = $ObrasBusiness->getObrasPendientes();
            foreach ($allObras as $current) {
                echo '<form method="post" enctype="multipart/form-data" action="">';
                echo '<input type="hidden" name="obraid" value="' . $current->getObraId() . '">';
                echo '<tr>';
                echo '<td><input type="text" readonly name="obranombre" id="obranombre" value="' . $current->getObraNombre() . '"/></td>';
                echo '<td><input type="text" readonly name="obradescripcion" id="obradescripcion" value="' . $current->getObraDescripcion() . '"/></td>';
                echo '<td><input type="text" readonly name="obracliente" id="obracliente" value="' . $ClienteBusiness->getClienteId($current->getClienteId()) . '"/></td>';
                if($current->getObraFinalizada() == 1){
                    echo '<td><input type="text" readonly name="obrafinalizada" id="obrafinalizada" value="Finalizada"/></td>';
                  }else{
                    echo '<td><input type="text" readonly name="obrafinalizada" id="obrafinalizada" value="Pendiente"/></td>';
                  }
                echo '<td><button onclick="finalizarObra('. $current->getObraId() .')">FinalizarObra</button></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>


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