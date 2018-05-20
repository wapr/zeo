<?php
     include_once '../../Configuracion/Conexion.php';
     
     include_once '../../Modelo/Roles.php';
     include_once '../../Modelo/Pacientes.php';
     include_once '../../Modelo/EtapaTumor.php';
     include_once '../../Modelo/Tumorprimario.php';
     include_once '../../Modelo/Ganglioslinfaticos.php';
     include_once '../../Modelo/Metastasis.php';
     include_once '../../Modelo/Clasificaciontumor.php';
     
     include_once '../../Dao/IRoles.php';
     include_once '../../Dao/IGeneral.php';
     include_once '../../Dao/IMedicos.php';
     include_once '../../Dao/IPacientes.php';
     
     include_once '../../Controladores/ControladorGeneral.php';
     include_once '../../Controladores/MedicosControlador.php';
     include_once '../../Controladores/PacientesControlador.php';
     
     $modelAsignacionEtapa = new EtapaTumor();
     $controlAsignacionEtapa = new ControladorGeneral();
     $controlMedico = new MedicosControlador();
?>
<div class="ui raised segment">
    <div class="ui segments">
        <div class="ui blue inverted segment">
            <h3>Etapas tumor</h3>
        </div>
        <div class="ui secondary segment">
            <button type="button" id="nuevopaciente" class="ui teal button" OnClick="location.href = 'LayoutMedico.php?load=AsigEtapa'"><i class="fa fa-plus-square"></i> Asignación de etapa</button>
            <div class="ui raised segment ">
                <table id="tblConsultorio" class="ui selectable blue celled table " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Paciente</th>
                            <th>Nombre</th>
                            <th>Tumor primario</th>
                            <th>Ganglios linfaticos</th>
                            <th>Metastasis</th>
                            <th>Clasificación</th>
                            <th>Diagnostico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($controlAsignacionEtapa->ListaEtapaTumor() AS $_etapatumor) : ?>
                            <tr>
                                <td><?php echo $_etapatumor->getIdEtapatumor('idEtapatumor'); ?></td>   
                                <td><?php echo $_etapatumor->getPaciente('paciente'); ?></td>  
                                <td><?php echo $_etapatumor->getNombreetapa('nombreetapa'); ?></td>  
                                <td><?php echo $_etapatumor->getTumorprimario('tumorprimario'); ?></td>  
                                <td><?php echo $_etapatumor->getGanglioslinfaticos('ganglioslinfaticos'); ?></td>  
                                <td><?php echo $_etapatumor->getMetastasis('metastasis'); ?></td>  
                                <td><?php echo $_etapatumor->getClasificaciontumor('clasificaciontumor'); ?></td>
                                <td><?php echo $_etapatumor->getDiagnostico('diagnostico'); ?></td>  
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>