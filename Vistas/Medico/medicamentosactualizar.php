<?php
     include_once '../../Configuracion/Conexion.php';

     include_once '../../Modelo/Roles.php';
     include_once '../../Modelo/Medicamentos.php';
     include_once '../../Controladores/ControladorGeneral.php';

     
     $controlador = new ControladorGeneral();
     $result = $controlador->ListaMedicamentosId($_GET["idmedicamento"]);
     var_dump($result);
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
                        <input type="text" name="txtcodigomaterial" placeholder="Nombre de consultorio" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="number" name="txtean" placeholder="Domicilio" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="text" name="txtnombre" placeholder="Domicilio" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="text" name="txtnombre" placeholder="Domicilio" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="text" name="txtviaadministracion" placeholder="Domicilio" required="true" size="180">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <input type="number" name="txtdosis" placeholder="Domicilio" required="true" min="0" value="0" step="0.01">
                    </div>
                    <div class="field">
                        <input type="text" name="txtdosis" placeholder="Domicilio" required="true" size="180">
                    </div>
                    <div class="field">
                        <input type="text" name="txtdosis" placeholder="Domicilio" required="true" size="180">
                    </div>
                </div>
                <input type="submit" name="btnguardarconsultorio" class="ui green button" value="Guardar">
                <button name="btnregresar" class="ui red button" OnClick="location.href = 'LayoutMedico.php?load=consultorios'">Cancelar</button>
            </form>
        </div>
    </div>
</div>
