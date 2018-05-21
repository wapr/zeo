<?php
error_reporting(0);
include_once '../../Configuracion/Conexion.php';

include_once '../../Modelo/Consultorio.php';
include_once '../../Modelo/Departamentos.php';
include_once '../../Modelo/Municipios.php';
include_once '../../Dao/IGeneral.php';
include_once '../../Controladores/ControladorGeneral.php';



$controlador = new ControladorGeneral();
$consultorio = $controlador->ListarConsultorioId($_GET["idconsultorio"]);

if(isset($_POST["btnguardarconsultorio"]) && $_POST["btnguardarconsultorio"]=="Guardar"){
    
    $datos = array(
        "idCOnsultorio" => $_POST["idConsultorio"],
        "nombre" => $_POST["txtnombreconsultorio"],
        "pais" => "COLOMBIA",
        "departamento" => $_POST["txtdepartamento"],
        "municipio" => $_POST["txtmunicipio"],
        "domicilio" => $_POST["txtdomicilioconsultorio"],
    );
    
    $r = $controlador->ActualizarConsultorio($datos);
    if($r[0]["exito"]=="ok"){
        echo '<script>alert("los datos se actualizaron de manera correcta");window.location="LayoutMedico.php?load=consultorios"; </script>';return;
     }
}

$modelconsultorio = new Consultorio();
$controlconsultorio = new ControladorGeneral();
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
                        <input type="text" name="txtnombreconsultorio" value="<?php echo $consultorio[0]->getNombre(); ?>" placeholder="Nombre de consultorio" required="true" size="180">
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
                        <input type="text" name="txtdomicilioconsultorio" value="<?php echo $consultorio[0]->getDomicilio(); ?>"  placeholder="Domicilio" required="true" size="180">
                    </div>
                </div>
                <input type="hidden" name="idConsultorio" value="<?php echo $_GET["idconsultorio"]; ?>" >
                <input type="submit" name="btnguardarconsultorio" class="ui green button" value="Guardar">
                <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=consultorios'">Cancelar</button>
            </form>
        </div>
    </div>
</div>