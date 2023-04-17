<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">LISTADO DE CUENTAS A PAGAR</h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                        <th>°</th>
                                
                        <th>Saldo</th>
                            <th></th>
                            <th>Proveedor</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                      </thead>
                      <tbody>

                      <?php



   $sentencia=$pdo->prepare("SELECT * FROM saldosCuentas where ESTADO='CLIEN' and Saldo >10  order by Saldo desc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);
$order=0;
?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>
  
  
  <td width="10%" text-center ><?php $order=$order+1; echo ($order) ?></td> 
  <td><?php echo "$".number_format($producto['Saldo'], 2, ',', ' ') ?></td>
  
  <td></td>
  <td  ><?php echo $producto['NOMBRE'] ?></td>
 
 
   <td>
 <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="VerCompras">Ver Compras</button> 
                            </form>
                            </td>  
                

 <td>
 <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="VerCuenta">Ver Cuenta</button> 
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
          <div style="align:right;"><a href="excelCuentasCobrar.php?"><button type="button" class="btn btn-secondary">Exportar a Excel</button></a></div> 

        </div>

        </div></div>
       <?php include 'templates/pie.php'; ?>