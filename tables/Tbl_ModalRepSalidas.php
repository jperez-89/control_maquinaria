<script>
     tbl_ModalRepuestos = $('#Tbl_ModalRepuestos').dataTable({
          retrieve: true,
          language: {
               "sLengthMenu": "Mostrar _MENU_ registros",
               "sSearch": "Buscar:",
               "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sEmpyTable": "No hay datos en esta tabla",
               "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Ultimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior",
               }
          }
     });
</script>
<div class="table-responsive">
     <table id="Tbl_ModalRepuestos" class="table table-hover table-sm">
          <thead>
               <tr>
                    <th></th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Medida</th>
               </tr>
          </thead>
          <?php include_once('../includes/conexion.inc'); ?>
          <?php
          if (!$conex) {
               echo 'NoConex';
          } else {
               $query = "SELECT er.Codigo, rr.Descripcion, er.Cantidad, rr.Medida FROM existencia_repuestos as er INNER JOIN registro_repuestos as rr on rr.Codigo = er.Codigo GROUP BY er.Codigo;";
               $result = mysqli_query($conex, $query);

               if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                         if ($row['Cantidad'] > 0) {
                              // AGREGO EL BOTON DE MAS (+) PARA SELECCIONAR LA FILA SI LA CANTIDAD EN STOCK ES MAYOR A CERO
                              $btn1 = '<button id="BtnAgregarRepuesto" data-dismiss="modal" title="Agregar" class="btn btn-primary btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';
                         } else if ($row['Cantidad'] <= 0) {
                              // DESHABILITO EL BOTON DE MAS (+) PARA SELECCIONAR LA FILA SI LA CANTIDAD EN STOCK ES MENOR A CERO
                              $btn1 = '<button id="BtnAgregarRepuesto" disabled="false" title="Agregar" class="btn btn-danger"> <i class="fa fa-plus-circle"></i> </button>&nbsp';
                         }
                         ?>
                         <tr>
                              <td><?php echo $btn1 ?></td>
                              <td><?php echo $row['Codigo']; ?></td>
                              <td><?php echo $row['Descripcion']; ?></td>
                              <td><?php echo $row['Cantidad']; ?></td>
                              <td><?php echo $row['Medida']; ?></td>
                         </tr>
          <?php
                    }
               }
          } ?>
     </table>
</div>