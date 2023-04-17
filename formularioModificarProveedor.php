<?php


include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<div class="row">


<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

<?php $cliente=$producto['DNI'] ?>
<?php
            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$cliente' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
<?php foreach($listaProductos as $producto) { ?>
    <h3>Datos de  <?php echo $producto['NOMBRE'] ?>  </h3>
    <?php } ?>  
         <?php
         
                    

            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$cliente'");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            
         ?>
         <?php foreach($listaProductos as $producto) { ?>
             
                        <?php } ?>
                              
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
        <form action="actualizaProveedor.php" method="post"> 
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="SOCIO" placeholder="Nombre" value="<?php echo ( $producto['SOCIO']);?>">
                        <label for="inputNombre">Nombre y apellido</label>
                        <input type="text" class="form-control" name="NOMBRE" placeholder="Nombre y apellido" value="<?php echo ( $producto['NOMBRE']);?>">
                    </div>
            
                    <div class="col-sm-6">
                        <label for="inputApellido">Domicilio</label>
                        <input type="text" class="form-control" name="APELLIDO" placeholder="Domicilio Completo" value="<?php echo ( $producto['APELLIDO']);?>">
                    </div>
                
                </div>
                <div class="form-group row">
                   
                    <div class="col-sm-6">
                        <label for="inputCUIL/CUIT">CUIL/CUIT</label>
                        <input type="text" class="form-control" name="CUILCUIT" placeholder="Ingrese CUIL/CUIT" value="<?php echo ( $producto['CUIL/CUIT']);?>">
                    </div>
                    
                  
 <div class="col-sm-6">
                        <label for="inputTELEFONO">Whatsapp</label>
                        <input type="text" class="form-control" name="TELEFONO" placeholder="Ingresar Telefono"  value="<?php echo ( $producto['TELEFONO']);?>">
                    </div>
                  
                    <div class="form-group">
                      <label for="inputEmail">Cuenta Contable</label>

                      <select class="form-control" name="DOCUMENTO" id="DOCUMENTO">


<?php              $sentencia=$pdo->prepare("select * from cuentas");
         $sentencia->execute();
         $planCuentas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($planCuentas as $cuentas){ ?> 
            
<option value="<?php echo $cuentas['ID'];?>"><?php echo $cuentas['Cuenta'];?></option>
<?php }          ?> 


              </select>
              </div>

            <div class="col-sm-6">
            <label for="inputEmail">Categoria</label>
            <input type="text" class="form-control" name="Correo" placeholder="Ingresar Correo Electronico"  value="<?php echo ( $producto['Correo electronico']);?>">
            </div>
                   
               
            </div>
            <div class="form-group row">
            <div class="col-sm-12">
            <label for="inputEmail">Comentarios</label>
            <input type="text" class="form-control" name="COMENTARIOS" placeholder="Ingresar Comentarios"  value="<?php echo ( $producto['COMENTARIOS']);?>">
            </div>
            

            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Modificar</button>
            </form>
        </div>
    </div>
</div>
    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
  
<?php

include 'templates/pie.php';
?>