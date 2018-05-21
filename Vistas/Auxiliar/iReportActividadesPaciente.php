<?php
    include_once '../../Configuracion/Conexion.php';
    
    include_once '../../Modelo/Citas.php';
    include_once '../../Dao/IGeneral.php';
    include_once '../../Controladores/ControladorGeneral.php';

    $modelcita = new Citas();
    $controlcitapacientemedico = new ControladorGeneral();
    $row = $controlcitapacientemedico->iReportActividades();
?>
<div class="ui segments">
    <div class="ui blue inverted segment">
        <h4>MÓDULO DE ACTIVIDADES</h4>
    </div>
    <div class="ui secondary segment">
        <div class="ui segments">
            <div class="ui blue inverted segment">
                <p>REPORTE DE ACTIVIDADES POR PACIENTE</p>
            </div>
            <div class="ui secondary segment">
                <button type="button" style="background-color: #F3F4F5;" id="nuevopaciente" class="ui button" OnClick="location.href = ''"></button>
                <div class="ui raised segment botoneraexcelpdfreporteactividadpaciente">
                    <table id="tblReporteActividadPaciente" class="ui selectable blue celled table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
				 <th>Numero</th>
                                 <th>Concepto</th>
                                 <th>Estado</th>
                                 <th>Paciente</th>
                                 <th>Numero de horas</th>
                                 <th>Numero de días</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($row); $i++) { ?>
                            <tr>
                                <td><?php echo $row[$i]["idActividad"]; ?></td> 
                                <td><?php echo $row[$i]["concepto"]; ?></td>
                                <td><?php echo $row[$i]["estado"]; ?></td>   
                                <td><?php echo $row[$i]["PACIENTE"]; ?></td>
                                <td><?php echo $row[$i]["numerohora"]; ?></td>
                                <td><?php echo $row[$i]["numerodia"]; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>