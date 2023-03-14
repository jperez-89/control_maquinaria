<?php
// INSERTA LA INFORMACION EN LA TABLA REPUESTOS
include_once('../includes/conexion.inc');
// VALIDA SI SE HIZO BIEN LA CONEXION CON LA BASE DE DATOS
if (!$conex) {
     $repuesta = 'NoConex';
} else {
     $datos = $_REQUEST['datos'];
     $op = $datos[0];
     $repuesta = false;

     switch ($op) {
          case 'insertar':
               $fecha = trim($datos[1]);
               $boleta = trim($datos[2]);
               $cantidadlts = trim($datos[3]);
               $despachador = trim($datos[4]);

               $query = "INSERT INTO combustible (fecha, boleta, cantidadlts, despachador, estado) VALUES ('" . $fecha . "', '" . $boleta . "', " . $cantidadlts . ", '" . $despachador . "', 1)";

               if (mysqli_query($conex, $query)) {
                    $id = mysqli_insert_id($conex);

                    $query = "INSERT INTO inventario_comb (idCombustible, saldolts) VALUES (" . $id . ", " . $cantidadlts . ")";

                    if (mysqli_query($conex, $query)) {
                         $repuesta = true;
                    }
               }
               break;

          case 'eliminar':
               $id = trim($datos[1]);

               $query = "DELETE FROM inventario_comb WHERE idCombustible = $id";

               if (mysqli_query($conex, $query)) {
                    $query = "DELETE FROM combustible WHERE id = $id";

                    if (mysqli_query($conex, $query)) {
                         $repuesta = true;
                    }
               }
               break;
     }


     mysqli_close($conex);
     echo $repuesta;
}
