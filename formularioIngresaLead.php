<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<div class="row">

<?php $total=0; ?>
         <?php
         $sentencia=$pdo->prepare("select MAX(SOCIO)+1 from clientes as MAXI");
         $sentencia->execute();
         $prox=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($prox as $producto){
             $soc=$producto['MAX(SOCIO)+1'];
         }           

           
         ?>
         
             
                        
                        <h3>Ingrese lead n°:  <?php echo $soc ?>  </h3>        
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
        <form action="ingresaLead.php" method="post"> 
        <div class="form-group row">
                  
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="ESTADO" placeholder="Ingresar Estado" value="LEAD" >
                     <input type="hidden" class="form-control" name="Complejo" placeholder="Ingresar Estado" value="<?php echo EMPRESA ?>" >
                    <input type="hidden" class="form-control" name="SOCIO" placeholder="<?php echo $soc ?>" value="<?php echo $soc ?>">
                     
                        <label for="inputNombre">Nombre y Apellido</label>
                        <input type="text" class="form-control" name="NOMBRE" placeholder="Nombre">
                    </div>
            
                    <div class="col-sm-6">
                        <label for="inputApellido">Direcccion</label>
                        <input type="text" class="form-control" name="APELLIDO" placeholder="Dirrección completa" >
                    </div>
              
                </div>
                <div class="form-group row">
                     <div class="col-sm-6">
            <label for="inputEmail">Correo Electronico</label>
            <input type="text" class="form-control" name="Correo" placeholder="Ingresar Email"  >
            </div>


                                 <div class="col-sm-6">
                        <label for="inputTELEFONO">Whatsapp</label>
                        <input type="text" class="form-control" name="TELEFONO" placeholder="Ingresar Whatsapp acordate del prefijo " >
                </div>
 
                                 <div class="col-sm-6">
                        <label for="inputTELEFONO">TIPO DE COMPLEJO</label>
                        <input type="text" class="form-control" name="BAJA" placeholder="Ingresa tipo de Canchas y Cantidad Usando la inicial del deporte F5" >
                </div>

                   
                                 <div class="col-sm-6">
 <label for="inputCOMENTARIO">Comentario</label>
                       
<textarea class="form-control" name="COMENTARIO" rows="4" cols="50" placeholder="Ingrese mensaje"></textarea>

                       
                      
                </div>
              
            </div>
          
           
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Ingresar Lead</button>
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