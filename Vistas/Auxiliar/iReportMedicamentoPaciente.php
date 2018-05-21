<?php
    include_once '../../Configuracion/Conexion.php';
    
    include_once '../../Modelo/Citas.php';
    include_once '../../Dao/IGeneral.php';
    include_once '../../Controladores/ControladorGeneral.php';

    $modelcita = new Citas();
    $controlcitapacientemedico = new ControladorGeneral();
    $row = $controlcitapacientemedico->iReportMedicamentos();
?>
<div class="ui segments">
    <div class="ui blue inverted segment">
        <h4>MÓDULO DE MEDICAMENTOS</h4>
    </div>
    <div class="ui secondary segment">
        <div class="ui segments">
            <div class="ui blue inverted segment">
                <p>REPORTE DE MEDICAMENTOS POR PACIENTE</p>
            </div>
            <div class="ui secondary segment">
                <button type="button" style="background-color: #F3F4F5;" id="nuevopaciente" class="ui button" OnClick="location.href = ''"></button>
                <div class="ui raised segment botoneraexcelpdfreportemedicamentopaciente">
                    <table id="tblReporteMedicamentosPaciente" class="ui selectable blue celled table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
				 <th>Numero</th>
                                 <th>Cita</th>
                                 <th>Medicamento</th>
                                 <th>Presentación</th>
                                 <th>Vía administración</th>
                                 <th>Dosís</th>
                                 <th>Efectos adversos</th>
                                 <th>Indecaciones</th>
                                 <th>Paciente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($row); $i++) { ?>
                            <tr>
                                <td><?php echo $row[$i]["idRecetasmedicas"]; ?></td> 
                                <td><?php echo $row[$i]["CITA"]; ?></td>
                                <td><?php echo $row[$i]["nombre"]; ?></td>   
                                <td><?php echo $row[$i]["presentacion"]; ?></td>
                                <td><?php echo $row[$i]["viaadministracion"]; ?></td>
                                <td><?php echo $row[$i]["disis"]; ?></td>
                                <td><?php echo $row[$i]["efectosadversos"]; ?></td>
                                <td><?php echo $row[$i]["indicaciones"]; ?></td>
                                <td><?php echo $row[$i]["PACIENTE"]; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
