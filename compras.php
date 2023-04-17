<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
/*
print_r($_POST);
print_r($_SESSION['CARRITOCOMPRA']);

   $juntas = explode("-", $_POST['nombre']);
            $primeraId=$juntas[1];
            $primeraNombre=$juntas[0];

            echo $primeraId ; 
            echo $primeraNombre ;


*/


?>



  
    <?php $total=0; ?>
        <?php foreach($_SESSION['COMPRAS'] as $indice=>$prov) { ?>   

<?php $filtro=$prov['DNI'] ;
?>






 
<?php } ?>





<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid">


  

                          <?php
            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$filtro' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
<?php foreach($listaProductos as $producto) { ?>
    <h3 class="text-right my-5">CARGAR COMPRA A :<?php echo $producto['NOMBRE'] ?>  </h3>
    <?php } ?> 




                           <p>Recuera que los decimales se ponen con el punto y no con la coma</p>
                            <hr>
                          </div>
                         


                          <form action="" method="post">
 <div class="row">
  <div class="col-6">
    <select class="form-control"  name="nombre"  id="nombre">
  <?php
             $sentencia=$pdo->prepare('SELECT * FROM tldproductos order by nombre');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
  

         ?>
      
         <?php foreach($listaProductos as $producto) { ?>
 <option     value="<?php echo $producto['Nombre'].'-'.$producto['ID'];?>"> <?php echo $producto['Nombre'] ;?> </option>
 
 
 <?php } ?>


    </select>
    </div>
    <div class="col-2">

              <input type="number" class="form-control"  name="cantidad" id="cantidad" style="text-align: right;" value="1"></div>
              <div class="col-2">    <input type="float" class="form-control"  name="precio" style="text-align: right;" id="precio" value="<?php echo $producto['Precio'];?>"></div>

              <div class="col-2">   <button class="btn btn-primary" name="btnAccion" value="AgregarItemCompra" type="submit">Agregar

                  </button></div>
                  </div>

            </form>







                          <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                  <thead>
                                    <tr class="bg-dark text-white">
                                        <th>#</th>
                                        <th>Description</th>
                                        <th class="text-right">Cantidad</th>
                                        <th class="text-right">Precio Unit</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right"></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                   

                                    <?php if (isset($_SESSION['CARRITOCOMPRA'])) { ?>


<?php $total=0; ?>
<?php $SOCIO=0; ?>


<?php foreach($_SESSION['CARRITOCOMPRA'] as $indice=>$productos) { ?>
<tr>
<td class="text-left"><?php echo $productos['ID'] ?></td>   
<td class="text-left"><?php echo $productos['NOMBRE'] ?></td>
   
   <td ><?php echo $productos['CANTIDAD'] ?></td>
   <td >$<?php echo $productos['PRECIO'] ?></td>
   <td >$<?php echo number_format($productos['PRECIO'] *$productos['CANTIDAD'],2) ?></td>
   <td width="5%"> 
    <form action="" method="post">
    <input type="hidden"
    name="id" 
    id="id" 
    value="<?php echo openssl_encrypt( $productos['ID'],COD,KEY);?>">    
    <button class="btn btn-danger"  type="submit" name="btnAccion" value="EliminarCompra">Eliminar</button> 
    </form>
    </td>
</tr>
<?php $total=$total+($productos['PRECIO'] *$productos['CANTIDAD']); ?>
<?php $SOCIO=$productos['ID']; ?>

<?php } ?>

                                  
                                   
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div class="container-fluid mt-5 w-100">
                            <p class="text-right mb-2"></p>
                            <p class="text-right"></p>
                            <h4 class="text-right mb-5">Total :$<?php echo number_format($total,2);?></h4>
                            <hr>
                          </div>
                          <div class="container-fluid w-100">

                            <a href="mostrarcarritoCompras.php" class="btn btn-success float-right mt-4 ms-2"><i class="ti-shopping-cart"></i>CARGAR COMPRA</a>
                            <a href="listadoProveedorCompra.php" class="btn btn-danger float-right mt-4"><i class="ti-back-left"></i>CANCELAR COMPRA</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>











      







<?php } 
else {
    // code...
}?>














                       
                        
    </div>
</div>




<!-- print_r($_SESSION['COMPRAS]); -->


 
    <br>
    
     </div>
    </div>