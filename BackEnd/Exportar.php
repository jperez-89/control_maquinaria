<?php
header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename=archivo.xls");
include_once('../includes/conexion.inc');
$Exportar = $_GET['exportar'];
// VALIDA SI SE HIZO BIEN LA CONEXION CON LA BASE DE DATOS
if (!$conex) {
     echo 'NoConex';
} else if ($Exportar == "registro_repuestos") {
     $query = "SELECT * FROM $Exportar";
     $result = mysqli_query($conex, $query);
?>
     <table>
          <tr>
               <th><label>ID</label></th>
               <th><label>FECHA</label></th>
               <th><label>COMPROBANTE</label></th>
               <th><label>CANTIDAD</label></th>
               <th><label>CODIGO</label></th>
               <th><label>DESCRIPCION</label></th>
               <th><label>ORDEN DE COMPRA</label></th>
               <th><label>MEDIDA</label></th>
          </tr>
          <?php
               while ($row = mysqli_fetch_assoc($result)) {
          ?>
               <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Fecha']; ?></td>
                    <td><?php echo $row['Comprobante']; ?></td>
                    <td><?php echo $row['Cantidad']; ?></td>
                    <td><?php echo $row['Codigo']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['OrdenCompra']; ?></td>
                    <td><?php echo $row['Medida']; ?></td>
               </tr>
          <?php
               }
          ?>
     </table>

<?php
} else if ($Exportar == "salida_repuestos") {
     $query = "SELECT * FROM $Exportar";
     $result = mysqli_query($conex, $query);
     ?>
     <table>
          <tr>
               <th><label>ID</label></th>
               <th><label>FECHA</label></th>
               <th><label>CODIGO</label></th>
               <th><label>DESCRIPCION</label></th>
               <th><label>CANTIDAD</label></th>
               <th><label>MAQUINA</label></th>
               <th><label>RESPONSABLE</label></th>
          </tr>
          <?php
               while ($row = mysqli_fetch_assoc($result)) {
                    ?>
               <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Fecha']; ?></td>
                    <td><?php echo $row['Codigo']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['Cantidad']; ?></td>
                    <td><?php echo $row['Maquina']; ?></td>
                    <td><?php echo $row['Responsable']; ?></td>
               </tr>
          <?php
               }
               ?>
     </table>

<?php
} else if ($Exportar == "inventario") {
     $query = "SELECT er.Codigo, rr.Descripcion, er.Cantidad, rr.Medida FROM existencia_repuestos as er INNER JOIN registro_repuestos as rr on rr.Codigo = er.Codigo GROUP BY er.Codigo;";
     $result = mysqli_query($conex, $query);
     ?>
     <table>
          <tr>
               <th><label>CODIGO</label></th>
               <th><label>DESCRIPCION</label></th>
               <th><label>CANTIDAD</label></th>
               <th><label>MEDIDA</label></th>
          </tr>
          <?php
               while ($row = mysqli_fetch_assoc($result)) {
                    ?>
               <tr>
                    <td><?php echo $row['Codigo']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['Cantidad']; ?></td>
                    <td><?php echo $row['Medida']; ?></td>
               </tr>
          <?php
               }
               ?>
     </table>

<?php
}
?>