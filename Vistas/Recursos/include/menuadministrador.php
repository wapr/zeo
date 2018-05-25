<div class="ui blue vertical menu">
    <?php if (isset($_GET["load"]) && $_GET["load"] === "medicos"): ?>
        <a class="active item" href="LayoutAdministrador.php?load=medicos"><i class="doctor icon"></i>Medicos</a>
    <?php else: ?>
        <a class="item" href="LayoutAdministrador.php?load=medicos"><i class="doctor icon"></i>Medicos</a>
    <?php endif ?>
    <a class="item" href="LayoutAdministrador.php?load=logout"><i class="power icon"></i>Cerrar sesión</a>
</div>	
