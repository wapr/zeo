<?php
     include_once '../../Configuracion/Conexion.php';
     include_once '../../Padlock/SED.php';

     include_once '../../Modelo/Roles.php';
     include_once '../../Dao/IRoles.php';
     include_once '../../Dao/IAdministradores.php';
     include_once '../../Dao/IGeneral.php';

     include_once '../../Modelo/Medicos.php';
     include_once '../../Modelo/Departamentos.php';
     include_once '../../Modelo/Municipios.php';
     include_once '../../Controladores/ControladorGeneral.php';
     include_once '../../Controladores/AdministradorControlador.php';

     $modelmedico = new Medicos();
     $controladministrador = new AdministradorControlador();
     
     $controlador = new ControladorGeneral();
     $medicoedit = $controlador->ListarMedicoId($_GET["idMedico"]);
     if (isset($_POST["btnEditarMedico"]) && $_POST["btnEditarMedico"] == "Guardar") {
         $datos = array(
             "idMedico" => $_POST["idMedico"],
             "identificacion" => $_POST["txtidentificacionmedico"],
             "departamentoidentificacion" => $_POST["txtdepartamentoidentificacionmedico"],
             "nombre" => $_POST["txtnombremedico"],
             "apellido" => $_POST["txtapellidomedico"],
             "apellidocasada" => $_POST["txtapellidocasadamedico"],
             "genero" => $_POST["txtgeneromedico"],
             "fechanacimiento" => $_POST["txtfechanacimientomedico"],
             "tiposangre" => $_POST["txttiposangremedico"],
             "telefono" => $_POST["txttelefonomedico"],
             "celular" => $_POST["txtcelularmedico"],
             "estadocivil" => $_POST["txtestadocivilmedico"],
             "domicilio" => $_POST["txtdomiciliomedico"],
             "email" => $_POST["txtemailmedico"],
             "clave" => $_POST["txtclavemedico"],
             "estado" => $_POST["txtestadomedico"]
         );
         $r = $controlador->ActualizarMedico($datos);
         if ($r[0]["exito"] == "ok") {
             echo '<script>alert("los datos se actualizaron de manera correcta"); window.location="LayoutAdministrador.php?load=medicos";</script>';
         return;
    }
}
?>
<div class="ui raised segment">
    <div class="ui top attached tabular menu">
        <a class="item active" data-tab="medidco">Medico</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="medidco">
        <div class="ui segments">
            <div class="ui blue inverted segment">
                <h3>Actualizar registro de medicos</h3>
            </div>
            <div class="ui secondary segment">
                <form class="ui form" method="POST">                       
                    <input type="hidden" name="txtestadomedico" value="<?php echo $medicoedit[0]->getEstado(); ?>"  required="true" size="1">
                    <div class="five fields">
                        <div class="field">
                            <input type="number" name="txtidentificacionmedico" value="<?php echo $medicoedit[0]->getIdentificacion(); ?>" placeholder="Identificación" required="true" size="20" onKeyPress="return SoloNumeros(event);">
                        </div>
                        <div class="field">
                            <input type="text" name="txtdepartamentoidentificacionmedico" value="<?php echo $medicoedit[0]->getDepartamentoidentificacion(); ?>" placeholder="Departamento identificación" required="true" size="35" onKeyPress="return soloLetras(event);">
                        </div>
                        <div class="field">
                            <input type="text" name="txtnombremedico" placeholder="Nombre del paciente" value="<?php echo $medicoedit[0]->getNombre(); ?>" required="true" size="25" onKeyPress="return soloLetras(event);">
                        </div>
                        <div class="field">
                            <input type="text" name="txtapellidomedico" placeholder="Apellidos del paciente" value="<?php echo $medicoedit[0]->getApellido(); ?>" required="true" size="35" onKeyPress="return soloLetras(event);">
                        </div>
                        <div class="field">
                            <input type="text" name="txtapellidocasadamedico" placeholder="Apellido casada" value="<?php echo $medicoedit[0]->getApellidocasada(); ?>" size="35" onKeyPress="return soloLetras(event);">
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
                            <input type="date" name="txtfechanacimientomedico" value="<?php echo $medicoedit[0]->getFechanacimiento(); ?>" placeholder="Fecha de nacimiento" required="true">
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
                            <input type="number" name="txttelefonomedico" placeholder="Telefono" value="<?php echo $medicoedit[0]->getTelefono(); ?>"  size="7" onKeyPress="return SoloNumeros(event);">
                        </div>
                        <div class="field">
                            <input type="number" name="txtcelularmedico" placeholder="Celular" value="<?php echo $medicoedit[0]->getCelular(); ?>" required="true" size="10" onKeyPress="return SoloNumeros(event);">
                        </div>
                    </div>
                    <div class="three fields">
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
                            <input type="text" name="txtdomiciliomedico" placeholder="Domicilio" value="<?php echo $medicoedit[0]->getDomicilio(); ?>" required="true" size="120">
                        </div>
                        <div class="field">
                            <input type="email" name="txtemailmedico" placeholder="Correo electronico" value="<?php echo $medicoedit[0]->getEmail(); ?>" required="true" size="200">
                        </div>
                    </div>
                    <div class="field">
                        <input type="password" name="txtclavemedico" placeholder="Codigo de acceso" value="<?php echo $medicoedit[0]->getClave(); ?>" required="true" size="10">
                    </div>
                    <input type="hidden" name="idMedico" value="<?php echo $medicoedit[0]->getIdMedico() ?>" >
                    <input type="submit" name="btnEditarMedico" class="ui green button" value="Guardar">
                </form>
            </div>
            </form>
        </div>
    </div>
</div>