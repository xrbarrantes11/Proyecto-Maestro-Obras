function eliminarTipoEmpleado(idTipo,idEmpleado) {
    if (confirm("Seguro que desea eliminar el tipo de empleado?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("empleadoTipoId", idTipo);//indica la variable que quiere enviar al action php
        data.append("empleadoId", idEmpleado);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/EmpleadoTipoAsignadoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/AsignarTipoEmpleadoView.php';
            }
        };
    } else { }
}



function eliminarEtapaMaterial(etapamaterialid,idObra) {

    if (confirm("Seguro que desea eliminar esta etapa con sus materiales?")) {
        var id= idObra;
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("etapamaterialid", etapamaterialid);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObraEtapaMaterialesAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObraEtapaMaterialesView.php?id='+id;
            }
        };
    } else { }
}

function eliminarObraEtapaTipoEmpleadoAsignado(empleadotipoid,idObra) {
   
    if (confirm("Seguro que desea eliminar el empleado de esta etapa?")) {
        var id= idObra;
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("tbobraetapaempleadotipoasignadoid", empleadotipoid);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObraEtapaTipoEmpleadoAsignadoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObraEtapaEmpleadoAsignadoView.php?id='+id;
            }
        };
    } else { }
}