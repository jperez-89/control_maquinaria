<!DOCTYPE html>
<html lang="en">

<head>
     <title>Salidas de Repuestos</title>
     <?php include_once("includes/head.inc"); ?>
</head>
<?php include_once("includes/bodyHead.inc"); ?>
<!-- PONER PAGINAS AQUI -->
<div class="container-fluid">

     <!-- DATOS -->
     <section class='pt-2 card card-header'>
          <div class='row'>
               <!-- FECHA  -->
               <div class="col-md-2">
                    <label>Fecha</label>
                    <div class="form-group">
                         <input type="date" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" class="form-control validar" ID="txtFecha" name='Fecha'>
                    </div>
               </div>
          </div>

          <div class="row">
               <!-- CODIGO -->
               <div class='col-md-2'>
                    <label>Código Repuesto</label>
                    <div class="input-group">
                         <input type="text" class="form-control validar" ID="txtCodigo" PlaceHolder="Código" name='Codigo'>
                         <span>
               <button data-target="#ModalRepuestos" data-toggle="modal" id="BtnModalRepuestos" class="btn btn-secondary" title="Buscar Repuesto"><i class="fa fa-search"></i>
                         </button>
                         </span>
                    </div>
               </div>

               <!-- DESCRIPCION -->
               <div class='col-md-2'>
                    <label>Descripción</label>
                    <div class="input-group">
                         <input type="text" class="form-control validar" ID="txtDescripcion" PlaceHolder="Descripción" name='Descripcion'>
                    </div>
               </div>

               <!-- CANTIDAD -->
               <div class='col-md-2'>
                    <label>Cantidad</label>
                    <div class="input-group">
                         <input type="number" class="form-control validar" ID="txtCantidad" name='Cantidad'>
                    </div>
               </div>

               <!-- MAQUINA -->
               <div class='col-md-2'>
                    <label># Máquina</label>
                    <div class="input-group">
                         <input type="text" class="form-control validar" ID="txtMaquina" PlaceHolder="Máquina" name='Maquina'>
                         <span>
                              <button data-target="#ModalMaquinaria" data-toggle="modal" id="BtnModalMaquinaria" class="btn btn-secondary" title="Buscar Activo"><i class="fa fa-search"></i></button>
                         </span>
                    </div>
               </div>

               <!-- RESPONSABLE -->
               <div class='col-md-2'>
                    <label>Responsable</label>
                    <div class="input-group">
                         <input type="text" class="form-control validar" ID="txtResponsable" PlaceHolder="Responsable" name='Responsable'>
                    </div>
               </div>

               <!-- BOTON AGREGAR LINEA -->
               <div class='col-md-2 pl-0 pt-4'>
                    <button id="BtnAgregarSalida" class="p-3 ui primary button"><i class="fa fa-plus"></i></button>
                    <button style="display: none;" id="BtnActualizarSalida" class="ui instagram button">Actualizar</button>
               </div>
          </div> <!-- FIN CLASS ROW -->
     </section>
     <!-- FIN DATOS -->

     <!-- TABLA -->
     <div class="table-responsive pt-1">
          <div class="card shadow">
               <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Salidas de Repuestos</h6>
               </div>
               <section class="mt-3 card-body  border-bottom-primary">
                    <table id="Tbl_Salidas" class="table table-hover table-sm">
                         <thead>
                              <tr>
                                   <th><label>Fecha</label></th>
                                   <th><label>Código</label></th>
                                   <th><label>Descripción</label></th>
                                   <th><label>Cantidad</label></th>
                                   <th><label>Máquina</label></th>
                                   <th><label>Responsable</label></th>
                                   <th><label>Acciones</label></th>
                              </tr>
                         </thead>
                         <!--<tbody>
                              </tbody> -->
                    </table>
               </section>
          </div>
     </div>
     <!-- FIN TABLA -->

     <!-- BOTONES -->
     <section class='mt-3 input-group row'>
          <div class='col-12 float-right'>
               <button type='submit' id='btnGuardarSalida' name='Guardar' class='btn btn-success w-25'>Guardar</button>
               <!-- <button type='submit' name='Guardar' class='btn btn-primary w-25'>Guardar</button> -->
               <button type="reset" id='btnCancelarSalida' class='btn btn-secondary w-25'>Cancelar</button>
          </div>
     </section>
     <!-- FIN BOTONES -->

     <!-- MODAL REPUESTOS -->
     <div id="ModalRepuestos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h3 class="modal-title" id="myModalLabel">Lista de Repuestos</h3>
                         <button type="button" id="BtnXModalClientes" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-12">
                                   <!-- LOS DATOS SE CARGAN POR BACKEND -->
                                   <div id="Tbl_ModalRepSalidas"></div>
                              </div>
                         </div>
                         <br>
                    </div>
                    <div class="modal-footer">
                         <button id="BtnCerrarModal" type="button" class="btn btn-primary btn-custom">Cerrar</button>
                    </div>
               </div>

          </div>
     </div>
     <!-- FIN MODAL REPUESTOS -->

     <!-- MODAL MAQUINARIA -->
     <div id="ModalMaquinaria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h3 class="modal-title" id="myModalLabel">Lista de Maquinaria</h3>
                         <button type="button" id="BtnXModalMaquinaria" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-12">
                                   <div id="Tbl_ModalMaqSalidas"></div>
                              </div>
                         </div>
                         <br>
                    </div>
                    <div class="modal-footer">
                         <button id="BtnCerrarModal" type="button" class="btn btn-primary btn-custom">Cerrar</button>
                    </div>
               </div>
          </div>
     </div>
     <!-- FIN MODAL MAQUINARIA -->

</div>
<!-- FIN PONER PAGINAS AQUI -->

<?php
include_once("includes/bodyFooter.inc");
include_once("includes/footer.inc");
?>

<script src="js/RepuestosSalida.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
          $('#Tbl_ModalRepSalidas').load('tables/Tbl_ModalRepSalidas.php');
          // $('#Tbl_ModalMaqSalidas').load('Tablas/Tbl_ModalMaqSalidas.php');
     });
</script>
</html>