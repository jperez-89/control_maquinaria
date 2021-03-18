<?php
// INSERTA LA INFORMACION EN LA TABLA REPUESTOS
include_once('../includes/conexion.inc');
// VALIDA SI SE HIZO BIEN LA CONEXION CON LA BASE DE DATOS
if (!$conex) {
     echo 'NoConex';
} else {
     // OBTIENE LA INFORMACION QUE SE HIZO EN EL POST
     $filas = $_REQUEST['filas'];
     $inserto = 0;
     // RECORRE EL ARRAY DE FILAS PARA IR INSERTANDO DATO POR DATO
     foreach ($filas as $fila => $dato) {
          $query = "INSERT INTO registro_repuestos (Fecha, Comprobante, Cantidad, Codigo, Descripcion, Medida, OrdenCompra) VALUES ";
          $query .= "('" . $dato[0] . "', '" . $dato[1] . "', " . $dato[2] . ", '" . $dato[3] . "', '" . $dato[4] . "', '" . $dato[5] . "','" . $dato[6] . "')";
          if (mysqli_query($conex, $query)) {
               $inserto = 1;
          }
     }
     // CIERRA LA CONEXION
     mysqli_close($conex);
     echo $inserto;
}
