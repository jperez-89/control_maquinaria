<?php
// INSERTA LA INFORMACION EN LA TABLA REPUESTOS
include_once('../includes/conexion.inc');
// VALIDA SI SE HIZO BIEN LA CONEXION CON LA BASE DE DATOS
if (!$conex) {
     $repuesta = 'NoConex';
} else {
     $Nombre = $_POST['Nombre'];
     $Email = $_POST['Email'];
     $Password = $_POST['Password'];
     $rPassword = $_POST['rPassword'];

     $q = "SELECT Email from usuarios WHERE Email = '$Email'";
     $r = mysqli_query($conex, $q);
     $dato = mysqli_fetch_assoc($r);
     if ($dato['Email'] == $Email) {
          $repuesta = 'email';
     } else {
          $query = "INSERT INTO usuarios (Nombre, Email, Password, Rol) VALUES ('$Nombre', '$Email', '$Password', 'User')";

          if (mysqli_query($conex, $query)) {
               $repuesta = true;
          } else {
               $repuesta = false;
          }
     }

     // CIERRA LA CONEXION
     mysqli_close($conex);
     echo $repuesta;
}
