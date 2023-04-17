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
    <h3>  LISTADO DE COMPRAS A:   <?php echo $producto['NOMBRE'] ?>  </h3>
    <?php } ?>  

  </h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Comprobante</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                           
                            
                        </tr>
                      </thead>
                      <tbody>

                      <?php

//where tblventas.SOCIO='$filtro'

   $sentencia=$pdo->prepare("SELECT tblventas.ID,ctactes.ID AS IDCTA, date(tblventas.Fecha) as Fecha, tblventas.Correo ,ctactes.N°Comprobante as Observaciones ,tblventas.domicilio, tblventas.SOCIO , tblventas.status, tblventas.PayPalDatos , tbldetalleventa.IDPRODUCTO, tldproductos.Nombre , tbldetalleventa.CANTIDAD, tbldetalleventa.PRECIOUNITARIO FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID LEFT JOIN ctactes on tblventas.ID=ctactes.IDVENTA  where tblventas.SOCIO='$filtro' and ctactes.ver is NULL ORDER by tblventas.Fecha desc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);

?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>

  <td><?php echo $producto['Fecha'] ?></td>
  <td  ><?php echo $producto['Observaciones'] ?></td>
 
  <td><?php echo $producto['Nombre'] ?></td>
  <td style="text-align:center;"><?php echo number_format(1*$producto['CANTIDAD']*-1, 2, ',', ' ') ?></td>

  
  <td style="text-align:center;">$<?php echo number_format($producto['PRECIOUNITARIO']*$producto['CANTIDAD']*-1, 2, ',', ' ') ?>






  <?php $filtro2=$producto['IDCTA'] ?>
    <?php
            $sentencia=$pdo->prepare("SELECT ctactes.ID,ctactes.IDVENTA, SUM(tbldetalleventa.DESCARGADO) as CERRADO FROM `ctactes` INNER JOIN tbldetalleventa ON ctactes.IDVENTA=tbldetalleventa.IDVENTA  WHERE ctactes.ID='$filtro2'     GROUP BY ctactes.ID;");
            $sentencia->execute();
            $ctactes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          // print_r($ctactes);
           foreach($ctactes as $cta) {

if ( $cta['CERRADO']>-1) { ?><span>
              <form action="actualizaCtaCtesVentas.php" method="post">
              <input type="hidden"
              name="IDPAGO" 
              id="IDPAGO" 
              value="<?php echo ( $cta['IDVENTA']);?>">    
              <button class="btn btn-primary"  type="submit" name="btnAccion" >BORRAR</button> 
              </form>
</span>
              <?php
                 } 
                     else {
                     }
                    }
                    ?>

                
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
       




     
<?php
include 'templates/pie.php';
?>
