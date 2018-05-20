<?php
/**
 * Description of Municipios
 *
 * @author Willian
 */
class Municipios extends Departamentos {
    
    private $idMunicipio;
    private $municipio;
    private $Departamento;
    
    function __Municipios ($idDepartamento, $departamento, $idMunicipio, $municipio, $Departamento) {
        parent::__Departamentos($idDepartamento, $departamento);
        $this->idDepartamento = $idDepartamento;
        $this->departamento = $departamento;
        $this->idMunicipio = $idMunicipio;
        $this->municipio = $municipio;
        $this->Departamento = $Departamento;
    }

    
    function getIdMunicipio() {
        return $this->idMunicipio;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getDepartamento() {
        return $this->Departamento;
    }

    function setIdMunicipio($idMunicipio) {
        $this->idMunicipio = $idMunicipio;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    function setDepartamento($Departamento) {
        $this->Departamento = $Departamento;
    }    
}

?>
