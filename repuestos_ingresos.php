<!DOCTYPE html>
<html lang="en">

<head>
     <title>Registro de Repuestos</title>
     <?php include_once("includes/head.inc"); ?>
     <script src="js/RepuestosRegistro.js"></script>
</head>
<?php include_once("includes/bodyHead.inc"); ?>

<div class="container-fluid">
     <!-- PONER PAGINAS AQUI -->
     <!-- DATOS -->
     <section class='pt-2 card card-header'>
          <div class="row">
               <!-- FECHA  -->
               <div class="col-md-2">
                    <label>Fecha</label>
                    <div class="form-group">
                         <input type="date" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" class="form-control validar" ID="txtFecha" name='Fecha'>
                    </div>
               </div>

               <!-- COMPROBANTE -->
               <div class='col-md-2'>
                    <label>N. Comprobante</label>
                    <div class="form-group">
                         <input type="text" class="form-control validar" ID="txtComprobante" name='Comprobante' PlaceHolder="Comprobante">
                    </div>
               </div>
          </div> <!-- FIN CLASS ROW -->

          <div class='row'>
               <div class='col-md-1'>
                    <label>Cantidad</label>
                    <div class="input-group">
                         <input type="number" class="form-control validar" ID="txtCantidad" name='Cantidad'>
                    </div>
               </div>

               <div class='col-md-2'>
                    <label>Código Repuesto</label>
                    <div class="input-group">
                         <input type="text" class="form-control validar" ID="txtCodigo" PlaceHolder="Código" name='Codigo'>
                         <span>
                              <button data-target="#ModalRepuestos" data-toggle="modal" id="BtnModalClientes" class="btn btn-secondary" title="Buscar Clientes"><i class="fa fa-search"></i></button>
                         </span>
                    </div>
               </div>

               <div class='col-md-3'>
                    <label>Descripción</label>
                    <div class="input-group">
                         <input type="text" class="form-control validar" ID="txtDescripcion" PlaceHolder="Descripción" name='Descripcion'>
                    </div>
               </div>

               <div class='col-md-3'>
                    <label>Medida</label>
                    <div class="input-group">
                         <select name="gender" class="ui dropdown selection" id="select">
                              <option value=""></option>
                              <option value="UNIDAD">UNIDAD</option>
                              <option value="MTS">METROS</option>
                              <option value="KG">KG</option>
                              <option value="LITRO">LITRO</option>
                         </select>
                    </div>
               </div>

               <div class='col-md-3'>
                    <label>Orden de Compra</label>
                    <div class="input-group">
                         <input type="text" class="form-control validar mr-1" ID="txtOrdenCompra" PlaceHolder="Orden de Compra" name='OrCompra'>
                         <span>
                              <button id="BtnAgregarLinea" class="ui primary button"><i class="fa fa-plus"></i></button>
                         </span>
                         <span>
                              <button style="display: none;" id="BtnActualizarRepuesto" class="ui instagram button">Actualizar</button>
                         </span>
                    </div>
               </div>
          </div>
     </section>
     <!-- FIN DATOS -->

     <!-- TABLA -->
     <div class="table-responsive pt-1">
          <div class="card shadow">
               <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ingreso de Repuestos</h6>
               </div>
               <section class="mt-3 card-body border-bottom-primary">
                    <table id="Tbl_Repuestos" class="table table-bordered table-sm">
                         <thead>
                              <tr>
                                   <th><label>Fecha</label></th>
                                   <th><label>Comprobante</label></th>
                                   <th><label>Cantidad</label></th>
                                   <th><label>Código</label></th>
                                   <th><label>Descripción</label></th>
                                   <th><label>Medida</label></th>
                                   <th><label>Orden de Compra</label></th>
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
               <button type='submit' id='btnGuardarRepuesto' name='Guardar' class='btn btn-success w-25'>Guardar</button>
               <!-- <button type='submit' name='Guardar' class='btn btn-primary w-25'>Guardar</button> -->
               <button type="reset" id='btnCancelarRepuesto' class='btn btn-secondary w-25'>Cancelar</button>
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
                                   <div id="Tbl_ModalRepSalidas"></div>
                                   <!-- <div class="table-responsive">
                                        <table id="Tbl_ModalClientes" class="table table-hover table-sm">
                                             <thead>
                                                  <tr>
                                                       <th></th>
                                                       <th>Código</th>
                                                       <th>Descripción</th>
                                                       <th>Cantidad</th>
                                                       <th>Medida</th>
                                                  </tr>
                                             </thead>
                                             <?php include_once('/includes/conexion.inc'); ?>
                                             <?php
                                             if (!$conex) {
                                                  echo 'NoConex';
                                             } else {
                                                  $query = "SELECT er.Codigo, rr.Descripcion, er.Cantidad, rr.Medida FROM existencia_repuestos as er INNER JOIN registro_repuestos as rr on rr.Codigo = er.Codigo GROUP BY er.Codigo;";
                                                  $result = mysqli_query($conex, $query);

                                                  if (mysqli_num_rows($result) > 0) {
                                                       while ($row = mysqli_fetch_assoc($result)) {
                                                            if ($row['Cantidad'] > 0) {
                                                                 $btn1 = '<button id="BtnAgregarCliente" data-dismiss="modal" title="Agregar" class="btn btn-primary btn-agregar"> <i class="fa fa-plus-circle"></i> </button>&nbsp';
                                                            } else if ($row['Cantidad'] < 0) {
                                                                 $btn1 = '<button id="BtnAgregarCliente" disabled="false" title="Agregar" class="btn btn-danger"> <i class="fa fa-plus-circle"></i> </button>&nbsp';
                                                            }
                                                            ?>
                                                            <tr>
                                                                 <td><?php echo $btn1 ?></td>
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
                                   </div> -->
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

</div> <!-- FIN PONER PAGINAS AQUI -->

<script type="text/javascript">
     $(document).ready(function() {
          $('#Tbl_ModalRepSalidas').load('Tablas/Tbl_ModalRepSalidas.php');
     });
</script>

<?php
include_once("includes/bodyFooter.inc");
include_once("includes/footer.inc");
?>

</html>