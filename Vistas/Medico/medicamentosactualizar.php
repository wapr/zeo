<?php
     include_once '../../Configuracion/Conexion.php';

     include_once '../../Modelo/Roles.php';
     include_once '../../Modelo/Medicamentos.php';
     include_once '../../Controladores/ControladorGeneral.php';

     
     $controlador = new ControladorGeneral();
     $medicamento = $controlador->ListaMedicamentosId($_GET["idmedicamento"]);
    
     if(isset($_POST["btnguardarmedicamento"]) && $_POST["btnguardarmedicamento"]=="Guardar"){
         $datos = array(
                 "idMedicamento" => $_POST["idMedicamento"],
                 "codigomaterial" => $_POST["txtcodigomaterial"],
                 "ean" => $_POST["txtean"],
                 "nombre" => $_POST["txtnombre"],
                 "presentacion" => $_POST["txtpresentacion"],
                 "viaadministracion" => $_POST["txtviaadministracion"],
                 "disis" => $_POST["txtdosis"],
                 "efectosadversos" => $_POST["txtefectosadversos"],
                 "indicaciones" => $_POST["txtindicaciones"],
                 
                 );
         $r = $controlador->ActualizarMedicamento($datos);
         
         if($r[0]["exito"]=="ok"){
            echo '<script>alert("los datos se actualizaron de manera correcta"); window.location="LayoutMedico.php?load=medicamentos";</script>';return;
         }
     }
?>
<div class="ui raised segment">
    <div class="ui segments">
        <div class="ui blue inverted segment">
            <h3>Registrar medicamentos</h3>
        </div>
        <div class="ui secondary segment">
            <form class="ui form" method="POST">
                <div class="five fields">
                    <div class="field">
                        <input type="text" name="txtcodigomaterial" value="<?php echo $medicamento[0]->getCodigomaterial()?>" placeholder="Código de material" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="number" name="txtean" value="<?php echo $medicamento[0]->getEan()?>" placeholder="Código de barra" required="true" size="180" onKeyPress="return SoloNumeros(event);">
                    </div>
                    <div class="field">
                        <input type="text" name="txtnombre" value="<?php echo $medicamento[0]->getNombre()?>" placeholder="Nombre de medicamento" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="text" name="txtpresentacion" value="<?php echo $medicamento[0]->getPresentacion()?>" placeholder="Presentación de medicamento" required="true" size="180" >
                    </div>
                    <div class="field">
                        <input type="text" name="txtviaadministracion" value="<?php echo $medicamento[0]->getViaadministracion()?>" placeholder="Vía de administración" required="true" size="180">
                    </div>
                </div>
                <div class="five fields">
                    <div class="field">
                        <input type="number" name="txtdosis" value="<?php echo $medicamento[0]->getDisis()?>" placeholder="Dosis de medicamento" required="true" onKeyPress="return SoloNumeros(event);">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <textarea rows="4" cols="20" name="txtefectosadversos" placeholder="Efectos adversos de medicamento"><?php echo $medicamento[0]->getEfectosadversos()?></textarea>
                    </div>
                    <div class="field">
                        <textarea rows="4" cols="20" name="txtindicaciones" placeholder="Indicaciones de medicamento"><?php echo $medicamento[0]->getIndicaciones()?></textarea>
                    </div>
                </div>
                <input type="hidden" name="idMedicamento" value="<?php echo $medicamento[0]->getIdMedicamento()?>" >
                <input type="submit" name="btnguardarmedicamento" class="ui green button" value="Guardar">
                <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=medicamentos'">Cancelar</button>
            </form>
        </div>
    </div>
</div>