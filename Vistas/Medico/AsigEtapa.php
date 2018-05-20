<?php
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
     
     if (isset($_POST['btnguardarasigetapa'])) {
         $modelAsignacionEtapa->setNombreetapa($_REQUEST['txtnombreetapa']);
         $modelAsignacionEtapa->setPaciente($_REQUEST['txtpacienteetapa']);
         $modelAsignacionEtapa->setTumorprimario($_REQUEST['txttumorprimario']);
         $modelAsignacionEtapa->setGanglioslinfaticos($_REQUEST['txtganglioslinfaticos']);
         $modelAsignacionEtapa->setMetastasis($_REQUEST['txtmetastasis']);
         $modelAsignacionEtapa->setClasificaciontumor($_REQUEST['txtclasificaciontumor']);
         $modelAsignacionEtapa->setDiagnostico($_REQUEST['txtdiagnosticoetapa']);
         $controlAsignacionEtapa->RegistrarEtapaTumor($modelAsignacionEtapa);
         echo '<script type="text/javascript">window.location.replace("LayoutMedico.php?load=etapatumor");</script>';
         exit;
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
                         <input type="text" name="txtnombreetapa" placeholder="Nombre de Etapa" required="true" size="25">
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
                         <textarea name="txtdiagnosticoetapa" placeholder="Diagnostico" required="true" size="255" rows="2"></textarea>
                     </div>
                 </div>
          
                 <input type="submit" name="btnguardarasigetapa" class="ui green button" value="Guardar">
                 <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=consultorios'">Cancelar</button>
             </form>
        </div>
    </div>
</div>
