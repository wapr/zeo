$(function(){
   var consultorio = $('#tblConsultorios').DataTable({
        "destroy":true,
        "ajax": myApp.url +'ControladorGeneral.php?listarConsultorios=listar',
         "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='ui mini blue button btnEditConsultorio' ><i class='fa fa-heartbeat'></i></button> ",
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
    consultorio.buttons().container().insertBefore('.botoneraexcelpdfauxiliares');
    
    $('#tblConsultorios tbody').on( 'click', 'button.btnEditConsultorio', function () {
        var data = consultorio.row( $(this).parents('tr') ).data();
        window.location="LayoutMedico.php?load=consultoriosactualizar&idconsultorio="+data[6];
        console.log(data)
       
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