<?php
/**
 * Description of ControladorGeneral
 *
 * @author Willian
 */
class ControladorGeneral extends Conexion implements IGeneral {

    public function __construct() {
        parent::ConexionMySQLServer();
    }
    
    public function RegistrarPaciente(Pacientes $pacientes) {
         try {
            $sql = "CALL sp_RegisterPaciente (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $this->cnn->prepare($sql)->execute(array(
                $pacientes->getTipoidentificacion('tipoidentificacion'),
                $pacientes->getIdentificacion('identificacion'),
                $pacientes->getDepartamentoidentificacion('departamentoidentificacion'),
                $pacientes->getNombre('nombre'),
                $pacientes->getApellido('apellido'),
                $pacientes->getApellidocasada('apellidocasada'),
                $pacientes->getGenero('genero'),
                $pacientes->getFechanacimiento('fechanacimiento'),
                $pacientes->getTiposangre('tiposangre'),
                $pacientes->getTelefono('telefono'),
                $pacientes->getCelular('celular'),
                $pacientes->getEstadocivil('estadocivil'),
                $pacientes->getOcupacion('ocupacion'),
                $pacientes->getReligion('religion'),
                $pacientes->getDepartamento('departamento'),
                $pacientes->getMunicipio('municipio'),
                $pacientes->getDomicilio('domicilio'),
                $pacientes->getEmail('email'),
                $pacientes->getClave('clave'))
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
   

    public function RegistrarMedico(Medicos $medicos) {
         try {
            $sql = "CALL sp_RegisterMedico (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $this->cnn->prepare($sql)->execute(array(
                $medicos->getTipoidentificacion('tipoidentificacion'),
                $medicos->getIdentificacion('identificacion'),
                $medicos->getDepartamentoidentificacion('departamentoidentificacion'),
                $medicos->getNombre('nombre'),
                $medicos->getApellido('apellido'),
                $medicos->getApellidocasada('apellidocasada'),
                $medicos->getGenero('genero'),
                $medicos->getFechanacimiento('fechanacimiento'),
                $medicos->getTiposangre('tiposangre'),
                $medicos->getTelefono('telefono'),
                $medicos->getCelular('celular'),
                $medicos->getEstadocivil('estadocivil'),
                $medicos->getReligion('religion'),
                $medicos->getDepartamento('departamento'),
                $medicos->getMunicipio('municipio'),
                $medicos->getDomicilio('domicilio'),
                $medicos->getEmail('email'),
                $medicos->getClave('clave'),
                $medicos->getEstado('estado'))
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaDepartamento() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_ListaDepartamentos();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_departamentos) {
                $departamentos = new Departamentos();
                $departamentos->setIdDepartamento($_departamentos->idDepartamento);
                $departamentos->setDepartamento($_departamentos->departamento);
                $result[] = $departamentos;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaMunicipiosPorDepartamento() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_ListaMunicipios();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_municipios) {
                $municipios = new Municipios();
                $municipios->setIdMunicipio($_municipios->idMunicipio);
                $municipios->setMunicipio($_municipios->municipio);
                $municipios->setDepartamento($_municipios->departamento);
                $result[] = $municipios;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaHv() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_ListarHv();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_hv) {
                $hv = new Hv();
                $hv->setIdHv($_hv->idHv);
                $hv->setFoto($_hv->foto);
                $hv->setMedico($_hv->Medico);
                $hv->setTrayectoria($_hv->trayectoria);
                $hv->setExperienciaprofesional($_hv->experienciaprofesional);
                $hv->setLogrosacademicos($_hv->logrosacademicos);
                $hv->setPublicacionesconferencias($_hv->publicacionesconferencias);
                $hv->setIdiomas($_hv->idiomas);
                $result[] = $hv;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarHv(Hv $hv) {
        try {
            $sql = "CALL sp_RegisterHv (?, ?, ?, ?, ?, ?, ?);";
            $this->cnn->prepare($sql)->execute(array(
                $hv->getFoto("foto"),
                $hv->getMedico("medico"),
                $hv->getTrayectoria("trayectoria"),
                $hv->getExperienciaprofesional("experienciaprofesional"),
                $hv->getLogrosacademicos("logrosacademicos"),
                $hv->getPublicacionesconferencias("publicacionesconferencias"),
                $hv->getIdiomas("idiomas"))
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function ListaMedicos() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_GetMedico ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_medicos) {
                $medicos = new Medicos();
                $medicos->setIdMedico($_medicos->idMedico);
                $medicos->setRol($_medicos->Rol);
                $medicos->setTipoidentificacion($_medicos->tipoidentificacion);
                $medicos->setIdentificacion($_medicos->identificacion);
                $medicos->setDepartamentoidentificacion($_medicos->departamentoidentificacion);
                $medicos->setNombre($_medicos->nombre);
                $medicos->setApellido($_medicos->apellido);
                $medicos->setApellidocasada($_medicos->apellidocasada);
                $medicos->setGenero($_medicos->genero);
                $medicos->setFechanacimiento($_medicos->fechanacimiento);
                $medicos->setTiposangre($_medicos->tiposangre);
                $medicos->setTelefono($_medicos->telefono);
                $medicos->setCelular($_medicos->celular);
                $medicos->setEstadocivil($_medicos->estadocivil);
                $medicos->setOcupacion($_medicos->ocupacion);
                $medicos->setReligion($_medicos->religion);
                $medicos->setPais($_medicos->pais);
                $medicos->setDepartamento($_medicos->departamento);
                $medicos->setMunicipio($_medicos->municipio);
                $medicos->setDomicilio($_medicos->domicilio);
                $medicos->setEmail($_medicos->email);
                $medicos->setClave($_medicos->clave);
                $medicos->setFecharegistro($_medicos->fecharegistro);
                $medicos->setEstado($_medicos->estado);
                $result[] = $medicos;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaConsultorioDetallado() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_Consultorios();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_consultorio) {
                $consultorios = new Consultorio();
                $consultorios->setIdConsultorio($_consultorio->idConsultorio);
                $consultorios->setNombre($_consultorio->nombre);
                $consultorios->setPais($_consultorio->pais);
                $consultorios->setDepartamento($_consultorio->departamento);
                $consultorios->setMunicipio($_consultorio->municipio);
                $consultorios->setDomicilio($_consultorio->domicilio);
                $result[] = $consultorios;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaEtapaTumor() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_listarEtapaTumor ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_etapatumor) {
                $etapatumor = new EtapaTumor();
                $etapatumor->setIdEtapatumor($_etapatumor->idEtapatumor);
                $etapatumor->setNombreetapa($_etapatumor->nombreetapa);
                $etapatumor->setPaciente($_etapatumor->paciente);
                $etapatumor->setTumorprimario($_etapatumor->tumorprimario);
                $etapatumor->setGanglioslinfaticos($_etapatumor->ganglioslinfaticos);
                $etapatumor->setMetastasis($_etapatumor->metastasis);
                $etapatumor->setClasificaciontumor($_etapatumor->nombreclasificacion);
                $etapatumor->setDiagnostico($_etapatumor->diagnostico);
                $result[] = $etapatumor;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarConsultorio(Consultorio $consultorio) {
        try {
            $sql = "CALL sp_registroconsultorio (?, ?, ?, ?);";
            $this->cnn->prepare($sql)->execute(array(
                $consultorio->getNombre("nombre"),
                $consultorio->getDepartamento("departamento"),
                $consultorio->getMunicipio("municipio"),
                $consultorio->getDomicilio("domicilio"))
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarEtapaTumor(EtapaTumor $etapatumor) {
        try {
            $sql = "CALL sp_regEtapatumor (?, ?, ?, ?, ?, ?, ?);";
            $this->cnn->prepare($sql)->execute(array(
                $etapatumor->getNombreetapa("nombreetapa"),
                $etapatumor->getPaciente("Paciente"),
                $etapatumor->getTumorprimario("Tumorprimario"),
                $etapatumor->getGanglioslinfaticos("Ganglioslinfaticos"),
                $etapatumor->getMetastasis("Metastasis"),
                $etapatumor->getClasificaciontumor("Clasificaciontumor"),
                $etapatumor->getDiagnostico("Diagnostico"))
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaClasificaciontumor() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_GetClasificaciontumor ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_clasificaciontumor) {
                $clasificaciontumor = new Clasificaciontumor();
                $clasificaciontumor->setIdClasificaciontumor($_clasificaciontumor->idClasificaciontumor);
                $clasificaciontumor->setTipotumores($_clasificaciontumor->Tipotumores);
                $clasificaciontumor->setNombreclasificacion($_clasificaciontumor->nombreclasificacion);
                $clasificaciontumor->setDetalle($_clasificaciontumor->detalle);
                $result[] = $clasificaciontumor;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaGanglioslinfaticos() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_ListaGanglioslinfaticos ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_ganglioslinfaticos) {
                $ganglioslinfaticos = new Ganglioslinfaticos();
                $ganglioslinfaticos->setIdGanglioslinfaticos($_ganglioslinfaticos->idGanglioslinfaticos);
                $ganglioslinfaticos->setCodigogl($_ganglioslinfaticos->codigogl);
                $ganglioslinfaticos->setNombregl($_ganglioslinfaticos->nombregl);
                $ganglioslinfaticos->setDetalle($_ganglioslinfaticos->detalle);
                $result[] = $ganglioslinfaticos;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaMetastasis() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_ListaMetastasis ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_metastasis) {
                $metastasis = new Metastasis();
                $metastasis->setIdMetastasis($_metastasis->idMetastasis);
                $metastasis->setCodigom($_metastasis->codigom);
                $metastasis->setNombrem($_metastasis->nombrem);
                $metastasis->setDetalle($_metastasis->detalle);
                $result[] = $metastasis;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaTipotumor() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_GetTipoTumor ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_tipotumor) {
                $tipotumor = new Tipotumor();
                $tipotumor->setIdTipotumor($_tipotumor->idTipotumor);
                $tipotumor->setCodigotTumor($_tipotumor->codigotTumor);
                $tipotumor->setNombreTumor($_tipotumor->nombreTumor);
                $tipotumor->setDetalle($_tipotumor->detalle);
                $result[] = $tipotumor;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaTumorprimario() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_ListaTumorprimario ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_tumorprimario) {
                $tumorprimario = new Tumorprimario();
                $tumorprimario->setIdTumorprimario($_tumorprimario->idTumorprimario);
                $tumorprimario->setCodigotp($_tumorprimario->codigotp);
                $tumorprimario->setNombretp($_tumorprimario->nombretp);
                $tumorprimario->setDetalle($_tumorprimario->detalle);
                $result[] = $tumorprimario;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarClasificacionTumor(Clasificaciontumor $clasificaciontumor) {
        try {
            $sql = "CALL sp_regClasificaciontumor (?, ?, ?);";
            $this->cnn->prepare($sql)->execute(array(
                $clasificaciontumor->getTipotumores("tipotumores"),
                $clasificaciontumor->getNombreclasificacion("nombreclasificacion"),
                $clasificaciontumor->getDetalle("detalle"))
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarTipoTumor(Tipotumor $tipotumor) {
        try {
            $sql = "CALL sp_regTipotumor (?, ?, ?);";
            $this->cnn->prepare($sql)->execute(array(
                $tipotumor->getCodigotTumor("codigotTumor"),
                $tipotumor->getNombreTumor("nombreTumor"),
                $tipotumor->getDetalle("detalle"))
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function ListaConsultorio() {
        try {
            $sql = "CALL sp_NombreConsultorios ();";
            $stmt = $this->cnn->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->result[] = $row;
            }

            return $this->result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function ListaMedicamentos() {
        try {
            $result = array();
            $stm = $this->cnn->prepare("CALL sp_listarMedicamentos ();");
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $_medicamentos) {
                $medicamentos = new Medicamentos();
                $medicamentos->setIdMedicamento($_medicamentos->idMedicamento);
                $medicamentos->setCodigomaterial($_medicamentos->codigomaterial);
                $medicamentos->setEan($_medicamentos->ean);
                $medicamentos->setNombre($_medicamentos->nombre);
                $medicamentos->setPresentacion($_medicamentos->presentacion);
                $medicamentos->setViaadministracion($_medicamentos->viaadministracion);
                $medicamentos->setDisis($_medicamentos->disis);
                $medicamentos->setEfectosadversos($_medicamentos->efectosadversos);
                $medicamentos->setIndicaciones($_medicamentos->indicaciones);
                $result[] = $medicamentos;
            }
            return $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarMedicamentos(Medicamentos $medicamentos) {
        
    }

}

?>