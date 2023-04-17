<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<div class="row">
<?php
         $sentencia=$pdo->prepare("select MAX(ID)+1 from MediosDePago as MAXI");
         $sentencia->execute();
         $prox=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($prox as $producto){
             $soc=$producto['MAX(ID)+1'];
         }           

           
         ?>


<div class="container py-5">

    <div class="row">
        <div class="col-md-10 mx-auto">
        <form action="ingresaMediosDePago.php" method="post"> 
                <div class="form-group row">
                   
       
           
            
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="ID" placeholder="<?php echo $soc ?>" value="<?php echo $soc ?>">
                    
                        <label for="inputApellido">Nombre</label>
                        <input type="text" class="form-control" name="Medio" placeholder="Ingresar Nombre" >
                    </div>
                   
                  
            
                </div>
                
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Ingresar Medio de Pago</button>
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