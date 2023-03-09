<?php
     /* INSERTA LA INFORMACION EN LA TABLA REPUESTOS
        DESCUENTA LAS SALIDAS EN LA TABLA DE EXISTENCIAS */
     include_once('../includes/conexion.inc');
     // VALIDA SI SE HIZO BIEN LA CONEXION CON LA BASE DE DATOS
     if(!$conex){
          $correcto = 'NoConex';
     }else{
          // OBTIENE LA INFORMACION QUE SE HIZO EN EL POST
          $Salidas = $_REQUEST['Salidas'];
          $correcto = 0;
          // RECORRE EL ARRAY DE FILAS PARA IR INSERTANDO DATO POR DATO
          foreach ($Salidas as $fila => $dato) {
               $query = "INSERT INTO salida_repuestos (Fecha, Codigo, Descripcion, Cantidad, Maquina, Responsable) VALUES ";
               $query.= "('".$dato[0]."', '".$dato[1]."', '".$dato[2]."', ".$dato[3].", '".$dato[4]."', '".$dato[5]."');";
               if(mysqli_query($conex, $query)){
                    $correcto = 1;
               } else {
                    $correcto = 0;
               }
          }
          // CIERRA LA CONEXION
          mysqli_close($conex);
          echo $correcto;
     }
?>