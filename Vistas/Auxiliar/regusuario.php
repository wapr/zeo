<?php
include_once '../../Configuracion/Conexion.php';

include_once '../../Modelo/Roles.php';
include_once '../../Dao/IRoles.php';

include_once '../../Modelo/Medicos.php';
include_once '../../Modelo/Pacientes.php';
include_once '../../Modelo/Departamentos.php';
include_once '../../Modelo/Municipios.php';
include_once '../../Dao/IGeneral.php';
include_once '../../Controladores/ControladorGeneral.php';

$modelpaciente = new Pacientes();
$modelmedico = new Medicos();
$controlpaciente = new ControladorGeneral();

if (isset($_POST['btnguardarpaciente'])) {
    $modelpaciente->setTipoidentificacion($_REQUEST['txttipoidentificacionpaciente']);
    $modelpaciente->setIdentificacion($_REQUEST['txtidentificacionpaciente']);
    $modelpaciente->setDepartamentoidentificacion($_REQUEST['txtdepartamentoidentificacionpaciente']);
    $modelpaciente->setNombre($_REQUEST['txtnombrepaciente']);
    $modelpaciente->setApellido($_REQUEST['txtapellidopaciente']);
    $modelpaciente->setApellidocasada($_REQUEST['txtapellidocasadapaciente']);
    $modelpaciente->setGenero($_REQUEST['txtgeneropaciente']);
    $modelpaciente->setFechanacimiento($_REQUEST['txtfechanacimientopaciente']);
    $modelpaciente->setTiposangre($_REQUEST['txttiposangrepaciente']);
    $modelpaciente->setTelefono($_REQUEST['txttelefonopaciente']);
    $modelpaciente->setCelular($_REQUEST['txtcelularpaciente']);
    $modelpaciente->setEstadocivil($_REQUEST['txtestadocivilpaciente']);
    $modelpaciente->setOcupacion($_REQUEST['txtocupacionpaciente']);
    $modelpaciente->setReligion($_REQUEST['txtreligionpaciente']);
    $modelpaciente->setDepartamento($_REQUEST['txtdepartamentopaciente']);
    $modelpaciente->setMunicipio($_REQUEST['txtmunicipiopaciente']);
    $modelpaciente->setDomicilio($_REQUEST['txtdomiciliopaciente']);
    $modelpaciente->setEmail($_REQUEST['txtemailpaciente']);
    $modelpaciente->setClave($_REQUEST['txtclavepaciente']);
    $controlpaciente->RegistrarPaciente($modelpaciente);
    echo '<script type="text/javascript">window.location.replace("LayoutAuxiliar.php?load=iReportPaciente");</script>';
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="Vistas/Recursos/css/makeup.css" rel="stylesheet" type="text/css"/>
        <link href="Vistas/Recursos/css/normalize.css" rel="stylesheet" type="text/css"/>
        <link href="Vistas/Recursos/lib/Semantic/semantic.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="ui raised segment">
            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="paciente">Paciente</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="paciente">
                <div class="ui segments">
                    <div class="ui blue inverted segment">
                        <h3>Registro de acceso para paciente</h3>
                    </div>
                    <div class="ui secondary segment">
                        <form class="ui form" method="POST">
                            <div class="five fields">
                                <div class="field">
                                    <select  name="txttipoidentificacionpaciente" required="true">
                                        <option value="CC">CC</option>
                                        <option value="TE">TE</option>
                                        <option value="CE">CE</option>
                                        <option value="TI">TI</option>
                                        <option value="RC">RC</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="number" name="txtidentificacionpaciente" placeholder="Identificación" required="true" size="20" onKeyPress="return SoloNumeros(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtdepartamentoidentificacionpaciente" placeholder="Departamento identificación" required="true" size="35" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtnombrepaciente" placeholder="Nombre del paciente" required="true" size="25" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtapellidopaciente" placeholder="Apellidos del paciente" required="true" size="35" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtapellidocasadapaciente" placeholder="Apellido casada" size="35" onKeyPress="return soloLetras(event);">
                                </div>
                            </div>
                            <div class="five fields">
                                <div class="field">
                                    <select name="txtgeneropaciente" required="true">
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMENINO</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="date" name="txtfechanacimientopaciente" placeholder="Fecha de nacimiento" required="true">
                                </div>
                                <div class="field">
                                    <select  name="txttiposangrepaciente" required="true">
                                        <option value="O+">O+</option>
                                        <option value="A-">A-</option>
                                        <option value="A+">A+</option>
                                        <option value="B-">B-</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="number" name="txttelefonopaciente" placeholder="Telefono"  size="7" onKeyPress="return SoloNumeros(event);">
                                </div>
                                <div class="field">
                                    <input type="number" name="txtcelularpaciente" placeholder="Celular" required="true" size="10" onKeyPress="return SoloNumeros(event);">
                                </div>
                            </div>
                            <div class="five fields">
                                <div class="field">
                                    <select  name="txtestadocivilpaciente" required="true">
                                        <option value="SOLTERO/A">SOLTERO/A</option>
                                        <option value="COMPROMETIDO/A">COMPROMETIDO/A</option>
                                        <option value="CASADO/A">CASADO/A</option>
                                        <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                        <option value="VIUDO/A">VIUDO/A</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="text" name="txtocupacionpaciente" placeholder="Ocupación" required="true" size="80" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtreligionpaciente" placeholder="Religión" required="true" size="50" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <select id="txtdepartamentopaciente" name="txtdepartamentopaciente" required="true">
                                        <option value="">Departamento...</option>
                                        <?php foreach ($controlpaciente->ListaDepartamento() AS $_combodepartamento) : ?>
                                            <option value="<?php echo $_combodepartamento->getIdDepartamento('idDepartamento'); ?>"><?php echo $_combodepartamento->getDepartamento('departamento'); ?></option> 
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="field">
                                    <select id="txtmunicipiopaciente" name="txtmunicipiopaciente" required="true">
                                        <option value="">Municipio...</option>
                                        <?php foreach ($controlpaciente->ListaMunicipiosPorDepartamento() AS $_combodemunicipio) : ?>
                                        <option value="<?php echo $_combodemunicipio->getIdMunicipio('idmunicipio'); ?>"><?php echo $_combodemunicipio->getMunicipio('municipio'); ?></option> 
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="three fields">
                                <div class="field">
                                    <input type="text" name="txtdomiciliopaciente" placeholder="Domicilio" required="true" size="120">
                                </div>
                                <div class="field">
                                    <input type="email" name="txtemailpaciente" placeholder="Correo electronico" required="true" size="200">
                                </div>
                                <div class="field">
                                    <input type="password" name="txtclavepaciente" placeholder="Codigo de acceso" required="true" size="10">
                                </div>
                                <div class="field">
                                    <input type="password" name="txtconfirmarclavepaciente" placeholder="Confirmar codigo de acceso" required="true" size="10">
                                </div>
                            </div>
                            <input type="submit" name="btnguardarpaciente" class="ui green button" value="Guardar">
                            <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutAuxiliar.php?load=iReportPaciente'">Cancelar</button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="Vistas/Recursos/js/jquery.min.js" type="text/javascript"></script>
        <script src="Vistas/Recursos/lib/Semantic/semantic.js" type="text/javascript"></script>
        <script src="Vistas/Recursos/js/tab.js" type="text/javascript"></script>
        <script src="Vistas/Recursos/js/dropdown.js" type="text/javascript"></script>
        <script src="Vistas/Recursos/js/validatenumbersletters.js" type="text/javascript"></script>
        <script src="Vistas/Recursos/js/ValidatePassword.js" type="text/javascript"></script>
        <script src="Vistas/Recursos/js/ValidatePasswordMedico.js" type="text/javascript"></script>
    </body>
</html>
