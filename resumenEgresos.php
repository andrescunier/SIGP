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



<?php 
if(isset($_GET['desde'])) {
$desde=$_GET['desde'];    // id index exists
$hasta=$_GET['hasta'];
    
}
else
{
$desde=date("Y-m")."-01";    
$hasta=date("Y-m-d");    


//echo $desde;
//echo $hasta;    
}



?>





<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">EGRESOS POR CUENTA:

<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

  <?php //echo $producto['DNI'] ?> 
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?> </h1>
              <div class="row">


              <div class="form-group row">
                  <form action="listadoIngresos.php" method="get" class="form-sample" target="_blank">
                  <p class="card-description">
                      Selector de filtro
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Desde</label>
                          <div class="col-sm-9">
                          <input class="form-control" type="date" id="fname" name="desde" value="<?php echo $desde?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hasta</label>
                          <div class="col-sm-9">
                          <input class="form-control" type="date" id="lname"  name="hasta" value="<?php echo $hasta?>">
 
                        
                        </div>
                        </div>

                      </div>

                    </div>
                   </div>
                   <div ><button  class="btn btn-secondary" type="submit" class="form-control" value="buscar">Buscar</button></div> 

                   


                  </form>
                </div>







                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                        <th>°</th>

                            
                            <th>Cuenta</th>
                            <th>Subcuenta</th>
                            <th>Importe</th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
                      <tr>






                            

                      <?php 
                      $order=0;                      //$filtro=$producto['DNI'] ?>
    <?php
            $sentencia=$pdo->prepare("SELECT cuentas.Cuenta,cuentas.subCuenta, SUM( tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO) AS TOTAL FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID  left join clientes ON tblctasctes.SOCIO=clientes.SOCIO left join  cuentas ON clientes.DOCUMENTO=cuentas.ID LEFT JOIN ctactes ON tblctasctes.ID=ctactes.IDPAGO  where  tblctasctes.status='Pago' AND tbldetallpagos.DESCARGADO>-1 AND (tblctasctes.Fecha BETWEEN date('$desde') AND date('$hasta')) GROUP BY cuentas.Cuenta, cuentas.subCuenta ORDER BY TOTAL DESC;");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>
  <td width="10%" text-center ><?php $order=$order+1; echo ($order) ?></td> 
       
                     <td width="30%" text-center><?php echo $producto['Cuenta'] ?></td>
                     <td width="30%"><?php echo $producto['subCuenta'] ?></td>
                                         
                     <td width="30%">$<?php echo number_format($producto['TOTAL'], 2, ',', ' ') ?></td>
                         
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


       </div>

        
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

       


       <?php include 'templates/pie.php'; ?>






