<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="../js/FunctionProyecto.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Etapa de materiales</title>
    <script src="https://jsuites.net/v4/jsuites.js"></script>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../business/ObraEtapaMaterialesBusiness.php';
    include '../business/ObraEtapaBusiness.php';
    //include '../business/EmpleadoTipoBusiness.php';
    ?>
</head>

<body>

    <header>
    </header>


    <section id="form">
        </br>
        <table>
            <tr>
            <th> </th>
                <th>Nombre etapa</th>
                <th>Materiales</th>
                <th>Cantidad Materiales</th>
                <th>Costo aproximado</th>
            
            </tr>
            <tbody id=buscar>
                <?php
                $ObraEtapaMaterialesBusiness = new ObraEtapaMaterialesBusiness();
                //$EmpleadoTipoBusiness = new EmpleadoTipoBusiness();
                $ObraEtapaBusiness = new ObraEtapaBusiness();
                $allObrasEtapaMateriales = $ObraEtapaMaterialesBusiness->getAllObraEtapaMateriales();
                foreach ($allObrasEtapaMateriales as $current) {
                    echo '<form method="post" enctype="multipart/form-data" action="../business/ObraEtapaMaterialesAction.php">';
                    echo '<td><input type="hidden" readonly name="etapamaterialid" id="etapamaterialid" value="' . $current->getObraEtapaMaterialesId(). '"/></td>';
                    echo '<td><input type="text" readonly name="nombreetapa" id="nombreetapa" value="' . $ObraEtapaBusiness->getNombreEtapa($current->getEtapaId()) .  '"/></td>';
                    echo '<td><input type="text" name="nombrematerial" id="nombrematerial" value="' . $current->getEtapaNombreMateriales() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="00000" name="cantidadmaterial" id="cantidadmaterial" value="' . $current->getEtapaCantidad() . '"/></td>';
                    echo '<td><input type="text" data-mask  ="₡ #.##0,00" name="montoaproximado" id="montoaproximado" value="₡ ' . $current->getEtapaCostoAproximado() . '"/></td>';
                    
                    echo '<td><input type="submit" value="Actualizar" name="actualiza" id="actualiza"/></td>';
                    echo '<td><button onclick="eliminarPagoEmpleado(' . $current->getObraEtapaMaterialesId() . ',' . $current->getObraEtapaMaterialesId() . ')">Eliminar</button></td>';
                    echo '</tr>';
                    echo '</form>';
                }
                ?>
            </tbody>
            </br>
            <table>
                <tr>
                    <th></th>
                </tr>
                <th></th>
                <th>Nombre etapa</th>
                <th>Materiales</th>
                <th>Cantidad Materiales</th>
                <th>Costo aproximado</th>
                </tr>


                <?php
                $etapaMaterialId = "";
                $nombreEtapa = "";
                $nombreMaterial = "";
                $cantidadMaterial = "";
                $costoAproximado = "";
                if (isset($_GET['var'])) {
                    $etapaMaterialId = $_GET['var1'];
                }
                if (isset($_GET['var2'])) {
                    $nombreEtapa = $_GET['var2'];
                }
                if (isset($_GET['var3'])) {
                    $nombreMaterial = $_GET['var3'];
                }
                if (isset($_GET['var4'])) {
                    $cantidadMaterial = $_GET['var4'];
                }
                if (isset($_GET['var5'])) {
                    $costoAproximado = $_GET['var5'];
                }
                ?>




                <form method="post" enctype="multipart/form-data" action="../business/ObraEtapaMaterialesAction.php">
                       <tr>
                       <td>
                       <?php echo'  <input type="hidden" readonly name="etapamaterialid" id="etapamaterialid" value="'.$etapaMaterialId.'"/>'?>
                    </td>
                        <td><select name="nombreetapa" id="" required>
                                <option value="">Seleccionar etapa</option>
                                <?php
                                $ObraEtapaBusiness = new ObraEtapaBusiness();   
                                $etapaa = $ObraEtapaBusiness->getAllObraEtapa();
                               foreach ($etapaa as $curren) { ?>
                                    <option value="<?php echo $curren->getObraId() ?>"><?php echo $curren->getObraEtapaNombre() ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                        <input required type="text" style="WIDTH: 300px; HEIGHT: 85px" name="materiales" id="materiales" value=""/>
                        </td>

                        <td><input required type="text" data-mask  ="0000" max="9999" name="cantidadmaterial" id="cantidadmaterial" value=""/></td>
                        <td><input required type="text" data-mask  ="₡ #.##0,00" name="costo" id="costo" value="₡"/></td>
                        
                        <td><input type="submit" value="Insertar" name="crear" id="crear" /></td>
                    </tr>
                </form>
            </table>


            <tr>
                <td></td>
                <td>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "valor") {
                            echo '<p style="color: red">Error, El monto debe estar dentro del rango de salario del tipo de empleado seleccionado.</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<p style="color: red">Error al procesar la transacción</p></center>';
                        } else if ($_GET['error'] == "repite") {
                            echo '<p style="color: red">Ya existe un registro con los datos ingresados!</p></center>';
                        } else if ($_GET['error'] == "empty") {
                            echo '<p style="color: red">El empleado seleccionado no se encuentra registrado con el tipo seleccionado!</p></center>';
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