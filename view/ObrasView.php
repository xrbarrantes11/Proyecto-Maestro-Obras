<!DOCTYPE html>
<?php
error_reporting(0);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="../js/FunctionProyecto.js"></script>
    <title>Lista de Obras</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../business/ObrasBusiness.php';
    include '../business/ClienteBusiness.php';
    ?>
    <style type="text/css">
        ul {
            list-style-type: none;
            width: 250px;
            height: auto;
            position: absolute;
            z-index: 10;
            padding: 10px;
        }

        li {
            background-color: #EEEEEE;
            border-top: 1px solid #9e9e9e;
            padding: 10px;
            width: 100%;
            float: left;
        }
    </style>
</head>

<body>

    <header>
    </header>

    <section id="form">
        </br>   
        <form action="" method="post" autocomplete="off">
            <div>
                Buscar:
                <?php
                $nombre = "";
                if (isset($_GET['var'])) {
                    $nombre = $_GET['var'];
                }
                echo '<input type="text" name="buscarObra" id = "buscarObra" required placeholder = "Ingresar busqueda..." value = "' . $nombre . '">';
                ?>
                <input type="button" name="search" id="search" value="Buscar" onclick="getData()">
                <ul id="listaObras"></ul>
            </div>
        </form>
        </br>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cliente</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Entrega</th>
                <th>Fecha Estimada Finalización</th>
                <th>Costo Estimado</th>
                <th>Costo Finalizado</th>
                <th>Días de Finalización Anticipada</th>
                <th>Días de Finalización Atrasada</th>
                <th>Ganancia</th>
                <th>Perdida</th>
                <th>Días Estimados de Obra</th>
                <th>Estado de la Obra</th>
            </tr>
            <tbody id=buscarObra>
                <?php
                $ClienteBusiness = new ClienteBusiness();
                $ObrasBusiness = new ObrasBusiness();
                $allObra = $ObrasBusiness->getAllObra();
                foreach ($allObra as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/ObrasAction.php">';
                    echo '<input type="hidden" name="tbobraid" value="' . $current->getObraId() . '">';
                    echo '<td><input type="text" name="tbobranombre" id="tbobranombre" value="' . $current->getObraNombre() . '"/></td>';
                    echo '<td style="display:none">' . $current->getObraNombre() . '</td>';
                    echo '<td><input type="text" name="tbobradescripcion" id="tbobradescripcion" value="' . $current->getObraDescripcion() . '"/></td>';
                    echo '<td><input readonly type="text" name="tbclienteid" id="tbclienteid" value="' . $ClienteBusiness->getClienteId($current->getClienteId()) . '"/></td>';
                    echo '<td><input type="date" name="tbobrafechainicio" id="tbobrafechainicio" value="' . $current->getObraFechaInicio() . '"/></td>';
                    echo '<td><input type="date" name="tbobrafechaentrega" id="tbobrafechaentrega" value="' . $current->getObraFechaEntrega() . '"/></td>';
                    echo '<td><input type="date" name="tbobrafechaestimadofinalizacion" id="tbobrafechaestimadofinalizacion" value="' . $current->getObraFechaEstimadaFinalizacion() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="tbobracostoestimado" id="tbobracostoestimado" value="₡ ' . $current->getObraCostoEstimado() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="tbobracostofinalizado" id="tbobracostofinalizado" value="₡ ' . $current->getObraCostoFinalizado() . '"/></td>';
                    echo '<td><input type="text" name="tbobradiasfinalizacionanticipada" id="tbobradiasfinalizacionanticipada" value="' . $current->getObraDiasFinalizacionAnticipada() . '"/></td>';
                    echo '<td><input type="text" name="tbobradiasfinalizacionatrasado" id="tbobradiasfinalizacionatrasado" value="' . $current->getObraDiasFinalizacionAtrasado() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="tbobraganancia" id="tbobraganancia" value="₡ ' . $current->getObraGanancia() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="tbobraperdida" id="tbobraperdida" value="₡ ' . $current->getObraPerdida() . '"/></td>';
                    echo '<td><input type="text" name="tbobradiasestimadoobra" id="tbobradiasestimadoobra" value="' . $current->getObraDiasEstimadoObra() . '"/></td>';
                    if($current->getObraFinalizada() == 1){
                    echo '<td><input type="text" readonly name="tbobrafinalizada" id="tbobrafinalizada" value="Finalizada"/></td>';
                    }else{
                    echo '<td><input type="text" readonly name="tbobrafinalizada" id="tbobrafinalizada" value="Pendiente"/></td>';
                    }
                    echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                    echo '<td><button onclick="eliminarObra(' . $current->getObraId() . ')">Eliminar</button></td>';
                    echo '<td><input type="hidden" name="tbcliente" id="tbcliente" value="' . $current->getClienteId() . '"/></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
        <table>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cliente</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Entrega</th>
                <th>Fecha Estimada Finalización</th>
                <th>Costo Estimado</th>
                <th>Costo Finalizado</th>
                <th>Días de Finalización Anticipada</th>
                <th>Días de Finalización Atrasada</th>
                <th>Ganancia</th>
                <th>Perdida</th>
                <th>Días Estimados de Obra</th>
            </tr>
            <?php
                $obraId;
                $obraNombre = "";
                $obraDescripcion = "";
                $obraCliente = "";
                $obraFechaInicio = "";
                $obraFechaEntrega = "";
                $obraFechaEstimada = "";
                $obraCostoEstimado = "";
                $obraCostoFinalizado = "";
                $obraFinalizacionAnticipada = "";
                $obraFinalizacionAtrasada = "";
                $obraGanancia = "";
                $obraPerdida = "";
                $obraDiasEstimados = "";
                if (isset($_GET['var0'])) {
                    $obraNombre = $_GET['var0'];
                }
                if (isset($_GET['var2'])) {
                    $obraDescripcion = $_GET['var2'];
                }
                if (isset($_GET['var3'])) {
                    $obraCliente = $_GET['var3'];
                }
                if (isset($_GET['var4'])) {
                    $obraFechaInicio = $_GET['var4'];
                }
                if (isset($_GET['var5'])) {
                    $obraFechaEntrega = $_GET['var5'];
                }
                if (isset($_GET['var6'])) {
                    $obraFechaEstimada = $_GET['var6'];
                }
                if (isset($_GET['var7'])) {
                    $obraCostoEstimado = $_GET['var7'];
                }
                if (isset($_GET['var8'])) {
                    $obraCostoFinalizado = $_GET['var8'];
                }
                if (isset($_GET['var9'])) {
                    $obraFinalizacionAnticipada = $_GET['var9'];
                }
                if (isset($_GET['var10'])) {
                    $obraFinalizacionAtrasada = $_GET['var10'];
                }
                if (isset($_GET['var11'])) {
                    $obraGanancia = $_GET['var11'];
                }
                if (isset($_GET['var12'])) {
                    $obraPerdida = $_GET['var12'];
                }
                if (isset($_GET['var13'])) {
                    $obraDiasEstimados = $_GET['var13'];
                }
                ?>
            <form method="post" enctype="multipart/form-data" action="../business/ObrasAction.php">
                <tr>
                    <?php
                    echo '<td><input type="hidden" name="tbobraid" id="tbobraid" value="' . $obraId . '"/></td>';
                    echo '<td><input required type="text" name="tbobranombre" id="tbobranombre" value="' . $obraNombre . '"/></td>';
                    echo '<td><input required type="text" name="tbobradescripcion" id="tbobradescripcion" value="' . $obraDescripcion .'"/></td>';
                    ?>
                    <td><select required name="tbclienteid" id="tbclienteid" required>
                            <option value="">Seleccionar el cliente</option>
                            <?php
                            $ClienteBusiness = new ClienteBusiness();
                            $cliente = $ClienteBusiness->getAllCliente();
                            foreach ($cliente as $tipo) { ?>
                                <option value="<?php echo $tipo->getClienteId() ?>"><?php echo $tipo->getClienteNombre() ?> <?php echo $tipo->getClienteApellidos() ?></option>
                            <?php } ?>
                        </select></td>
                        <?php
                        echo '<td><input required type="date" name="tbobrafechainicio" id="tbobrafechainicio" value="' . $obraFechaInicio . '"/></td>';
                        echo '<td><input type="date" name="tbobrafechaentrega" id="tbobrafechaentrega" value="' . $obraFechaEntrega . '"/></td>';
                        echo '<td><input type="date" name="tbobrafechaestimadofinalizacion" id="tbobrafechaestimadofinalizacion" value="' . $obraFechaEstimada . '"/></td>';
                        echo '<td><input required type="text" data-mask  ="₡ #.##0,00" value = "0" name="tbobracostoestimado" id="tbobracostoestimado" value="₡ ' . $obraCostoEstimado . '"/></td>';
                        echo '<td><input required type="text" data-mask  ="₡ #.##0,00" value = "0" name="tbobracostofinalizado" id="tbobracostofinalizado" value="₡ ' . $obraCostoFinalizado . '"/></td>';
                        echo '<td><input required type="text" name="tbobradiasfinalizacionanticipada" value = "0" id="tbobradiasfinalizacionanticipada" value="' . $obraFinalizacionAnticipada . '"/></td>';
                        echo '<td><input required type="text" name="tbobradiasfinalizacionatrasado" value = "0" id="tbobradiasfinalizacionatrasado" value="' . $obraFinalizacionAtrasada . '"/></td>';
                        echo '<td><input required type="text" data-mask  ="₡ #.##0,00" value = "0" name="tbobraganancia" id="tbobraganancia" value="₡ ' . $obraGanancia . '"/></td>';
                        echo '<td><input required type="text" data-mask  ="₡ #.##0,00" value = "0" name="tbobraperdida" id="tbobraperdida" value="₡ ' . $obraPerdida . '"/></td>';
                        echo '<td><input required type="text" name="tbobradiasestimadoobra" value = "0" id="tbobradiasestimadoobra" value="' . $obraDiasEstimados .'"/></td>';
                        echo '<td><input required type="hidden" name="tbobrafinalizada" id="tbobrafinalizada" value="0"/></td>';
                        ?>
                    <td><input type="submit" value="Ingresar" name="crear" id="crear" /></td>
                </tr>
            </form>
        </table>
                <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#search").on("click", function() {
                            var value = $(buscarObra).val().toLowerCase();
                            $("#buscarObra tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
            </tbody>
            </br>

            <tr>
                <td></td>
                <td>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "stringFormat") {
                            echo '<p style="color: red">Error, formato de palabra</p>';
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

    
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#crear").on("click", function() {
                var inicio = new Date($('#tbobrafechainicio').val());
                var entrega = new Date($('#tbobrafechaentrega').val());
                var fin = new Date($('#tbobrafechaestimadofinalizacion').val());

                if (inicio < entrega) {
                    alert("La fecha de inicio no puede ser mayor a la fecha de entrega");
                    event.preventDefault();
                }else if(inicio > fin){
                    alert("La fecha de inicio no puede ser mayor a la fecha estimada de finalización");
                    event.preventDefault();
                }else if(entrega > fin){
                    alert("La fecha de entrega no puede ser mayor a la fecha estimada de finalización");
                    event.preventDefault();
                }
            });
        });
    </script>

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