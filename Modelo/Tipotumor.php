<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tipotumor
 *
 * @author wpaternina
 */
class Tipotumor {
    
    private $idTipotumor;
    private $codigotTumor;
    private $nombreTumor;
    private $detalle;
    
    function __Tipotumor($idTipotumor, $codigotTumor, $nombreTumor, $detalle) {
        $this->idTipotumor = $idTipotumor;
        $this->codigotTumor = $codigotTumor;
        $this->nombreTumor = $nombreTumor;
        $this->detalle = $detalle;
    }
    
    function getIdTipotumor() {
        return $this->idTipotumor;
    }

    function getCodigotTumor() {
        return $this->codigotTumor;
    }

    function getNombreTumor() {
        return $this->nombreTumor;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setIdTipotumor($idTipotumor) {
        $this->idTipotumor = $idTipotumor;
    }

    function setCodigotTumor($codigotTumor) {
        $this->codigotTumor = $codigotTumor;
    }

    function setNombreTumor($nombreTumor) {
        $this->nombreTumor = $nombreTumor;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }
}

?>
