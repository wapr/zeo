<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GangliosLinfaticos
 *
 * @author wpaternina
 */
class Ganglioslinfaticos {
    
    private $idGanglioslinfaticos;
    private $codigogl;
    private $nombregl;
    private $detalle;
    
    function __Ganglioslinfaticos ($idGanglioslinfaticos, $codigogl, $nombregl, $detalle) {
        $this->idGanglioslinfaticos = $idGanglioslinfaticos;
        $this->codigogl = $codigogl;
        $this->nombregl = $nombregl;
        $this->detalle = $detalle;
    }
    
    function getIdGanglioslinfaticos() {
        return $this->idGanglioslinfaticos;
    }

    function getCodigogl() {
        return $this->codigogl;
    }

    function getNombregl() {
        return $this->nombregl;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setIdGanglioslinfaticos($idGanglioslinfaticos) {
        $this->idGanglioslinfaticos = $idGanglioslinfaticos;
    }

    function setCodigogl($codigogl) {
        $this->codigogl = $codigogl;
    }

    function setNombregl($nombregl) {
        $this->nombregl = $nombregl;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }
}

?>
