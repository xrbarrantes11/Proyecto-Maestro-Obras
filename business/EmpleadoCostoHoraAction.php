<?php

include './EmpleadoCostoHoraBusiness.php';

$names;


if (isset($_POST['update'])) {

    if (isset($_POST['empleadoId']) && isset($_POST['empleadoNombre']) &&  isset($_POST['empleadoFechaInicio']) && isset($_POST['empleadoFechaFin']) && isset($_POST['empleadoSalario'])) {
            
        $empleadoId = $_POST['empleadoId'];
        $empleadoNombre = $_POST['empleadoNombre'];
        $empleadoFechaInicio = $_POST['empleadoFechaInicio'];
        $empleadoFechaFin = $_POST['empleadoFechaFin'];
        $tipoEmpleadoDescripcion = $_POST['empleadoSalario'];
        
        
        if (strlen($empleadoId) > 0 && strlen($empleadoNombre) > 0 && strlen($empleadoFechaInicio) > 0 && strlen($empleadoFechaFin) > 0 && strlen($empleadoSalario) > 0 ) {
            if (!is_numeric($empleadoNombre)) {
               // $Empleado = new EmpleadoCostoHora($empleadoId, $empleadoNombre, $empleadoFechaInicio, $empleadoFechaFin, $empleadoSalario);

                $EmpleadoCostoHoraBusiness = new EmpleadoCostoHoraBusiness();

                $result = $EmpleadoCostoHoraBusiness->updateEmpleadoCostoHora($Empleado);
                if ($result == 1) {
                    header("location: ../view/EmpleadoCostoHoraView.php?success=updated");
                } else {
                    header("location: ../view/EmpleadoCostoHoraView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoCostoHoraView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/EmpleadoCostoHoraView.php?error=emptyField");
        }
    } else {
        header("location: ../view/EmpleadoCostoHoraView.php?error=error");
    }
}else if (isset($_POST['create'])) {

    if (isset($_POST['empleadoId']) && isset($_POST['empleadoNombre']) && isset($_POST['horaInicio']) && isset($_POST['horaFin'])) {
            
        $empleadoEstado = 0;
        $empleadoId = $_POST['empleadoId'];
        $empleadoNombre = $_POST['empleadoNombre'];
        $empleadoFechaInicio = $_POST['horaInicio'];
        $empleadoFechaFin = $_POST['horaFin'];
        
        //calcular diferencia de horas
        $date1 = strtotime($empleadoFechaInicio);
        $date2 = strtotime($empleadoFechaFin);

        $empleadoCantHoras = round((($date2-$date1)/60/60),2);

        if (strlen($empleadoId) > 0 && strlen($empleadoNombre) > 0 && strlen($empleadoFechaInicio) > 0 && strlen($empleadoFechaFin) > 0 && strlen($empleadoCantHoras) > 0) {
            if (!is_numeric($empleadoNombre)) {
                $EmpleadoCostoHora = new EmpleadoCostoHora($empleadoId, $empleadoNombre, $empleadoFechaInicio, $empleadoFechaFin, $empleadoCantHoras, $empleadoEstado);

                $EmpleadoCostoHoraBusiness = new EmpleadoCostoHoraBusiness();

                $result = $EmpleadoCostoHoraBusiness->insertEmpleadoCostoHora($EmpleadoCostoHora);

                if ($result == 1) {
                    header("location: ../view/EmpleadoCostoHoraView.php?success=inserted");
                } else {
                    header("location: ../view/EmpleadoCostoHoraView.php?error=dbError");
                }
            } else {
                header("location: ../view/EmpleadoCostoHoraView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/EmpleadoCostoHoraView.php?error=emptyField");
        }
    } else {
        header("location: ../view/EmpleadoCostoHoraView.php?error=error");
    }
}else if (isset($_POST['seleccionar'])) {
    
    $names = $_POST['tbempleadonombre'];
    $id  = $_POST['tbempleadoid'];

    
    
     header("location: ../view/ingresoHorasView.php?var=$names&id=$id");
              
}else if(isset($_POST['insertarHoras'])){
    echo '<br>';
    $name = $_POST['empleadonombre'];
    $fech = $_POST['fechaactual'];
    $ids = $_POST['id'];
    $hI = $_POST['horainicio'];
    
    $emple = new EmpleadoCostoHora($ids,$name,$fech,$hI,"", 0);
    $EmpleadoCostoHoraBusiness = new EmpleadoCostoHoraBusiness();
    $result = $EmpleadoCostoHoraBusiness->insertEmpleadoCostoHora($emple);
    
    if ($result == 1) {
        header("location: ../view/EmpleadoCostoHoraView.php?success=inserted");
    } else {
        header("location: ../view/EmpleadoCostoHoraView.php?error=dbError");
    }

}else if(isset($_POST['actualizarHoras'])){

    $name = $_POST['empleadonombre'];
    $fech = $_POST['fechaactual'];
    $ids = $_POST['id'];
    $hI = $_POST['horainicio'];
    $hF = $_POST['horafinal'];

    $emplea = new EmpleadoCostoHora($ids,"",$fech,$hI,$hF,1);
    $EmpleadoCostoHoraBusiness = new EmpleadoCostoHoraBusiness();
    $result = $EmpleadoCostoHoraBusiness->updateEmpleadoCostoHora($emplea);
    
    if ($result == 1) {
        header("location: ../view/EmpleadoCostoHoraView.php?success=inserted");
    } else {
        header("location: ../view/EmpleadoCostoHoraView.php?error=dbError");
    }

}else if (isset($_POST['id']) && isset($_POST['fecha'])) {

    $completado = false;
    $EmpleadoCostoHoraBusiness = new EmpleadoCostoHoraBusiness();
    if($EmpleadoCostoHoraBusiness ->verificarRegistroHora($_POST['id'],$_POST['fecha']) == 0 && $EmpleadoCostoHoraBusiness ->verificarEstadoHoraEmpleado($_POST['id'],$_POST['fecha']) == 0){
    	echo json_encode(array('mensaje' => "No tiene registro en la fecha escogida, por favor insertar las horas correspondientes", "accion"=> 1));
    }
    else if($EmpleadoCostoHoraBusiness ->verificarRegistroHora($_POST['id'],$_POST['fecha']) == 1 && $EmpleadoCostoHoraBusiness ->verificarEstadoHoraEmpleado($_POST['id'],$_POST['fecha']) == 0){
    	if($EmpleadoCostoHoraBusiness ->verificarHoraFinEmpleado($_POST['id'],$_POST['fecha']) == 1){
    		$hora = $EmpleadoCostoHoraBusiness ->obtenerHoraEmpleado($_POST['id'],$_POST['fecha']);
 

            $array = [
                'empleadoid'=>$hora->getEmpleadoId(),
                'empleadonombre'=>$hora->getEmpleadoNombre(),
                'fechaactual'=>$hora->getEmpleadoFechaActual(),
                'horanicio'=>$hora->getEmpleadoHoraInicio(),
                'horafin'=>$hora->getEmpleadoHoraFin(),
                'estado'=>$hora->getEmpleadoEstado()


            ];
            echo json_encode(array("horainicio"=>$hora->getEmpleadoHoraInicio()));
    	
    	}
    }
    if($EmpleadoCostoHoraBusiness ->verificarRegistroHora($_POST['id'],$_POST['fecha']) == 1 && $EmpleadoCostoHoraBusiness ->verificarEstadoHoraEmpleado($_POST['id'],$_POST['fecha']) == 1){
        echo json_encode(array('mensaje'=> " Ya se han añadido las horas para esta fecha",'accion'=> 3));
    	
    }

    

  

} 




?>