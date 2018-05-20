<?php
/**
 * Description of Consultorio
 *
 * @author wpaternina
 */
class Consultorio {
    
    private $idConsultorio;
    private $nombre;
    private $pais;
    private $departamento;
    private $municipio;
    private $domicilio;
    
    function __Consultorio ($idConsultorio, $nombre, $pais, $departamento, $municipio, $domicilio) {
        $this->idConsultorio = $idConsultorio;
        $this->nombre = $nombre;
        $this->pais = $pais;
        $this->departamento = $departamento;
        $this->municipio = $municipio;
        $this->domicilio = $domicilio;
    }
    
    function getIdConsultorio() {
        return $this->idConsultorio;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPais() {
        return $this->pais;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getDomicilio() {
        return $this->domicilio;
    }

    function setIdConsultorio($idConsultorio) {
        $this->idConsultorio = $idConsultorio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

}

?>