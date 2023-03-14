<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro de Combustible</title>
    <?php include_once("includes/head.inc"); ?>
</head>

<?php include_once("includes/bodyHead.inc"); ?>

<div class="container-fluid">
    <div class="card shadow mb-1">
        <a href="#CardRegistroCombustible" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="CardRegistroCombustible">
            <h6 class="m-0 font-weight-bold text-primary">Registar</h6>
        </a>
        <div class="collapse" id="CardRegistroCombustible">
            <section class='pt-2 card card-header'>
                <div class='row'>
                    <div class='col-md-3'>
                        <label>Fecha</label>
                        <div class="form-group">
                            <input type="date" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" class="form-control validar" ID="fecha" name='fecha' required>
                        </div>
                    </div>

                    <div class='col-md-3'>
                        <label># Boleta</label>
                        <div class="input-group">
                            <input type="text" class="form-control validar" ID="boleta" PlaceHolder="# Boleta" name='boleta' required>
                        </div>
                    </div>

                    <div class='col-md-3'>
                        <label>Cantidad de Litros</label>
                        <div class="input-group">
                            <input type="text" class="form-control validar" ID="cantidadLts" PlaceHolder="Cantidad Lts" name='cantidadLts' required>
                        </div>
                    </div>

                    <div class='col-md-3'>
                        <label>Despachador</label>
                        <div class="input-group">
                            <input type="text" class="form-control validar mr-1" ID="despachador" PlaceHolder="Despachador" name='despachador' required>
                            <span>
                                <button id="BtnGuardarCombustible" type="submit" class="ui icon yellow button">Guardar</button>
                            </span>
                            <span>
                                <button id="BtnActualizarCombustible" class="d-none ui instagram button">Actualizar</button>
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- TABLA DE MAQUINARIA -->
    <div id="Tbl_CombRegistro"></div>
    <!-- FIN TABLA DE MAQUINARIA -->

</div>

<?php
include_once("includes/bodyFooter.inc");
include_once("includes/footer.inc");
?>
<script src="js/CombustibleRegistro.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#Tbl_CombRegistro').load('tables/tblCombustible.php');
    });
</script>

</body>

</html>