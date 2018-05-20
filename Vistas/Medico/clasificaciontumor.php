<?php
    include_once '../../Configuracion/Conexion.php';
    
    include_once '../../Modelo/Clasificaciontumor.php';
    include_once '../../Dao/IGeneral.php';
    include_once '../../Controladores/ControladorGeneral.php';

    $modelclasificacion = new Clasificaciontumor();
    $controlclasificacion = new ControladorGeneral();
?>
<div class="ui raised segment">
    <div class="ui segments">
        <div class="ui blue inverted segment">
            <h3>Clasificación y tipo tumor</h3>
        </div>
        <div class="ui secondary segment">
            <button type="button" id="nuevopaciente" class="ui teal button" OnClick="location.href = 'LayoutMedico.php?load=tipotumor'"><i class="fa fa-plus-square"></i> Tipo tumor</button>
            <div class="ui raised segment ">
                <table id="tblConsultorio" class="ui selectable blue celled table " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Tipo tumor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($controlclasificacion->ListaClasificaciontumor() AS $_clasificaciontumor) : ?>
                            <tr>
                                <td><?php echo $_clasificaciontumor->getIdClasificaciontumor('idClasificaciontumor'); ?></td> 
                                <td><?php echo $_clasificaciontumor->getNombreclasificacion('nombreclasificacion'); ?></td>
                                <td><?php echo $_clasificaciontumor->getTipotumores('tipotumores'); ?></td>   
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
