Tbl_RegistroRepuesto = $('#Tbl_RegistroRepuesto').dataTable({
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

$('#BtnModalRepuesto').click(function (e) {
     e.preventDefault();
     $('#tblModalRepuestos').load('tables/Tbl_ModalRepuestos.php');
});

$(document).on('click', '#BtnAgregarRepuesto', function (e) {
     e.preventDefault();
     r = $(this).parent().parent()[0];
     FilaModalRepuestos = tbl_ModalRepuestos.fnGetData(r);

     $("#idCodRepuesto").val(FilaModalRepuestos[1]);
     $("#codRepuesto").val(FilaModalRepuestos[2]);
     $("#Descripcion").val(FilaModalRepuestos[3]);
     $("#selectMedida").val(FilaModalRepuestos[5]);
     $("#Cantidad").focus();
});

$(document).on('click', '#BtnAgregarLinea', function (e) {
     e.preventDefault();
     var datos = new Array();
     var Fecha = $("#Fecha").val();
     var idCodRepuesto = $("#idCodRepuesto").val();
     var codRepuesto = $("#codRepuesto").val();
     var Descripcion = $("#Descripcion").val();
     var Cantidad = $("#Cantidad").val();
     var Comprobante = $("#Comprobante").val();
     var Medida = $("#selectMedida").val()

     iniciarArray(datos);
     datos.push(Fecha, codRepuesto, Descripcion, Cantidad, Medida, Comprobante);

     if (!validaInputs(datos)) {
          Tbl_RegistroRepuesto.fnAddData([
               Fecha, idCodRepuesto, codRepuesto, Descripcion, Cantidad, Medida, Comprobante,
               `<div class="text-center">
               <div class="text-center ui buttons">
                   <button class="ui yellow button" id="EditarLinea" title="Editar Linea">
                       <i class="fa fa-edit"></i>
                   </button>
                   <div class="or"></div>
                   <button class="ui google plus button" id="EliminarLinea" title="Eliminar Linea">
                       <i class="fa fa-trash"></i>
                   </button>
               </div>
           </div>`
          ]);

          OcultaCeldas();
          LimpiarCampos();
     } else {
          $('#codRepuesto').focus();
          Swal.fire({
               position: 'center',
               icon: 'error',
               title: 'Por favor',
               text: 'Complete todos los campos',
               showConfirmButton: true,
          });
     }
});

$(document).on('click', '#EliminarLinea', function (e) {
     e.preventDefault();
     var row = $(this).closest("tr").get(0);
     Tbl_RegistroRepuesto.fnDeleteRow(Tbl_RegistroRepuesto.fnGetPosition(row));

});

$(document).on('click', '#EditarLinea', function (e) {
     e.preventDefault();
     filaEditar = $(this).closest("tr").get(0);
     data = Tbl_RegistroRepuesto.fnGetData(filaEditar._DT_RowIndex);
     $("#Fecha").val(data[0]);
     $("#idCodRepuesto").val(data[1]);
     $("#codRepuesto").val(data[2]);
     $("#Descripcion").val(data[3]);
     $("#Cantidad").val(data[4]);
     $("#selectMedida").val(data[5]);
     $("#Comprobante").val(data[6]);

     $('#BtnAgregarLinea').addClass('d-none');
     $('#BtnActualizarLinea').removeClass('d-none');
});

$(document).on('click', '#BtnActualizarLinea', function (e) {
     e.preventDefault();
     // var filaSelec = $(this).closest("tr").get(0);
     nFila = filaEditar._DT_RowIndex;
     Tbl_RegistroRepuesto.fnUpdate($("#Fecha").val(), nFila, 0, 0, false);
     Tbl_RegistroRepuesto.fnUpdate($("#idCodRepuesto").val(), nFila, 1, 0, false);
     Tbl_RegistroRepuesto.fnUpdate($("#codRepuesto").val(), nFila, 2, 0, false);
     Tbl_RegistroRepuesto.fnUpdate($("#Descripcion").val(), nFila, 3, 0, false);
     Tbl_RegistroRepuesto.fnUpdate($("#Cantidad").val(), nFila, 4, 0, false);
     Tbl_RegistroRepuesto.fnUpdate(medida, nFila, 5, 0, false);
     Tbl_RegistroRepuesto.fnUpdate($("#Comprobante").val(), nFila, 6, 0, false);

     LimpiarCampos();
     $('#BtnActualizarLinea').addClass('d-none');
     $('#BtnAgregarLinea').removeClass('d-none');
});

$(document).on('click', '#btnGuardarRegistroRepuesto', function (e) {
     var datos = new Array();

     $('#Tbl_RegistroRepuesto tbody tr').each(function () {
          var Fecha = $(this).find('td').eq(0).text();
          // var idCodRepuesto = $(this).find('td').eq(1).text();
          var codRepuesto = $(this).find('td').eq(2).text();
          var Descripcion = $(this).find('td').eq(3).text();
          var Cantidad = $(this).find('td').eq(4).text();
          var Medida = $(this).find('td').eq(5).text();
          var Comprobante = $(this).find('td').eq(6).text();

          fila = new Array(Fecha, codRepuesto, Descripcion, Cantidad, Medida, Comprobante);
          datos.push(fila);
     });

     if (!validaInputs(datos[0])) {
          $.post('back/repuesto_ingreso.php', { datos }, function (respuesta) {
               if (respuesta != 'NoConex') {
                    if (respuesta) {
                         LimpiarCampos();
                         Tbl_RegistroRepuesto.fnClearTable();
                         mensaje('top', 1600, 'success', 'Datos Guardados')
                    } else {
                         mensaje('top', 1500, 'error', 'Datos no guardados')
                    }
               } else {
                    msgErrorConexion()
               }
          });
     } else {
          Swal.fire({
               position: 'center',
               icon: 'error',
               title: 'Por favor',
               text: 'Complete todos los campos',
               showConfirmButton: true,
          });
     }
});

$(document).on('click', '#btnCancelarRegistroRepuesto', function (e) {
     e.preventDefault();
     LimpiarCampos();
     Tbl_RegistroRepuesto.fnClearTable();
});

$(document).on('change', '#selectMedida', function (e) {
     e.preventDefault();
     Medida = $(this).val();
});

$(document).on('click', '#BtnAgregarRepuesto', function (e) {
     e.preventDefault();
     // Boton - TR    -  TD
     r = $(this).parent().parent()[0];
     // De la tabla obtiene los datos de esa fila 
     FilaModalRepuestos = tbl_ModalRepuestos.fnGetData(r);

     $("#txtCodigo").val(FilaModalRepuestos[1]);
     $("#txtDescripcion").val(FilaModalRepuestos[2]);
     $('#Tbl_ModalRepSalidas').load('Tablas/Tbl_ModalRepSalidas.php');
});

function LimpiarCampos() {
     $("#idCodRepuesto").val('0');
     $("#codRepuesto").val('');
     $("#Descripcion").val('');
     $("#Cantidad").val('');
     $("#selectMedida").val('0');
     $("#Comprobante").val('');
}

function OcultaCeldas() {
     $("#Tbl_RegistroRepuesto tr").each(function () {
          var crow = $(this);
          crow.find("td:eq(1)").css("display", "none");
     });
}