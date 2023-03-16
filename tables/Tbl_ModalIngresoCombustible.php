<script>
    Tbl_ModalIngresoCombustible = $('#Tbl_ModalIngresoCombustible').dataTable({
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
    <table id="Tbl_ModalIngresoCombustible" class="table table-hover table-sm">
        <thead>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Fecha</th>
                <th>Boleta</th>
                <th>Saldo</th>
                <th>Estado</th>
            </tr>
        </thead>
        <?php include_once('../includes/conexion.inc'); ?>
        <?php
        if (!$conex) {
            echo 'NoConex';
        } else {
            $btn2 = '<button disabled id="BtnAgregarBoletaComb" data-dismiss="modal" title="Agregar" class="btn btn-primary btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';

            $query = "SELECT c.id, c.fecha, c.boleta, i.saldolts, c.estado FROM combustible c INNER JOIN inventario_comb i ON i.idCombustible = c.id WHERE i.saldolts > 0 ORDER BY c.fecha asc";
            $result = mysqli_query($conex, $query);
            $btn1 = '<button id="BtnAgregarBoletaComb" data-dismiss="modal" title="Agregar" class="btn btn-warning btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td><?php echo $retVal = ($row['estado']) ? $btn1 : $btn2; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['boleta']; ?></td>
                        <td><?php echo $row['saldolts']; ?></td>
                        <td><?php echo $status = ($row['estado']) ? '<span class="badge badge-success">Activo</>' : '<span class="badge badge-danger">Inactivo</>' ?> </td>
                    </tr>
        <?php
                }
            }
        } ?>
    </table>
</div>