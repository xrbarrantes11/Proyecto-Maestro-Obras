<?php

class Cliente {

    private $clienteId;
    private $clienteCedula;
    private $clienteNombre;
    private $clienteApellidos;
    private $clienteTelefono;
    private $clienteCorreo;


    function Cliente($clienteId, $clienteCedula,$clienteNombre, $clienteApellidos, $clienteTelefono, $clienteCorreo) {
        $this->clienteId = $clienteId;
        $this->clienteCedula = $clienteCedula;
        $this->clienteNombre = $clienteNombre;
        $this->clienteApellidos = $clienteApellidos;
        $this->clienteTelefono = $clienteTelefono;
        $this->clienteCorreo = $clienteCorreo;
    }

    function getClienteId() {
        return $this->clienteId;
    }
    
    public function getClienteCedula() {
        return $this->clienteCedula;
    }

    function getClienteNombre() {
        return $this->clienteNombre;
    }

    function getClienteApellidos() {
        return $this->clienteApellidos;
    }

    function getClienteTelefono() {
        return $this->clienteTelefono;
    }

    function getClienteCorreo() {
        return $this->clienteCorreo;
    }

    function setClienteId($clienteId) {
        $this->clienteId = $clienteId;
    }

    function setClienteCedula($clienteCedula) {
        $this->clienteCedula = $clienteCedula;
    }

    function setClienteNombre($clienteNombre) {
        $this->clienteNombre = $clienteNombre;
    }

    function setClienteApellidos($clienteApellidos) {
        $this->clienteApellidos = $clienteApellidos;
    }

    function setClienteTelefono($clienteTelefono) {
        $this->clienteTelefono = $clienteTelefono;
    }

    function setClienteCorreo($clienteCorreo) {
        $this->clienteCorreo = $clienteCorreo;
    }

}
