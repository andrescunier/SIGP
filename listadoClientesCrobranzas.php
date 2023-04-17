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
              <h1 class="card-title">LISTADO DE CLIENTES PARA COBRAR</h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Cliente #</th>
                            <th>Nombre</th>
                            <th>Whatsapp</th>
 
                           <th>Cobrar</th>
                           <th>Devolver</th>
 
                           <th>Ver CtaCte</th>

                            
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
 
  <td><?php echo $producto['TELEFONO'] ?></td>


  
  <td>
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Agregar">Cobrar</button> 
                            </form>
                            </td>
                          

  
  <td>
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Devolver">Delvover</button> 
                            </form>
                            </td>
                          
 <td>
 <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="VerCuenta">Ver CtaCte</button> 
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