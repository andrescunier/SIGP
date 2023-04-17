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
        <form action="actualizaArticulos.php" method="post"> 
                <div class="form-group row">
                    <div class="col-sm-6">
                    <input type="hidden" class="form-control" name="ID" placeholder="Nombre" value="<?php echo ( $producto['ID']);?>">
                        <label for="inputNombre">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" placeholder="Nombre" value="<?php echo ( $producto['Nombre']);?>">
                    </div>
            
                    <div class="col-sm-6">
                        <label for="inputApellido">Descripcion</label>
                        <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion del Articulo" value="<?php echo ( $producto['Descripcion']);?>">
                    </div>
            <!--   
            <div class="col-sm-9">
            <label for="inputEmail">Dirección de Imagen</label>
           --> <input type="hidden" class="form-control" name="Imagen" placeholder="Ingresar Fecha Nacimiento"  value="<?php echo ( $producto['Imagen']);?>"><!--
            </div>-->
            <div class="col-sm-9">
            <label for="inputCategoria">Categoria</label>
            <input type="text" class="form-control" name="Categoria" placeholder="Ingresar Fecha Nacimiento"  value="<?php echo ( $producto['Categoria']);?>">
            </div>
            <div class="col-sm-9">
            <label for="inputCodSis">Codigo Sistema Externo</label>
            <input type="text" class="form-control" name="CodArtExterno" placeholder="Ingresar Fecha Nacimiento"  value="<?php echo ( $producto['CodArtExterno']);?>">
            </div>
            <div class="col-sm-3">
            <label for="inputEmail">Precio:</label>
            <input type="text" class="form-control" name="Precio" placeholder="Ingresar Precio del Producto"  value="<?php echo ( $producto['Precio']);?>">
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