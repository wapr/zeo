<?php
     include_once '../../Configuracion/Conexion.php';
    
     include_once '../../Modelo/Tipotumor.php';
     include_once '../../Modelo/Clasificaciontumor.php';
     include_once '../../Dao/IGeneral.php';
     include_once '../../Controladores/ControladorGeneral.php';

     $modeltipotumor = new Tipotumor();
     $modelclasificaciontumor = new Clasificaciontumor();
     $controltipotumor = new ControladorGeneral();
     
     if (isset($_POST['btnguardartipotumor'])) { 
         $modelclasificaciontumor->setTipotumores($_REQUEST['txttipotumor']);
         $modelclasificaciontumor->setNombreclasificacion($_REQUEST['txtnombreclasificaciontipotumor']);
         $modelclasificaciontumor->setDetalle($_REQUEST['txtdetalleclasificaciontipotumor']);
         $controltipotumor->RegistrarClasificacionTumor($modelclasificaciontumor);
         echo '<script type="text/javascript">window.location.replace("LayoutMedico.php?load=clasificaciontumor");</script>';
         exit;
     }
?>
<div class="ui raised segment">
    <div class="ui segments">
        <div class="ui blue inverted segment">
            <h3>Asignar un tipo de tumor</h3>
        </div>
        <div class="ui secondary segment">
             <form class="ui form" method="POST">
                 <div class="three fields">
                     <div class="field">
                         <select id="txttipotumor" name="txttipotumor" required="true">
                             <option value="">Tipo de tumor...</option>
                             <?php foreach ($controltipotumor->ListaTipotumor() AS $_combotipotumor) : ?>
                             <option value="<?php echo $_combotipotumor->getIdTipotumor('idTipotumor'); ?>"><?php echo $_combotipotumor->getCodigotTumor('codigotTumor').' '.$_combotipotumor->getNombreTumor('nombreTumor'); ?></option> 
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="field">
                         <select  name="txtnombreclasificaciontipotumor" required="true">
                             <option value="INTESTINAL">INTESTINAL</option>
                             <option value="DIFUSO">DIFUSO</option>
                         </select>
                     </div>
                     <div class="field">
                         <input type="text" name="txtdetalleclasificaciontipotumor" placeholder="Detalle" required="true" size="255">
                     </div>
                 </div>
                 <input type="submit" name="btnguardartipotumor" class="ui green button" value="Guardar">
                 <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=clasificaciontumor'">Cancelar</button>
             </form>
        </div>
    </div>
</div>
