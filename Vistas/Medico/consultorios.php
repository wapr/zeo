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
                <table id="tblConsultorio" class="ui selectable blue celled table " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Nombre</th>
                            <th>Pais</th>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th>Domicilio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($controlconsultorio->ListaConsultorioDetallado() AS $_consultorio) : ?>
                            <tr>
                                <td><?php echo $_consultorio->getIdConsultorio('idConsultorio'); ?></td> 
                                <td><?php echo $_consultorio->getNombre('nombre'); ?></td>
                                <td><?php echo $_consultorio->getPais('pais'); ?></td>   
                                <td><?php echo $_consultorio->getDepartamento('departamento'); ?></td>
                                <td><?php echo $_consultorio->getMunicipio('municipio'); ?></td>
                                <td><?php echo $_consultorio->getDomicilio('domicilio'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
