<script>
     $('#Tbl_RegistroCombustible').dataTable({
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
               <table id="Tbl_RegistroCombustible" class="table table-hover table-sm">
                    <thead>
                         <tr>
                              <th>FECHA</th>
                              <th># BOLETA</th>
                              <th>CANTIDAD LTS</th>
                              <th>SALDO LTS</th>
                              <th>DESPACHADOR</th>
                              <th>ESTADO</th>
                              <th>ACCIONES</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         require_once('../includes/conexion.inc');
                         $query = "SELECT c.id, c.fecha, c.boleta, c.cantidadlts, i.saldolts, c.despachador, c.estado FROM combustible c INNER JOIN inventario_comb i ON i.idCombustible = c.id";
                         $datos = mysqli_query($conex, $query);

                         while ($linea = mysqli_fetch_assoc($datos)) {
                         ?>

                              <tr>
                                   <td> <?php echo $linea['fecha'] ?> </td>
                                   <td> <?php echo $linea['boleta'] ?> </td>
                                   <td> <?php echo $linea['cantidadlts'] ?> </td>
                                   <td> <?php echo $linea['saldolts'] ?> </td>
                                   <td> <?php echo $linea['despachador'] ?> </td>
                                   <td> <?php echo $linea['estado'] ? '<span class="badge badge-success">Activo</>' : '<span class="badge badge-danger">Inactivo</>' ?> </td>
                                   <td>
                                        <div class='p-0 m-0 text-center'>
                                             <button onclick="eliminarCombustible('<?= $linea['id'] ?>')" class="ui icon button inverted red">
                                                  <i class="fas fa-trash"></i>
                                             </button>
                                        </div>
                                   </td>
                              </tr>
                         <?php } ?>
               </table>
          </div>
     </div>
</div>