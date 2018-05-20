<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Metastasis
 *
 * @author wpaternina
 */
class Metastasis {
    
    private $idMetastasis;
    private $codigom;
    private $nombrem;
    private $detalle;
    
    public function __Metastasis($idMetastasis, $codigom, $nombrem, $detalle) {
        $this->idMetastasis = $idMetastasis;
        $this->codigom = $codigom;
        $this->nombrem = $nombrem;
        $this->detalle = $detalle;
    }

    
    function getIdMetastasis() {
        return $this->idMetastasis;
    }

    function getCodigom() {
        return $this->codigom;
    }

    function getNombrem() {
        return $this->nombrem;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setIdMetastasis($idMetastasis) {
        $this->idMetastasis = $idMetastasis;
    }

    function setCodigom($codigom) {
        $this->codigom = $codigom;
    }

    function setNombrem($nombrem) {
        $this->nombrem = $nombrem;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }
}

?>
