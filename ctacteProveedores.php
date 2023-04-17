<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>
<br>
<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

<?php $filtro=$producto['SOCIO'] ?>

<?php
            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$filtro' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>








<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">

<?php foreach($listaProductos as $producto) { ?>
    <h3>  LISTADO DE CTACTE DE:   <?php echo $producto['NOMBRE'] ?>  </h3>
    <?php } ?>  

  </h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Movimiento</th>
                            <th>Comprobante</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                           
                            
                        </tr>
                      </thead>
                      <tbody>

                      <?php

//where tblventas.SOCIO='$filtro'








$sentencia=$pdo->prepare("SELECT SUM(MovCtaCte)as SALDO FROM ctactes where SOCIO='$filtro' and Observaciones='Pesos' and ver is NULL;");
$sentencia->execute();
$SaldoTotal=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos);







   $sentencia=$pdo->prepare("SELECT * FROM ctactes where SOCIO='$filtro' and Observaciones='Pesos' and ver is NULL order by FechaRecibo desc, N°comprobante asc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);

?>
 <h1><?php  foreach($SaldoTotal as $Saldito) { 
$SaldoUsar=$Saldito['SALDO'];

 } ?></h1>
<?php foreach($listaProductos as $producto) { ?>
  <tr>

  <td><?php echo $producto['FechaRecibo'] ?></td>
  <td  ><?php  if ( $producto['TipoPago']=="caja") {
             echo "Pago";
                     } 
                     else {
                        echo $producto['TipoPago'];
                     }?></td>
 
  <td><?php echo $producto['N°Comprobante'] ?></td>
  <td style="text-align:center ;"><?php echo "$".$producto['MovCtaCte'] ?></td>
                   
  <td style="text-align:center;"><?php echo "$".number_format($SaldoUsar-$saldo, 2, ',', ' ') ?></td>
  <?php  $saldo+=$producto['MovCtaCte'] ?>
                 
  <?php $filtro2=$producto['ID'] ?>
    <?php
            $sentencia=$pdo->prepare("SELECT ctactes.ID,ctactes.IDPAGO, SUM(tbldetallpagos.DESCARGADO) as CERRADO FROM `ctactes` INNER JOIN tbldetallpagos ON ctactes.IDPAGO=tbldetallpagos.IDVENTA WHERE ctactes.ID='$filtro2'     GROUP BY ctactes.ID;");
            $sentencia->execute();
            $ctactes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          // print_r($ctactes);
           foreach($ctactes as $cta) {

if ( $cta['CERRADO']==0) { ?>
              <form action="actualizaCtaCtes.php" method="post">
              <input type="hidden"
              name="IDPAGO" 
              id="IDPAGO" 
              value="<?php echo ( $cta['IDPAGO']);?>">    
              <button class="btn btn-primary"  type="submit" name="btnAccion" >BORRAR</button> 
              </form>
              </td>
              <?php
                 } 
                     else {
                      ;
                     }
                    }
                    ?>







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
       




     
<?php
include 'templates/pie.php';
?>
