<div class="ui blue vertical menu">
    <?php if(isset($_GET["load"]) && $_GET["load"]==="inicio"): ?>
         <a class="active item" href="LayoutMedico.php?load=inicio"><i class="home icon"></i>Inicio</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=inicio"><i class="home icon"></i>Inicio</a>
    <?php endif ?>
         
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="clasificaciontumor"): ?>     
         <a class="active item" href="LayoutMedico.php?load=clasificaciontumor"><i class="fast fa-sort-alpha-asc icon"></i> Clasificación tumor</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=clasificaciontumor"><i class="fast fa-sort-alpha-asc icon"></i> Clasificación tumor</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="etapatumor"): ?>     
         <a class="active item" href="LayoutMedico.php?load=etapatumor"><i class="fast fa-pie-chart  icon"></i>Etapas tumor</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=etapatumor"><i class="fast fa-pie-chart icon"></i>Etapas tumor</a>
    <?php endif ?>
        
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="medicamentos"): ?>     
         <a class="active item" href="LayoutMedico.php?load=medicamentos"><i class="fast fa-medkit icon"></i> Medicamentos</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=medicamentos"><i class="fast fa-medkit icon"></i> Medicamentos</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="gestionpaciente"): ?>
         <a class="active item" href="LayoutMedico.php?load=gestionpaciente"><i class="fast fa-calendar-times-o icon"></i>Gestión cita paciente</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=gestionpaciente"><i class="fast fa-calendar-times-o icon"></i>Gestión cita paciente</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="pacientes"): ?>
         <a class="active item" href="LayoutMedico.php?load=pacientes"><i class="fast fa-users icon"></i>Pacientes</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=pacientes"><i class="fast fa-users icon"></i>Pacientes</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="auxiliares"): ?>     
         <a class="active item" href="LayoutMedico.php?load=auxiliares"><i class="fas fa-handshake-o icon"></i>Auxiliares</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=auxiliares"><i class="fas fa-handshake-o icon"></i>Auxiliares</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="consultorios"): ?>     
         <a class="active item" href="LayoutMedico.php?load=consultorios"><i class="fas fa-hospital-o icon"></i>Consultorios</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=consultorios"><i class="fas fa-hospital-o icon"></i>Consultorios</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="especialidad"): ?>      
         <a class="active item" href="LayoutMedico.php?load=especialidad"><i class="fas fa-user-md icon"></i>Especialidades</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=especialidad"><i class="fas fa-user-md icon"></i>Especialidades</a>
    <?php endif ?>
         
    <?php if(isset($_GET["load"]) && $_GET["load"]==="horario"): ?> 
         <a class="active item" href="LayoutMedico.php?load=horario"><i class="fas fa-clock-o icon"></i>Horarios</a>
    <?php else: ?>
         <a class="item" href="LayoutMedico.php?load=horario"><i class="fas fa-clock-o icon"></i>Horarios</a>
    <?php endif ?>
         
    <a class="item" href="LayoutMedico.php?load=logout"><i class="power icon"></i>Cerrar sesión</a>
</div>	
