<?php
/**
 * Description of Hv
 *
 * @author Willian
 */
class Hv extends Medicos {
    
    private $idHv;
    private $foto;
    private $Medico;
    private $trayectoria;
    private $experienciaprofesional;
    private $logrosacademicos;
    private $publicacionesconferencias;
    private $idiomas;
    
    
    function __Hv ($idRol, $rol, $detalle, $idMedico, $codigo, $Rol, $tipoidentificacion, $identificacion, $nombre, $apellido, $apellidocasada, $genero, $fechanacimiento, $tiposangre, $telefono, $celular, $estadocivil, $ocupacion, $religion, $pais, $departamento, $municipio, $domicilio, $email, $clave, $fecharegistro, $estado, $idHv, $foto, $Medico, $trayectoria, $experienciaprofesional, $logrosacademicos, $publicacionesconferencias, $idiomas) {
        parent::__Medicos($idRol, $rol, $detalle, $idMedico, $codigo, $Rol, $tipoidentificacion, $identificacion, $nombre, $apellido, $apellidocasada, $genero, $fechanacimiento, $tiposangre, $telefono, $celular, $estadocivil, $ocupacion, $religion, $pais, $departamento, $municipio, $domicilio, $email, $clave, $fecharegistro, $estado);
        $this->idMedico = $idMedico;
        $this->codigo = $codigo;
        $this->Rol = $Rol;
        $this->tipoidentificacion = $tipoidentificacion;
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->apellidocasada = $apellidocasada;
        $this->genero = $genero;
        $this->fechanacimiento = $fechanacimiento;
        $this->tiposangre = $tiposangre;
        $this->telefono = $telefono;
        $this->celular = $celular;
        $this->estadocivil = $estadocivil;
        $this->ocupacion = $ocupacion;
        $this->religion = $religion;
        $this->pais = $pais;
        $this->departamento = $departamento;
        $this->municipio = $municipio;
        $this->domicilio = $domicilio;
        $this->email = $email;
        $this->clave = $clave;
        $this->fecharegistro = $fecharegistro;
        $this->estado = $estado;
        $this->idHv = $idHv;
        $this->foto = $foto;
        $this->Medico = $Medico;
        $this->trayectoria = $trayectoria;
        $this->experienciaprofesional = $experienciaprofesional;
        $this->logrosacademicos = $logrosacademicos;
        $this->publicacionesconferencias = $publicacionesconferencias;
        $this->idiomas = $idiomas;
    }

    
    function getIdHv() {
        return $this->idHv;
    }

    function getFoto() {
        return $this->foto;
    }

    function getMedico() {
        return $this->Medico;
    }

    function getTrayectoria() {
        return $this->trayectoria;
    }

    function getExperienciaprofesional() {
        return $this->experienciaprofesional;
    }

    function getLogrosacademicos() {
        return $this->logrosacademicos;
    }

    function getPublicacionesconferencias() {
        return $this->publicacionesconferencias;
    }

    function getIdiomas() {
        return $this->idiomas;
    }

    function setIdHv($idHv) {
        $this->idHv = $idHv;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setMedico($Medico) {
        $this->Medico = $Medico;
    }

    function setTrayectoria($trayectoria) {
        $this->trayectoria = $trayectoria;
    }

    function setExperienciaprofesional($experienciaprofesional) {
        $this->experienciaprofesional = $experienciaprofesional;
    }

    function setLogrosacademicos($logrosacademicos) {
        $this->logrosacademicos = $logrosacademicos;
    }

    function setPublicacionesconferencias($publicacionesconferencias) {
        $this->publicacionesconferencias = $publicacionesconferencias;
    }

    function setIdiomas($idiomas) {
        $this->idiomas = $idiomas;
    }
}

?>