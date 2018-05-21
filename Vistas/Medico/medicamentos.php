<?php
    include_once '../../Configuracion/Conexion.php';
    
    include_once '../../Modelo/Medicamentos.php';
    include_once '../../Dao/IGeneral.php';
    include_once '../../Controladores/ControladorGeneral.php';

    $modelmedicamento = new Medicamentos();
    $controlmedicamento = new ControladorGeneral();
?>
<div class="ui segments">
    <div class="ui blue inverted segment">
        <h4>MÓDULO DE MEDICAMENTOS</h4>
    </div>
    <div class="ui secondary segment">
        <div class="ui segments">
            <div class="ui blue inverted segment">
                <p>GESTION DE MEDICAMENTOS</p>
            </div>
            <div class="ui secondary segment">
              <button type="button" id="nuevopaciente" class="ui teal button" OnClick="location.href = 'LayoutMedico.php?load=regmedicamento'"><i class="fa fa-plus-square"></i> Nuevo medicamento</button>
                <div class="ui raised segment botoneraexcelpdfmedicamentos ">
                    <table id="tblMedicamento" class="ui selectable blue celled table botonesMedicamento " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Codigo</th>
                                <th>Ean</th>
                                <th>Nombre</th>
                                <th>Presentación</th>
                                <th>Vía administración</th>
                                <th>Dosis</th>
                                <th>Efectos adversos</th>
                                <th>Indicaciones</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($controlmedicamento->ListaMedicamentos() AS $_medicamentos) : ?>
                                <tr>
                                    <td><?php echo $_medicamentos->getIdMedicamento('idMedicamento'); ?></td> 
                                    <td><?php echo $_medicamentos->getCodigomaterial('codigomaterial'); ?></td>
                                    <td><?php echo $_medicamentos->getEan('ean'); ?></td>   
                                    <td><?php echo $_medicamentos->getNombre('nombre'); ?></td>
                                    <td><?php echo $_medicamentos->getPresentacion('presentacion'); ?></td>
                                    <td><?php echo $_medicamentos->getViaadministracion('viaadministracion'); ?></td>
                                    <td><?php echo $_medicamentos->getDisis('disis'); ?></td>
                                    <td><?php echo $_medicamentos->getEfectosadversos('efectosadversos'); ?></td>
                                    <td><?php echo $_medicamentos->getIndicaciones('indicaciones'); ?></td>
                                    <td>
                                        <button type="button" id="vermedicamentos" class="ui button violet" OnClick="location.href = 'LayoutMedico.php?load=medicamentosactualizar&idmedicamento=<?php  echo $_medicamentos->getIdMedicamento('idMedicamento'); ?>'"><i class="fa fa-eye"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>