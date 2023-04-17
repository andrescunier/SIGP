<?php 
if ($_SESSION['LOGIN'][0]==3) {


}



else{
?>




    <script> 

window.location.replace('indexBad.php'); 

</script>

<?php
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>..::el mAtaplanillas::.. </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="menu.php">
            <img src="images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="menu.php">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav ms-auto">

        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="">BRUNALDO <?php echo EMPRESA;?></h1>
           
          </li>
         
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
              <i class="icon-mail icon-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">No hay mensajes </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
                          </div>
          </li>
          <li class="nav-item dropdown"> 
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">No hay notificaciones, </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              
              </a>
             
             
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php echo EMPRESA;?></p>
              <!--  <p class="fw-light text-muted mb-0"></p>-->
              </div>
              <a class="dropdown-item" href="http://www.dosvias.com.ar/BRUNO/GRUN6/menu.php"><i class="dropdown-item-icon mdi mdi mdi-autorenew text-primary me-2"></i> Ir a Grun</a>

           <a class="dropdown-item" href="salir.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Salir</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
         
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
                <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
       
          <li class="nav-item nav-category">Clientes / Proveedores</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">ABM</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="formularioIngresaCliente.php">Alta Cliente</a></li>  
                <li class="nav-item"><a class="nav-link" href="menu.php">Modifica Cliente</a></li>    
                <li class="nav-item"><a class="nav-link" href="formularioIngresaProveedor.php">Alta Proveedor</a></li>
                            
                <li class="nav-item"><a class="nav-link" href="listadoAcreedores.php">Modifica Proveedor</a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
              <i class="menu-icon mdi mdi-cart-arrow-down"></i>
              <span class="menu-title">Ventas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="e-commerce">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="listadoClientesVentas.php"> Listado Clientes</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoClienteZETA.php"> CETA </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/orders.html"> Planilla </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#compras" aria-expanded="false" aria-controls="editors">
              <i class="menu-icon    mdi mdi-factory  "></i>
              <span class="menu-title">Compras</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="compras">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="listadoProveedorCompra.php">Listado Proveedores</a></li>
              </ul>
            </div>
                      </li>
          
                     










          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
              <i class="menu-icon     mdi mdi-wallet   "></i>
              <span class="menu-title">Cobranzas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editors">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="listadoClientesCrobranzas.php">Listado de Clientes </a></li>
               
              </ul>
            </div>
          </li>
      



          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-briefcase"></i>
              <span class="menu-title">Pagos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="listadoProveedorPago.php">Listado Proveedores</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Tesoreria</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tesoreria" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-cash-multiple"></i>
              <span class="menu-title">Caja</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tesoreria">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="PagarProveeConcepto.php">Gastos Chicos</a></li>
                <li class="nav-item"> <a class="nav-link" href="caja.php">Movimientos de Caja</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoMediosDePago.php">Medios de Pago</a></li>
                <li class="nav-item"> <a class="nav-link" href="cerradas.php">Cajas Cerradas</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Contable</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#contabilidad" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi  mdi-credit-card-multiple"></i>
              <span class="menu-title">Contabilidad</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="contabilidad">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="formularioIngresaCuenta.php">Alta Cuentas</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoCuentas.php">Listado Cuentas</a></li>
                <li class="nav-item"> <a class="nav-link" href="formularioIngresaCategoria.php">Alta Categorías</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoCategorias.php">Listado Categorías</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoIIBB.php">Listado Detalle IIBB</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoIvaVentas.php">Listado IVA Ventas</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoIvaCompras.php">Listado IVA Compras</a></li>

              </ul>
            </div>
          </li>




          <li class="nav-item nav-category">Reportes</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Tableros</span>
              <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="dashboard.php">Fran</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoCtaCte.php">Cuentas a Cobrar</a></li>
            <li class="nav-item"> <a class="nav-link" href="listadoCtaCteProve.php">Cuentas a Pagar</a></li>
            <li class="nav-item"> <a class="nav-link" href="listadoCompras.php">Compras</a></li>

                <li class="nav-item"> <a class="nav-link" href="listadoIngresos.php">Ingresos</a></li>
                <li class="nav-item"> <a class="nav-link" href="listadoEgresos.php">Egresos</a></li>
            <li class="nav-item"> <a class="nav-link" href="listadoMediosDePago2.php">Mov x Medio Pago</a></li>
            
            
              </ul>
            </div>
          </li>

        </ul>
      










      </nav>

     