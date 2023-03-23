<?php
include_once('../includes/conexion.inc');
if (!$conex) {
     echo 'NoConex';
} else {
     $datos = $_REQUEST['datos'];
     $respuesta = 0;

     foreach ($datos as $fila => $dato) {
          $query = "INSERT INTO repuesto (Fecha, Codigo, Descripcion, Cantidad, Medida, Comprobante) VALUES ('$dato[0]', '$dato[1]', '$dato[2]', $dato[3], '$dato[4]', '$dato[5]')";
          $respuesta = mysqli_query($conex, $query);
     }

     mysqli_close($conex);
     echo $respuesta;
}
