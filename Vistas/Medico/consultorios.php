<?php
    include_once '../../Configuracion/Conexion.php';
    
    include_once '../../Modelo/Consultorio.php';
    include_once '../../Dao/IGeneral.php';
    include_once '../../Controladores/ControladorGeneral.php';

    $modelconsultorio = new Consultorio();
    $controlconsultorio = new ControladorGeneral();
?>
<div class="ui raised segment">
    <div class="ui segments">
        <div class="ui blue inverted segment">
            <h3>Gestión de consultorios</h3>
        </div>
        <div class="ui secondary segment">
            <button type="button" id="nuevopaciente" class="ui teal button" OnClick="location.href = 'LayoutMedico.php?load=regconsultorio'"><i class="fa fa-plus-square"></i> Nuevo consultorio</button>
            <div class="ui raised segment ">
                <table id="tblConsultorios" class="ui selectable blue celled table botonesAuxiliar " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                             <th>#</th>
                             <th>NOMBRE</th>
                             <th>PAIS</th>
                             <th>DEPARTAMENTO</th>
                             <th>MUNICIPIO</th>
                             <th>DOMICILIO</th>
                             <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
