<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clasificaciontumor
 *
 * @author wpaternina
 */
class Clasificaciontumor {
    
    private $idClasificaciontumor;
    private $Tipotumores;
    private $nombreclasificacion;
    private $detalle;
    
    function __Clasificaciontumor ($idClasificaciontumor, $Tipotumores, $nombreclasificacion, $detalle) {
        $this->idClasificaciontumor = $idClasificaciontumor;
        $this->Tipotumores = $Tipotumores;
        $this->nombreclasificacion = $nombreclasificacion;
        $this->detalle = $detalle;
    }

    function getIdClasificaciontumor() {
        return $this->idClasificaciontumor;
    }

    function getTipotumores() {
        return $this->Tipotumores;
    }

    function getNombreclasificacion() {
        return $this->nombreclasificacion;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setIdClasificaciontumor($idClasificaciontumor) {
        $this->idClasificaciontumor = $idClasificaciontumor;
    }

    function setTipotumores($Tipotumores) {
        $this->Tipotumores = $Tipotumores;
    }

    function setNombreclasificacion($nombreclasificacion) {
        $this->nombreclasificacion = $nombreclasificacion;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }
}

?>
