<div class="ui blue vertical menu">         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="iReportCitaPaciente"): ?>
         <a class="active item" href="LayoutAuxiliar.php?load=iReportCitaPaciente"><i class="fast fa-calendar-check-o icon"></i>Reporte de citas</a>
    <?php else: ?>
         <a class="item" href="LayoutAuxiliar.php?load=iReportCitaPaciente"><i class="fast fa-calendar-check-o icon"></i>Reporte de citas</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="iReportPaciente"): ?>
         <a class="active item" href="LayoutAuxiliar.php?load=iReportPaciente"><i class="fast fa-users icon"></i>Reporte de pacientes</a>
    <?php else: ?>
         <a class="item" href="LayoutAuxiliar.php?load=iReportPaciente"><i class="fast fa-users icon"></i>Reporte de pacientes</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="iReportActividadesPaciente"): ?>
         <a class="active item" href="LayoutAuxiliar.php?load=iReportActividadesPaciente"><i class="fast fa-heartbeat icon"></i>Reporte de actividades</a>
    <?php else: ?>
         <a class="item" href="LayoutAuxiliar.php?load=iReportActividadesPaciente"><i class="fast fa-heartbeat icon"></i>Reporte de actividades</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="iReportMedicamentoPaciente"): ?>
         <a class="active item" href="LayoutAuxiliar.php?load=iReportMedicamentoPaciente"><i class="fast fa-medkit icon"></i>Reportar medicamentos</a>
    <?php else: ?>
         <a class="item" href="LayoutAuxiliar.php?load=iReportMedicamentoPaciente"><i class="fast fa-medkit icon"></i>Reportar medicamentos</a>
    <?php endif ?>
         
    <a class="item" href="LayoutAuxiliar.php?load=logout"><i class="power icon"></i>Cerrar sesión</a>
</div>	
