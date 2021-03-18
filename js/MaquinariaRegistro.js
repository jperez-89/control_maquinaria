$(document).ready(function () {
     $(document).on('click', '#BtnGuardarMaquina', function (e) {
          e.preventDefault();
          var datos = new Array();
          var codigo = $('#txtCodigo').val();
          var descripcion = $('#txtDescripcion').val();
          var marca = $('#txtMarca').val();
          var modelo = $('#txtModelo').val();

          datos.push(codigo, descripcion, marca, modelo);

          if (datos[0] != '' && datos[1] != '') {
               $.post('Backend/IngresoMaquinaria.php', { datos }, function (Respuesta) {
                    if (Respuesta != 'NoConex') {
                         if (Respuesta == true) {
                              Swal.fire({
                                   position: 'center',
                                   type: 'success',
                                   title: 'Datos Guardados',
                                   showConfirmButton: false,
                                   timer: 1700
                              });
                              LimpiarCampos();                              
                              $('#Tbl_MaqRegistro').load('Tablas/Tbl_MaqRegistro.php');
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
               });
          }
          else {
               Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'Código y Descripción no pueden quedar vacios',
                    showConfirmButton: false,
                    timer: 1500
               });
          }
     });

     function LimpiarCampos() {
          $('#txtCodigo').val('');
          $('#txtDescripcion').val('');
          $('#txtMarca').val('');
          $('#txtModelo').val('');
     }
});     
