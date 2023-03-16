<script>
    Tbl_ModalDespachador = $('#Tbl_ModalDespachador').dataTable({
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
    <table id="Tbl_ModalDespachador" class="table table-hover table-sm">
        <thead>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Estado</th>
            </tr>
        </thead>
        <?php include_once('../includes/conexion.inc'); ?>
        <?php
        if (!$conex) {
            echo 'NoConex';
        } else {
            $btn2 = '<button disabled id="BtnAgregarDespachador" data-dismiss="modal" title="Agregar" class="btn btn-primary btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';

            $query = "SELECT id, identificacion, nombre, telefono, estado FROM despachador";
            $result = mysqli_query($conex, $query);
            $btn1 = '<button id="BtnAgregarDespachador" data-dismiss="modal" title="Agregar" class="btn btn-warning btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td><?php echo $retVal = ($row['estado']) ? $btn1 : $btn2; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['identificacion']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $status = ($row['estado']) ? '<span class="badge badge-success">Activo</>' : '<span class="badge badge-danger">Inactivo</>' ?> </td>
                    </tr>
        <?php
                }
            }
        } ?>
    </table>
</div>