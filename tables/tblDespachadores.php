<script>
    $('#Tbl_Despachadores').dataTable({
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
            <table id="Tbl_Despachadores" class="table table-hover table-sm">
                <thead class=''>
                    <tr>
                        <th>IDENTIFICACION</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../includes/conexion.inc');
                    $query = "SELECT id, identificacion, nombre, telefono, estado FROM despachador";
                    $datos = mysqli_query($conex, $query);

                    while ($linea = mysqli_fetch_assoc($datos)) {
                    ?>

                        <tr>
                            <td> <?php echo $linea['identificacion'] ?> </td>
                            <td> <?php echo $linea['nombre'] ?> </td>
                            <td> <?php echo $linea['telefono'] ?> </td>
                            <td> <?php echo $linea['estado'] ? '<span class="badge badge-success">Activo</>' : '<span class="badge badge-danger">Inactivo</>' ?> </td>
                            <td>
                                <?php if ($linea['estado']) { ?>
                                    <div class='p-0 m-0 text-center'>
                                        <button onclick="editarDespachador('<?= $linea['id'] ?>')" class="ui icon button inverted yellow">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="eliminarDespachador('<?= $linea['id'] ?>')" class="ui icon button inverted red">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    <div class='p-0 m-0 text-center'>
                                        <button disabled onclick="editarDespachador('<?= $linea['id'] ?>')" class="ui icon button inverted yellow">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="habilitarDespachador('<?= $linea['id'] ?>')" class="ui icon button inverted green">
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