$(function(){     
    /*
     * CALENDARIO VISTA INICIO MEDICO
     */
    $('#calendar').fullCalendar({
        header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek'
      },
      locale: 'es',
      defaultDate: horaActual(),
        defaultView: 'month',  
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        events: {
             type: 'POST',
             cache: false,
             data: {
               citaMedica: ""
             },
             url: myApp.url + 'MedicosControlador.php',
             error: function(response) {
                console.log(response)
              },
             
          },
        eventClick: function(calEvent, jsEvent, view){
            var estado = calEvent.title.split(" ")
            if(estado.indexOf('CANCELADO_USUARIO') == -1){
                $("#nombrePaciente").html(calEvent.title)
                $(".cambiarEstado").modal("show")

                $("#_btnActualizarEstado").on("click", function(){
                        var datos = new FormData();
                            datos.append("idCita", calEvent.id);
                            datos.append("estado", $("#estado").val());
                            datos.append("actualizarEstado", "estado");
                        $.ajax({
                            url: myApp.url +'MedicosControlador.php',
                            type: 'POST',
                            data: datos,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(respuesta){
                                var rept = eval(respuesta)
                                if(rept[0]["exito"]=='ok'){
                                    alert("Estado actualizado con exito!!!");
                                    $(".cambiarEstado").modal("hide");
                                    $('#calendar').fullCalendar('refetchEvents');
                                }
                            }
                        });
                    })
            }else{
                alert("No puedes cambiar el estado, ya que el usuario cancelo la cita medica");return;
            }
            
            
        },
  })
  var auxiliares = $('#tblAuxiliares').DataTable({
        "ajax": myApp.url +'MedicosControlador.php?medicoEspecialidades=listarAuxiliaresMedico',
         "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='ui mini blue button btnEditarAuxiliar' ><i class='edit icon'></i></button> <button class='ui mini blue button btnVerAuxiliar'><i class='eye icon'></i></button>",
        } ],
        "language": idioma_espanol,
        "aaSorting": [[0, "desc"]],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "todos"]],
        "dom": "Blfrtip",
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<button class="ui green button" type="button"><i class="fa fa-file-excel-o"></i></button>',
                titleAttr: 'Excel'
            },
            {
                "text": "<i class='fa fa-user-plus'></i>",
                "titleAttr": "Agregar auxiliar",
                "className":"ui blue button",
                "action": function(){
                    selectDepartamentos();
                  $(".addAuxiliar").modal('show');
                
                }
            },
        ]
    });
    auxiliares.buttons().container().insertBefore('.botoneraexcelpdfauxiliares');
    
    $('#tblAuxiliares tbody').on( 'click', 'button.btnEditarAuxiliar', function () {
        var data = auxiliares.row( $(this).parents('tr') ).data();
           selectDepartamentosEdit();
           selectMunicipiosEdit(1);

            $("._editAuxiliar").modal("show");
            var datos = new FormData();
              datos.append("idAuxiliar", data[5]);
              datos.append("medicoEspecialidades", "listarAuxiliaresPorId");

                $.ajax({
                    url: myApp.url +'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                       
                        rept = eval(respuesta)
                        console.log(rept)
                        $("#edit_IdAuxiliar").val(rept[0].idAuxiliar)
                        $("#edit_NombreAuxiliar").html(rept[0].nombre +" "+rept[0].apellido);
                        $("#edit_identificacion").val(rept[0].tipoidentificacion +" "+rept[0].identificacion);
                        $("#edit_nombre").val(rept[0].nombre);
                        $("#edit_apellido").val(rept[0].apellido);
                        $("#edit_apellidocasado").val(rept[0].apellidocasada);
                        $("#edit_genero").val(rept[0].genero);
                        $("#edit_fechanac").val(rept[0].fechanacimiento);
                        $("#edit_tiposangre").val(rept[0].tiposangre);
                        $("#edit_telefono").val(rept[0].telefono);
                        $("#edit_celular").val(rept[0].celular);
                        $("#edit_estadocivil").val(rept[0].estadocivil);
                        $("#edit_ocupacion").val(rept[0].ocupacion);
                        $("#edit_religion").val(rept[0].religion);
                        $("#edit_pais").val(rept[0].pais);
                        $("#edit_departamento").val(rept[0].Departamento);
                        $("#edit_municipio").val(rept[0].Municipio);
                        $("#edit_domicilio").val(rept[0].domicilio);
                        $("#edit_email").val(rept[0].email);
                        $("#edit_estado").val(rept[0].estado);
                        $("#edit_clave").val(rept[0].clave);
                    }
                }); 
    } );
    
    $('#tblAuxiliares tbody').on( 'click', 'button.btnVerAuxiliar', function () {
        var data = auxiliares.row( $(this).parents('tr') ).data();
            //alert( data[0] );
            $(".verAuxiliar").modal("show")
            
            var datos = new FormData();
              datos.append("idAuxiliar", data[5]);
              datos.append("medicoEspecialidades", "listarAuxiliaresPorId");

                $.ajax({
                    url: myApp.url +'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                       
                        rept = eval(respuesta)
                        
                        $("#datosDelAuxiliar").html(rept[0].nombre +" "+rept[0].apellido);
                        $("#ver_identificacion").val(rept[0].tipoidentificacion +" "+rept[0].identificacion);
                        $("#ver_nombre").val(rept[0].nombre);
                        $("#ver_apellido").val(rept[0].apellido);
                        $("#ver_apellidocasado").val(rept[0].apellidocasada);
                        $("#ver_genero").val(rept[0].genero);
                        $("#ver_fechanac").val(rept[0].fechanacimiento);
                        $("#ver_tiposangre").val(rept[0].tiposangre);
                        $("#ver_telefono").val(rept[0].telefono);
                        $("#ver_celular").val(rept[0].celular);
                        $("#ver_estadocivil").val(rept[0].estadocivil);
                        $("#ver_ocupacion").val(rept[0].ocupacion);
                        $("#ver_religion").val(rept[0].religion);
                        $("#ver_pais").val(rept[0].pais);
                        $("#ver_departamento").val(rept[0].Departamento);
                        $("#ver_municipio").val(rept[0].Municipio);
                        $("#ver_domicilio").val(rept[0].domicilio);
                        $("#ver_email").val(rept[0].email);
                        $("#ver_fecharegistro").val(rept[0].fecharegistro);
                        $("#ver_estado").val(rept[0].estado);
                    }
                }); 
    } );
    /*
      * VALIDACION FORMULARIO ADDAUXILIAR
      */     
    $('.ui.form.auxiliar')
    .form({
      fields: {
        nombre     : 'empty',
        tident   : 'empty',
        identificacion : ['minLength[10]', 'empty'],
        apellido : ['minLength[3]', 'empty'],
        genero   : 'empty',
        fechanac    : 'empty',
        tiposangre : 'empty',
        telefono : 'empty',
        celular : 'empty',
        estadocivil : 'empty',
        ocupacion : 'empty',
        religion : 'empty',
        pais : 'empty',
        departamento : 'empty',
        municipio : 'empty',
        domicilio : 'empty',
        email: 'empty',
        clave: ['minLength[60]', 'empty'],
        repclave: ['minLength[60]', 'empty']
      },
      onSuccess : function(e){
          e.preventDefault();
          var datos = new FormData();
              datos.append("tipo_ident", $("#tipo_ident").val());
              datos.append("identificacion", $("#identificacion").val());
              datos.append("nombre", $("#nombre").val());
              datos.append("apellido", $("#apellido").val());
              datos.append("apellidocasado", $("#apellidocasado").val());
              datos.append("genero", $("#genero").val());
              datos.append("fechanac", $("#fechanac").val());
              datos.append("tiposangre", $("#tiposangre").val());
              datos.append("telefono", $("#telefono").val());
              datos.append("celular", $("#celular").val());
              datos.append("estadocivil", $("#estadocivil").val());
              datos.append("ocupacion", $("#ocupacion").val());
              datos.append("religion", $("#religion").val());
              datos.append("pais", $("#pais").val());
              datos.append("departamento", $("#departamento").val());
              datos.append("municipio", $("#municipio").val());
              datos.append("domicilio", $("#domicilio").val());
              datos.append("email", $("#email").val());
              datos.append("clave", $("#clave").val());
              datos.append("medicoEspecialidades", "registrarAuxiliarMedico");

                $.ajax({
                    url: myApp.url +'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                        rept = eval(respuesta)
                        if(rept[0]["exito"]=='ok'){
                            //mensaje exito
                            alert("Los datos se guardaron de manera exitosa")
                            //actualizar data
                            auxiliares.ajax.reload(null,false);
                            //limpiar campos
                            $('.ui.form.auxiliar').form('reset')
                            //cerrar ventana modal
                            $(".addAuxiliar").modal('hide');
                            
                        }else if(rept[0]["response"]=='no_ok'){
                             //mensaje exito
                            alert("El tipo y numero de identificacion ya se encuentran registrados, por favor, cambielos")
                            //actualizar data
                            auxiliares.ajax.reload(null,false);

                        }
                    }
                });
      }
    })   
    /*
      * VALIDACION FORMULARIO ADDAUXILIAR
      */     
    $('.ui.form.editAuxiliar')
    .form({
      fields: {
        edit_nombre     : 'empty',
        edit_apellido     : 'empty',
        edit_genero     : 'empty',
        edit_fechanac     : 'empty',
        edit_tiposangre     : 'empty',
        edit_telefono     : 'empty',
        edit_celular     : 'empty',
        edit_estadocivil     : 'empty',
        edit_ocupacion     : 'empty',
        edit_religion     : 'empty',
        edit_pais     : 'empty',
        edit_departamento     : 'empty',
        edit_municipio     : 'empty',
        edit_domicilio     : 'empty',
        edit_email     : 'empty',
        edit_clave     : 'empty',
        edit_estado     : 'empty'
      },
      onSuccess : function(e){
          e.preventDefault();
          //alert("ok")
          var datos = new FormData();
              datos.append("idAuxiliar", $("#edit_IdAuxiliar").val());
              datos.append("nombre", $("#edit_nombre").val());
              datos.append("apellido", $("#edit_apellido").val());
              datos.append("apellidocasado", $("#edit_apellidocasado").val());
              datos.append("genero", $("#edit_genero").val());
              datos.append("fechanac", $("#edit_fechanac").val());
              datos.append("tiposangre", $("#edit_tiposangre").val());
              datos.append("telefono", $("#edit_telefono").val());
              datos.append("celular", $("#edit_celular").val());
              datos.append("estadocivil", $("#edit_estadocivil").val());
              datos.append("ocupacion", $("#edit_ocupacion").val());
              datos.append("religion", $("#edit_religion").val());
              datos.append("pais", $("#edit_pais").val());
              datos.append("departamento", $("#edit_departamento").val());
              datos.append("municipio", $("#edit_municipio").val());
              datos.append("domicilio", $("#edit_domicilio").val());
              datos.append("email", $("#edit_email").val());
              datos.append("clave", $("#edit_clave").val());
              datos.append("estado", $("#edit_estado").val());
              datos.append("medicoEspecialidades", "actualizarAuxiliar");

                $.ajax({
                    url: myApp.url +'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                        rept = eval(respuesta)
                        if(rept[0]["exito"]=='ok'){
                            //mensaje exito
                            alert("Los datos se actualizaron de manera exitosa")
                            //actualizar data
                            auxiliares.ajax.reload(null,false);
                            //cerrar ventana modal
                            $("._editAuxiliar").modal('hide');
                        }else{
                             //mensaje exito
                            alert("Los datos no pudieron ser actualizados, intente mas tarde.")
                            //actualizar data
                            auxiliares.ajax.reload(null,false);
                             $("._editAuxiliar").modal('hide');
                        }
                    }
                });
      }
    })
    var Horario = $('#tblHorario').DataTable({
        "ajax": myApp.url +'MedicosControlador.php?medicoEspecialidades=listarHorarioMedicoPorId',
         "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='ui mini blue button btnEditarHorario' ><i class='edit icon'></i></button>",
        } ],
        "language": idioma_espanol,
        
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "todos"]],
        "dom": "Blfrtip",
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<button class="ui green button" type="button"><i class="fa fa-file-excel-o"></i></button>',
                titleAttr: 'Excel'
            },
            {
                "text": "<i class='fa fa-user-plus'></i>",
                "titleAttr": "Agregar horario",
                "className":"ui blue button",
                "action": function(){
                    selectConsultorios();
                    selectEspecialidades();
                  $(".addHorario").modal('show');
                }
            },
        ]
    });
    Horario.buttons().container().insertBefore('.botoneraexcelpdfauxiliares');
    $('#tblHorario tbody').on( 'click', 'button.btnEditarHorario', function () {
        dropdownEditEspecialidades();
        dropdownEditConsultorio();
        var data = Horario.row( $(this).parents('tr') ).data();
        $("#edit_upd_fecha").val(data[3])
        $("#edit_upd_horaInicio").val(data[4])
        $("#edit_upd_horaFin").val(data[5])
        $("#idHorario").val(data[6])
        $('.ui.dropdown.edit_select_consultorio').dropdown('set selected', data[8]);
        $('.ui.dropdown.edit_select_especialidad').dropdown('set selected', data[7]);        
        $(".updHorario").modal("show");
        console.log(data)
    })
    
     /*
      * VALIDACION FORMULARIO ADDHORARIO
      */     
    $('.ui.form._addHorario')
    .form({
      fields: {
        ipd_fecha   : 'empty',
        upd_horaInicio   : 'empty',
        upd_horaFin   : 'empty',
      },
      onSuccess : function(e){
          e.preventDefault();
          var datos = new FormData();
              datos.append("select_consultorio", $("#select_consultorio").val());
              datos.append("select_especialidad", $("#select_especialidad").val());
              datos.append("upd_fecha", $("#upd_fecha").val());
              datos.append("upd_horaInicio", $("#upd_horaInicio").val());
              datos.append("upd_horaFin", $("#upd_horaFin").val());
              datos.append("registrarHorarioMedico", "registrarHorario");

                $.ajax({
                    url: myApp.url +'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                        //console.log(respuesta);return
                        rept = eval(respuesta)
                        if(rept[0]["exito"]=='ok'){
                            //mensaje exito
                            alert("Los datos se gaurdaron de manera exitosa")
                            //actualizar data
                            Horario.ajax.reload(null,false);
                            //cerrar ventana modal
                            $(".updHorario").modal('hide');  
                        }else{
                             //mensaje exito
                            alert("Los datos no pudieron ser guardados")
                            //actualizar data
                            Horario.ajax.reload(null,false);
                             $(".updHorario").modal('hide');
                        }
                    }
                });
      }
    })
    
    /*
      * VALIDACION FORMULARIO EDITHORARIO
      */     
    $('.ui.form._editHorario')
    .form({
      fields: {
        edit_ipd_fecha   : 'empty',
        edit_upd_horaInicio   : 'empty',
        edit_upd_horaFin   : 'empty',
      },
      onSuccess : function(e){
          e.preventDefault();
          var datos = new FormData();
            datos.append("edit_select_consultorio", $("#edit_select_consultorio").val());
            datos.append("edit_upd_fecha", $("#edit_upd_fecha").val());
            datos.append("edit_select_especialidad", $("#edit_select_especialidad").val());
            datos.append("edit_upd_horaInicio", $("#edit_upd_horaInicio").val());
            datos.append("edit_upd_horaFin", $("#edit_upd_horaFin").val());
            datos.append("idHorario", $("#idHorario").val());
            datos.append("editHorarioMedico", "actualizarHorario");
                $.ajax({
                    url: myApp.url +'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                       // console.log(respuesta);return
                        rept = eval(respuesta)
                        if(rept[0]["exito"]=='ok'){
                            //mensaje exito
                            alert("Los datos se actualizaron de manera exitosa")
                            //actualizar data
                            Horario.ajax.reload(null,false);
                            //cerrar ventana modal
                            $(".updHorario").modal('hide');
                        }else{
                             //mensaje exito
                            alert("Los datos no pudieron ser actualizados")
                            //actualizar data
                            Horario.ajax.reload(null,false);
                             $(".updHorario").modal('hide');

                        }
                    }
                });
      }
    });
    
    
    $("#departamento").on('change', () => {
        selectMunicipios($("#departamento").val())
    })
    selectMunicipios(1)
    $("#edit_departamento").on('change', () => {
        selectMunicipiosEdit($("#edit_departamento").val())
    })
})




/*
 * FUNCION RETORNA HORA ACTUAL, SE UTILIZA EN EL CALENDARIO
 */
var horaActual = function(){
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1; //hoy es 0!
    var yyyy = hoy.getFullYear();

    if(dd<10) {
        dd='0'+dd
    } 

    if(mm<10) {
        mm='0'+mm
    } 

    hoy = mm+'/'+dd+'/'+yyyy;
    return hoy

}
var idioma_espanol = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "",
    "searchPlaceholder": "Buscar...",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    }
}

var selectConsultorios = function(){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?medicoEspecialidades=listarConsultorios', 
    dataType: "json",
    success: function(data){
        $('#select_consultorio').html('');
        //console.log(data);return;  
      $.each(data,function(key, registro) {
        $("#select_consultorio").append('<option value='+registro.idConsultorio+'>'+registro.nombre+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar consultorios');
    }
  });
}


var dropdownEditConsultorio = function(){
  $('.ui.dropdown.edit_select_consultorio')
  .dropdown({
    apiSettings: {
      // this url parses query server side and returns filtered results
      url: myApp.url +'MedicosControlador.php?dropdownConsultorio=select'
    },
  })
}

var dropdownEditEspecialidades = function(){
    $('.ui.dropdown.edit_select_especialidad')
  .dropdown({
    apiSettings: {
      // this url parses query server side and returns filtered results
      url: myApp.url +'MedicosControlador.php?dropdownEspecialidad=select'
    },
  })
}
var selectEspecialidades = function(){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?listarEspacilidadesMedico=listarEspecialalidades', 
    dataType: "json",
    success: function(data){
      $('#select_especialidad').html('');
         
      $.each(data,function(key, registro) {
        $("#select_especialidad").append('<option value='+registro.idEspecialidades+'>'+registro.especialidad+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar especialidades');
    }
  });
}
var selectEspecialidadesEdit = function(){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?listarEspacilidadesMedico=listarEspecialalidades', 
    dataType: "json",
    success: function(data){
      $('#edit_select_especialidad').html('');
         
      $.each(data,function(key, registro) {
        $("#edit_select_especialidad").append('<option value='+registro.idEspecialidades+'>'+registro.especialidad+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar especialidades');
    }
  });
}
var selectDepartamentos = function(){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?listarDepartamentos=listar', 
    dataType: "json",
    success: function(data){
      $('#departamento').html('');
         
      $.each(data,function(key, registro) {
        $("#departamento").append('<option value='+registro.idDepartamento+'>'+registro.departamento+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar departamentos');
    }
  });
}

var selectDepartamentosEdit = function(){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?listarDepartamentos=listar', 
    dataType: "json",
    success: function(data){
      $('#edit_departamento').html('');
         
      $.each(data,function(key, registro) {
        $("#edit_departamento").append('<option value='+registro.idDepartamento+'>'+registro.departamento+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar departamentos');
    }
  });
}

var selectMunicipios = function(idDepartamento){
    $.ajax({
        type: "GET",
        url: myApp.url +'MedicosControlador.php?id_depamunicipio='+idDepartamento, 
        dataType: "json",
        success: function(data){
          $('#municipio').html('');

          $.each(data,function(key, registro) {
            $("#municipio").append('<option value='+registro.idMunicipio+'>'+registro.municipio+'</option>');
          });        
        },
        error: function(data) {
          alert('Ocurrio un error al cargar municipio');
        }
      });
}

var selectMunicipiosEdit = function(idDepartamento){
    $.ajax({
        type: "GET",
        url: myApp.url +'MedicosControlador.php?id_depamunicipio='+idDepartamento, 
        dataType: "json",
        success: function(data){
          $('#edit_municipio').html('');

          $.each(data,function(key, registro) {
            $("#edit_municipio").append('<option value='+registro.idMunicipio+'>'+registro.municipio+'</option>');
          });        
        },
        error: function(data) {
          alert('Ocurrio un error al cargar municipio');
        }
      });
}