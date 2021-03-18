<script>
     $('#Tbl_RegistroMaquinaria').dataTable({
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
<div class="card shadow-lg mt-2">
     <div class="card-body">
          <div class="table-responsive">
               <table id="Tbl_RegistroMaquinaria" class="table table-hover table-sm">
                    <thead class=''>
                         <tr>
                              <th>CÓDIGO</th>
                              <th>DESCRIPCIÓN</th>
                              <th>MARCA</th>
                              <th>MODELO</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         require_once('../includes/conexion.inc');

                         $query = "SELECT CodMaquina, Descripcion, Marca, Modelo FROM maquinaria WHERE Estado = 1";

                         $datos = mysqli_query($conex, $query);

                         while ($linea = mysqli_fetch_row($datos)) {
                              ?>
                              <tr>
                                   <td> <?php echo $linea[0] ?> </td>
                                   <td><?php echo $linea[1] ?></td>
                                   <td><?php echo $linea[2] ?></td>
                                   <td><?php echo $linea[3] ?></td>
                                   <td>
                                        <div class='p-0 m-0 float-right'>
                                             <a href="#" class="ui icon button positive">
                                                  <i class="fas fa-info-circle"></i>
                                             </a>
                                             <a href="#" class="ui icon button negative">
                                                  <i class="fas fa-trash"></i>
                                             </a>
                                        </div>
                                   </td>
                              </tr>
                         <?php } ?>
               </table>
          </div>
     </div>
</div>