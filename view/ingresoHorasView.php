<?php 
    error_reporting(0);
    	include '../business/EmpleadoCostoHoraBusiness.php';
        $empleadoBusiness = new EmpleadoCostoHoraBusiness(); 
	
    date_default_timezone_set('America/Costa_Rica');
	$id = $_GET['id']; 
    $nombre = $_GET['var']; 
	$fechaActual = date('Y-m-d');
	$hora = null; 
    $formulario = ''; 
	
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Horas empleado</title>
 </head>
 <body>

 	<br>
 	<?php
		
 		if($empleadoBusiness ->verificarRegistroHora($id,$fechaActual) == 0 && $empleadoBusiness ->verificarEstadoHoraEmpleado($id,$fechaActual) == 0){
    		//echo '<br>Condicion actual 0-0: No tiene registro, ni tiene estado en 1, puede insertar';
    				$formulario .= '<form method="POST" action="../business/EmpleadoCostoHoraAction.php">';
                    
                    $formulario .= '<input type="hidden" name="id" value="'.$id.'">';
                    $formulario .= '<label>Nombre:</label> <input type="text" name="" value="'. $nombre.'">';
				 	$formulario .= '<label>Fecha:</label> <input type="date" max="'. $fechaActual.'" id="fechaactual" name="fechaactual" value="'. $fechaActual.'">';
				 	$formulario .= '<label>Hora Inicio:</label> <input type="time" class="horainicio" name="horainicio">';
				 	$formulario .= '<label>Hora Final:</label> <input  readonly  type="time" class="horafinal" name="horafinal" >';
				 	$formulario .= '<input type="submit"  name="insertarHoras" class="input-form" onclick="validarFechas(1)" value="Insertar horas">';
				 	$formulario .= '</form>';
				 	echo $formulario;
 		}else if($empleadoBusiness ->verificarRegistroHora($id,$fechaActual) == 1 && $empleadoBusiness ->verificarEstadoHoraEmpleado($id,$fechaActual) == 0){ 
 			//echo '<br>Condicion actual 1-0: Tiene registro pero estado en 0, se trae el dato de la base de datos y se setean valores en formulario, se verifica si la columna hora fin está NULL';
		    if($empleadoBusiness ->verificarHoraFinEmpleado($id,$fechaActual) == 1){
			        $hora = $empleadoBusiness ->obtenerHoraEmpleado($id,$fechaActual);
			        $formulario .= '<form method="POST" action="../business/EmpleadoCostoHoraAction.php">';
				 	$formulario .=	'<input type="hidden" name="id" value="'.$hora->getEmpleadoId().'">';
				 	$formulario .= '<label>Fecha:</label><input type="date" max="'. $fechaActual.'" name="fechaactual" value="'.$fechaActual.'">';
				 	$formulario .= '<label>Hora Inicio:</label><input readonly type="time" name="horainicio" class="horainicio" value="'.$hora->getEmpleadoHoraInicio().'">';
				 	$formulario .= '<label>Hora Final:</label><input type="time" name="horafinal" class ="horafinal" value="'.$hora->getEmpleadoHoraFin().'">';
					 $formulario .= '<input type="submit" name="actualizarHoras" class="input-form" value="Insertar horas" onclick="validarFechas(2)">';
				 	$formulario .= '</form>';
				 	echo $formulario;
		    }
	 		}else if($empleadoBusiness ->verificarRegistroHora($id,$fechaActual) == 1 && $empleadoBusiness ->verificarEstadoHoraEmpleado($id,$fechaActual) == 1){ //1:1
	 			$formulario .= '<form method="POST" action="../business/EmpleadoCostoHoraAction.php">';
                    
                    $formulario .= '<input type="hidden" name="id" value="'.$id.'">';
                    $formulario .= '<label>Nombre:</label> <input type="text" name="" value="'. $nombre.'">';
				 	$formulario .= '<label>Fecha:</label> <input type="date" max="'. $fechaActual.'" id="fechaactual" name="fechaactual" value="'. $fechaActual.'">';
				 	$formulario .= '<label>Hora Inicio:</label> <input readonly type="time" class="horainicio" name="horainicio">';
				 	$formulario .= '<label>Hora Final:</label> <input  readonly  type="time" class="horafinal" name="horafinal" >';
				 	$formulario .= '<input type="submit"  name="insertarHoras" class="input-form" onclick="validarFechas(1)" value="Insertar horas">';
				 	$formulario .= '</form>';
				 	echo $formulario;
 			echo '<span id="horascompletadas">Ya se han añadido las horas para esta fecha</span>';
 			echo '<br>';
 			echo '<a href="EmpleadoCostoHoraView.php">Regresar</a>';
 		}
 	 	

 	  ?>

  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<script type="text/javascript">
	//Dependiendo del tipo de formulario, valida una cosa u otra
	//1:Insertar
	//2:Actualizar
	function validarFechas(tipo){
		
		if(tipo == 1){
			if($(".horainicio").val() == ""){
				alert("No ha insertado ninguna hora de inicio");
				event.preventDefault();
			}
		}

		if(tipo == 2){

			if($(".horafinal").val() == ""){
				alert("No ha insertado ninguna hora de salida");
				event.preventDefault();
			}else if($(".horainicio").val() > $(".horafinal").val() || $(".horafinal").val() < $(".horainicio").val()){
				alert("Inserte las horas correctamente, la hora de inicio debe ser menor a la final");
				event.preventDefault();
			}
		}	
	}

</script>



<script type="text/javascript">
	
	$("#fechaactual").change(function(){
		var fecha = this.value;
		//alert(fecha);
		var empleadoid = "<?php echo "$id"?>";
		var consulta = 'id='+empleadoid+"&fecha="+fecha;
		//alert(consulta);
		//alert(fecha);
		$.ajax({
            type: "POST", //el tipo de metodo
            dataType: 'JSON',

            url: "../business/EmpleadoCostoHoraAction.php", //archivo php con la consulta
            data: consulta,
            success: function(data) {
            	
            	
                console.log(data);
                //alert(result);
            	if(data.accion == 1){
            		alert(data.mensaje);
            		$(".horainicio").val("");
             		$(".horainicio").attr('readonly', false);
             		$(".horafinal").attr('readonly', true);
             		$(".input-form").attr('name', 'insertarHoras' );
             		$("#horascompletadas").hide();
            	}else if(data.accion == 3){
            		alert(data.mensaje);
            			$(".horainicio").val("");
             			$(".horainicio").attr('readonly', true);
             			$(".horafinal").attr('readonly', true);
             			$(".input-form").attr('name', 'insertarHoras' );
             			$(".input-form"). attr("onclick","validarFechas(1)");
             			$("#horascompletadas").show();
            		
            	}else{
            		alert("Tiene un registro pendiente de completar, ingrese hora salida");
            		
            	
            		$(".horainicio").val(data.horainicio);
					$(".horainicio").attr('readonly', false);
            		$(".horafinal").attr('readonly', false);
            		$("#horascompletadas").hide();
            		$(".input-form").attr('name', 'actualizarHoras' );
            		$(".input-form"). attr("onclick","validarFechas(2)");
            		
            	}
                
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