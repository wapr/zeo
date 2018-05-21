<?php
/**
 * Description of Medicamentos
 *
 * @author wpaternina
 */
class Medicamentos {
    
    private $idMedicamento;
    private $codigomaterial;
    private $ean;
    private $nombre;
    private $presentacion;
    private $viaadministracion;
    private $disis;
    private $efectosadversos;
    private $indicaciones;
    
    public function __Medicamentos ($idMedicamento, $codigomaterial, $ean, $nombre, $presentacion, $viaadministracion, $disis, $efectosadversos, $indicaciones) {
        $this->idMedicamento = $idMedicamento;
        $this->codigomaterial = $codigomaterial;
        $this->ean = $ean;
        $this->nombre = $nombre;
        $this->presentacion = $presentacion;
        $this->viaadministracion = $viaadministracion;
        $this->disis = $disis;
        $this->efectosadversos = $efectosadversos;
        $this->indicaciones = $indicaciones;
    }
    
    public function getIdMedicamento() {
        return $this->idMedicamento;
    }

    public function getCodigomaterial() {
        return $this->codigomaterial;
    }

    public function getEan() {
        return $this->ean;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPresentacion() {
        return $this->presentacion;
    }

    function getViaadministracion() {
        return $this->viaadministracion;
    }

    function getDisis() {
        return $this->disis;
    }

    function getEfectosadversos() {
        return $this->efectosadversos;
    }

    function getIndicaciones() {
        return $this->indicaciones;
    }

    function setIdMedicamento($idMedicamento) {
        $this->idMedicamento = $idMedicamento;
    }

    function setCodigomaterial($codigomaterial) {
        $this->codigomaterial = $codigomaterial;
    }

    function setEan($ean) {
        $this->ean = $ean;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPresentacion($presentacion) {
        $this->presentacion = $presentacion;
    }

    function setViaadministracion($viaadministracion) {
        $this->viaadministracion = $viaadministracion;
    }

    function setDisis($disis) {
        $this->disis = $disis;
    }

    function setEfectosadversos($efectosadversos) {
        $this->efectosadversos = $efectosadversos;
    }

    function setIndicaciones($indicaciones) {
        $this->indicaciones = $indicaciones;
    }
}

?>