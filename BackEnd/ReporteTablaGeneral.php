<?php
     // INSERTA LA INFORMACION EN LA TABLA REPUESTOS
     include_once('../includes/conexion.inc');
     // VALIDA SI SE HIZO BIEN LA CONEXION CON LA BASE DE DATOS
     if(!$conex){
           echo 'NoConex';
     }else{
          // OBTIENE LA INFORMACION QUE SE HIZO EN EL POST
          // $query = $_REQUEST['query'];
          
          $query = "SELECT er.Codigo, rr.Descripcion, er.Cantidad, rr.Medida FROM existencia_repuestos as er INNER JOIN registro_repuestos as rr on rr.Codigo = er.Codigo GROUP BY er.Codigo;";
          $result = mysqli_query($conex, $query);

          // if (mysqli_num_rows($result) > 0) {
          //      while($row = mysqli_fetch_assoc($result)) {
          //           $info = array($row['Codigo'], $row['Descripcion'], $row['Descripcion'], $row['Medida']);
          //           // echo $row['Codigo'];
          //           // echo $row['Descripcion'];
          //           // echo $row['Cantidad'];
          //           // echo $row['Medida'];
          //      }
          // }
          // CIERRA LA CONEXION
          mysqli_close($conex);
          echo $result;
     }
?>