<?php


include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>



<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

<div class="main-panel">
        <div class="content-wrapper">
        
             
                        
                        
     <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">

                <div class="card-body">
                  <h3 class="card-title">
                      
                  
                  
                  
                  
<?php $cliente=$producto['DNI'] ?>
<?php
            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$cliente' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
<?php foreach($listaProductos as $producto) { ?>
    <h4 class="card-title">DATOS DE :  <?php echo $producto['NOMBRE'] ?>   </h4>
    <?php } ?>  
         <?php
         
                    

            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$cliente'");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            
         ?>
         <?php foreach($listaProductos as $producto) { ?>
             
                        <?php } ?>
                  
                       
                  <form class="cmxform" id="commentForm"  action="actualizaClientes.php" method="post">

                  
                  <fieldset>
                      <div class="form-group">
                     
                  <input type="hidden" class="form-control" name="SOCIO" placeholder="Nombre" value="<?php echo ( $producto['SOCIO']);?>">
                        <label for="inputNombre">Nombre y apellido</label>
                        <input type="text" class="form-control" name="NOMBRE" placeholder="Nombre y apellido" value="<?php echo ( $producto['NOMBRE']);?>">
                      </div>
                      <div class="form-group">
                      <label for="inputApellido">Domicilio</label>
                        <input type="text" class="form-control" name="APELLIDO" placeholder="Domicilio Completo" value="<?php echo ( $producto['APELLIDO']);?>">
                      </div>
                     
                      <div class="form-group">
                      <label for="inputCUIL/CUIT">CUIL/CUIT</label>
                        <input type="text" class="form-control" name="CUILCUIT" placeholder="Ingrese CUIL/CUIT" value="<?php echo ( $producto['CUIL/CUIT']);?>">
                      </div>

                      <div class="form-group">
                      <label for="inputTELEFONO">WhatsApp</label>
                        <input type="text" class="form-control" name="TELEFONO" placeholder="Ingresar Telefono"  value="<?php echo ( $producto['TELEFONO']);?>">
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
                        <input type="text" class="form-control" name="COMENTARIOS" placeholder="Ingresar comentarios" value="<?php echo ( $producto['COMENTARIOS']);?>">
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



                  








<?php

include 'templates/pie.php';
?>