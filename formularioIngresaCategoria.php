<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>



<?php $total=0; ?>
         <?php
         $sentencia=$pdo->prepare("select MAX(ID)+1 from categorias as MAXI");
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
                  <h4 class="card-title">ALTA DE CATEGORIA :  <?php echo $soc ?>          </h4>
 <form class="cmxform" id="commentForm"  action="ingresaCategoria.php" method="post">
                   
        
                 
                 <fieldset>
                    
                     <div class="form-group">
                     <label for="inputApellido">Nombre Categoría</label>
                       <input type="text" class="form-control" name="categoria" placeholder="Ingresa Categoria" >
                     </div>
                    
                   

                 <div class="form-group">

                     <button class="btn btn-primary " type="submit" name="btnAccion" value="Proceder">Ingresar Categoría</button>
          
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


