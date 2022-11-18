<?php

include './ObrasBusiness.php';

if (isset($_POST['actualizar'])) {
    if (
        isset($_POST['tbobraid']) && isset($_POST['tbobranombre']) && isset($_POST['tbobradescripcion']) && isset($_POST['tbcliente'])
        && isset($_POST['tbobrafechainicio']) && isset($_POST['tbobrafechaentrega']) && isset($_POST['tbobrafechaestimadofinalizacion']) && isset($_POST['tbobracostoestimado'])
        && isset($_POST['tbobracostofinalizado']) && isset($_POST['tbobradiasfinalizacionanticipada']) && isset($_POST['tbobradiasfinalizacionatrasado']) && isset($_POST['tbobraganancia'])
        && isset($_POST['tbobraperdida']) && isset($_POST['tbobradiasestimadoobra'])
    ) {
        $tbObraId = $_POST['tbobraid'];
        $tbObraNombre = str_replace(' ','OOO',$_POST['tbobranombre']);
        $tbObraDescripcion = $_POST['tbobradescripcion'];
        $tbClienteId = $_POST['tbcliente'];
        echo $tbClienteId;
        $tbObraFechaInicio = $_POST['tbobrafechainicio'];
        $tbObraFechaEntrega = $_POST['tbobrafechaentrega'];
        $tbObraFechaEstimadoFinalizacion = $_POST['tbobrafechaestimadofinalizacion'];
        $tbObraCostoEstimadoAux = str_replace('₡','',$_POST['tbobracostoestimado']);
        $tbObraCostoEstimado = str_replace('.','',$tbObraCostoEstimadoAux);
        $tbObraCostoFinalizadoAux = str_replace('₡','',$_POST['tbobracostofinalizado']);
        $tbObraCostoFinalizado = str_replace('.','', $tbObraCostoFinalizadoAux);
        $tbObraDiasFinalizacionAnticipada = $_POST['tbobradiasfinalizacionanticipada'];
        $tbObraDiasFinalizacionAtrasado = $_POST['tbobradiasfinalizacionatrasado'];
        $tbObraGananciaAux = str_replace('₡','',$_POST['tbobraganancia']);
        $tbObraGanancia = str_replace('.','', $tbObraGananciaAux);
        $tbObraPerdidaAux = str_replace('₡','',$_POST['tbobraperdida']);
        $tbObraPerdida = str_replace('.','', $tbObraPerdidaAux);
        $tbObraDiasEstimadoObra = $_POST['tbobradiasestimadoobra'];
        if($_POST['tbobrafinalizada'] == "Finalizada"){
        $tbObraFinalizada = 1;
        }else if($_POST['tbobrafinalizada'] == "Pendiente"){
        $tbObraFinalizada = 0;
        }
        if (
            strlen($tbObraId) > 0 && strlen($tbObraNombre) > 0 && strlen($tbObraDescripcion) > 0 && strlen($tbClienteId) > 0 && strlen($tbObraFechaInicio) > 0
            && strlen($tbObraFechaEntrega) > 0 && strlen($tbObraFechaEstimadoFinalizacion) > 0 && strlen($tbObraCostoEstimado) > 0 && strlen($tbObraCostoFinalizado) > 0 && strlen($tbObraDiasFinalizacionAnticipada) > 0
            && strlen($tbObraDiasFinalizacionAtrasado) > 0 && strlen($tbObraGanancia) > 0 && strlen($tbObraPerdida) > 0 && strlen($tbObraDiasEstimadoObra) > 0
        ) {
            if (!is_numeric($tbObraNombre) && ctype_alpha($tbObraNombre) && is_numeric($tbObraDiasFinalizacionAnticipada) && is_numeric($tbObraDiasFinalizacionAtrasado) && is_numeric($tbObraDiasEstimadoObra)) {
                $tbObraNombre = str_replace('OOO',' ',$_POST['tbobranombre']);
                $Obra = new Obra(
                    $tbObraId,
                    $tbObraNombre,
                    $tbObraDescripcion,
                    $tbClienteId,
                    $tbObraFechaInicio,
                    $tbObraFechaEntrega,
                    $tbObraFechaEstimadoFinalizacion,
                    $tbObraCostoEstimado,
                    $tbObraCostoFinalizado,
                    $tbObraDiasFinalizacionAnticipada,
                    $tbObraDiasFinalizacionAtrasado,
                    $tbObraGanancia,
                    $tbObraPerdida,
                    $tbObraDiasEstimadoObra,
                    $tbObraFinalizada
                );
                $ObrasBusiness = new ObrasBusiness();
                $resultado = $ObrasBusiness->updateObra($Obra);
                if ($resultado == 1) {
                    header("location: ../view/ObrasView.php?success=updated");
                } else {
                    header("location: ../view/ObrasView.php?error=dbError");
                }
            } else {
                header("location: ../view/ObrasView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/ObrasView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ObrasView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['idObra'])) {

        $ObraId = $_POST['idObra'];

        $ObrasBusiness = new ObrasBusiness();
        $result = $ObrasBusiness->deleteObra($ObraId);


        if ($result == 1) {
            echo "Transaccion realizada y borrada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['crear'])) {

    if (
        isset($_POST['tbobranombre']) && isset($_POST['tbobradescripcion']) && isset($_POST['tbclienteid'])
        && isset($_POST['tbobrafechainicio']) && isset($_POST['tbobrafechaentrega']) && isset($_POST['tbobracostoestimado']) && isset($_POST['tbobrafinalizada'])
    ) {
        $tbObraNombre = str_replace(' ','OOO',$_POST['tbobranombre']);
        $tbObraDescripcion = $_POST['tbobradescripcion'];
        $tbClienteId = $_POST['tbclienteid'];
        $tbObraFechaInicio = $_POST['tbobrafechainicio'];
        $tbObraFechaEntrega = $_POST['tbobrafechaentrega'];
        $tbObraFechaEstimadoFinalizacion = $_POST['tbobrafechaestimadofinalizacion'];
        $tbObraCostoEstimadoAux = str_replace('₡','',$_POST['tbobracostoestimado']);
        $tbObraCostoEstimado = str_replace('.','',$tbObraCostoEstimadoAux);
        $tbObraCostoFinalizadoAux = str_replace('₡','',$_POST['tbobracostofinalizado']);
        $tbObraCostoFinalizado = str_replace('.','',$tbObraCostoFinalizadoAux);
        $tbObraDiasFinalizacionAnticipada = $_POST['tbobradiasfinalizacionanticipada'];
        $tbObraDiasFinalizacionAtrasado = $_POST['tbobradiasfinalizacionatrasado'];
        $tbObraGananciaAux = str_replace('₡','',$_POST['tbobraganancia']);
        $tbObraGanancia = str_replace('.','', $tbObraGananciaAux);
        $tbObraPerdidaAux = str_replace('₡','',$_POST['tbobraperdida']);
        $tbObraPerdida = str_replace('.','',$tbObraPerdidaAux);
        $tbObraDiasEstimadoObra = $_POST['tbobradiasestimadoobra'];
        $tbObraFinalizada = $_POST['tbobrafinalizada'];

        if (
            strlen($tbObraNombre) > 0 && strlen($tbObraDescripcion) > 0
            && strlen($tbClienteId) > 0 && strlen($tbObraFechaInicio) > 0 && strlen($tbObraCostoEstimado) > 0
        ) {

            if (!is_numeric($tbObraNombre) && ctype_alpha($tbObraNombre) && is_numeric($tbObraDiasFinalizacionAnticipada) && is_numeric($tbObraDiasFinalizacionAtrasado) && is_numeric($tbObraDiasEstimadoObra)) {
                $tbObraNombre = str_replace('OOO',' ',$_POST['tbobranombre']);
                $Obra = new Obra(
                    0,
                    $tbObraNombre,
                    $tbObraDescripcion,
                    $tbClienteId,
                    $tbObraFechaInicio,
                    $tbObraFechaEntrega,
                    $tbObraFechaEstimadoFinalizacion,
                    $tbObraCostoEstimado,
                    $tbObraCostoFinalizado,
                    $tbObraDiasFinalizacionAnticipada,
                    $tbObraDiasFinalizacionAtrasado,
                    $tbObraGanancia,
                    $tbObraPerdida,
                    $tbObraDiasEstimadoObra,
                    $tbObraFinalizada
                );
                $ObrasBusiness = new ObrasBusiness();
                $result = $ObrasBusiness->insertObra($Obra);

                if ($result == 1) {
                    header("location: ../view/ObrasView.php?success=inserted");
                } else {
                    header("location: ../view/ObrasView.php?error=dbError&var0=$tbObraNombre&var2=$tbObraDescripcion&var3=$tbClienteId&var4=$tbObraFechaInicio&var5=$tbObraFechaEntrega&var6=$tbObraFechaEstimadoFinalizacion
                    &var7=$tbObraCostoEstimado&var8=$tbObraCostoFinalizado&var9=$tbObraDiasFinalizacionAnticipada&var10=$tbObraDiasFinalizacionAtrasado&var11=$tbObraGanancia&var12=$tbObraPerdida&var13=$tbObraDiasEstimadoObra");
                }
            } else {
                if(is_numeric($tbObraNombre) || !ctype_alpha($tbObraNombre)){
                    header("location: ../view/ObrasView.php?error=stringFormat&var2=$tbObraDescripcion&var3=$tbClienteId&var4=$tbObraFechaInicio&var5=$tbObraFechaEntrega&var6=$tbObraFechaEstimadoFinalizacion&var7=$tbObraCostoEstimado&var8=$tbObraCostoFinalizado&var9=$tbObraDiasFinalizacionAnticipada&var10=$tbObraDiasFinalizacionAtrasado&var11=$tbObraGanancia&var12=$tbObraPerdida&var13=$tbObraDiasEstimadoObra");
                }else if(!is_numeric($tbObraDiasFinalizacionAnticipada) && !is_numeric($tbObraDiasFinalizacionAtrasado) && !is_numeric($tbObraDiasEstimadoObra)){
                    header("location: ../view/ObrasView.php?error=stringFormat&var0=$tbObraNombre&var2=$tbObraDescripcion&var3=$tbClienteId&var4=$tbObraFechaInicio&var5=$tbObraFechaEntrega&var6=$tbObraFechaEstimadoFinalizacion&var7=$tbObraCostoEstimado&var8=$tbObraCostoFinalizado&var11=$tbObraGanancia&var12=$tbObraPerdida");
                }else if(!is_numeric($tbObraDiasFinalizacionAnticipada)){
                    header("location: ../view/ObrasView.php?error=stringFormat&var0=$tbObraNombre&var2=$tbObraDescripcion&var3=$tbClienteId&var4=$tbObraFechaInicio&var5=$tbObraFechaEntrega&var6=$tbObraFechaEstimadoFinalizacion&var7=$tbObraCostoEstimado&var8=$tbObraCostoFinalizado&var10=$tbObraDiasFinalizacionAtrasado&var11=$tbObraGanancia&var12=$tbObraPerdida&var13=$tbObraDiasEstimadoObra");
                }else if(!is_numeric($tbObraDiasFinalizacionAtrasado)){
                    header("location: ../view/ObrasView.php?error=stringFormat&var0=$tbObraNombre&var2=$tbObraDescripcion&var3=$tbClienteId&var4=$tbObraFechaInicio&var5=$tbObraFechaEntrega&var6=$tbObraFechaEstimadoFinalizacion&var7=$tbObraCostoEstimado&var8=$tbObraCostoFinalizado&var9=$tbObraDiasFinalizacionAnticipada&var11=$tbObraGanancia&var12=$tbObraPerdida&var13=$tbObraDiasEstimadoObra");
                }else if(!is_numeric($tbObraDiasEstimadoObra)){
                    header("location: ../view/ObrasView.php?error=stringFormat&var0=$tbObraNombre&var2=$tbObraDescripcion&var3=$tbClienteId&var4=$tbObraFechaInicio&var5=$tbObraFechaEntrega&var6=$tbObraFechaEstimadoFinalizacion&var7=$tbObraCostoEstimado&var8=$tbObraCostoFinalizado&var9=$tbObraDiasFinalizacionAnticipada&var10=$tbObraDiasFinalizacionAtrasado&var11=$tbObraGanancia&var12=$tbObraPerdida");
                }
                
            }
        } else {
            header("location: ../view/ObrasView.php?error=emptyField");
        }
    } else {
        header("location: ../view/ObrasView.php?error=error");
    }
}
