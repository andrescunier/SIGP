<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>



<?php $total=0; ?>
         <?php
         $sentencia=$pdo->prepare("select MAX(ID)+1 from cuentas as MAXI");
         $sentencia->execute();
         $prox=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($prox as $producto){
             $soc=$producto['MAX(ID)+1'];
         }           

           
         ?>


<div class="main-panel">
        <div class="content-wrapper">
        
             
                        
                        
     <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">ALTA DE CUENTA :  <?php echo $soc ?>          </h4>
 <form class="cmxform" id="commentForm"  action="ingresaCuentas.php" method="post">
                   
        
                 
                 <fieldset>
                     <div class="form-group">
                     <label for="inputNombre">Codigo de Cuenta</label>
                       <input type="text" class="form-control" name="codCuenta" placeholder="Ingresa Codigo de Cuenta" required>
                     </div>
                     <div class="form-group">
                     <label for="inputApellido">Cuenta</label>
                       <input type="text" class="form-control" name="cuenta" placeholder="Ingresa Descripción de Cuenta" >
                     </div>
                     <div class="form-group">
                     <label for="inputApellido">Sub Cuenta</label>
                       <input type="text" class="form-control" name="subCuenta" placeholder="Ingresa Sub Cuenta" >
                     </div>
                    
                   

                 <div class="form-group">

                     <button class="btn btn-primary " type="submit" name="btnAccion" value="Proceder">Ingresar Cuenta</button>
          
                     </div>
                   </fieldset>
                 </form>
                 </div>
              </div>
            </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          

  
<?php

include 'templates/pie.php';
?>


