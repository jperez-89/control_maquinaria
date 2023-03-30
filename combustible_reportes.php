<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reportes de Combustible</title>
    <?php include_once("includes/head.inc"); ?>
</head>
<?php include_once("includes/bodyHead.inc"); ?>

<!-- PONER PAGINAS AQUI -->
<div class="container-fluid">

    <div class="card shadow mb-1">
        <a href="#CardExportar" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="CardExportar">
            <h6 class="m-0 font-weight-bold text-black-50">Exportar a Excel</h6>
        </a>
        <div class="collapse" id="CardExportar">
            <div class="m-2">
                <a href="BackEnd/Exportar.php/?exportar=registro_repuestos" class="btn btn-outline-info">Exportar Entradas</a>
                <a href="BackEnd/Exportar.php/?exportar=salida_repuestos" class="btn btn-outline-dark ">Exportar Salidas</a>
                <a href="BackEnd/Exportar.php/?exportar=inventario" class="btn btn-outline-success ">Exportar Inventario</a>
            </div>
        </div>

    </div>

    <!-- COMPRA INGRESO COMBUSTIBLE -->
    <div class="card shadow mb-1">
        <a href="#CardReporteIngresoCombustible" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="CardReporteIngresoCombustible">
            <h6 class="m-0 font-weight-bold text-black-50">Reporte Compra Repuestos</h6>
        </a>
        <div class="collapse" id="CardReporteIngresoCombustible">
            <div class="table-responsive">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="m-0 p-0">
                            <table id="Tbl_Reporte_Compra" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th><label>Id</label></th>
                                        <th><label>Fecha</label></th>
                                        <th><label>Comprobante</label></th>
                                        <th><label>Cantidad</label></th>
                                        <th><label>Código</label></th>
                                        <th><label>Descripción</label></th>
                                        <th><label>Orden de compra</label></th>
                                        <th><label>Medida</label></th>
                                    </tr>
                                </thead>

                                <?php include_once('includes/conexion.inc'); ?>
                                <?php
                                if (!$conex) {
                                    echo 'NoConex';
                                } else {
                                    $query = "SELECT * FROM registro_repuestos;";
                                    $result = mysqli_query($conex, $query);

                                    if (mysqli_num_rows($result) > 0) {
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
                                    }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN TABLA -->
        </div>
    </div>
    <!-- FIN COMPRA REPUESTOS -->

    <!-- SALIDAS REPUESTOS -->
    <div class="card shadow mb-1">
        <a href="#CardReporteSalidaRepuestos" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="CardReporteSalidaRepuestos">
            <h6 class="m-0 font-weight-bold text-primary">Reporte Salida Repuestos</h6>
        </a>
        <div class="collapse" id="CardReporteSalidaRepuestos" style="">
            <!-- TABLA -->
            <div class="table-responsive">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="m-0 p-0">
                            <table id="Tbl_Reporte_Salidas" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th><label>Id</label></th>
                                        <th><label>Fecha</label></th>
                                        <th><label>Código</label></th>
                                        <th><label>Descripción</label></th>
                                        <th><label>Cantidad</label></th>
                                        <th><label>Máquina</label></th>
                                        <th><label>Responsable</label></th>
                                    </tr>
                                </thead>

                                <?php include_once('includes/conexion.inc'); ?>
                                <?php
                                if (!$conex) {
                                    echo 'NoConex';
                                } else {
                                    $query = "SELECT * FROM salida_repuestos;";
                                    $result = mysqli_query($conex, $query);

                                    if (mysqli_num_rows($result) > 0) {
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
                                    }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN TABLA -->
        </div>
    </div>
    <!-- FIN SALIDAS REPUESTOS -->

    <!-- INVENTARIO ACTUALIZADO -->
    <div class="card shadow mb-1">
        <a href="#InventarioActualizado" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="InventarioActualizado">
            <h6 class="m-0 font-weight-bold text-primary">Reporte de Inventario de Repuestos Diario</h6>
        </a>
        <div class="collapse" id="InventarioActualizado" style="">
            <!-- TABLA -->
            <div class="table-responsive">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="m-0 p-0">
                            <table id="Tbl_Reporte_Inventario" class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th><label>Código</label></th>
                                        <th><label>Descripción</label></th>
                                        <th><label>Cantidad</label></th>
                                        <th><label>Medida</label></th>
                                    </tr>
                                </thead>

                                <?php include_once('includes/conexion.inc'); ?>
                                <?php
                                if (!$conex) {
                                    echo 'NoConex';
                                } else {
                                    $query = "SELECT er.Codigo, rr.Descripcion, er.Cantidad, rr.Medida FROM existencia_repuestos as er INNER JOIN registro_repuestos as rr on rr.Codigo = er.Codigo GROUP BY er.Codigo;";
                                    $result = mysqli_query($conex, $query);

                                    if (mysqli_num_rows($result) > 0) {
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
                                    }
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN TABLA -->
        </div>
    </div>
    <!-- FIN INVENTARIO ACTUALIZADO -->

</div>
<!-- FIN PONER PAGINAS AQUI -->

<?php
include_once("includes/bodyFooter.inc");
include_once("includes/footer.inc");
?>

<script src="js/ReporteTablaGeneral.js"></script>

</body>

</html>