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
                  <h4 class="card-title">MODIFICAR MEDIO N° :  <?php echo $producto['DNI'] ?>         </h4>

         <?php
         
                    

            $sentencia=$pdo->prepare("SELECT * FROM MediosDePago where ID='$cliente'");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            
         ?>
         <?php foreach($listaProductos as $producto) { ?>
             
                        <?php } ?>
                              
                    
                        
     
               
                  
                  
                  
                  
                  <form action="actualizaMedios.php" method="post"> 
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="ID" placeholder="Nombre" value="<?php echo ( $producto['ID']);?>">
                        <label for="inputNombre">Medio</label>
                        <input type="text" class="form-control" name="Medio" placeholder="Medio" value="<?php echo ( $producto['Medio']);?>">
                    </div>
            
                    
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Modificar</button>
            </fieldset>
                  </form>
     




                  </div>
                  </div>
                  </div>
                  </div>


  
<?php

include 'templates/pie.php';
?>