<?php

include 'carritoVentas.php';
include 'templates/cabecera.php'
?>


     <br>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
  <div class="carousel-inner">
    <h1 clas="text-center">Compras de Proveedores</h1>
    <div class="carousel-item">
     </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="banner3.jpg" alt="Third slide">
    </div>
  </div>
</div>
<hr>
<?php print_r($_SESSION['COMPRAR']); ?>
<?php if(!empty($_SESSION['COMPRAR'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['COMPRAR'] as $indice=>$prov) { ?>   

    <h3>Pagos de  <?php echo $prov['DNI'] ?>  </h3>
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

    <?php if($mensaje!="") {?>
     <div class="alert alert-success" role="alert">
     
        <a href="mostrarcarritoCompras.php#" badge badge-success>Ver carrito de Compras</a>
     </div>  
   
    <?php }?>
    <br>
    
     <div class="row">
     
     
         <?php
            $SOCIO=$prov['DNI'] ;

            $sentencia=$pdo->prepare('SELECT * FROM tldproductos');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         <?php foreach($listaProductos as $producto) { ?>
            <div class="col-sm-4 ">
          <div class="card">
              <img 
              title="<?php echo $producto['Nombre'];?>"
              alt="<?php echo $producto['Nombre'];?>"
              class="card-img-top"
              src="<?php echo $producto['Imagen'];?>"
              data-toggle="popover"
              data-trigger="hover"
              data-content="<?php echo $producto['Descripcion'];?>"
                height="317px"
              >
            <div class="card-body">
                    <span><?php echo $producto['Nombre'];?> </span>
                  <h5 class="card-title">$<?php echo  $producto['Precio'];?></h5>
                <!--  <p class="card-text">Descripcion</p>
                  <p class="card-text"><?php echo $producto['Descripcion'];?></p>-->
                
                <form action="" method="post">
                
                <input type="number" name="DNI" id="DNI" value="<?php echo  $SOCIO;?>">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt( $producto['ID'],COD,KEY);?>">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                <input type="number" name="precio" id="precio" value="<?php echo $producto['Precio']?>">
                <input type="number" name="cantidad" id="cantidad" value="1">
                  <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito

                  </button>
                </form>
             </div>
          </div> 
         </div>
         <?php } ?>
        
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