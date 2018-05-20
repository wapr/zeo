<?php
/**
 * Description of Departamentos
 *
 * @author Willian
 */
class Departamentos {
    
    private $idDepartamento;
    private $departamento;
    
    public function __Departamentos ($idDepartamento, $departamento) {
        $this->idDepartamento = $idDepartamento;
        $this->departamento = $departamento;
        
    }
            
    function getIdDepartamento() {
        return $this->idDepartamento;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function setIdDepartamento($idDepartamento) {
        $this->idDepartamento = $idDepartamento;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }
}

?>
