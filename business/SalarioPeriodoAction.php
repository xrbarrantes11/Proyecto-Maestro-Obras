<?php

include './SalarioPeriodoBusiness.php';



if (isset($_POST['update'])) {
    if (
        isset($_POST['tbsalarioperiodoid']) && isset($_POST['tbsalarioperiodocategoria']) && isset($_POST['tbsalarioperiodotipo']) && isset($_POST['tbsalarioperiododescripcion'])
        ) {
        $tbSalarioPeriodoId = $_POST['tbsalarioperiodoid'];
        $tbSalarioPeriodoCategoria = $_POST['tbsalarioperiodocategoria'];
        $tbSalarioPeriodoTipo = $_POST['tbsalarioperiodotipo'];
        $tbSalarioPeriodoDescripcion = $_POST['tbsalarioperiododescripcion'];
        $tbSalarioPeriodoActivo = $_POST['tbsalarioperiodoactivo'];
        if(isset($_POST['tbsalarioperiodoactivo'])){
            $tbSalarioPeriodoActivo = 1;
            }
        if (!isset($_POST['tbsalarioperiodoactivo'])) {
            $tbSalarioPeriodoActivo = 0; 
        }

        if (
            strlen($tbSalarioPeriodoId) > 0 && strlen($tbSalarioPeriodoCategoria) > 0 && strlen($tbSalarioPeriodoTipo) > 0 && strlen($tbSalarioPeriodoDescripcion) > 0 
            && strlen($tbSalarioPeriodoActivo) > 0
        ) {
            if (!is_numeric($tbSalarioPeriodoCategoria)) {
                $SalarioPeriodo = new SalarioPeriodo($tbSalarioPeriodoId, $tbSalarioPeriodoCategoria, $tbSalarioPeriodoTipo, $tbSalarioPeriodoDescripcion, $tbSalarioPeriodoActivo);

                $SalarioPeriodoBusiness = new SalarioPeriodoBusiness();

                $result = $SalarioPeriodoBusiness->updateSalarioPeriodo($SalarioPeriodo);
                if ($result == 1) {
                    header("location: ../view/SalarioPeriodoView.php?success=updated");
                } else {
                    header("location: ../view/SalarioPeriodoView.php?error=dbError");
                }
            } else {
                header("location: ../view/SalarioPeriodoView.php?error=stringFormat");
            }
        } else {
            header("location: ../view/SalarioPeriodoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/SalarioPeriodoView.php?error=error");
    }
} else if (strcmp($_POST['action'], 'delete') == 0) {

    if (isset($_POST['idSalario'])) {

        $salarioId = $_POST['idSalario'];
        $SalarioPeriodoBusiness = new SalarioPeriodoBusiness();
        $result = $SalarioPeriodoBusiness->deleteSalarioPeriodo($salarioId);
        
        if ($result == 1) {
            echo "Transaccion realizada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['create'])) {

    if (
        isset($_POST['tbsalarioperiodocategoria']) && isset($_POST['tbsalarioperiodotipo']) && isset($_POST['tbsalarioperiododescripcion'])
        ) {
            $tbSalarioPeriodoCategoria = $_POST['tbsalarioperiodocategoria'];
            $tbSalarioPeriodoTipo = $_POST['tbsalarioperiodotipo'];
            $tbSalarioPeriodoDescripcion = $_POST['tbsalarioperiododescripcion'];
            $tbSalarioPeriodoActivo = $_POST['tbsalarioperiodoactivo'];
        if ($tbSalarioPeriodoActivo != 1) {
            $tbSalarioPeriodoActivo = 0;
        }


        if (
            strlen($tbSalarioPeriodoCategoria) > 0 && strlen($tbSalarioPeriodoTipo) > 0 && strlen($tbSalarioPeriodoDescripcion) > 0 
            && strlen($tbSalarioPeriodoActivo) > 0
        ) {
            if (!is_numeric($tbSalarioPeriodoCategoria)) {
                $SalarioPeriodo = new SalarioPeriodo(0, $tbSalarioPeriodoCategoria, $tbSalarioPeriodoTipo, $tbSalarioPeriodoDescripcion, $tbSalarioPeriodoActivo);

                $SalarioPeriodoBusiness = new SalarioPeriodoBusiness();

                $result = $SalarioPeriodoBusiness->insertSalarioPeriodo($SalarioPeriodo);

                if ($result == 1) {
                    header("location: ../view/SalarioPeriodoView.php?success=inserted");
                } else {
                    header("location: ../view/SalarioPeriodoView.php?error=dbError");
                }
            } else {
                header("location: ../view/SalarioPeriodoView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/SalarioPeriodoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/SalarioPeriodoView.php?error=error");
    }
}
