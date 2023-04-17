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
              <h1 class="card-title">LISTADO DE PLAN DE CUENTAS:

<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?> </h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Cuenta</th>
                            <th>Sub Cuenta</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
       
    <?php
            $sentencia=$pdo->prepare("SELECT * from cuentas");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>
  <td width="20%" text-center ><?php echo $producto['Codigo'] ?></td>
                         <td width="20%" class="buscar" text-center><?php echo $producto['Cuenta'] ?></td>
                         <td width="20%" class="buscar" text-center><?php echo $producto['subCuenta'] ?></td></td>
                         <td width="20%" class="buscar" text-center></td>

                            <td width="10%">
                         
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['ID']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="ModificarCuentas">Modificar Datos</button> 
                            </form>
                            </td>
                          
                            <td width="10%">
                         
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['Codigo']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="VerMovCuenta">Ver Movimientos</button> 
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







         
         
        
         <table class="table table-striped">
             <thead colspan="5">
                  <tr>
                     
                     <th width="10%" text-center>Fecha</th>
                     <th width="20%" text-center>Comprobante</th>
                     <th width="20%" text-center>Cliente/Prove</th>
                     <th width="20%" text-center>Descripcion</th>
                     
                     <th width="15%" text-center>Importe</th>
                     <th width="15%" text-center>Saldo</th>
                                             </tr>
                                             </thead>
</table>         

<?php foreach($listaProductos as $producto) { ?>
    
    <table class="table">
           
           <tbody class="buscar">
                   
                 
             </tbody>
             </table>      
                     <?php } ?>