<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<div class="row">
<?php
         $sentencia=$pdo->prepare("select MAX(ID)+1 from tldproductos as MAXI");
         $sentencia->execute();
         $prox=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         foreach ($prox as $producto){
             $soc=$producto['MAX(ID)+1'];
         }           

           
         ?>


<div class="container py-5">

    <div class="row">
        <div class="col-md-10 mx-auto">
        <form action="ingresaArticulos.php" method="post"> 
                <div class="form-group row">
                   
       
           
            
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="ID" placeholder="<?php echo $soc ?>" value="<?php echo $soc ?>">
                    
                        <label for="inputApellido">Nombre</label>
                        <input type="text" class="form-control" name="APELLIDO" placeholder="Ingresar Nombre" >
                    </div>
                   
                  
            
                    <div class="col-sm-6">
                        <label for="inputDOCUMENTO">Precio</label>
                        <input type="number" class="form-control" name="DOCUMENTO" placeholder="Ingresar Precio" value="0" >
                    </div>
                    <div class="col-sm-6">
                        <label for="inputCUIL/CUIT">Descripcion</label>
                        <input type="text" class="form-control" name="CUILCUIT" placeholder="Ingrese Descripcion" >
                    </div>
                 <!--   <div class="col-sm-6">
                        <label for="inputCALLE">Imagen</label>
                       --> <input type="hidden" class="form-control" name="CALLE" placeholder="Ingresar Imagen"><!--
                    </div>-->
                   
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Ingresar Articulo</button>
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