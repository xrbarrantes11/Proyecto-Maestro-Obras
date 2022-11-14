<?php

include './JornadaSemanalDetalleBusiness.php';

if ($_POST['mostrar']) {
    if (isset($_POST['tbempleadoid'])) {
        $tbEmpleadoId = $_POST['tbempleadoid'];

        
        header("location: ../view/CronogramaPagoView.php?id=$tbEmpleadoId");
        
    } else {
        header("location: ../view/CronogramaPagoView.php?error=error");
    }
}
