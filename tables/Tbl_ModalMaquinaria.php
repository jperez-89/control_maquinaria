<script>
     Tbl_ModalMaquinaria = $('#Tbl_ModalMaquinaria').dataTable({
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
     <table id="Tbl_ModalMaquinaria" class="table table-hover table-sm">
          <thead>
               <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Estado</th>
               </tr>
          </thead>
          <?php include_once('../includes/conexion.inc'); ?>
          <?php
          if (!$conex) {
               echo 'NoConex';
          } else {
               $btn2 = '<button disabled id="BtnAgregarMaquina" data-dismiss="modal" title="Agregar" class="btn btn-primary btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';

               $query = "SELECT Id, Codigo, Descripcion, Marca, Modelo, Estado FROM maquinaria";
               $result = mysqli_query($conex, $query);
               $btn1 = '<button id="BtnAgregarMaquina" data-dismiss="modal" title="Agregar" class="btn btn-warning btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';

               if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
          ?>
                         <tr>
                              <td><?php echo $retVal = ($row['Estado']) ? $btn1 : $btn2; ?></td>
                              <td><?php echo $row['Id']; ?></td>
                              <td><?php echo $row['Codigo']; ?></td>
                              <td><?php echo $row['Descripcion']; ?></td>
                              <td><?php echo $row['Marca']; ?></td>
                              <td><?php echo $row['Modelo']; ?></td>
                              <td><?php echo $status = ($row['Estado']) ? '<span class="badge badge-success">Activo</>' : '<span class="badge badge-danger">Inactivo</>' ?> </td>
                         </tr>
          <?php
                    }
               }
          } ?>
     </table>
</div>