<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<div class="row">

<?php $total=0; ?>


        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

            
     <?php $cliente=$producto['DNI'] ?> 
<?php } ?>
<h3>Datos de Articulo :  <?php echo $producto['DNI'] ?>  </h3> 
         <?php
         
                    

            $sentencia=$pdo->prepare("SELECT * FROM tldproductos where ID='$cliente'");
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
        <form action="upload.php" method="post" enctype="multipart/form-data"> 
                <div class="form-group row">
                <img src="<?php echo ( $producto['Imagen']);?>" alt="" heigth="500">
                    <div class="col-sm-9">
                        <input type="hidden" class="form-control" name="ID" placeholder="ID" value="<?php echo ( $producto['ID']);?>">
                       
              

  Selecccionar Imagen a Subir:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  

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