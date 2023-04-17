<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';




if (!empty($_SESSION['CARRITOVENTA'])) {

unset($_SESSION['CARRITOVENTA']);
}

if (!empty($_SESSION['CARRITOCOBRO'])) {
  

unset($_SESSION['CARRITOCOBRO']);
}

if (!empty($_SESSION['COBRO'])) {

unset($_SESSION['COBRO']);
}

?>
 <?php if(!empty($_SESSION['SEGUR'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['SEGUR'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>



<?php } ?>






<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">LISTADO DE CLIENTES PARA VENDER</h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Cliente #</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Whatsapp</th>
                            <th>Ver Ventas</th>
                            <th>Vender</th>
                            
                        </tr>
                      </thead>
                      <tbody>

                      <?php



   $sentencia=$pdo->prepare("SELECT * FROM clientes where ESTADO='CLIEN'  order by Nombre asc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);

?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>

  <td><?php echo $producto['SOCIO'] ?></td>
  <td  ><?php echo $producto['NOMBRE'] ?></td>
 
  <td><?php echo $producto['APELLIDO'] ?></td>
  <td><?php echo $producto['TELEFONO'] ?></td>
  <td>
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Vender">Vender</button> 
                            </form>
                            </td>
 <td>
 <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="VerVentas">Ver Ventas</button> 
                            </form>
                            </td>  
                  
                 </form>
                 </td>
                 
            
                 </tr>


                 <?php } ?>
                       


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
       


       <?php include 'templates/pie.php'; ?>