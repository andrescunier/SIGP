<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
$articulo=$_GET['id'];

?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><div>Cierre de Caja  N: <?php ECHO  $articulo?> </div>
</h4>
                  <p class="card-description">
                


<?php
            $sentencia=$pdo->prepare("SELECT cierresCaja.Numero AS CIERRE,cierresCaja.Fecha AS FECHACIERRE,MAX(ctactes.FechaRecibo) AS FECHACAJA FROM `tbldetallpagos` INNER JOIN cierresCaja ON tbldetallpagos.DESCARGADO=cierresCaja.Numero INNER JOIN ctactes ON tbldetallpagos.IDVENTA=ctactes.IDPAGO WHERE cierresCaja.Numero='$articulo' GROUP BY CIERRE;");







            $sentencia->execute();
            $listado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    

         ?>
 <?php foreach($listado as $lista) { ?>
<div><h4>Corresponde al día: <?php  $newDate = date("d/m/Y", strtotime($lista['FECHACAJA'])); echo $newDate?></h4></div>
  <?php } ?>
  <div class="table-responsive">
                   
 <h3>Resumen de Ingresos</h3>
           <?php
            $sentencia=$pdo->prepare("SELECT clientes.Nombre as Cuenta, MediosDePago.Medio AS MEDIO,tblctasctes.status AS TIPOPAGO ,tblctasctes.Fecha AS FECHA,sum(tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO) AS TOTAL from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO  where ( tblctasctes.status='Cobro' and tbldetallpagos.DESCARGADO='$articulo') 
GROUP BY Cuenta,MediosDePago.Medio , tblctasctes.status");







            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
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
  <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
           
                    
                    
                        <tr>
                        <td width="20%"><?php echo $producto['Cuenta'] ?></td>
                        <td width="15%"><?php echo $producto['MEDIO'] ?></td>
                        <td width="20%" text-right ></td>
                        <td width="20%" text-right></td>
                        <td width="15%" text-right>$<?php echo $producto['TOTAL']  ?></td>
                        
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







   <?php
            $sentencia=$pdo->prepare("SELECT MediosDePago.Medio AS MEDIO,clientes.Nombre AS GASTO ,tblctasctes.status AS TIPOPAGO ,tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO AS TOTAL , ctactes.N°Comprobante as COMPROBANTE from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO LEFT JOIN ctactes ON tblctasctes.id=ctactes.IDPAGO where (tblctasctes.status='Pago' and tbldetallpagos.DESCARGADO='$articulo')
ORDER BY MediosDePago.Medio ASC,tblctasctes.ID ASC , tblctasctes.status");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
      <th width="20%" text-right>Medio</th>
      <th width="15%" text-right>Proveedor</th>
      <th width="20%" text-right>Comprobante</th>
      <th width="20%" text-right></th>
      <th width="15%" text-right>Importe</th>
      <th width="20%" text-right>Saldo</th>
    </tr>
  </thead>
  <tbody>
  <?php $saldo=0 ?></td>









         <?php foreach($listaProductos as $producto) { ?>
 
               
                    
                    
                        <tr>
                        <td width="20%"><?php echo $producto['MEDIO'] ?></td>
                        <td width="15%"><?php echo $producto['GASTO']  ?></td>
                        <td width="20%" text-right ><?php echo $producto['COMPROBANTE']  ?></td>
                        <td width="20%" text-right></td>
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
                  <h3>Saldos</h3>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>

           <?php

            $sentencia=$pdo->prepare("SELECT MediosDePago.Medio AS MEDIO,sum(tbldetallpagos.CANTIDAD * tbldetallpagos.PRECIOUNITARIO) AS TOTAL from tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago on tbldetallpagos.IDPRODUCTO=MediosDePago.ID LEFT JOIN clientes ON tblctasctes.SOCIO=clientes.SOCIO  where tbldetallpagos.DESCARGADO='$articulo'
GROUP BY MediosDePago.Medio");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         
      <th width="20%" text-right>Medio</th>
      <th width="15%" text-right></th>
      <th width="20%" text-right></th>
      <th width="20%" text-right></th>
      <th width="15%" text-right>Importe</th>
      <th width="20%" text-right>Saldo</th>
    </tr>
  </thead>
  <tbody>
      <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
        
 
               
                    
                    
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




</div>
                </div>
              </div>
            
            </div>





    </div>
</div>
   
  
<?php

include 'templates/pie.php';
?>