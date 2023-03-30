setTable('Tbl_Reporte_Compra');
setTable('Tbl_Reporte_Salidas');
setTable('Tbl_Reporte_Inventario');

function setTable(table) {
     $(`#${table}`).dataTable({
          retrieve: true,
          "language": {
               "sProcessing": "Procesando...",
               "sLengthMenu": "Mostrar _MENU_ registros",
               "sZeroRecords": "No se encontraron resultados",
               "sEmptyTable": "Ningún dato disponible en esta tabla",
               "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
               "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
               "sInfoPostFix": "",
               "sSearch": "Buscar:",
               "sUrl": "",
               "sInfoThousands": ",",
               "sLoadingRecords": "Cargando...",
               "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
               },
               "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
               }
          }
     });
};

// $(document).ready(function () {
//      $('#Tbl_Reporte_Compra').dataTable({
//           retrieve: true,
//           language: {
//                "sLengthMenu": "Mostrar _MENU_ registros",
//                "sSearch": "Buscar:",
//                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                "sEmptyTable": "No hay datos en esta tabla",
//                "oPaginate": {
//                     "sFirst": "Primero",
//                     "sLast": "Ultimo",
//                     "sNext": "Siguiente",
//                     "sPrevious": "Anterior",
//                }
//           }
//      });

//      $('#Tbl_Reporte_Salidas').dataTable({
//           retrieve: true,
//           language: {
//                "sLengthMenu": "Mostrar _MENU_ registros",
//                "sSearch": "Buscar:",
//                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                "sEmpyTable": "No hay datos en esta tabla",
//                "oPaginate": {
//                     "sFirst": "Primero",
//                     "sLast": "Ultimo",
//                     "sNext": "Siguiente",
//                     "sPrevious": "Anterior",
//                }
//           }
//      });

//      $('#Tbl_Reporte_Inventario').dataTable({
//           retrieve: true,
//           language: {
//                "sLengthMenu": "Mostrar _MENU_ registros",
//                "sSearch": "Buscar:",
//                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                "sEmpyTable": "No hay datos en esta tabla",
//                "oPaginate": {
//                     "sFirst": "Primero",
//                     "sLast": "Ultimo",
//                     "sNext": "Siguiente",
//                     "sPrevious": "Anterior",
//                }
//           }
//      });

// });