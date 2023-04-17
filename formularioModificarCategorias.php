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
                  <h4 class="card-title">MODIFICAR CATEGORIA N° :  <?php echo $producto['DNI'] ?>       </h4>
 
 
                  <?php
         
                    

         $sentencia=$pdo->prepare("SELECT * FROM categorias where ID='$cliente'");
         $sentencia->execute();
         $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         //print_r($listaProductos);
         
      ?>
      <?php foreach($listaProductos as $producto) { ?>
          
                     <?php } ?>
                           
 
 
 
                  <form class="cmxform" id="commentForm"  action="actualizaCategorias.php" method="post">
                   
                  <input type="hidden" class="form-control" name="ID" placeholder="Nombre" value="<?php echo ( $producto['ID']);?>">
  
                 
                 <fieldset>
                     
                     <div class="form-group">
                     <label for="inputApellido">Nombre de Categoría</label>
                       <input type="text" class="form-control" name="categoria" value="<?php echo ( $producto['categoria']);?>" >
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


