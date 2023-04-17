<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

  
  

<?php $total=0; ?>
         <?php
         $sentencia=$pdo->prepare("select MAX(SOCIO)+1 from clientes as MAXI");
         $sentencia->execute();
         $prox=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($prox as $producto){
             $soc=$producto['MAX(SOCIO)+1'];
         }           

           
         ?>
          <div class="main-panel">
        <div class="content-wrapper">
        
             
                        
                        
     <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">ALTA DE CLIENTE :  <?php echo $soc ?>          </h4>
                  <form class="cmxform" id="commentForm"  action="ingresaClientes.php" method="post">
                   
        
                    <input type="hidden" class="form-control" name="ESTADO" placeholder="Ingresar Estado" value="CLIEN" >
                    <input type="hidden" class="form-control" name="SOCIO" placeholder="<?php echo $soc ?>" value="<?php echo $soc ?>">
                    <input type="hidden" class="form-control" name="Complejo" placeholder="Ingresar Estado" value="<?php echo EMPRESA ?>" >
                     
                     
                    
                  
                  
                  <fieldset>
                      <div class="form-group">
                      <label for="inputNombre">Nombre y Apellido</label>
                        <input type="text" class="form-control" name="NOMBRE" placeholder="Nombre y Apellido" required>
                      </div>
                      <div class="form-group">
                      <label for="inputApellido">Domicilio</label>
                        <input type="text" class="form-control" name="APELLIDO" placeholder="Domicilio Completo" >
                      </div>
                      <input type="hidden" class="form-control" name="DOCUMENTO" value="100000" >

                      <div class="form-group">
                      <label for="inputCUIL/CUIT">CUIL/CUIT</label>
                        <input type="number" class="form-control" name="CUILCUIT" placeholder="Ingrese CUIL/CUIT">
                      </div>

                      <div class="form-group">
                      <label for="inputTELEFONO">WhatsApp</label>
                        <input type="number" class="form-control" name="TELEFONO" placeholder="Ingresar Telefono"  >
                        <div class="form-group">
                      
             
                      
                      </div>
                   


                      <div class="form-group">
                      <label for="inputEmail">Categoria</label>

                      <select class="form-control" name="DOCUMENTO" id="Correo">
                      <?php $cuntina=$producto['DOCUMENTO'] ?>

                      <?php              $sentencia=$pdo->prepare("select * from categorias where ID='$cuntina'");
         $sentencia->execute();
         $planCuentas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($planCuentas as $cuentas){ ?> 
            
<option  selected value="<?php echo $cuentas['ID'];?>"><?php echo $cuentas['ID'].' / '.$cuentas['categoria'];?></option>
<?php }          ?> 

<?php              $sentencia=$pdo->prepare("select * from categorias order by categoria asc");
         $sentencia->execute();
         $planCuentas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($planCuentas as $cuentas){ ?> 
            
<option value="<?php echo $cuentas['ID'];?>"><?php echo $cuentas['ID'].' / '.$cuentas['categoria'];?></option>
<?php }          ?> 


              </select>
              </div>
                      <div class="form-group">
                      <label for="inputTELEFONO">Comentarios:</label>
                       <textarea class="form-control" name="COMENTARIOS" rows="4" cols="50" placeholder="Ingrese mensaje"></textarea>
                  </div>


                  <div class="form-group">

                      <button class="btn btn-primary " type="submit" name="btnAccion" value="Proceder">Ingresar Cliente</button>
           
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