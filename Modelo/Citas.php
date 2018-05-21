<?php
/**
 * Description of Citas
 *
 * @author wpaternina
 */
class Citas {
    
    private $idCita;
    private $Paciente;
    private $Horario;
    private $concepto;
    private $estado;
    private $fecharegistro;
    
    function __Citas ($idCita, $Paciente, $Horario, $concepto, $estado, $fecharegistro) {
        $this->idCita = $idCita;
        $this->Paciente = $Paciente;
        $this->Horario = $Horario;
        $this->concepto = $concepto;
        $this->estado = $estado;
        $this->fecharegistro = $fecharegistro;
    }

    
    function getIdCita() {
        return $this->idCita;
    }

    function getPaciente() {
        return $this->Paciente;
    }

    function getHorario() {
        return $this->Horario;
    }

    function getConcepto() {
        return $this->concepto;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecharegistro() {
        return $this->fecharegistro;
    }

    function setIdCita($idCita) {
        $this->idCita = $idCita;
    }

    function setPaciente($Paciente) {
        $this->Paciente = $Paciente;
    }

    function setHorario($Horario) {
        $this->Horario = $Horario;
    }

    function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecharegistro($fecharegistro) {
        $this->fecharegistro = $fecharegistro;
    }
}

?>
