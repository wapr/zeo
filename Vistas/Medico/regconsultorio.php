<?php
include_once '../../Configuracion/Conexion.php';

include_once '../../Modelo/Consultorio.php';
include_once '../../Modelo/Departamentos.php';
include_once '../../Modelo/Municipios.php';
include_once '../../Dao/IGeneral.php';
include_once '../../Controladores/ControladorGeneral.php';

$modelconsultorio = new Consultorio();
$controlconsultorio = new ControladorGeneral();

if (isset($_POST['btnguardarconsultorio'])) {
    $modelconsultorio->setNombre($_REQUEST['txtnombreconsultorio']);
    $modelconsultorio->setDepartamento($_REQUEST['txtdepartamento']);
    $modelconsultorio->setMunicipio($_REQUEST['txtmunicipio']);
    $modelconsultorio->setDomicilio($_REQUEST['txtdomicilioconsultorio']);
    $controlconsultorio->RegistrarConsultorio($modelconsultorio);
    echo '<script type="text/javascript">window.location.replace("LayoutMedico.php?load=consultorios");</script>';
    exit;
}
?>
<div class="ui raised segment">
    <div class="ui segments">
        <div class="ui blue inverted segment">
            <h3>Registrar consultorio</h3>
        </div>
        <div class="ui secondary segment">
            <form class="ui form" method="POST">
                <div class="four fields">
                    <div class="field">
                        <input type="text" name="txtnombreconsultorio" placeholder="Nombre de consultorio" required="true" size="180">
                    </div>
                    <div class="field">
                        <select id="txtdepartamento" name="txtdepartamento" required="true">
                            <option value="">Departamento...</option>
                            <?php foreach ($controlconsultorio->ListaDepartamento() AS $_combodepartamento) : ?>
                                <option value="<?php echo $_combodepartamento->getIdDepartamento('idDepartamento'); ?>"><?php echo $_combodepartamento->getDepartamento('departamento'); ?></option> 
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field">
                        <select id="txtmunicipio" name="txtmunicipio" required="true">
                            <option value="">Municipio...</option>
                            <?php foreach ($controlconsultorio->ListaMunicipiosPorDepartamento() AS $_combodemunicipio) : ?>
                                <option value="<?php echo $_combodemunicipio->getIdMunicipio('idmunicipio'); ?>"><?php echo $_combodemunicipio->getMunicipio('municipio'); ?></option> 
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field">
                        <input type="text" name="txtdomicilioconsultorio" placeholder="Domicilio" required="true" size="180">
                    </div>
                </div>
                <input type="submit" name="btnguardarconsultorio" class="ui green button" value="Guardar">
                <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=consultorios'">Cancelar</button>
            </form>
        </div>
    </div>
</div>