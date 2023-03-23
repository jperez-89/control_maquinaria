<?php
include_once('../includes/conexion.inc');
if (!$conex) {
    $correcto = 'NoConex';
} else {
    $datos = $_REQUEST['datos'];
    $correcto = false;

    foreach ($datos as $fila => $dato) {
        $query = "INSERT INTO repuesto_solicitud (fecha, idRepuesto, cantidad, idMaquina) VALUES ('$dato[0]', $dato[1], $dato[2], $dato[3])";

        if (mysqli_query($conex, $query)) {
            $query = "UPDATE repuesto_inventario SET Cantidad = Cantidad - $dato[2] WHERE Id = $dato[1]";

            if (mysqli_query($conex, $query)) {
                $correcto = true;
            }
        }
    }
    
    mysqli_close($conex);
    echo $correcto;
}
