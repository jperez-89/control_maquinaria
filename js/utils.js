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

function validaInputs(datos) {
     let vacio = false;

     for (let i = 0; i < datos.length; i++) {
          if (datos[i] == '') {
               vacio = true;
          }
     }
     return vacio;
}

function msgErrorConexion() {
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

function pfrm(frm) {
     new Response(frm).text().then(console.log);
 }