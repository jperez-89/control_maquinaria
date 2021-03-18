<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="Jairo Pérez Rodríguez" content="">
     <link href="img/icono.ico" rel="icon">
     <title>HSolís - Login</title>

     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <link rel='stylesheet' href='vendor/SweetAlert/sweetalert2.min.css' type='text/css'>
</head>

<body class="bg-gradient-danger">
     <div class="container">

          <!-- Outer Row -->
          <div class="row justify-content-center">
               <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                         <div class="card-body p-0">
                              <div class="row">
                                   <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                   <div class="col-lg-6">
                                        <div class="p-5">
                                             <div class="text-center">
                                                  <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                             </div>
                                             <form class="user">
                                                  <div class="form-group">
                                                       <input id="txtEmail" type="email" name='email' class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Email">
                                                  </div>
                                                  <div class="form-group">
                                                       <input id="txtPassword" type="password" name='password' class="form-control form-control-user" placeholder="Contraseña">
                                                  </div>
                                                  <div class="form-group">
                                                       <div class="custom-control custom-checkbox small">
                                                            <input id="customCheck" type="checkbox" class="custom-control-input">
                                                            <label class="custom-control-label" for="customCheck">Recordarme</label>
                                                       </div>
                                                  </div>
                                                  <button id="btnIngresar" type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                                                  <!-- <a href="Dashboard.php" class="btn btn-primary btn-user btn-block">
                                                       Ingresar
                                                  </a> -->
                                                  <hr>
                                                  <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                                       <i class="fab fa-google fa-fw"></i> Login with Google
                                                  </a>
                                                  <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                       <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                                  </a> -->
                                             </form>
                                             <div class="text-center">
                                                  <a class="small" href="#">Olvidé mi contraseña</a>
                                             </div>
                                             <div class="text-center">
                                                  <a class="small" href="Registrarse.php">Registrarme</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Custom scripts for all pages-->
     <script src="js/sb-admin-2.min.js"></script>
     <script src='vendor/SweetAlert/sweetalert2.min.js' type='text/javascript'></script>

     <script type="text/javascript">
          $(document).ready(function() {
               $('#btnIngresar').click(function(e) {
                    e.preventDefault();
                    if ($('#txtEmail').val() != '' && $('#txtPassword').val() != '') {
                         var datos = "email=" + $('#txtEmail').val() + "&password=" + $('#txtPassword').val();

                         $.post('BackEnd/Ingresar.php', datos, function(Respuesta) {
                              // alert(Respuesta);
                              if (Respuesta == 'NoConex') {
                                   Swal.fire({
                                        position: 'center',
                                        type: 'error',
                                        title: 'Error de conexión con el servidor',
                                        showConfirmButton: false,
                                        timer: 1700
                                   });
                                   return false;
                              } else {
                                   if (Respuesta == 1) {
                                        window.location = 'dashboard.php';
                                   } else if (Respuesta == 'ErrorPass') {
                                        $('#txtPassword').focus();
                                        Swal.fire({
                                             position: 'center',
                                             type: 'error',
                                             title: 'Contraseña incorrecta',
                                             showConfirmButton: false,
                                             timer: 1700
                                        });
                                   } else if (Respuesta == 'ErrorEmail') {
                                        $('#txtEmail').focus();
                                        Swal.fire({
                                             position: 'center',
                                             type: 'error',
                                             title: 'Usuario no registrado',
                                             showConfirmButton: false,
                                             timer: 1700
                                        });
                                   }
                              }
                         });
                    } else {
                         $('#txtEmail').focus();
                         Swal.fire({
                              position: 'center',
                              type: 'warning',
                              title: 'Complete todos los campos',
                              showConfirmButton: false,
                              timer: 1700
                         });
                    }
               });
          });
     </script>

</body>

</html>