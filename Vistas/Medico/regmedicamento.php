<?php
    include_once '../../Configuracion/Conexion.php';
    
         
     include_once '../../Modelo/Medicamentos.php';
     include_once '../../Dao/IGeneral.php';
     include_once '../../Controladores/ControladorGeneral.php';
     
     $modelmedicamento = new Medicamentos();
     $controlmedicamento = new ControladorGeneral();
     
         if (isset($_POST['btnguardarmedicamento'])) { 
             $modelmedicamento->setCodigomaterial($_REQUEST['txtcodigomaterial']);
             $modelmedicamento->setEan($_REQUEST['txtean']);
             $modelmedicamento->setNombre($_REQUEST['txtnombre']);
             $modelmedicamento->setPresentacion($_REQUEST['txtpresentacion']);
             $modelmedicamento->setViaadministracion($_REQUEST['txtviaadministracion']);
             $modelmedicamento->setDisis($_REQUEST['txtdosis']);
             $modelmedicamento->setEfectosadversos($_REQUEST['txtefectosadversos']);
             $modelmedicamento->setIndicaciones($_REQUEST['txtindicaciones']);
             $controlmedicamento->RegistrarMedicamentos($modelmedicamento);
         echo '<script type="text/javascript">window.location.replace("LayoutMedico.php?load=medicamentos");</script>';
         exit;
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
                        <input type="text" name="txtcodigomaterial" placeholder="Código de material" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="number" name="txtean" placeholder="Código de barra" required="true" size="180" onKeyPress="return SoloNumeros(event);">
                    </div>
                    <div class="field">
                        <input type="text" name="txtnombre" placeholder="Nombre de medicamento" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="text" name="txtpresentacion" placeholder="Presentación de medicamento" required="true" size="180" >
                    </div>
                    <div class="field">
                        <input type="text" name="txtviaadministracion" placeholder="Vía de administración" required="true" size="180">
                    </div>
                </div>
                <div class="five fields">
                    <div class="field">
                        <input type="number" name="txtdosis" placeholder="Dosis de medicamento" required="true" onKeyPress="return SoloNumeros(event);">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <textarea rows="4" cols="20" name="txtefectosadversos" placeholder="Efectos adversos de medicamento"></textarea>
                    </div>
                    <div class="field">
                        <textarea rows="4" cols="20" name="txtindicaciones" placeholder="Indicaciones de medicamento"></textarea>
                    </div>
                </div>
                <input type="submit" name="btnguardarmedicamento" class="ui green button" value="Guardar">
                <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=medicamentos'">Cancelar</button>
            </form>
        </div>
    </div>
</div>
