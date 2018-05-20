<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/Zeo/Controladores/MedicosControlador.php";
    //print_r($_SESSION);
    $medicos = new MedicosControlador();
    $listaMedicos = $medicos->listarMedicos();
?>
<div class="ui segments">
    <div class="ui blue inverted segment">
        <h4>MÓDULO DE AUXILIARES</h4>
    </div>
    <div class="ui secondary segment">
        <div class="ui segments">
            <div class="ui blue inverted segment">
                <p>GESTION DE AUXILIARES</p>
            </div>
            <div class="ui secondary segment">
                        
                <button type="button" style="background-color: #F3F4F5;" id="nuevopaciente" class="ui button" ></button>
                    <div class="ui raised segment botoneraexcelpdfauxiliares ">
                        <table id="tblAuxiliares" class="ui selectable blue celled table botonesAuxiliar " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                     <th>#</th>
                                     <th>Identificacion</th>
                                     <th>Nombre</th>
                                     <th>Apellido</th>
                                     <th>Fecha nacimiento</th>
                                     <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- VENTANA MODAL PARA REGISTRAR AUXILIARES -->
<div class="ui fullscreen modal addAuxiliar">
    <i class="close icon"></i>
    <div class="header">
        <h4>REGISTRAR AUXILIAR</h4>
    </div>
    <div class="content">
        <form class="ui form auxiliar" id="frmAuxiliar">
            <div class="five fields">
                <div class="field">
                    <label>Tipo Identificación</label>
                    <select name="tident" id="tipo_ident">
                        <option value="">SELECCIONE</option>
                        <option value="TI">TI</option>
                        <option value="CC">CC</option>
                        <option value="RC">RC</option>
                    </select>
                </div>
                <div class="field">
                    <label>Numero de identificación</label>
                    <input type="number" name="identificacion" id="identificacion" placeholder="Numero de identificación">
                </div>
                <div class="field">
                    <label>Nombre del auxiliar</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del auxiliar">
                </div>
                <div class="field">
                    <label>Apellido del auxiliar</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido del auxiliar">
                </div>
                <div class="field">
                    <label>Apellido casado/a</label>
                    <input type="text" id="apellidocasado" placeholder="Apellido casado/a">
                </div>
            </div>
            <div class="five fields">
                <div class="field">
                    <label>Genero</label>
                    <select name="genero" id="genero">
                        <option value="">SELECCIONE</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="field calendar">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="fechanac" id="fechanac" placeholder="Fecha de nacimiento">
                </div>
                <div class="field" >
                    <label>Tipo Sangre</label>
                    <select name="tiposangre" id="tiposangre">
                      <option value="">SELECCIONE</option>
                      <option value="A+">A+</option>
                      <option value="B+">B+</option>
                    </select>
                </div>
                <div class="field">
                    <label>Numero de telefono</label>
                    <input type="number" name="telefono" id="telefono" placeholder="Numero de telefono">
                </div>
                <div class="field">
                    <label>Numero de celular</label>
                    <input type="number" name="celular" id="celular" placeholder="Numero de celular">
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <label>Estado civil</label>
                    <select name="estadocivil" id="estadocivil">
                        <option value="">SELECCIONE</option>
                        <option value="SOLTERO">SOLTERO</option>
                        <option value="CASADO">CASADO</option>
                    </select>
                </div>
                <div class="field">
                    <label>Ocupación profesional</label>
                    <input type="text" placeholder="Ocupación" id="ocupacion" name="ocupacion" value="AUXILIAR DE ENFERMERIA EN SERVICIOS ONCOLOGICOS" disabled="">
                </div>
                <div class="field">
                    <label>Religión</label>
                    <input type="text" placeholder="Religión" id="religion" name="religion">
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    <label>Pais</label>
                    <input type="text" placeholder="País" name="pais" id="pais" value="COLOMBIA" disabled="true">
                </div>
                <div class="field">
                    <label>Departamento</label>
                    <select name="departamento" id="departamento">
                      <option value="0">SELECCIONE</option>
                    </select>
                </div>
                <div class="field">
                    <label>Municipio</label>
                    <select name="municipio" id="municipio">
                      <option value="0">SELECCIONE</option>
                    </select>
                </div>
                <div class="field">
                    <label>Domicilio</label>
                    <input type="text" placeholder="Domicilio" name="domicilio" id="domicilio">
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    <label>Correo Elec</label>
                    <input type="email" placeholder="Direccion correo electronico" name="email" id="email">
                </div>
                <div class="field">
                    <label>Clave</label>
                    <input type="password" name="clave" placeholder="Clave" id="clave">
                </div>
                <div class="field">
                    <label>Repetir la clave</label>
                    <input type="password" name="repclave" placeholder="Clave" id="repclave">
                </div>
            </div>
            <button class="ui blue button" type="submit">Guardar auxiliar</button>
            <div class="ui error message"></div>
        </form>
        
    </div>
    <div class="actions">
        
    </div>
</div>
<!-- FIN MODAL REGISTRAR USUARIOS-->

<!-- VENTANA MODAL PARA VER AUXILIARES -->
<div class="ui fullscreen modal verAuxiliar">
    <i class="close icon"></i>
    <div class="header">
        <h4>DATOS DEL AUXILIAR: <span id="datosDelAuxiliar"></span></h4>
    </div>
    <div class="content">
        <form class="ui form auxiliar" id="frmVerAuxiliar">
            <div class="four fields">
                <div class="field">
                    <label>Identificación del auxiliar</label>
                    <input type="text"  id="ver_identificacion" placeholder="Num identificacion" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Nombre del auxiliar</label>
                    <input type="text" id="ver_nombre" placeholder="Num identificacion" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Apellido del auxiliar</label>
                    <input type="text" id="ver_apellido" placeholder="Nombres" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Apellido casado/a</label>
                    <input type="text"  id="ver_apellidocasado" placeholder="Apellidos" readonly="" disabled="">
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    <label>Genero</label>
                    <input type="text"  id="ver_genero" placeholder="Num identificacion" readonly="true" disabled="">
                </div>
                <div class="field">
                    <label>Fecha nacimiento</label>
                    <input type="text" id="ver_fechanac" placeholder="Num identificacion" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Tipo sangre</label>
                    <input type="text" id="ver_tiposangre" placeholder="Nombres" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Telefono</label>
                    <input type="text"  id="ver_telefono" placeholder="Apellidos" readonly="" disabled="">
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    <label>Celular</label>
                    <input type="text"  id="ver_celular" placeholder="Num identificacion" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Estado civil</label>
                    <input type="text" id="ver_estadocivil" placeholder="Num identificacion" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Ocupacion</label>
                    <input type="text" id="ver_ocupacion" placeholder="Nombres" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Religión</label>
                    <input type="text"  id="ver_religion" placeholder="Apellidos" readonly="" disabled="">
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    <label>Pais</label>
                    <input type="text"  id="ver_pais" placeholder="Num identificacion" readonly="true" disabled="">
                </div>
                <div class="field">
                    <label>Departamento</label>
                    <input type="number" id="ver_departamento" placeholder="Num identificacion" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Municipio</label>
                    <input type="number" id="ver_municipio" placeholder="Nombres" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Domicilio</label>
                    <input type="text"  id="ver_domicilio" placeholder="Apellidos" readonly="" disabled="">
                </div>
            </div>
            <div class="four fields">
                <div class="field">
                    <label>Email</label>
                    <input type="email"  id="ver_email" placeholder="Num identificacion" readonly="true" disabled="">
                </div>
                <div class="field">
                    <label>Fecha registro</label>
                    <input type="text" id="ver_fecharegistro" placeholder="Num identificacion" readonly="" disabled="">
                </div>
                <div class="field">
                    <label>Estado</label>
                    <input type="number" id="ver_estado" placeholder="Nombres" readonly="" disabled="">
                </div>
            </div>
        </form>
        
    </div>
    <div class="actions">
        
    </div>
</div>
<!-- fin modal ver detalle del auxiliar-->


<!-- VENTANA MODAL PARA ACTUALIZAR AUXILIARES -->
<div class="ui fullscreen modal _editAuxiliar">
    <i class="close icon"></i>
    <div class="header">
        <h4>ACTUALIZAR AUXILIAR: <span id="edit_NombreAuxiliar"></span></h4> 
    </div>
    <div class="content">
        <form class="ui form editAuxiliar" id="frmEditAuxiliar">
            <div class="five fields">
                <div class="field">
                    <label>Identificación</label>
                    <input type="text" name="edit_identificacion" id="edit_identificacion" readonly="">
                </div>
                <div class="field">
                    <label>Nombre</label>
                    <input type="text" name="edit_nombre" id="edit_nombre" placeholder="Nombres">
                </div>
                <div class="field">
                    <label>Apellido</label>
                    <input type="text" name="edit_apellido" id="edit_apellido" placeholder="Apellidos">
                </div>
                <div class="field">
                    <label>Apellido casado</label>
                    <input type="text" id="edit_apellidocasado" placeholder="Apellido casado">
                </div>
                <div class="field">
                    <label>Genero</label>
                    <select name="edit_genero" id="edit_genero">
                      <option value="">SELECCIONE</option>
                      <option value="M">M</option>
                      <option value="F">F</option>
                    </select>
                </div>
            </div>
            <div class="five fields">
                <div class="field calendar">
                    <label>Fecha nacimiento</label>
                    <input type="date" name="edit_fechanac" id="edit_fechanac" placeholder="Fecha nacimiento">
                </div>
                <div class="field" >
                    <label>Tipo Sangre</label>
                    <select name="edit_tiposangre" id="edit_tiposangre">
                      <option value="">SELECCIONE</option>
                      <option value="A+">A+</option>
                      <option value="B+">B+</option>
                    </select>
                </div>
                <div class="field">
                    <label>Telefono</label>
                    <input type="number" name="edit_telefono" id="edit_telefono" placeholder="Telefono">
                </div>
                <div class="field">
                    <label>Celular</label>
                    <input type="number" name="edit_celular" id="edit_celular" placeholder="# Celular">
                </div>
                <div class="field">
                    <label>Estado Civil</label>
                    <select name="edit_estadocivil" id="edit_estadocivil">
                      <option value="">SELECCIONE</option>
                      <option value="SOLTERO">SOLTERO</option>
                      <option value="CASADO">CASADO</option>
                    </select>
                </div>
            </div>
            <div class="five fields">
                <div class="field">
                    <label>Ocupación</label>
                    <input type="text" placeholder="Ocupación" id="edit_ocupacion" name="edit_ocupacion">
                </div>
                <div class="field">
                    <label>Pais</label>
                    <input type="text" placeholder="País" name="edit_pais" id="edit_pais">
                </div>
                <div class="field">
                    <label>Departamento</label>
                    <select name="edit_departamento" id="edit_departamento">
                      <option value="">SELECCIONE</option>
                    </select>
                </div>
                <div class="field">
                    <label>Municipio</label>
                    <select name="edit_municipio" id="edit_municipio">
                      <option value="">SELECCIONE</option>
                    </select>
                </div>
                <div class="field">
                    <label>Domicilio</label>
                    <input type="text" placeholder="Domicilio" name="edit_domicilio" id="edit_domicilio">
                </div>
            </div>
            <div class="five fields">
                <div class="field">
                    <label>Religión</label>
                    <input type="text" placeholder="Religión" id="edit_religion" name="edit_religion">
                </div>
                <div class="field">
                    <label>Correo Elec</label>
                    <input type="text" placeholder="Direccion correo electronico" name="edit_email" id="edit_email">
                </div>
                <div class="field">
                    <label>Clave</label>
                    <input type="password" name="edit_clave" placeholder="Clave" id="edit_clave">
                </div>
                <div class="field">
                    <label>Estado</label>
                    <select name="edit_estado" id="edit_estado">
                      <option value="1">ACTIVO</option>
                      <option value="0">NO ACTIVO</option>
                    </select>
                </div>
            </div>
            <input type="hidden" id="edit_IdAuxiliar" />
            <button class="ui blue button" type="submit">Actualizar auxiliar</button>
            <div class="ui error message"></div>
        </form>
        
    </div>
    <div class="actions">
        
    </div>
</div>
<!-- FIN MODAL ACTUALIZAR USUARIOS-->


