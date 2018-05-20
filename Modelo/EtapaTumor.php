<?php
/**
 * Description of EtapaTumor
 *
 * @author wpaternina
 */
class EtapaTumor {
    
    private $idEtapatumor;
    private $nombreetapa;
    private $Paciente;
    private $Tumorprimario;
    private $Ganglioslinfaticos;
    private $Metastasis;
    private $Clasificaciontumor;
    private $diagnostico;
    
    function __EtapaTumor ($idEtapatumor, $nombreetapa, $Paciente, $Tumorprimario, $Ganglioslinfaticos, $Metastasis, $Clasificaciontumor, $diagnostico) {
        $this->idEtapatumor = $idEtapatumor;
        $this->nombreetapa = $nombreetapa;
        $this->Paciente = $Paciente;
        $this->Tumorprimario = $Tumorprimario;
        $this->Ganglioslinfaticos = $Ganglioslinfaticos;
        $this->Metastasis = $Metastasis;
        $this->Clasificaciontumor = $Clasificaciontumor;
        $this->diagnostico = $diagnostico;
    }

    
    function getIdEtapatumor() {
        return $this->idEtapatumor;
    }

    function getNombreetapa() {
        return $this->nombreetapa;
    }

    function getPaciente() {
        return $this->Paciente;
    }

    function getTumorprimario() {
        return $this->Tumorprimario;
    }

    function getGanglioslinfaticos() {
        return $this->Ganglioslinfaticos;
    }

    function getMetastasis() {
        return $this->Metastasis;
    }

    function getClasificaciontumor() {
        return $this->Clasificaciontumor;
    }

    function getDiagnostico() {
        return $this->diagnostico;
    }

    function setIdEtapatumor($idEtapatumor) {
        $this->idEtapatumor = $idEtapatumor;
    }

    function setNombreetapa($nombreetapa) {
        $this->nombreetapa = $nombreetapa;
    }

    function setPaciente($Paciente) {
        $this->Paciente = $Paciente;
    }

    function setTumorprimario($Tumorprimario) {
        $this->Tumorprimario = $Tumorprimario;
    }

    function setGanglioslinfaticos($Ganglioslinfaticos) {
        $this->Ganglioslinfaticos = $Ganglioslinfaticos;
    }

    function setMetastasis($Metastasis) {
        $this->Metastasis = $Metastasis;
    }

    function setClasificaciontumor($Clasificaciontumor) {
        $this->Clasificaciontumor = $Clasificaciontumor;
    }

    function setDiagnostico($diagnostico) {
        $this->diagnostico = $diagnostico;
    }
}

?>