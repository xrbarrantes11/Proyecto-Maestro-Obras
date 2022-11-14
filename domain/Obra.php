<?php

class Obra
{

    private $obraId;
    private $obraNombre;
    private $obraDescripcion;
    private $clienteId;
    private $obraFechaInicio;
    private $obraFechaEntrega;
    private $obraFechaEstimadaFinalizacion;
    private $obraCostoEstimado;
    private $obraCostoFinalizado;
    private $obraDiasFinalizacionAnticipada;
    private $obraDiasFinalizacionAtrasado;
    private $obraGanancia;
    private $obraPerdida;
    private $obraDiasEstimadoObra;

    function Obra($obraId, $obraNombre, $obraDescripcion, $clienteId, $obraFechaInicio, $obraFechaEntrega, $obraFechaEstimadaFinalizacion, $obraCostoEstimado, $obraCostoFinalizado,
    $obraDiasFinalizacionAnticipada, $obraDiasFinalizacionAtrasado, $obraGanancia, $obraPerdida, $obraDiasEstimadoObra)
    {

        $this->obraId = $obraId;
        $this->obraNombre = $obraNombre;
        $this->obraDescripcion = $obraDescripcion;
        $this->clienteId = $clienteId;
        $this->obraFechaInicio = $obraFechaInicio;
        $this->obraFechaEntrega = $obraFechaEntrega;
        $this->obraFechaEstimadaFinalizacion = $obraFechaEstimadaFinalizacion;
        $this->obraCostoEstimado = $obraCostoEstimado;
        $this->obraCostoFinalizado = $obraCostoFinalizado;
        $this->obraDiasFinalizacionAnticipada = $obraDiasFinalizacionAnticipada;
        $this->obraDiasFinalizacionAtrasado = $obraDiasFinalizacionAtrasado;
        $this->obraGanancia = $obraGanancia;
        $this->obraPerdida = $obraPerdida;
        $this->obraDiasEstimadoObra = $obraDiasEstimadoObra;
    }

    function getObraId()
    {
        return $this->obraId;
    }

    function getObraNombre()
    {
        return $this->obraNombre;
    }

    function getObraDescripcion()
    {
        return $this->obraDescripcion;
    }

    function getClienteId()
    {
        return $this->clienteId;
    }

    function getObraFechaInicio()
    {
        return $this->obraFechaInicio;
    }

    function getObraFechaEntrega()
    {
        return $this->obraFechaEntrega;
    }

    function getObraFechaEstimadaFinalizacion()
    {
        return $this->obraFechaEstimadaFinalizacion;
    }

    function getObraCostoEstimado()
    {
        return $this->obraCostoEstimado;
    }

    function getObraCostoFinalizado()
    {
        return $this->obraCostoFinalizado;
    }

    function getObraDiasFinalizacionAnticipada()
    {
        return $this->obraDiasFinalizacionAnticipada;
    }

    function getObraDiasFinalizacionAtrasado()
    {
        return $this->obraDiasFinalizacionAtrasado;
    }

    function getObraGanancia()
    {
        return $this->obraGanancia;
    }

    function getObraPerdida()
    {
        return $this->obraPerdida;
    }

    function getObraDiasEstimadoObra()
    {
        return $this->obraDiasEstimadoObra;
    }

    function setObraId($obraId)
    {
        $this->obraId = $obraId;
    }

    function setObraNombre($obraNombre)
    {
        $this->obraNombre = $obraNombre;
    }

    function setObraDescripcion($obraDescripcion)
    {
        $this->obraDescripcion = $obraDescripcion;
    }

    function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;
    }

    function setObraFechaInicio($obraFechaInicio)
    {
        $this->$obraFechaInicio =$obraFechaInicio;
    }

    function setObraFechaEntrega($obraFechaEntrega)
    {
        $this->obraFechaEntrega = $obraFechaEntrega;
    }

    function setObraFechaEstimadaFinalizacion($obraFechaEstimadaFinalizacion)
    {
        $this->$obraFechaEstimadaFinalizacion = $obraFechaEstimadaFinalizacion;
    }

    function setObraCostoEstimado($obraCostoEstimado)
    {
        $this->obraCostoEstimado = $obraCostoEstimado;
    }

    function setObraCostoFinalizado($obraCostoFinalizado)
    {
        $this->obraCostoFinalizado = $obraCostoFinalizado;
    }

    function setObraDiasFinalizacionAnticipada($obraDiasFinalizacionAnticipada)
    {
        $this->obraDiasFinalizacionAnticipada = $obraDiasFinalizacionAnticipada;
    }

    function setObraDiasFinalizacionAtrasado($obraDiasFinalizacionAtrasado)
    {
        $this->obraDiasFinalizacionAtrasado = $obraDiasFinalizacionAtrasado;
    }

    function setObraGanancia($obraGanancia)
    {
        $this->obraGanancia = $obraGanancia;
    }

    function setObraPerdida($obraPerdida)
    {
        $this->obraPerdida = $obraPerdida;
    }

    function setObraDiasEstimadoObra($obraDiasEstimadoObra)
    {
        $this->obraDiasEstimadoObra = $obraDiasEstimadoObra;
    }
}
