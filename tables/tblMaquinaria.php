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
                              <th>ESTADO</th>
                              <th>ACCIONES</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         require_once('../includes/conexion.inc');
                         $query = "SELECT Id, Codigo, Descripcion, Marca, Modelo, Estado FROM maquinaria";
                         $datos = mysqli_query($conex, $query);

                         while ($linea = mysqli_fetch_assoc($datos)) {
                         ?>

                              <tr>
                                   <td> <?php echo $linea['Codigo'] ?> </td>
                                   <td> <?php echo $linea['Descripcion'] ?> </td>
                                   <td> <?php echo $linea['Marca'] ?> </td>
                                   <td> <?php echo $linea['Modelo'] ?> </td>
                                   <td> <?php echo $linea['Estado'] ? '<span class="badge badge-success">Activo</>' : '<span class="badge badge-danger">Inactivo</>' ?> </td>
                                   <td>
                                        <?php if ($linea['Estado']) { ?>
                                             <div class='p-0 m-0 text-center'>
                                                  <button onclick="editarMaquinaria('<?= $linea['Id'] ?>')" class="ui icon button inverted yellow">
                                                       <i class="fas fa-edit"></i>
                                                  </button>
                                                  <button onclick="eliminarMaquinaria('<?= $linea['Id'] ?>')" class="ui icon button inverted red">
                                                       <i class="fas fa-trash"></i>
                                                  </button>
                                             </div>
                                        <?php } else { ?>
                                             <div class='p-0 m-0 text-center'>
                                                  <button disabled onclick="editarMaquinaria('<?= $linea['Id'] ?>')" class="ui icon button inverted yellow">
                                                       <i class="fas fa-edit"></i>
                                                  </button>
                                                  <button onclick="habilitarMaquinaria('<?= $linea['Id'] ?>')" class="ui icon button inverted green">
                                                       <i class="fas fa-sync-alt"></i>
                                                  </button>
                                             </div>
                                        <?php } ?>

                                   </td>
                              </tr>
                         <?php } ?>
               </table>
          </div>
     </div>
</div>