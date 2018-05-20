<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tumorprimario
 *
 * @author wpaternina
 */
class Tumorprimario {
    
    private $idTumorprimario;
    private $codigotp;
    private $nombretp;
    private $detalle;
    
    function __Tumorprimario($idTumorprimario, $codigotp, $nombretp, $detalle) {
        $this->idTumorprimario = $idTumorprimario;
        $this->codigotp = $codigotp;
        $this->nombretp = $nombretp;
        $this->detalle = $detalle;
    }
    
    function getIdTumorprimario() {
        return $this->idTumorprimario;
    }

    function getCodigotp() {
        return $this->codigotp;
    }

    function getNombretp() {
        return $this->nombretp;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setIdTumorprimario($idTumorprimario) {
        $this->idTumorprimario = $idTumorprimario;
    }

    function setCodigotp($codigotp) {
        $this->codigotp = $codigotp;
    }

    function setNombretp($nombretp) {
        $this->nombretp = $nombretp;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }
}

?>
