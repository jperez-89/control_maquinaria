$('#BtnGuardarMaquina').on('click', function (e) {
     e.preventDefault();
     var datos = new Array();
     var codigo = $('#txtCodigo').val();
     var descripcion = $('#txtDescripcion').val();
     var marca = $('#txtMarca').val();
     var modelo = $('#txtModelo').val();
     var op = 'insertar';

     datos.push(op, codigo, descripcion, marca, modelo);

     if (!validaInputs(datos)) {
          $.post('back/Maquinaria.php', { datos }, function (respuesta) {
               if (respuesta != 'NoConex') {
                    if (respuesta) {
                         LimpiarCampos();
                         mensaje('top', 1600, 'success', 'Datos Guardados')
                         $('#Tbl_MaqRegistro').load('tables/tblMaquinaria.php');
                    } else {
                         mensaje('top', 1500, 'error', 'Datos no guardados')
                    }
               } else {
                    erroConexion()
               }
          });
     }
     else {
          $('#txtCodigo').focus();
          Swal.fire({
               position: 'center',
               type: 'error',
               title: 'Por favor',
               text: 'Complete todos los campos',
               showConfirmButton: true,
          });

     }
});

$('#BtnActualizarMaquina').on('click', function (e) {
     e.preventDefault();
     var datos = new Array();
     var codigo = $('#txtCodigo').val();
     var descripcion = $('#txtDescripcion').val();
     var marca = $('#txtMarca').val();
     var modelo = $('#txtModelo').val();
     var op = 'actualizar';

     datos.push(op, codigo, descripcion, marca, modelo);

     if (!validaInputs(datos)) {
          $.post('back/Maquinaria.php', { datos }, function (respuesta) {
               if (respuesta != 'NoConex') {
                    if (respuesta == true) {
                         mensaje('top', 1500, 'success', 'Datos actualizados')

                         LimpiarCampos();
                         $('#CardRegistroMaquina').removeClass('show');
                         $('#BtnGuardarMaquina').removeClass('d-none');
                         $('#BtnActualizarMaquina').addClass('d-none');
                         $('#Tbl_MaqRegistro').load('tables/tblMaquinaria.php');
                    } else {
                         mensaje('top', 1500, 'error', 'Datos No Guardados')
                    }
               } else {
                    erroConexion()
               }
          });
     }
     else {
          $('#txtCodigo').focus();
          mensaje('top', 1500, 'error', 'Complete todos los campos')

     }
});

function editarMaquinaria(id) {
     var datos = new Array();
     var op = 'buscar';
     datos.push(op, id);

     $.post('back/Maquinaria.php', { datos }, function (respuesta) {
          if (respuesta != 'NoConex') {
               maq = JSON.parse(respuesta);
               $('#txtCodigo').val(maq.Codigo);
               $('#txtDescripcion').val(maq.Descripcion);
               $('#txtMarca').val(maq.Marca);
               $('#txtModelo').val(maq.Modelo);

               $('#BtnGuardarMaquina').addClass('d-none');
               $('#BtnActualizarMaquina').removeClass('d-none');
               $('#CardRegistroMaquina').addClass('show');

          } else {
               erroConexion()
          }
     });
}

function eliminarMaquinaria(id) {
     var datos = new Array();
     var op = 'eliminar';
     datos.push(op, id);

     $.post('back/Maquinaria.php', { datos }, function (respuesta) {
          if (respuesta != 'NoConex') {
               if (respuesta) {
                    mensaje('top', 1500, 'success', 'Maquina eliminada')
                    $('#Tbl_MaqRegistro').load('tables/tblMaquinaria.php');
               }
          } else {
               erroConexion()
          }
     });
}

function habilitarMaquinaria(id) {
     var datos = new Array();
     var op = 'habilitar';
     datos.push(op, id);

     $.post('back/Maquinaria.php', { datos }, function (respuesta) {
          if (respuesta != 'NoConex') {
               if (respuesta) {
                    mensaje('top', 1500, 'success', 'Maquina habilitada')
                    $('#Tbl_MaqRegistro').load('tables/tblMaquinaria.php');
               }
          } else {
               erroConexion()
          }
     });
}

function mensaje(position, timer, icon, title) {
     const Toast = Swal.mixin({
          toast: true,
          position: position,
          showConfirmButton: false,
          timer: timer,
     })

     Toast.fire({
          icon: icon,
          title: title
     });
}

function erroConexion() {
     const Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 1500,
     })

     Toast.fire({
          icon: 'error',
          title: 'Error de Conexión con la BD'
     });
}

function validaInputs(datos) {
     let vacio = false;

     for (let i = 0; i < datos.length; i++) {
          if (datos[i] == '') {
               vacio = true;
          }
     }
     return vacio;
}

function LimpiarCampos() {
     $('#txtCodigo').val('');
     $('#txtDescripcion').val('');
     $('#txtMarca').val('');
     $('#txtModelo').val('');
}