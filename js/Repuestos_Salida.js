var Tbl_ModalMaquinaria = null, tabla = null, Tbl_ModalClientes = null, cfilas = 0, nfila, fila, FilaModalRepuestos, tbl_ModalRepuestos = null;

// LIMPIA LOS CAMPOS TIPO TEXTO
function LimpiarCampos() {
     $("#txtMaquina").val('');
     $("#txtCantidad").val('');
     $("#txtCodigo").val('');
     $("#txtDescripcion").val('');
     $("#txtResponsable").val('');
}

// CONSULTA EXISTENCIA Y SEGUN AGREGA LA LINEA DEL REPUESTO A LA TABLA
$(document).on('click', '#BtnAgregarSalida', function (e) {
     e.preventDefault();
     var Codigo = $("#txtCodigo").val();
     var CantidadSalida = $("#txtCantidad").val();
     if (Codigo != "") {
          // AJAX QUE CONSULTA LA EXISTENCIA DEL REPUESTO, SI NO HAY ENVIA UNA ALERTA
          $.post('BackEnd/ConsultaExistencia.php', { Codigo }, function (CantidadStock) {
               if (Number(CantidadStock) < Number(CantidadSalida)) {
                    Swal.fire({
                         position: 'center',
                         type: 'warning',
                         title: 'No hay repuesto en stock',
                         showConfirmButton: false,
                         timer: 1700
                    });
                    Codigo = '';
                    CantidadSalida = 0;
               }
               else {
                    tabla = $('#Tbl_Salidas').dataTable({
                         retrieve: true,
                         paging: false,
                         searching: false,
                         language: {
                              "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros"
                         }
                    });
                    tabla.fnAddData([
                         $("#txtFecha").val(),
                         $("#txtCodigo").val(),
                         $("#txtDescripcion").val(),
                         $("#txtCantidad").val(),
                         $("#txtMaquina").val(),
                         $("#txtResponsable").val(),
                         '<div class="ui buttons">'
                         + '<button class="ui vk button" id="EditarLinea" title="Editar Linea"><i class="fa fa-edit"></i></button>'
                         + '<div class="or"></div>'
                         + '<button class="ui google plus button" id="EliminarLinea" title="Eliminar Linea"><i class="fa fa-trash"></i></button>'
                         + '</div>'
                    ]);
                    LimpiarCampos();                    
               }
          });
     }
     else {
          Swal.fire({
               title: 'Debe agregar un producto',
               type: 'error',
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Ok',
          });
     }
});

// EDITA FILA DE LA TABLA
$(document).on('click', '#EditarLinea', function (e) {
     e.preventDefault();
     // obtener la fila a editar
     filaEditar = $(this).closest("tr").get(0);
     // De la tabla obtiene los datos de esa fila 
     data = tabla.fnGetData(filaEditar._DT_RowIndex);
     // Imprime la posicion 1 del array, o sea, el Codigo del Producto
     $("#txtFecha").val(data[0]);
     $("#txtCodigo").val(data[1]);
     $("#txtDescripcion").val(data[2]);
     $("#txtCantidad").val(data[3]);
     $("#txtMaquina").val(data[4]);
     $("#txtResponsable").val(data[5]);

     document.getElementById('BtnAgregarSalida').style.display = 'none';
     document.getElementById('BtnActualizarSalida').style.display = 'block';
});

// ACTUALIZA LA LINEA SELECCIONADA
$(document).on('click', '#BtnActualizarSalida', function (e) {
     e.preventDefault();
     // OBTENER LA FILA SELECCIONADA
     nFila = filaEditar._DT_RowIndex;
     // SE ACTUALIZAN LOS CAMPOS EN LA TABLA
     tabla.fnUpdate($("#txtFecha").val(), nFila, 0, 0, false);
     tabla.fnUpdate($("#txtCodigo").val(), nFila, 1, 0, false);
     tabla.fnUpdate($("#txtDescripcion").val(), nFila, 2, 0, false);
     tabla.fnUpdate($("#txtCantidad").val(), nFila, 3, 0, false);
     tabla.fnUpdate($("#txtMaquina").val(), nFila, 4, 0, false);
     tabla.fnUpdate($("#txtResponsable").val(), nFila, 5, 0, false);
     /* Orden de los campos Dato, nfila, ncolumna, 0, false */

     LimpiarCampos();
     document.getElementById('BtnAgregarSalida').style.display = 'block';
     document.getElementById('BtnActualizarSalida').style.display = 'none';
});

// ELIMINA FILA DE LA TABLA
$(document).on('click', '#EliminarLinea', function (e) {
     e.preventDefault();
     Swal.fire({
          title: 'Seguro quiere eliminar ésta linea?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si',
          cancelButtonText: 'No'
     }).then((result) => {
          if (result.value) {
               var row = $(this).closest("tr").get(0);
               tabla.fnDeleteRow(tabla.fnGetPosition(row));
               cfilas -= 1;
               if (cfilas == 0) {
                    tabla = null;
               }
          }
     })
});

// BORRA TODA LA INFO DE LA PANTALLA
$(document).on('click', '#btnCancelarSalida', function (e) {
     e.preventDefault();
     LimpiarCampos();
     tabla.fnClearTable();
     cfilas = 0;
     document.getElementById('BtnAgregarSalida').style.display = 'block';
     document.getElementById('BtnActualizarSalida').style.display = 'none';
});

// GUARDAR INFORMACION
$(document).on('click', '#btnGuardarSalida', function (e) {
     if (tabla != null) {
          var Salidas = new Array();
          $('#Tbl_Salidas tbody tr').each(function () {
               var Fecha = $(this).find('td').eq(0).text();
               var Codigo = $(this).find('td').eq(1).text();
               var Descripcion = $(this).find('td').eq(2).text();
               var Cantidad = $(this).find('td').eq(3).text();
               var Maquina = $(this).find('td').eq(4).text();
               var Responsable = $(this).find('td').eq(5).text();

               fila = new Array(
                    Fecha, Codigo, Descripcion, Cantidad, Maquina, Responsable
               );
               Salidas.push(fila);
          });

          $.ajax({
               async: false,
               type: "POST",
               url: "BackEnd/SalidaRepuestos.php",
               data: { Salidas: Salidas },
               success: function (Correcto) {
                    e.preventDefault();
                    if (Correcto != 'NoConex') { //VALIDA QUE HAYA CONEXION CON LA BD
                         if (Correcto > 0) {
                              Swal.fire({
                                   position: 'center',
                                   type: 'success',
                                   title: 'Datos Guardados',
                                   showConfirmButton: false,
                                   timer: 1500
                              });
                              setTimeout("location.href='SalidaRep.php'", 1501);
                         } else {
                              Swal.fire({
                                   position: 'center',
                                   type: 'error',
                                   title: 'Datos No Guardados' + Correcto,
                                   showConfirmButton: false,
                                   timer: 1500
                              });
                         }
                    } else {
                         Swal.fire({
                              position: 'center',
                              type: 'error',
                              title: 'Error de Conexión con la BD',
                              showConfirmButton: false,
                              timer: 1500
                         });
                    }
               }
          })
     }
     else {
          Swal.fire({
               position: 'center',
               type: 'error',
               title: 'No hay datos para guardar',
               showConfirmButton: false,
               timer: 1500
          });
     }
});

// BUSCA EL REPUESTO Y LO AGREGA AL CAMPO
$(document).on('click', '#BtnAgregarRepuesto', function (e) {
     e.preventDefault();
        // Boton - TR    -  TD
     r = $(this).parent().parent()[0];
     // De la tabla obtiene los datos de la fila seleccionada 
     FilaModalRepuestos = tbl_ModalRepuestos.fnGetData(r);

     // PASA LOS DATOS A LOS INPUT DEL "FORMULARIO"
     $("#txtCodigo").val(FilaModalRepuestos[1]);
     $("#txtDescripcion").val(FilaModalRepuestos[2]);
     
     // RECARGA EL MODAL EN CASO DE QUE SE USE EL BUSCADOR DE LA TABLA
     $('#Tbl_ModalRepSalidas').load('Tablas/Tbl_ModalRepSalidas.php');
});

// BUSCA EL LA MAQUINA Y LO AGREGA AL CAMPO
$(document).on('click', '#BtnAgregarMaquina', function (e) {
     e.preventDefault();
     // Boton - TR    -  TD
     var r = $(this).parent().parent()[0];
     // De la tabla obtiene los datos de esa fila 
     var FilaModalMaquinaria = Tbl_ModalMaquinaria.fnGetData(r);

     $("#txtMaquina").val(FilaModalMaquinaria[1]);
     $('#Tbl_ModalMaqSalidas').load('Tablas/Tbl_ModalMaqSalidas.php');
});