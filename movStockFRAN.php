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
              <h1 class="card-title">LISTADO DE MOVIMIENTO DE MEDIO DE PAGO N°:

<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

  <?php echo $producto['DNI'] ?> 
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?> </h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Movimiento</th>
                            <th>Origen</th>
                            <th>Medio</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
       
                      <?php $filtro=$producto['DNI'] ?>
    <?php
            $sentencia=$pdo->prepare("SELECT tblctasctes.ID,tblctasctes.Fecha,tblctasctes.Correo ,clientes.APELLIDO,clientes.NOMBRE,tblctasctes.domicilio,tblctasctes.SOCIO ,tblctasctes.status,tblctasctes.PayPalDatos , tbldetallpagos.IDPRODUCTO, MediosDePago.Medio , tbldetallpagos.CANTIDAD, tbldetallpagos.PRECIOUNITARIO FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID  left join clientes ON tblctasctes.SOCIO=clientes.SOCIO  where  (tbldetallpagos.IDPRODUCTO=1 or tbldetallpagos.IDPRODUCTO=5)  and tbldetallpagos.DESCARGADO>0 ORDER by tblctasctes.Fecha asc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>
              <td width="10%" text-center ><?php echo date($producto['Fecha']) ?></td>
                     <td width="20%" text-center><?php echo $producto['status']." N° ".$producto['ID'] ?></td>
                     <td width="20%"><?php echo $producto['NOMBRE']." ".$producto['APELLIDO'] ?></td>
                     
                     <td width="20%"><?php echo $producto['Medio'] ?></td>
                     
                     <td width="15%">$<?php echo number_format($producto['CANTIDAD']*$producto['PRECIOUNITARIO'], 2, ',', ' ') ?></td>
                     <?php  $saldo+=$producto['CANTIDAD']*$producto['PRECIOUNITARIO']?>
                     <td width="15%"><?php echo number_format($saldo, 2, ',', ' ') ?></td>
                         
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