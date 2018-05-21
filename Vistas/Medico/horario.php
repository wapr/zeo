<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Zeo/Controladores/MedicosControlador.php";

?>
<div class="ui segments">
    <div class="ui blue inverted segment">
        <h4>MÓDULO DE HORARIOS</h4>
    </div>
    <div class="ui secondary segment">
        <div class="ui segments">
            <div class="ui blue inverted segment">
                <p>GESTION DE HORARIOS</p>
            </div>
            <div class="ui secondary segment">
                    <div class="ui raised segment botoneraexcelpdfespecialidad ">
                        <table id="tblHorario" class="ui selectable blue celled table " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Consultorio</th>
                                    <th>Especialidad</th>
                                    <th>Fecha</th>
                                    <th>Hora inicio</th>
                                    <th>Hora fin</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                
                    <div class="ui raised segment botoneraexcelpdfpaciente horario" style="display: none">

                        <button class="ui blue button" id="back"><i class="fa fa-arrow-left"></i> Regresar</button>
                        <h1>Horario del medico: </h1>
                        <div id='calendar'></div>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- VENTANA MODAL PARA REGISTRAR HORARIO -->
<div class="ui mini modal addHorario">
    <i class="close icon"></i>
    <div class="header">
        <h4>REGISTRAR HORARIO</h4>
    </div>
    <div class="content">
        <form class="ui form _addHorario">
            <div class="field">
              <label>Consultorio</label>
              <select id="select_consultorio" name="select_consultorio"></select>
            </div>
            <div class="field">
              <label>Especialidad</label>
              <select id="select_especialidad" name="select_especialidad"></select>
            </div>
            <div class="field">
              <label>Fecha</label>
              <input type="text" id="upd_fecha" name="ipd_fecha" placeholder="Fecha atencion">
            </div>
            <div class="field">
              <label>Hora inicio</label>
              <input type="text" id="upd_horaInicio" name="upd_horaInicio" placeholder="Hora inicio fin">
            </div>
            <div class="field">
              <label>Hora fin</label>
              <input type="text" id="upd_horaFin" name="upd_horaFin" placeholder="Hora final atencion">
            </div>
            <button class="ui blue button" type="submit">Guardar horario</button>
            <div class="ui error message"></div>
          </form>
        
    </div>
    <div class="actions">
        
    </div>
</div>
<!-- fin modal ver detalle del paciente-->

<!-- VENTANA MODAL PARA ACTUALIZAR HORARIO -->
<div class="ui mini modal updHorario">
    <i class="close icon"></i>
    <div class="header">
        <h4>ACTUALIZAR HORARIO</h4>
    </div>
    <div class="content">
        <form class="ui form _editHorario">
            <div class="field">
              <label>Consultorio</label>
              <select class="ui dropdown edit_select_consultorio" id="edit_select_consultorio" name="edit_select_consultorio"></select>
            </div>
            <div class="field">
              <label>Especialidad</label>
              <select class="ui dropdown edit_select_especialidad" id="edit_select_especialidad" name="edit_select_especialidad"></select>
            </div>
            <div class="field">
              <label>Fecha</label>
              <input type="text" id="edit_upd_fecha" name="edit_ipd_fecha" placeholder="Fecha atencion">
            </div>
            <div class="field">
              <label>Hora inicio</label>
              <input type="text" id="edit_upd_horaInicio" name="edit_upd_horaInicio" placeholder="Hora inicio fin">
            </div>
            <div class="field">
              <label>Hora fin</label>
              <input type="text" id="edit_upd_horaFin" name="edit_upd_horaFin" placeholder="Hora final atencion">
            </div>
            <input type="hidden" id="idHorario" />
            <button class="ui blue button" type="submit">Actualizar horario</button>
            <div class="ui error message"></div>
          </form>
    </div>
    <div class="actions">
        
    </div>
</div>

<!-- fin modal ver detalle del paciente-->