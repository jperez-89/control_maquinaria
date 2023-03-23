<?php
include_once('../includes/conexion.inc');
if (!$conex) {
    $respuesta = 'NoConex';
} else {
    $datos = $_REQUEST['datos'];
    $respuesta = false;

    foreach ($datos as $fila => $dato) {
        $query = "INSERT INTO repuesto_solicitud (fecha, idRepuesto, cantidad, idMaquina) VALUES ('$dato[0]', $dato[1], $dato[2], $dato[3])";
        $respuesta =mysqli_query($conex, $query);
    }
    
    mysqli_close($conex);
    echo $respuesta;
}
