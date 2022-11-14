document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("buscar").addEventListener("keyup", getPalabras);
    function getPalabras() {
        let inputNombre = document.getElementById("buscar").value
        let lista = document.getElementById("lista")
        if (inputNombre.length > 0) {
            let url = "../business/AutoCompleteAction.php"
            let formData = new FormData();
            formData.append("buscar", inputNombre)
            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors"
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }
        //alert("dddd");
        //alert(fetch.responseText)
    }
});

document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("buscarHora").addEventListener("keyup", getEmpleadosHora);
    function getEmpleadosHora() {
        let inputNombre = document.getElementById("buscarHora").value
        let lista = document.getElementById("listaEmpleado")
        if (inputNombre.length > 0) {
            let url = "../business/AutoCompleteAction.php"
            let formData = new FormData();
            formData.append("buscarHora", inputNombre)
            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors"
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }
        //alert(inputNombre)
        //alert(fetch.responseText)
    }
});


document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("buscarCliente").addEventListener("keyup", getNombreClientes);
    function getNombreClientes() {
        let inputNombre = document.getElementById("buscarCliente").value
        let lista = document.getElementById("listaCliente")
        if (inputNombre.length > 0) {
            let url = "../business/AutoCompleteAction.php"
            let formData = new FormData();
            formData.append("buscarCliente", inputNombre)
            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors"
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }
    }
});

document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("buscarObra").addEventListener("keyup", getNombreObras);
    function getNombreObras() {
        let inputNombre = document.getElementById("buscarObra").value
        let lista = document.getElementById("listaObras")
        if (inputNombre.length > 0) {
            let url = "../business/AutoCompleteAction.php"
            let formData = new FormData();
            formData.append("buscarObra", inputNombre)
            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors"
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }
    }
});

document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("buscar").addEventListener("keyup", getNombreObra);
    function getNombreObra() {
        let inputNombre = document.getElementById("buscar").value
        let lista = document.getElementById("lista")
        if (inputNombre.length > 0) {
            let url = "../business/AutoCompleteAction.php"
            let formData = new FormData();
            formData.append("buscar", inputNombre)
            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors"
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }
        //alert(inputNombre)
        //alert(fetch.responseText)
    }
});

document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById("buscarProveedores").addEventListener("keyup", getNombreProveedor);
    function getNombreProveedor() {
        let inputNombre = document.getElementById("buscarProveedores").value
        let lista = document.getElementById("lista")
        if (inputNombre.length > 0) {
            let url = "../business/AutoCompleteAction.php"
            let formData = new FormData();
            formData.append("buscarProveedores", inputNombre)
            fetch(url, {
                method: "POST",
                body: formData,
                mode: "cors"
            }).then(response => response.json())
                .then(data => {
                    lista.style.display = 'block'
                    lista.innerHTML = data
                })
                .catch(err => console.log(err))
        } else {
            lista.style.display = 'none'
        }
        //alert(inputNombre)
        //alert(fetch.responseText)
    }
});


function deleteEmpleadoTipo(id) {
    if (confirm("Seguro que desea eliminar el tipo de empleado?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("empleadoTipoId", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/EmpleadoTipoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/EmpleadoTipoView.php';
            }
        };
    } else { }
}

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

function activarEmpleado(id, activo) {
    if (confirm("Seguro que desea activar el empleado?")) {
        const data = new FormData();//crea formulario
        data.append("action", "cambiar");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idEmpleado", id);//indica la variable que quiere enviar al action php
        data.append("empleadoActivo", activo);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/EstadoEmpleadoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/EstadoEmpleadoView.php';
            }
        };
    } else { }
}

function eliminarEmpleado(id) {
    if (confirm("Seguro que desea eliminar el empleado?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idEmpleado", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/EmpleadoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
              //  alert(http.responseText);
                document.location = '../view/EmpleadoView.php';
            }
        };
    } else { }
}

function eliminarCatalogo(id) {
    if (confirm("Seguro que desea eliminar el tipo de obra?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idObraCatalogo", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObraCatalogoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObraCatalogoView.php';
            }
        };
    } else { }
}

function eliminarCliente(id) {
    if (confirm("Seguro que desea eliminar el cliente?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idCliente", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ClienteAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ClienteView.php';
            }
        };
    } else { }
}

function eliminarSalarioPeriodo(id) {
    if (confirm("Seguro que desea eliminar el salario?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idSalario", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/SalarioPeriodoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/SalarioPeriodoView.php';
            }
        };
    } else { }
}

function eliminarObra(id) {
    if (confirm("Seguro que desea eliminar la obra?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idObra", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObrasAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObrasView.php';
            }
        };
    } else { }
}

function eliminarProveedor(id) {
    if (confirm("Seguro que desea eliminar la obra?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idProveedor", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ProveedorAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ProveedorView.php';
            }
        };
    } else { }
}

function eliminarCotizacion(id) {
    if (confirm("Seguro que desea eliminar la cotización?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("idCotizacionimagen", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/CotizacionImagenAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/CotizacionImagenView.php';
            }
        };
    } else { }
}

function eliminarPagoEmpleado(nombreId, tipoId) {
    if (confirm("Seguro que desea eliminar el registro de pago?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("nombreId", nombreId);//indica la variable que quiere enviar al action php
        data.append("tipoId", tipoId);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/EmpleadoTipoEmpleadoPagoAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/EmpleadoTipoEmpleadoPagoView.php';
            }
        };
    } else { }
}

function eliminarObraEtapa(id) {
    if (confirm("Seguro que desea eliminar la Etapa?")) {
        const data = new FormData();//crea formulario
        data.append("action", "delete");//le indica la acción del formulario como parametro de nombre action con valor logOut
        data.append("obraEtapaId", id);//indica la variable que quiere enviar al action php
        var http = new XMLHttpRequest();//crea la variable http para el envió de datos a la controller 
        http.open('POST', '../business/ObraEtapaAction.php', true);//define el metodo de envio post o get y la ruta de archivo de la controller 
        http.send(data);//envia el formulario
        http.onreadystatechange = function () {//espera respuesta
            if (http.readyState === 4) {//respuesta correcta
                alert(http.responseText);
                document.location = '../view/ObraEtapaView.php';
            }
        };
    } else { }
}

function mostrar(nombre) {
    var ajax = new XMLHttpRequest();
    document.location = '../view/EmpleadoView.php?var1='+nombre;
}

function mostrarCliente(nombre) {
    var ajax = new XMLHttpRequest();
    document.location = '../view/ClienteView.php?var='+nombre;
}

function mostrarEmpleados(nombre) {
    var ajax = new XMLHttpRequest();
    document.location = '../view/EmpleadoCostoHoraView.php?var='+nombre;
}

function mostrarObra(nombre) {
    var ajax = new XMLHttpRequest();
    document.location = '../view/ObrasView.php?var='+nombre;
}

function mostrarProveedor(nombre){
    var ajax = new XMLHttpRequest();
    document.location = '../view/ProveedorView.php?var='+nombre;
}







