$(function(){
    var gestionActividades = $('#tblActividadesMedicamento').DataTable({
        "destroy":true,
        "ajax": myApp.url + 'MedicosControlador.php?listarCitaEstado=listarEstadoMedico',
         "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='ui mini blue button btnAddActividad' ><i class='fa fa-heartbeat'></i></button> <button class='ui mini blue button btnVerActividad'><i class='fa fa-eye'></i></button>"+
                               "<button class='ui mini violet button btnAddMedicamento' ><i class='fa fa-medkit'></i></button> <button class='ui mini violet button btnVerMedicamento'><i class='fa fa-eye'></i></button> ",
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
            }
        ]
    });
    gestionActividades.buttons().container().insertBefore('.botoneraexcelpdfauxiliares');
    
    $('#tblActividadesMedicamento tbody').on( 'click', 'button.btnAddMedicamento', function () {
        var data = gestionActividades.row( $(this).parents('tr') ).data();
        //alert("agregar medicamentos");
        selectMedicamentos();
        selectEtapaTumorMed(data[4])
        $("#idPacienteMed").val(data[5]);
        $(".addMedicamentos").modal("show")
    })
    $('#tblActividadesMedicamento tbody').on( 'click', 'button.btnVerMedicamento', function () {
        var data = gestionActividades.row( $(this).parents('tr') ).data();
        //$("#idPacienteMed").val(data[4]);
        
        $("._verMedicamentos").modal("show")
        var consultarMedicamentos = $('#tblVerMedicamentosPaciente').DataTable({
            "destroy":true,
            "ajax": myApp.url + 'MedicosControlador.php?listarMedicamentoPaciente=listar&idCita='+data[5],
             "columnDefs": [ {
                "targets": -1,
                "data": null,
                "defaultContent": " <button class='ui mini red button btnDeleteMedicamento' ><i class='delete icon'></i></button> ",
            } ],
            "language": idioma_espanol,
            "aaSorting": [[0, "desc"]],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "todos"]],
            
        });
        consultarMedicamentos.buttons().container().insertBefore('.botoneraexcelpdfauxiliares');
        $('#tblVerMedicamentosPaciente tbody').on( 'click', 'button.btnDeleteMedicamento', function () {
            var data = consultarMedicamentos.row( $(this).parents('tr') ).data();
            //console.log(data);return;
            /*
             *eliminar medicamentos
             */
            console.log(data)
            if(confirm('¿Desea eliminar este registro?')){
                //return
                var datos = new FormData();
                    datos.append("idMedicamento", data[6]);
                    datos.append("eliminarMedicamento", "eliminar");
                      $.ajax({
                        url: myApp.url + 'MedicosControlador.php',
                        type: 'POST',
                        data: datos,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(respuesta){
                            rept = eval(respuesta)
                            if(rept[0]["exito"]=='ok'){
                                //mensaje exito
                                alert("Registro se eliminó de manera correcta")
                                //actualizar data
                                consultarMedicamentos.ajax.reload(null,false);
                            }else{
                                 //mensaje exito
                                alert("Los datos no pudieron ser eliminados, intente mas tarde.")
                                //actualizar data
                                consultarActividades.ajax.reload(null,false);
                            }
                        }
                    });
            }
            
        })
    })
    $('#tblActividadesMedicamento tbody').on( 'click', 'button.btnAddActividad', function () {
        var data = gestionActividades.row( $(this).parents('tr') ).data();
        //console.log(data);return;
        $("#idPaciente").val(data[5]);
        //$("#idCita").val(data[5]);
        selectEtapaTumor(data[4]);
        $(".addActividad").modal("show")
    })
    
    $('#tblActividadesMedicamento tbody').on( 'click', 'button.btnVerActividad', function () {
        var data = gestionActividades.row( $(this).parents('tr') ).data();
        //data[4]
        $(".verActividad").modal("show")
        var consultarActividades = $('#tblVerActividadesPaciente').DataTable({
            "destroy":true,
            "ajax": myApp.url + 'MedicosControlador.php?consultarActividadesEtapa=listarActividades&idCita='+data[5],
             "columnDefs": [ {
                "targets": -1,
                "data": null,
                "defaultContent": " <button class='ui mini red button btnDeleteActividad' ><i class='delete icon'></i></button> ",
            } ],
            "language": idioma_espanol,
            "aaSorting": [[0, "desc"]],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "todos"]],
            
        });
        
        $('#tblVerActividadesPaciente tbody').on( 'click', 'button.btnDeleteActividad', function () {
            var data = consultarActividades.row( $(this).parents('tr') ).data();
            //console.log(data[6]);return
            if(confirm('¿Desea eliminar este registro?')){
                var datos = new FormData();
                    datos.append("idActividad", data[6]);
                    datos.append("eliminarActividad", "eliminar");
                      $.ajax({
                        url: myApp.url + 'MedicosControlador.php',
                        type: 'POST',
                        data: datos,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(respuesta){
                            rept = eval(respuesta)
                            if(rept[0]["exito"]=='ok'){
                                //mensaje exito
                                alert("Registro se eliminó de manera correcta")
                                location.reload();
                            }else{
                                 //mensaje exito
                                alert("Los datos no pudieron ser eliminados, intente mas tarde.")
                                //actualizar data
                                consultarActividades.ajax.reload(null,false);
                            }
                        }
                    });
            }
        })
        
    })
    /*
      * VALIDACION FORMULARIO ACTIVIDAD
      */     
    $('.ui.form.frmAddActividad')
    .form({
      fields: {
        etapaTumor     : 'empty',
        concepto     : 'empty',
        estado     : 'empty',
        numHoras     : 'empty',
        numDias     : 'empty',
      },
      onSuccess : function(e){
          e.preventDefault();
          
          var datos = new FormData();
              datos.append("idPaciente", $("#idPaciente").val());
              datos.append("etapaTumor", $("#etapaTumor").val());
              datos.append("concepto", $("#concepto").val());
              datos.append("estado", $("#estado").val());
              datos.append("numHoras", $("#numHoras").val());
              datos.append("numDias", $("#numDias").val());
              
              datos.append("medigoRegistrarActividad", "registarActividad");
           $.ajax({
                    url: myApp.url + 'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                        //console.log(respuesta);return
                        rept = eval(respuesta)
                        if(rept[0]["exito"]=='ok'){
                            $('.ui.form.frmAddActividad').form('reset')
                            //mensaje exito
                            alert("Los datos se actualizaron de manera exitosa")
                            //actualizar data
                            gestionActividades.ajax.reload(null,false);
                            //cerrar ventana modal
                            $(".addActividad").modal('hide');
                            
                        }else{
                             //mensaje exito
                            alert("Los datos no pudieron ser actualizados, intente mas tarde.")
                            //actualizar data
                            gestionActividades.ajax.reload(null,false);
                             $(".addActividad").modal('hide');

                        }
                    }
                });
      }
    })
    /*
      * VALIDACION FORMULARIO MEDICAMENTO
      */     
    $('.ui.form.frmAddMedicamento')
    .form({
      fields: {
        medicamentos     : 'empty',
        etapa     : 'empty',
        conceptoMed     : 'empty',
        medNumHoras     : 'empty',
        medNumDias     : 'empty',
      },
      onSuccess : function(e){
          e.preventDefault();
          var datos = new FormData();
              datos.append("idPacienteMed", $("#idPacienteMed").val());
              datos.append("medicamentos", $("#medicamentos").val());
              datos.append("etapa", $("#etapa").val());
              datos.append("concepto", $("#conceptoMed").val());
              datos.append("medNumHoras", $("#medNumHoras").val());
              datos.append("medNumDias", $("#medNumDias").val());
              datos.append("registrarMedicamento", "medicoRegistrarMedicamento");
           $.ajax({
                    url: myApp.url + 'MedicosControlador.php',
                    type: 'POST',
                    data: datos,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(respuesta){
                        //console.log(respuesta);return
                        rept = eval(respuesta)
                        if(rept[0]["exito"]=='ok'){
                             $('.ui.form.frmAddMedicamento').form('reset')
                            //mensaje exito
                            alert("Los datos se actualizaron de manera exitosa")
                            //actualizar data
                            gestionActividades.ajax.reload(null,false);
                            //cerrar ventana modal
                            $(".addMedicamentos").modal('hide');
                        }else{
                             //mensaje exito
                            alert("Los datos no pudieron ser actualizados, intente mas tarde.")
                            //actualizar data
                            gestionActividades.ajax.reload(null,false);
                             $(".addMedicamentos").modal('hide');
                        }
                    }
                });
      }
    })
})
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
var selectEtapaTumor = function(paciente){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?listaEtapaTumor=listar&idPaciente='+paciente, 
    dataType: "json",
    success: function(data){
      $('#etapaTumor').html('');
      $("#etapaTumor").append('<option value="">SELECCIONE</option>');
      $.each(data,function(key, registro) {
        $("#etapaTumor").append('<option value='+registro.idEtapatumor+'>'+registro.nombreetapa+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar etapas de tumor');
    }
  });
}
var selectEtapaTumorMed = function(paciente){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?listaEtapaTumor=listar&idPaciente='+paciente, 
    dataType: "json",
    success: function(data){
      $('#etapa').html('');
      $("#etapa").append('<option value="">SELECCIONE</option>');
      $.each(data,function(key, registro) {
        $("#etapa").append('<option value='+registro.idEtapatumor+'>'+registro.nombreetapa+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar etapas de tumor');
    }
  });
}

var selectMedicamentos = function(){
    $.ajax({
    type: "GET",
    url: myApp.url +'MedicosControlador.php?medicamentosReceta=listar', 
    dataType: "json",
    success: function(data){
      $('#medicamentos').html('');
      $("#medicamentos").append('<option value="">SELECCIONE</option>');
      $.each(data,function(key, registro) {
        $("#medicamentos").append('<option value='+registro.idMedicamento+'>'+registro.nombre+'</option>');
      });        
    },
    error: function(data) {
      alert('Ocurrio un error al cargar los medicamentos');
    }
  });
}
