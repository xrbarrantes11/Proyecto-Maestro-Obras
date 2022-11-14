
<?php

class Proveedor{

    private $proveedorId;
    private $proveedorNombre;
    private $proveedorApellido;
    private $proveedorComercio;
    private $proveedorCedula;
    private $proveedorTelefono;
    private $proveedorCorreo;


    function Proveedor($proveedorId, $proveedorNombre, $proveedorApellido, $proveedorComercio, $proveedorCedula, $proveedorTelefono, $proveedorCorreo){
        $this->proveedorId = $proveedorId;
        $this->proveedorNombre = $proveedorNombre;
        $this->proveedorApellido = $proveedorApellido;
        $this->proveedorComercio = $proveedorComercio;
        $this->proveedorCedula = $proveedorCedula;
        $this->proveedorTelefono = $proveedorTelefono;
        $this->proveedorCorreo = $proveedorCorreo;

    }

	function getProveedorId(){
        return $this->proveedorId;
    }

    function getProveedorNombre(){
        return $this->proveedorNombre;
    }

    function getProveedorApellido(){
        return $this->proveedorApellido;
    }

    function getProveedorTelefono(){
        return $this->proveedorTelefono;
    }

    function getProveedorCorreo(){
        return $this->proveedorCorreo;
    }

    function setProveedorId($proveedorId){
        $this->proveedorId = $proveedorId;
    }

    function setProveedorNombre($proveedorNombre){
        $this->proveedorNombre = $proveedorNombre;
    }

    function setProveedorApellido($proveedorApellido){
        $this->proveedorApellido = $proveedorApellido;
    }

    function setProveedorTelefono($proveedorTelefono){
        $this->proveedorTelefono = $proveedorTelefono;
    }

    function setProveedorCorreo($proveedorCorreo){
        $this->proveedorCorreo = $proveedorCorreo;
    }

	function getProveedorCedula() {
		return $this->proveedorCedula;
	}
	
	function setProveedorCedula($proveedorCedula) {
		$this->proveedorCedula = $proveedorCedula;
	}

    function getProveedorComercio() {
		return $this->proveedorComercio;
	}
	
	function setProveedorComercio($proveedorComercio) {
		$this->proveedorComercio = $proveedorComercio;
	}
}

?>