<?php

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

require_once('../includes/conexion.inc');
if (!$conex) {
     echo 'NoConex';
} else {
     $q = "SELECT * FROM usuarios WHERE Email = '$email' OR Password = '$password' ";
     $datos = mysqli_query($conex, $q);
     $user = mysqli_fetch_array($datos);

     if ($email == $user['Email']) {
          if ($password != $user['Password']) {
               echo 'ErrorPass';
          } else {
               $_SESSION['Uname'] = $user['Nombre'];
               $_SESSION['Urol'] = $user['Rol'];
               $_SESSION['tiempo'] = time();
               echo 1;
          }
     } else {
          echo 'ErrorEmail';
     }
}
