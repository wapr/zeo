<?php
    include_once '../../Configuracion/Conexion.php';
    
    include_once '../../Modelo/Citas.php';
    include_once '../../Dao/IGeneral.php';
    include_once '../../Controladores/ControladorGeneral.php';

    $modelcita = new Citas();
    $controlcitapacientemedico = new ControladorGeneral();
    $row = $controlcitapacientemedico->iReportCitaPaciente();
?>
<div class="ui segments">
    <div class="ui blue inverted segment">
        <h4>MÓDULO DE CITAS</h4>
    </div>
    <div class="ui secondary segment">
        <div class="ui segments">
            <div class="ui blue inverted segment">
                <p>REPORTE DE CITAS DE PACIENTES</p>
            </div>
            <div class="ui secondary segment">
                <button type="button" style="background-color: #F3F4F5;" id="nuevopaciente" class="ui button" OnClick="location.href = ''"></button>
                <div class="ui raised segment botoneraexcelpdfcitapaciente">
                    <table id="tbliReportCitaPaciente" class="ui selectable blue celled table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
				 <th>Numero</th>
                                 <th>Fecha</th>
                                 <th>Hora inicio</th>
                                 <th>Hora fin</th>
                                 <th>Concepto</th>
                                 <th>Estado</th>
                                 <th>Paciente</th>
                                 <th>Medico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($row); $i++) { ?>
                            <tr>
                                <td><?php echo $row[$i]["IDCITA"]; ?></td> 
                                <td><?php echo $row[$i]["FECHACITA"]; ?></td>
                                <td><?php echo $row[$i]["HORAINICIO"]; ?></td>   
                                <td><?php echo $row[$i]["HORAFINAL"]; ?></td>
                                <td><?php echo $row[$i]["CONCEPTO"]; ?></td>
                                <td><?php echo $row[$i]["ESTADO"]; ?></td>
                                <td><?php echo $row[$i]["PACIENTE"]; ?></td>
                                <td><?php echo $row[$i]["MEDICO"]; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

