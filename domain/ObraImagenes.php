<?php


class ObraImagenes{

    private $obraImagenesId;
    private $obraId;
    private $obraImagenesRuta;

    public function ObraImagenes($obraImagenesId, $obraId, $obraImagenesRuta){
        $this->obraImagenesId = $obraImagenesId;
        $this->obraId = $obraId;
        $this->obraImagenesRuta = $obraImagenesRuta;
    }


	public function getObraImagenesId() {
		return $this->obraImagenesId;
	}

	public function setObraImagenesId($obraImagenesId) {
		$this->obraImagenesId = $obraImagenesId;
	}

	public function getObraId() {
		return $this->obraId;
	}


	public function setObraId($obraId) {
		$this->obraId = $obraId;
	}

	public function getObraImagenesRuta() {
		return $this->obraImagenesRuta;
	}


	public function setObraImagenesRuta($obraImagenesRuta) {
		$this->obraImagenesRuta = $obraImagenesRuta;
	}
}