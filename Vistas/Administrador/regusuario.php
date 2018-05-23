<?php
include_once '../../Configuracion/Conexion.php';
include_once '../../Padlock/SED.php';

include_once '../../Modelo/Roles.php';
include_once '../../Dao/IRoles.php';

include_once '../../Modelo/Medicos.php';
include_once '../../Modelo/Departamentos.php';
include_once '../../Modelo/Municipios.php';
include_once '../../Dao/IGeneral.php';
include_once '../../Controladores/ControladorGeneral.php';

$modelmedico = new Medicos();
$controlpaciente = new ControladorGeneral();


if (isset($_POST['btnguardarmedico'])) {
    $modelmedico->setTipoidentificacion($_REQUEST['txttipoidentificacionmedico']);
    $modelmedico->setIdentificacion($_REQUEST['txtidentificacionmedico']);
    $modelmedico->setDepartamentoidentificacion($_REQUEST['txtdepartamentoidentificacionmedico']);
    $modelmedico->setNombre($_REQUEST['txtnombremedico']);
    $modelmedico->setApellido($_REQUEST['txtapellidomedico']);
    $modelmedico->setApellidocasada($_REQUEST['txtapellidocasadamedico']);
    $modelmedico->setGenero($_REQUEST['txtgeneromedico']);
    $modelmedico->setFechanacimiento($_REQUEST['txtfechanacimientomedico']);
    $modelmedico->setTiposangre($_REQUEST['txttiposangremedico']);
    $modelmedico->setTelefono($_REQUEST['txttelefonomedico']);
    $modelmedico->setCelular($_REQUEST['txtcelularmedico']);
    $modelmedico->setEstadocivil($_REQUEST['txtestadocivilmedico']);
    $modelmedico->setReligion($_REQUEST['txtreligionmedico']);
    $modelmedico->setDepartamento($_REQUEST['txtdepartamentomedico']);
    $modelmedico->setMunicipio($_REQUEST['txtmunicipiomedico']);
    $modelmedico->setDomicilio($_REQUEST['txtdomiciliomedico']);
    $modelmedico->setEmail($_REQUEST['txtemailmedico']);
    $modelmedico->setClave($_REQUEST['txtclavemedico']);
    $modelmedico->setEstado($_REQUEST['txtestadomedico']);
    $controlpaciente->RegistrarMedico($modelmedico);
    echo '<script type="text/javascript">window.location.replace("LayoutAdministrador.php?load=medicos");</script>';
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
                <a class="item active" data-tab="medidco">Medico</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="medidco">
                <div class="ui segments">
                    <div class="ui blue inverted segment">
                        <h3>Registro de acceso para medicos</h3>
                    </div>
                    <div class="ui secondary segment">
                        <form class="ui form" method="POST">
                            <div class="five fields">
                                <input type="hidden" name="txtestadomedico" value="1"  required="true" size="1">
                                <div class="field">
                                    <select  name="txttipoidentificacionmedico" required="true">
                                        <option value="CC">CC</option>
                                        <option value="TE">TE</option>
                                        <option value="CE">CE</option>
                                        <option value="TI">TI</option>
                                        <option value="RC">RC</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="number" name="txtidentificacionmedico" placeholder="Identificación" required="true" size="20" onKeyPress="return SoloNumeros(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtdepartamentoidentificacionmedico" placeholder="Departamento identificación" required="true" size="35" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtnombremedico" placeholder="Nombre del paciente" required="true" size="25" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtapellidomedico" placeholder="Apellidos del paciente" required="true" size="35" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <input type="text" name="txtapellidocasadamedico" placeholder="Apellido casada" size="35" onKeyPress="return soloLetras(event);">
                                </div>
                            </div>
                            <div class="five fields">
                                <div class="field">
                                    <select name="txtgeneromedico" required="true">
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMENINO</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="date" name="txtfechanacimientomedico" placeholder="Fecha de nacimiento" required="true">
                                </div>
                                <div class="field">
                                    <select  name="txttiposangremedico" required="true">
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
                                    <input type="number" name="txttelefonomedico" placeholder="Telefono"  size="7" onKeyPress="return SoloNumeros(event);">
                                </div>
                                <div class="field">
                                    <input type="number" name="txtcelularmedico" placeholder="Celular" required="true" size="10" onKeyPress="return SoloNumeros(event);">
                                </div>
                            </div>
                            <div class="five fields">
                                <div class="field">
                                    <select  name="txtestadocivilmedico" required="true">
                                        <option value="SOLTERO/A">SOLTERO/A</option>
                                        <option value="COMPROMETIDO/A">COMPROMETIDO/A</option>
                                        <option value="CASADO/A">CASADO/A</option>
                                        <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                        <option value="VIUDO/A">VIUDO/A</option>
                                    </select>
                                </div>
                                <div class="field">
                                    <input type="text" name="txtreligionmedico" placeholder="Religión" required="true" size="50" onKeyPress="return soloLetras(event);">
                                </div>
                                <div class="field">
                                    <select id="txtdepartamentomedico" name="txtdepartamentomedico" required="true">
                                        <option value="">Departamento...</option>
                                        <?php foreach ($controlpaciente->ListaDepartamento() AS $_combodepartamento) : ?>
                                            <option value="<?php echo $_combodepartamento->getIdDepartamento('idDepartamento'); ?>"><?php echo $_combodepartamento->getDepartamento('departamento'); ?></option> 
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="field">
                                    <select id="txtmunicipiomedico" name="txtmunicipiomedico" required="true">
                                        <option value="">Municipio...</option>
                                        <?php foreach ($controlpaciente->ListaMunicipiosPorDepartamento() AS $_combodemunicipio) : ?>
                                            <option value="<?php echo $_combodemunicipio->getIdMunicipio('idMunicipio'); ?>"><?php echo $_combodemunicipio->getMunicipio('municipio'); ?></option> 
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="three fields">
                                <div class="field">
                                    <input type="text" name="txtdomiciliomedico" placeholder="Domicilio" required="true" size="120">
                                </div>
                                <div class="field">
                                    <input type="email" name="txtemailmedico" placeholder="Correo electronico" required="true" size="200">
                                </div>
                                <div class="field">
                                    <input type="password" name="txtclavemedico" placeholder="Codigo de acceso" required="true" size="10">
                                </div>
                                <div class="field">
                                    <input type="password" name="txtconfirmarclavemedico" placeholder="Confirmar codigo de acceso" required="true" size="10">
                                </div>
                            </div>
                            <input type="submit" name="btnguardarmedico" class="ui green button" value="Guardar">
                            <button name="btnregresarmedico" class="ui red button" OnClick="location.href = 'LayoutAdministrador.php?load=medicos'">Cancelar</button>
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
