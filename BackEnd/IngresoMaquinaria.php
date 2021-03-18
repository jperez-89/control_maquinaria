<?php
// INSERTA LA INFORMACION EN LA TABLA REPUESTOS
include_once('../includes/conexion.inc');
// VALIDA SI SE HIZO BIEN LA CONEXION CON LA BASE DE DATOS
if (!$conex) {
     $repuesta = 'NoConex';
} else {
     $datos = $_REQUEST['datos'];

     $Codigo = $datos[0];
     $Descripcion = $datos[1];
     $Marca = $datos[2];
     $Modelo = $datos[3];
     $Estado = 1;

     $query = "INSERT INTO maquinaria (codMaquina, Descripcion, Marca, Modelo,Estado) VALUES ('" . $Codigo . "', '" . $Descripcion . "', '" . $Marca . "', '" . $Modelo . "'," . $Estado . ")";

     if (mysqli_query($conex, $query)) {
          $repuesta = true;
     } else {
          $repuesta = false;
     }

     // CIERRA LA CONEXION
     mysqli_close($conex);
     echo $repuesta;
}
