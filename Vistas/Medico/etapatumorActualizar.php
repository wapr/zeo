<?php
    error_reporting(0);
     include_once '../../Configuracion/Conexion.php';
     
     include_once '../../Modelo/Roles.php';
     include_once '../../Modelo/Pacientes.php';
     include_once '../../Modelo/EtapaTumor.php';
     include_once '../../Modelo/Tumorprimario.php';
     include_once '../../Modelo/Ganglioslinfaticos.php';
     include_once '../../Modelo/Metastasis.php';
     include_once '../../Modelo/Clasificaciontumor.php';
     
     include_once '../../Dao/IRoles.php';
     include_once '../../Dao/IGeneral.php';
     include_once '../../Dao/IMedicos.php';
     include_once '../../Dao/IPacientes.php';
     
     include_once '../../Controladores/ControladorGeneral.php';
     include_once '../../Controladores/MedicosControlador.php';
     include_once '../../Controladores/PacientesControlador.php';
     
     $modelAsignacionEtapa = new EtapaTumor();
     $controlAsignacionEtapa = new ControladorGeneral();
     $controlMedico = new MedicosControlador();
     
     
     //traer etapa tumor por id
     $controlador = new ControladorGeneral();
     $etapaT = $controlador->ListarEtapaTumorId($_GET["idEtapaTumor"]);
     if(isset($_POST["btnguardarasigetapa"]) && $_POST["btnguardarasigetapa"]=="Guardar"){
         
         $datos = array(
             "idEtapaTumor" => $_POST["idEtapa"],
             "nombre" => $_POST["txtnombreetapa"],
             "paciente" => $_POST["txtpacienteetapa"],
             "tumorprimario" => $_POST["txttumorprimario"],
             "ganglioslinfaticos" => $_POST["txtganglioslinfaticos"],
             "metastasis" => $_POST["txtmetastasis"],
             "clasificaciontumor" => $_POST["txtclasificaciontumor"],
             "diagnostico" => $_POST["txtdiagnosticoetapa"],
         );
         $r = $controlador->ActualizarEtapaTumor($datos);
         if($r[0]["exito"]=="ok"){
            echo '<script>alert("los datos se actualizaron de manera correcta"); window.location="LayoutMedico.php?load=etapatumor";</script>';return;
         }
     }
?>
<div class="ui raised segment">
    <div class="ui segments">
        <div class="ui blue inverted segment">
            <h3>Asignación de etapa del tumor</h3>
        </div>
        <div class="ui secondary segment">
             <form class="ui form" method="POST">
                 <div class="field">
                     <div class="field">
                         <input type="text" name="txtnombreetapa" value="<?php echo $etapaT[0]->getNombreetapa() ?>" placeholder="Nombre de Etapa" required="true" size="25">
                     </div>
                 </div>
                     <div class="five fields">
                     <div class="field">
                         <select id="txtpacienteetapa" name="txtpacienteetapa" required="true">
                             <option value="">Pacientes...</option>
                             <?php foreach ($controlMedico->ListaPaciente() AS $_combopaciente) : ?>
                             <option value="<?php echo $_combopaciente->getIdPaciente('idPaciente'); ?>"><?php echo $_combopaciente->getIdentificacion('identificacion').' ' . $_combopaciente->getNombre('nombre') .' '. $_combopaciente->getApellido('apellido') .' '.$_combopaciente->getApellidocasada('apellidocasada'); ?></option> 
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="field">
                         <select id="txttumorprimario" name="txttumorprimario" required="true">
                             <option value="">Tumor primario...</option>
                             <?php foreach ($controlAsignacionEtapa->ListaTumorprimario() AS $_combotumorprimario) : ?>
                             <option value="<?php echo $_combotumorprimario->getIdTumorprimario('idTumorprimario'); ?>"><?php echo $_combotumorprimario->getCodigotp('codigotp').' ' .$_combotumorprimario->getNombretp('nombretp'); ?></option> 
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="field">
                         <select id="txtganglioslinfaticos" name="txtganglioslinfaticos" required="true">
                             <option value="">Ganglios linfaticos...</option>
                             <?php foreach ($controlAsignacionEtapa->ListaGanglioslinfaticos() AS $_comboganglioslinfatico) : ?>
                             <option value="<?php echo $_comboganglioslinfatico->getIdGanglioslinfaticos('idGanglioslinfaticos'); ?>"><?php echo $_comboganglioslinfatico->getCodigogl('codigogl').' '.$_comboganglioslinfatico->getNombregl('nombregl'); ?></option> 
                             <?php endforeach; ?>
                         </select>
                     </div>
                    <div class="field">
                         <select id="txtmetastasis" name="txtmetastasis" required="true">
                             <option value="">Metastasis...</option>
                             <?php foreach ($controlAsignacionEtapa->ListaMetastasis() AS $_combometastasis) : ?>
                             <option value="<?php echo $_combometastasis->getIdMetastasis('idMetastasis'); ?>"><?php echo $_combometastasis->getCodigom('codigom').' '.$_combometastasis->getNombrem('nombrem'); ?></option> 
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="field">
                         <select id="txtclasificaciontumor" name="txtclasificaciontumor" required="true">
                             <option value="">Clasificación tumor...</option>
                             <?php foreach ($controlAsignacionEtapa->ListaClasificaciontumor() AS $_comboclasificacion) : ?>
                             <option value="<?php echo $_comboclasificacion->getIdClasificaciontumor('idClasificaciontumor'); ?>"><?php echo $_comboclasificacion->getNombreclasificacion('nombreclasificacion').' '.$_comboclasificacion->getDetalle('detalle'); ?></option> 
                             <?php endforeach; ?>
                         </select>
                     </div>
                 </div>
                 <div class="field">
                     <div class="field">
                         <textarea name="txtdiagnosticoetapa" placeholder="Diagnostico" required="true" size="255" rows="2"><?php echo $etapaT[0]->getDiagnostico() ?></textarea>
                     </div>
                 </div>
                 <input type="hidden" name="idEtapa" value="<?php echo $etapaT[0]->getIdEtapatumor() ?>" >
                 <input type="submit" name="btnguardarasigetapa" class="ui green button" value="Guardar">
                 <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=etapatumor'">Cancelar</button>
             </form>
        </div>
    </div>
</div>
