var tabla = null, data = null, Cliente = null, r = null, btn1 = null, email = null, NumLinea = null, Totales = null, DatosTabla = null, nfila = 0, cfilas = 0, mes, dia, fila, filaEditar, medida;

// CARGA LA FUNCION AL INICIAR LA PAGINA
window.onload = function () {
     this.FechaActual();
     // tbl_ModalRepuestos = $('#Tbl_ModalClientes').dataTable({
     //      // retrieve: true,
     //      paging: true,
     //      searching: true,
     //      // lengthChange: false
     //  });
}

// PONE LA FECHA ACTUAL EN EL CAMPO FECHA
function FechaActual() {
     var fecha = new Date(); //Fecha actual
     var mes = fecha.getMonth() + 1; //obteniendo mes
     var dia = fecha.getDate(); //obteniendo dia
     var anho = fecha.getFullYear(); //obteniendo año
     if (dia < 10)
          dia = '0' + dia; //agrega cero si el menor de 10
     if (mes < 10)
          mes = '0' + mes //agrega cero si el menor de 10
     document.getElementById('txtFecha').value = anho + "-" + mes + "-" + dia;
}

// LIMPIA LOS CAMPOS TIPO TEXTO
function LimpiarCampos() {
     $('#select').val('');
     $("#txtCantidad").val('');
     $("#txtCodigo").val('');
     $("#txtDescripcion").val('');
     $("#txtOrdenCompra").val('');
}

// AGREGA LA LINEA DEL REPUESTO A LA TABLA
$(document).on('click', '#BtnAgregarLinea', function (e) {
     e.preventDefault();
     if ($("#txtCodigo").val() != "") {
          tabla = $('#Tbl_Repuestos').dataTable({
               retrieve: true,
               paging: false,
               searching: false,
               language: {
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros"
               }
          });
          var NuevaCantidad = 0, existe = false;

          // ------------ PROCESO EN CASO DE QUE SEA EL PRIMER PRODUCTO ------------------------------
          if (cfilas == 0) {
               tabla.fnAddData([
                    $("#txtFecha").val(),
                    $("#txtComprobante").val(),
                    $("#txtCantidad").val(),
                    $("#txtCodigo").val(),
                    $("#txtDescripcion").val(),
                    medida,
                    $("#txtOrdenCompra").val(),
                    '<div class="ui buttons">'
                    + '<button class="ui vk button" id="EditarLinea" title="Editar Linea"><i class="fa fa-edit"></i></button>'
                    + '<div class="or"></div>'
                    + '<button class="ui google plus button" id="EliminarLinea" title="Eliminar Linea"><i class="fa fa-trash"></i></button>'
                    + '</div>'

                    // '<button id="EditarLinea" title="Editar Linea" class="btn btn-secondary btn-edit"> <i class="fa fa-edit"></i></button>&nbsp;'
                    // + '<button id="EliminarLinea" title="Eliminar Linea" class="btn btn-danger btn-delet"> <i class="fa fa-trash"></i></button>'
               ]);
               cfilas += 1;
          }
          // ------------ PROCESO EN CASO DE QUE YA EXISTA EL PRODUCTO -------------------------------
          else {
               // PROCESO PARA BUSCAR SI EXISTE EL CODIGO
               for (var i = 0; i < cfilas; i++) {
                    // Vamos obteniendo los datos de la fila
                    DatosTabla = tabla.fnGetData(i);
                    //Validamos si el codigo a ingresar existe
                    if (DatosTabla[3] == $("#txtCodigo").val()) {
                         existe = true;
                         var CantExistente = DatosTabla[2];
                         nfila = i;
                    }
               }
               // ------------ SI EXISTE EL CODIGO SE ACTUALIZA LAS CANTIDADES Y TOTALES DE LINEA -------------------------------
               if (existe) {
                    // Actualiza la Cantidad
                    NuevaCantidad = Number(CantExistente) + Number($("#txtCantidad").val());
                    tabla.fnUpdate(NuevaCantidad, nfila, 2, 0, false);
                    /* Dato, nfila, ncolumna, 0, false */

                    // se cambia a falso por que en el if del for no se implemento el else, para que no se ejecute tantas veces por si no se valida el if
                    existe = false;
               }
               // ------------ SI NO EXISTE EL CODIGO DEL PRODUCTO, AGREGA LA INFORMACION A LA TABLA ----------------------
               else {
                    tabla.fnAddData([
                         $("#txtFecha").val(),
                         $("#txtComprobante").val(),
                         $("#txtCantidad").val(),
                         $("#txtCodigo").val(),
                         $("#txtDescripcion").val(),
                         medida,
                         $("#txtOrdenCompra").val(),
                         '<div class="ui buttons">'
                         + '<button class="ui vk button" id="EditarLinea" title="Editar Linea"><i class="fa fa-edit"></i></button>'
                         + '<div class="or"></div>'
                         + '<button class="ui google plus button" id="EliminarLinea" title="Eliminar Linea"><i class="fa fa-trash"></i></button>'
                         + '</div>'
                    ]);
                    cfilas += 1;
               }
          }
          LimpiarCampos();
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

// EDITA FILA DE LA TABLA
$(document).on('click', '#EditarLinea', function (e) {
     e.preventDefault();
     // obtener la fila a editar
     filaEditar = $(this).closest("tr").get(0);
     // De la tabla obtiene los datos de esa fila 
     data = tabla.fnGetData(filaEditar._DT_RowIndex);
     // Imprime la posicion 1 del array, o sea, el Codigo del Producto
     $("#txtFecha").val(data[0]);
     $("#txtComprobante").val(data[1]);
     $("#txtCantidad").val(data[2]);
     $("#txtCodigo").val(data[3]);
     $("#txtDescripcion").val(data[4]);
     $("#Select").val(data[5]);
     $("#txtOrdenCompra").val(data[6]);

     document.getElementById('BtnAgregarLinea').style.display = 'none';
     document.getElementById('BtnActualizarRepuesto').style.display = 'block';
});

// ACTUALIZA LA LINEA SELECCIONADA
$(document).on('click', '#BtnActualizarRepuesto', function (e) {
     e.preventDefault();
     // OBTENER LA FILA SELECCIONADA
     // var filaSelec = $(this).closest("tr").get(0);
     // SE OBTIENE EL INDEX DE LA FILA SELECCIONADA
     nFila = filaEditar._DT_RowIndex;
     // SE ACTUALIZAN LOS CAMPOS EN LA TABLA
     tabla.fnUpdate($("#txtFecha").val(), nFila, 0, 0, false);
     tabla.fnUpdate($("#txtComprobante").val(), nFila, 1, 0, false);
     tabla.fnUpdate($("#txtCantidad").val(), nFila, 2, 0, false);
     tabla.fnUpdate($("#txtCodigo").val(), nFila, 3, 0, false);
     tabla.fnUpdate($("#txtDescripcion").val(), nFila, 4, 0, false);
     tabla.fnUpdate(medida, nFila, 5, 0, false);
     tabla.fnUpdate($("#txtOrdenCompra").val(), nFila, 6, 0, false);
     /* Orden de los campos Dato, nfila, ncolumna, 0, false */

     LimpiarCampos();
     document.getElementById('BtnActualizarRepuesto').style.display = 'none';
     document.getElementById('BtnAgregarLinea').style.display = 'block';
});

// GUARDAR INFORMACION
$(document).on('click', '#btnGuardarRepuesto', function (e) {
     if (tabla != null) {
          var filas = new Array();

          $('#Tbl_Repuestos tbody tr').each(function () {
               var Fecha = $(this).find('td').eq(0).text();
               var Comprobante = $(this).find('td').eq(1).text();
               var Cantidad = $(this).find('td').eq(2).text();
               var Codigo = $(this).find('td').eq(3).text();
               var Descripcion = $(this).find('td').eq(4).text();
               var Medida = $(this).find('td').eq(5).text();
               var OrdenCompra = $(this).find('td').eq(6).text();

               fila = new Array(
                    Fecha, Comprobante, Cantidad, Codigo, Descripcion, Medida, OrdenCompra
               );
               filas.push(fila);
          });

          $.ajax({
               async: false,
               type: "POST",
               url: "BackEnd/IngresoRepuestos.php",
               data: { filas: filas },
               success: function (msj) {
                    // alert(msj);
                    e.preventDefault();
                    if (msj != 'NoConex') { //VALIDA QUE HAYA CONEXION CON LA BD
                         if (msj > 0) {
                              Swal.fire({
                                   position: 'center',
                                   type: 'success',
                                   title: 'Datos Guardados',
                                   showConfirmButton: false,
                                   timer: 1500
                              });
                              setTimeout("location.href='RegistroRep.php'", 1501);
                         } else {
                              Swal.fire({
                                   position: 'center',
                                   type: 'error',
                                   title: 'Datos No Guardados',
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

// BORRA TODA LA INFO DE LA PANTALLA
$(document).on('click', '#btnCancelarRepuesto', function (e) {
     e.preventDefault();
     LimpiarCampos();
     tabla.fnClearTable();
     cfilas = 0;
     $("#txtComprobante").val('');
     document.getElementById('BtnActualizarRepuesto').style.display = 'none';
     document.getElementById('BtnAgregarRepuesto').style.display = 'block';
});

// SELECCIONA EL VALOR DEL SELECT
$(document).on('change', '#select', function (e) {
     e.preventDefault();
     medida = $(this).val();
});

// BUSCA EL REPUESTO Y LO AGREGA AL CAMPO
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