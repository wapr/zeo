<?php
error_reporting(0);
require_once $_SERVER['DOCUMENT_ROOT'] . "/Zeo/Configuracion/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Zeo/Dao/IPacientes.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Zeo/Modelo/Sesion.php";
/**
 * Esta clase contiene los metodos para interacturar con las diferentes vistas
 *
 * @package    Controladores
 * @author     Willian Paternina <willian.paternina@unisinu.edu.co>
 * @copyright  2017-2018 Proyecto de grado para optar el titulo de ingeniero de sistemas
 * @version    1.0
 */
class PacientesControlador extends Conexion implements IPacientes {
    
    public $objSe;
    public $result;
    
    public function __construct() {
        parent::ConexionMySQLServer();
        $this->objSe = new Sesion();
    }


    public function IniciarSesionPaciente() {
        try {
            $stm = $this->cnn->prepare("SELECT *
                                        FROM Pacientes p 
                                        INNER JOIN Roles r ON p.Rol = r.idRol
                                        WHERE p.identificacion = :identificacion AND p.clave = :clave AND p.Rol = :rol;");
            $stm->bindParam(':identificacion', $_POST["identificacion"]);
            $stm->bindParam(':clave', $_POST["clave"]);
            $stm->bindParam(':rol', $_POST["rol"]);
            $stm->execute();
            $result = $stm->fetchAll();
            if ($result) {
                $rol = $result[0]['rol'];
                switch ($rol) {
                     case 'PACIENTE' :
                         $this->objSe->init();
                         $this->objSe->set('idPaciente', $result[0]['idPaciente']);
                         $this->objSe->set('codigo', $result[0]['codigo']);
                         $this->objSe->set('nombre', $result[0]['nombre']);
                         $this->objSe->set('apellido', $result[0]['apellido']);
                         $this->objSe->set('apellidocasada', $result[0]['apellidocasada']);
                         $this->objSe->set('idRol', $result[0]['idRol']);
                         $this->objSe->set('rol', $result[0]['rol']);
                         header('Location: ../Vistas/Paciente/LayoutPaciente.php'); 
                     break;
                }
            }else {
                header('Location: ../index.php?error=1');
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listarCitas($idPaciente, $estado) {
        try {
            $sql = "CALL sp_listarCitas (?, ?);";
            $stmt = $this->cnn->prepare($sql);
            $stmt->bindParam(1, $idPaciente);
            $stmt->bindParam(2, $estado);

            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->result[] = $row;
            }
            return $this->result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function actualizarEstadoCita($idCita, $estado) {
        try {
            $sql = "CALL sp_actualizarEstadoCita (?, ?);";
            $stmt = $this->cnn->prepare($sql);
            $stmt->bindParam(1, $idCita);
            $stmt->bindParam(2, $estado);

            $stmt->execute();
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->result[] = $row;
            }
            return $this->result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listarActividades($Paciente) {
        try {
            $sql = "CALL sp_listarActividadesPacientes (?);";
            $stmt = $this->cnn->prepare($sql);
            $stmt->bindParam(1, $Paciente);

            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $this->result[] = $row;
            }
            return $this->result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listarMedicamentos($Paciente) {
        $sql = " call sp_listarMedicamentosPaciente(?); ";
        $stmt = $this->cnn->prepare($sql);
        $stmt->bindParam(1, $Paciente);

        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->result[] = $row;
        }
        return $this->result;
    }

    public function listaActividadesMedicamentos($estado, $paciente) {
        $sql = " call sp_listadoActividadesMedicamentosPacientes(?, ?); ";
        $stmt = $this->cnn->prepare($sql);
        $stmt->bindParam(1, $paciente);
        $stmt->bindParam(2, $estado);

        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->result[] = $row;
        }
        return $this->result;
    }

    public function etapaTumorPaciente($idPAciente) {
        $sql = " call sp_etapaTumorPaciente(?); ";
        $stmt = $this->cnn->prepare($sql);
        $stmt->bindParam(1, $idPAciente);

        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->result[] = $row;
        }
        return $this->result;
    }

}

if(isset($_GET["listarCitas"]) && $_GET["listarCitas"]=="listar"){
    session_start();
    error_reporting(0);
    $paciente = new PacientesControlador();
    
    $r = $paciente->listarCitas($_SESSION["idPaciente"], 'ESPERA_ATENCION');
    if(count($r) != 0){
         echo '{
            "data": [';
            for($i=0;$i<count($r)-1;$i++){
            echo ' 
              [
                "'.($i+1).'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["estado"].'",
                "'.$r[$i]["especialidad"].'",
                "'.$r[$i]["fecha"].'",
                "'.$r[$i]["horainicio"]." - ".$r[$i]["horafinal"].'",
                "'.$r[$i]["idCita"].'"
              ],';
            }
            echo ' 
              [
                "'.(count($r)).'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["estado"].'",
                "'.$r[$i]["especialidad"].'",
                "'.$r[$i]["fecha"].'",
                "'.$r[$i]["horainicio"]." - ".$r[$i]["horafinal"].'",
                "'.$r[$i]["idCita"].'"
              ]
            ]
          }';
     }else{
         echo '{
            "data": []
            }';
     }
    return;
}
if(isset($_POST["actualizarEstadoCita"]) && $_POST["actualizarEstadoCita"]=="update"){
    //print_r($_POST);return;
    $paciente = new PacientesControlador();
    $r = $paciente->actualizarEstadoCita($_POST["idCita"], $_POST["estado"]);
    echo json_encode($r);return;
}

if(isset($_GET["listarCitasRealizadas"]) && $_GET["listarCitasRealizadas"]=="listar"){
    session_start();
    error_reporting(0);
    $paciente = new PacientesControlador();
    $etapaTumor = new PacientesControlador();
    
    $r = $paciente->listarCitas($_SESSION["idPaciente"], 'ATENDIDO');
    $et = $etapaTumor->etapaTumorPaciente($_SESSION["idPaciente"]);
    //print_r($et);return;
    if(count($r) != 0){
         echo '{
            "data": [';
            for($i=0;$i<count($r)-1;$i++){
                
            echo ' 
              [
                "'.($i+1).'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["estado"].'",
                "'.$r[$i]["especialidad"].'",
                "'.$et[0]["diagnostico"].'",
                "'.$r[$i]["fecha"].'",
                "'.$r[$i]["horainicio"]." - ".$r[$i]["horafinal"].'",
                "'.$r[$i]["idCita"].'"
              ],';
            }
            
            echo ' 
              [
                "'.(count($r)).'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["estado"].'",
                "'.$r[$i]["especialidad"].'",
                "'.$et[0]["diagnostico"].'",
                "'.$r[$i]["fecha"].'",
                "'.$r[$i]["horainicio"]." - ".$r[$i]["horafinal"].'",
                "'.$r[$i]["idCita"].'"
              ]
            ]
          }';
     }else{
         echo '{
            "data": []
            }';
     }
    return;
}

if(isset($_GET["listarActividades"]) && $_GET["listarActividades"]=="listar"){
    $paciente = new PacientesControlador();
    $r = $paciente->listarActividades($_GET["idCita"]);
    
    if(count($r) != 0){
         echo '{
            "data": [';
            for($i=0;$i<count($r)-1;$i++){
            echo ' 
              [
                "'.$r[$i]["nombreetapa"].'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["estado"].'",
                "'.$r[$i]["fecharegistro"].'",
                "'.$r[$i]["numerohora"].'",
                "'.$r[$i]["numerodia"].'",
                "'.$r[$i]["frecuencia"].'"
              ],';
            }
            echo ' 
              [
                "'.$r[$i]["nombreetapa"].'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["estado"].'",
                "'.$r[$i]["fecharegistro"].'",
                "'.$r[$i]["numerohora"].'",
                "'.$r[$i]["numerodia"].'",
                "'.$r[$i]["frecuencia"].'"
              ]
            ]
          }';
     }else{
         echo '{
            "data": []
            }';          
     }
    return;
}
if(isset($_GET["listarMedicamentos"]) && $_GET["listarMedicamentos"]=="listar"){
   $paciente = new PacientesControlador();
    $r = $paciente->listarMedicamentos($_GET["idCita"]);
    //echo $r;return;
    if($r != null){
         echo '{
            "data": [';
            for($i=0;$i<count($r)-1;$i++){
            echo ' 
              [
                "'.$r[$i]["nombre"].'",
                "'.$r[$i]["nombreetapa"].'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["fecharegistro"].'",
                "'.$r[$i]["numerohora"].'",
                "'.$r[$i]["numerodia"].'"
                "'.$r[$i]["frecuencia"].'"
              ],';
            }
            echo ' 
              [
                "'.$r[$i]["nombre"].'",
                "'.$r[$i]["nombreetapa"].'",
                "'.$r[$i]["concepto"].'",
                "'.$r[$i]["fecharegistro"].'",
                "'.$r[$i]["numerohora"].'",
                "'.$r[$i]["numerodia"].'",
                "'.$r[$i]["frecuencia"].'"
              ]
            ]
          }';
     }else{
         echo '{
            "data": []
            }';
            
     }
    return; 
}

if(isset($_POST["listaActividadesMedicamentos"])){
    session_start();
    $paciente = new PacientesControlador();
    $r = $paciente->listaActividadesMedicamentos('ATENDIDO', $_SESSION["idPaciente"]);
    echo json_encode($r);
    return;
}
?>
