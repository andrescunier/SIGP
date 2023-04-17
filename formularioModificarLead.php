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
        <form action="actualizaLeads.php" method="post"> 
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="SOCIO" placeholder="Nombre" value="<?php echo ( $producto['SOCIO']);?>">
                        <label for="inputNombre">Nombre y Apellido</label>
                        <input type="text" class="form-control" name="NOMBRE" placeholder="Nombre" value="<?php echo ( $producto['NOMBRE']);?>">
                    </div>
            
                    <div class="col-sm-6">
                        <label for="inputApellido">Direecion</label>
                        <input type="text" class="form-control" name="APELLIDO" placeholder="Apellido" value="<?php echo ( $producto['APELLIDO']);?>">
                    </div>
              
                </div>
                <div class="form-group row">
                  
                    <div class="col-sm-6">
                        <label for="inputTELEFONO">WhatsApp</label>
                        <input type="number" class="form-control" name="TELEFONO" placeholder="Ingresar Telefono"  value="<?php echo ( $producto['TELEFONO']);?>">
                    </div>
               
  <div class="col-sm-6">
            <label for="inputEmail">Correo Electronico</label>
            <input type="email" class="form-control" name="Correo" placeholder="Ingresar Fecha Nacimiento"  value="<?php echo ( $producto['Correo electronico']);?>">
            </div>

 <div class="col-sm-6">
            <label for="inputEmail">Tipo Complejo</label>
            <input type="text" class="form-control" name="BAJA" placeholder="Ingresa tipo de Canchas y Cantidad Usando la inicial del deporte F5"  value="<?php echo ( $producto['BAJA']);?>">
            </div>


                          <div class="col-sm-12">
 <label for="inputCOMENTARIO">Comentario</label>
                       
<textarea class="form-control" name="COMENTARIO" rows="4" cols="50" placeholder="<?php echo ( $producto['COMENTARIOS']);?>" ><?php echo ( $producto['COMENTARIOS']);?></textarea>

                       
                      
                </div>


                </div>
              
      
          


                <div class="form-group row">
               
                   
           
            
                   
            

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