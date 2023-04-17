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
              <h1 class="card-title">LISTADO IVA VENTAS

 </h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                        <th width="8%" text-right>Fecha </th>    
    

    <th width="8%" text-right>Numero</th>
    <th width="8%" text-right>Actividad</th>

    <th width="8%" text-right>Imp. Neto Grabado</th>
   
    <th width="8%" text-right>IVA</th>
    <th width="8%" text-right>Imp. Total</th>

                            
                        </tr>
                      </thead>
                      <tbody>
       
                      <?php
            $sentencia=$pdo->prepare('SELECT  tblventas.Fecha,clientes.NOMBRE,ctactes.N°Comprobante ,sum((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21) as NETO, sum((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)-((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21)) AS IVA , sum(tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO) as TOTAL FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID  left join clientes ON tblventas.SOCIO=clientes.SOCIO LEFT JOIN ctactes on tblventas.ID=ctactes.IDVENTA  WHERE tblventas.SOCIO=12 GROUP BY ctactes.N°Comprobante');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
  <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
  <tr>
  <td width="8%"><?php $date=date_create($producto['Fecha']) ; echo date_format($date,"d/m/Y") ?></td>
                      
                      <td width="8%" text-right>CIERRE ZETA</td>
                      <td width="8%" text-right><?php echo substr($producto['N°Comprobante'], -4) ?></td>
                      
              
                      <td width="8%" text-right> <?php echo number_format($producto['NETO'],2)  ?></td>
           
                      <td width="8%" text-right> <?php echo number_format($producto['IVA'],2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['TOTAL'],2)  ?></td>
                            
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













 <div class="content-wrapper">
       
        <div class="card">
            <div class="card-body">
             <a href="excelIvaVentas.php"><h1 class="card-title">ENVIAR INFORME A EXCEL

 </h1></a>
              <div class="row">
          <form action="excelIvaVentas.php">
           <div class="col-md-12">
           <div class="col-md-6 form-control">
              <input type="date" class="form-control">
             
           </div>
            <div class="col-md-6">
              <input type="date" class="form-control">
             
           </div>
             </div>
    <button class="btn btn-warning" type="submit">Filtrar</button>
              
          </form>
          
              </div>
            </div>
          </div>
        </div>

        
        </div>
        </div>
       


       <?php include 'templates/pie.php'; ?>