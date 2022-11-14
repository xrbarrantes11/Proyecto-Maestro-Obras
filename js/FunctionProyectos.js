function eliminarPagoRangoTipoEmpleado(empleadotipoid) {
    if (confirm("Seguro que desea eliminar el tipo de empleado?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("empleadoTipoId", empleadotipoid);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/EmpleadoTipoEmpleadoPagoRangoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/EmpleadoTipoEmpleadoPagoRangoView.php';
            }
        };
    } else { }
}
