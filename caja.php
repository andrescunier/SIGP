<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
$saldo=0;
?>
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Movimiento de Caja</h4>
                  <p class="card-description">
                  <h3>Resumen de Ingresos</h3></p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Origen</th>
                          <th>Medio</th>
                          <th>Observaciones</th>
                          <th>Importe</th>
                          <th>Saldo</th>
                        </tr>
                      </thead>
                      <tbody>


                          <?php
                            $sentencia=$pdo->prepare('SELECT clientes.Nombre as Cuenta,MediosDePago.Medio AS MEDIO,tblctasctes.status AS TIPOPAGO ,sum(tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO) AS TOTAL from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO  where ( tblctasctes.status="Cobro" and tbldetallpagos.DESCARGADO=0)
                             GROUP BY Cuenta, MediosDePago.Medio , tblctasctes.status');
                            $sentencia->execute();
                            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                          ?>
         
 
                       <?php $saldo=0 ?>
                      <?php foreach($listaProductos as $producto) { ?>
        
                   
                   
                       <tr>
                                                <td width="20%" ><?php echo $producto['Cuenta'] ?></td>
                       <td width="20%" ><?php echo $producto['MEDIO'] ?></td>

                       
                       <td width="15%" ></td>
                       <td width="20%" text-right >$<?php echo $producto['TOTAL']  ?></td>
                       
                       <?php $saldo+=$producto['TOTAL'] ?>
                       <td width="20%" text-right> $<?php echo $saldo ?></td>
                       

                       
                       </tr>
                        
                      <?php } ?>
                    </tbody>
                    </table>
                    <h3>Ingresos Totales $<?php echo $saldo ?></h3>

            
                  </div>
                </div>
              </div>
            
            </div>
           




            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <p class="card-description">
                  <h3>Detalle de Egresos</h3></p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th >Medio</th>
      <th >Proveedor</th>
      <th >Comprobante</th>
      <th >Importe</th>
      <th >Saldo</th>
                        </tr>
                      </thead>
                      <tbody>



                      <?php
            $sentencia=$pdo->prepare('SELECT MediosDePago.Medio AS MEDIO,clientes.Nombre AS GASTO ,tblctasctes.status AS TIPOPAGO ,tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO AS TOTAL , ctactes.N°Comprobante as COMPROBANTE from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO LEFT JOIN ctactes ON tblctasctes.id=ctactes.IDPAGO where (tblctasctes.status="Pago" and tbldetallpagos.DESCARGADO=0)
ORDER BY MediosDePago.Medio ASC,tblctasctes.ID ASC , tblctasctes.status');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>

         
<?php $saldo=0 ?>
         <?php foreach($listaProductos as $producto) { ?>
         
                   
                   
          <tr>
          <tr>
                        <td width="20%"><?php echo $producto['MEDIO'] ?></td>
                        <td width="15%"><?php echo $producto['GASTO']  ?></td>
                        <td width="20%" text-right ><?php echo $producto['COMPROBANTE']  ?></td>
                        <td width="15%" text-right>$<?php echo $producto['TOTAL']  ?></td>
                        
                        <?php $saldo+=$producto['TOTAL'] ?>
                        <td width="20%" text-right> $<?php echo $saldo ?></td>
                        
                        
                        
                        </tr>
                       
                        
                      <?php } ?>
                    </tbody>
                    </table>
<h3>Egresos Totales $<?php echo $saldo ?></h3>

            
                  </div>
                </div>
              </div>
            
            </div>
























            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <p class="card-description">
                  <h3>Saldos</h3></p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th width="20%" text-right>Medio</th>
      <th width="15%" text-right></th>
      <th width="20%" text-right></th>
      <th width="20%" text-right></th>
      <th width="15%" text-right>Importe</th>
      <th width="20%" text-right>Saldo</th>
                        </tr>
                      </thead>
                      <tbody>



                      <?php

$sentencia=$pdo->prepare('SELECT MediosDePago.Medio AS MEDIO,sum(tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO) AS TOTAL from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO  where tbldetallpagos.DESCARGADO=0
GROUP BY MediosDePago.Medio');
$sentencia->execute();
$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos);

?>

         
<?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
         
                   
                   
          <tr>
          <tr>
          <td width="20%"><?php echo $producto['MEDIO'] ?></td>
                        <td width="15%"></td>
                        <td width="20%" text-right ></td>
                        <td width="20%" text-right></td>
                        <td width="15%" text-right>$<?php echo $producto['TOTAL']  ?></td>
                        
                        <?php $saldo+=$producto['TOTAL'] ?>
                        <td width="20%" text-right> $<?php echo $saldo ?></td>
                        
                        
                        </tr>
                       
                        
                      <?php } ?>
                    </tbody>
                    </table>
                    <h3>Caja Total $<?php echo $saldo ?></h3>

            


                  
<a href="formularioCierreCaja.php" class="btn btn-danger float-right mt-4"><i class="ti-back-left"></i>CERRAR CAJA</a>

                    
                  </div>
                </div>
              </div>
            
            </div>








































































     




</div>
<?php

include 'templates/pie.php';
?>