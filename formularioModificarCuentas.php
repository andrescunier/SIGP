<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<?php $total=0; ?>


        <?php foreach($_SESSION['MEDIOS'] as $indice=>$producto) { ?>   

            
     <?php $cliente=$producto['DNI'] ?> 
<?php } ?>
     
       


<div class="main-panel">
        <div class="content-wrapper">
        
             
                        
                        
     <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">MODIFICAR CUENTA N° :  <?php echo $producto['DNI'] ?>       </h4>
 
 
                  <?php
         
                    

         $sentencia=$pdo->prepare("SELECT * FROM cuentas where ID='$cliente'");
         $sentencia->execute();
         $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         //print_r($listaProductos);
         
      ?>
      <?php foreach($listaProductos as $producto) { ?>
          
                     <?php } ?>
                           
 
 
 
                  <form class="cmxform" id="commentForm"  action="actualizaCuentas.php" method="post">
                   
                  <input type="hidden" class="form-control" name="ID" placeholder="Nombre" value="<?php echo ( $producto['ID']);?>">
  
                 
                 <fieldset>
                     <div class="form-group">
                     <label for="inputNombre">Codigo de Cuenta</label>
                       <input type="text" class="form-control" name="codCuenta" value="<?php echo ( $producto['Codigo']);?>" >
                     </div>
                     <div class="form-group">
                     <label for="inputApellido">Nombre de Cuenta</label>
                       <input type="text" class="form-control" name="cuenta" value="<?php echo ( $producto['Cuenta']);?>" >
                     </div>
                     <div class="form-group">
                     <label for="inputApellido">Nombre de Sub Cuenta</label>
                       <input type="text" class="form-control" name="subCuenta" value="<?php echo ( $producto['subCuenta']);?>" >
                     </div>
                   

                 <div class="form-group">

                     <button class="btn btn-primary " type="submit" name="btnAccion" value="Proceder">Modificar</button>
          
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


