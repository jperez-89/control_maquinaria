<?php
$Exportar = $_GET['exportar'];
header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename=" . $Exportar . ".xls");
include_once('../includes/conexion.inc');

if (!$conex) {
     echo 'NoConex';
} else if ($Exportar == "IngresoRepuesto") {
     $query = "SELECT * FROM $Exportar";
     $queryIngresos = "SELECT id, Fecha, Codigo, Descripcion, Cantidad, Medida, Comprobante FROM repuesto ORDER BY Fecha DESC;";
     $result = mysqli_query($conex, $queryIngresos);
?>
     <table>
          <tr>
               <th><label>Id</label></th>
               <th><label>Fecha</label></th>
               <th><label>Código</label></th>
               <th><label>Descripción</label></th>
               <th><label>Cantidad</label></th>
               <th><label>Medida</label></th>
               <th><label>Comprobante</label></th>
          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
               <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Fecha']; ?></td>
                    <td><?php echo $row['Codigo']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['Cantidad']; ?></td>
                    <td><?php echo $row['Medida']; ?></td>
                    <td><?php echo $row['Comprobante']; ?></td>
               </tr>
          <?php
          }
          ?>
     </table>

<?php
} else if ($Exportar == "SalidaRepuestos") {
     $querySalidas = "SELECT rs.id, rs.Fecha, r.Codigo AS codRepuesto, r.Descripcion, rs.Cantidad, m.Codigo AS codMaquina, desp.nombre FROM repuesto_salida rs right JOIN repuesto r ON r.id = rs.idRepuesto INNER JOIN maquinaria m ON m.Id = rs.idMaquina INNER JOIN despachador desp ON desp.id = rs.idResponsable ORDER BY rs.Fecha DESC;";

     $result = mysqli_query($conex, $querySalidas);
?>
     <table>
          <tr>
               <th><label>Id</label></th>
               <th><label>Fecha</label></th>
               <th><label>Código de Repuesto</label></th>
               <th><label>Descripción</label></th>
               <th><label>Cantidad</label></th>
               <th><label>Código de Máquina</label></th>
               <th><label>Responsable</label></th>
          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
               <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Fecha']; ?></td>
                    <td><?php echo $row['codRepuesto']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['Cantidad']; ?></td>
                    <td><?php echo $row['codMaquina']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
               </tr>
          <?php
          }
          ?>
     </table>

<?php
} else if ($Exportar == "InventarioRepuestos") {
     $queryInventario = "SELECT r.Codigo, r.Descripcion, ri.Cantidad, r.Medida FROM repuesto_inventario AS ri INNER JOIN repuesto AS r on r.Codigo = ri.Codigo GROUP BY r.Codigo;";

     $result = mysqli_query($conex, $queryInventario);
?>
     <table>
          <tr>
               <th><label>Código</label></th>
               <th><label>Descripción</label></th>
               <th><label>Cantidad</label></th>
               <th><label>Medida</label></th>
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