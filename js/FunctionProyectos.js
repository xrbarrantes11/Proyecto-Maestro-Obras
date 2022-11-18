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


function eliminarEtapaMaterial(etapamaterialid) {
    if (confirm("Seguro que desea eliminar esta etapa con sus materiales?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("etapamaterialid", etapamaterialid);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObraEtapaMaterialesAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObraEtapaMaterialesView.php';
            }
        };
    } else { }
}

function eliminarObraEtapaTipoEmpleadoAsignado(empleadotipoid) {
    if (confirm("Seguro que desea eliminar el empleado de esta etapa?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("tbobraetapaempleadotipoasignadoid", empleadotipoid);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObraEtapaTipoEmpleadoAsignadoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObraEtapaEmpleadoAsignadoView.php';
            }
        };
    } else { }
}

function finalizarObra(id) {
    if (confirm("Seguro que desea finalizar la obra?")) {
        const data = new FormData();//crea formulario
        data.append("action", "finalizar");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("obraId", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObrasAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObraFinalizarView.php';
            }
        };
    } else { }
}
