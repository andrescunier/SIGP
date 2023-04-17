<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
$saldo=0;
?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
   




          


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <p class="card-description">
                  <h3>Cierre de Caja</h3></p>
                  <div class="table-responsive">
                 
                 <form class="forms-sample" action="cierrecaja.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">DIA DE CAJA A CERRAR</label>
                      <input type="date" class="form-control" id="fechaCierre" name="fechaCierre"  placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">OBSERVACIONES</label>
                      <input type="texr" class="form-control" id="observacionesCierre"  name="observacionesCierre" placeholder="Ingrese observaciones">
                    </div>
                   
                    <button type="submit" class="btn btn-primary me-2">CERRAR</button>
                  </form>

                  
                    
                  </div>
                </div>
              </div>
            
            </div>








































































     




</div>
<?php

include 'templates/pie.php';
?>