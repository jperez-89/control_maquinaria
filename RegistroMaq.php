<!DOCTYPE html>
<html lang="en">

<head>
     <title>Registro de Maquinaria</title>
     <?php include_once("includes/head.inc"); ?>
     <script src="js/MaquinariaRegistro.js" type="text/javascript"></script>
</head>

<?php include_once("includes/bodyHead.inc"); ?>

<!-- PONER PAGINAS AQUI -->
<div class="container-fluid">
     <!-- CARD DE REGISTRO -->
     <div class="card shadow mb-1">
          <a href="#CardRegistroMaquina" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="CardRegistroMaquina">
               <h6 class="m-0 font-weight-bold text-primary">Registar</h6>
          </a>
          <div class="collapse" id="CardRegistroMaquina" style="">
               <section class='pt-2 card card-header'>
                    <!-- <form action="BackEnd/MaquinariaRegistro1.php" method="POST"> -->
                    <div class='row'>
                         <div class='col-md-2'>
                              <label>Código</label>
                              <div class="input-group">
                                   <input type="text" class="form-control validar" ID="txtCodigo" PlaceHolder="Código" name='Codigo'>
                              </div>
                         </div>

                         <div class='col-md-3'>
                              <label>Descripción</label>
                              <div class="input-group">
                                   <input type="text" class="form-control validar" ID="txtDescripcion" PlaceHolder="Descripción" name='Descripcion'>
                              </div>
                         </div>

                         <div class='col-md-3'>
                              <label>Marca</label>
                              <div class="input-group">
                                   <input type="text" class="form-control validar" ID="txtMarca" PlaceHolder="Marca" name='Marca'>
                              </div>
                         </div>

                         <div class='col-md-3'>
                              <label>Modelo</label>
                              <div class="input-group">
                                   <input type="text" class="form-control validar mr-1" ID="txtModelo" PlaceHolder="Modelo" name='Modelo'>
                                   <span>
                                        <button type="submit" id="BtnGuardarMaquina" class="ui icon primary button">Guardar</button>
                                   </span>
                                   <span>
                                        <button style="display: none;" id="BtnActualizarMaquina" class="ui instagram button">Actualizar</button>
                                   </span>
                              </div>
                         </div>
                    </div>
                    <!-- </form> -->
               </section>
          </div>
     </div>
     <!-- FIN CARD DE REGISTRO -->

     <!-- TABLA DE MAQUINARIA -->
     <div id="Tbl_MaqRegistro"></div>
     <!-- FIN TABLA DE MAQUINARIA -->

</div>
<!-- FIN PONER PAGINAS AQUI -->

<script type="text/javascript">
     $(document).ready(function() {
          $('#Tbl_MaqRegistro').load('Tablas/Tbl_MaqRegistro.php');
     });
</script>

<?php
include_once("includes/bodyFooter.inc");
include_once("includes/footer.inc");
?>

</html>