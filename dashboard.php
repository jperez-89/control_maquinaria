<!DOCTYPE html>
<html lang="en">

<head>
     <title>Principal</title>
     <?php
     include_once("includes/head.inc");
     ?>
</head>

<?php
include_once("includes/bodyHead.inc");
?>

<!-- PONER PAGINAS AQUI -->
<div class="container-fluid">

     <div class="row mt-5">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-danger shadow h-100 py-2 bg-gray-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ingresos (Mensual)</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">40,000</div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-calendar fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Salidas (Anual)</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">215,000</div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-info shadow h-100 py-2 bg-gray-100">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Maquinaria Disponible</div>
                                   <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                             <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                             <div class="progress progress-sm mr-2">
                                                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                         <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Devoluciones</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                              </div>
                              <div class="col-auto">
                                   <i class="fas fa-comments fa-2x text-gray-300"></i>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Cards -->
     <!-- <div class="row mt-5">
          <div class="col-lg-6">

               <div class="card shadow mb-4">
                    <div class="card-header">
                         Default Card Example
                    </div>
                    <div class="card-body">
                         This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                    </div>
               </div>

               <div class="card shadow mb-4">
                    <div class="card-header py-3">
                         <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                    </div>
                    <div class="card-body">
                         This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                    </div>
               </div>

          </div>

          <div class="col-lg-6">

               <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                         <div class="dropdown no-arrow">
                              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                   <div class="dropdown-header">Dropdown Header:</div>
                                   <a class="dropdown-item" href="#">Action</a>
                                   <a class="dropdown-item" href="#">Another action</a>
                                   <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                         </div>
                    </div>
                    <div class="card-body">
                         This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                    </div>
               </div>

               <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                         <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                         <div class="card-body">
                              This card uses Bootstrap's default styling with no utility classes added. Global styles are the only things modifying the look and feel of this default card example.
                         </div>
                    </div>
               </div>
          </div>
     </div> -->
</div>
<!-- FIN PONER PAGINAS AQUI -->

<?php
include_once("includes/bodyFooter.inc");
include_once("includes/footer.inc");
?>

</html>