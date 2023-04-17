<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>


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
    <h3>  LISTADO DE VENTAS A:   <?php echo $producto['NOMBRE'] ?>  </h3>
    <?php } ?>  

  </h1>
  
  
  <div class="col-12">
              <form action="movStock.php" method="get" class="form-sample">
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

                  <br>

  
  
  
  
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order</th>
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

   $sentencia=$pdo->prepare("SELECT tblventas.ID,ctactes.ID AS IDCTA, date(tblventas.Fecha) as Fecha, tblventas.Correo ,ctactes.N°Comprobante as Observaciones ,tblventas.domicilio, tblventas.SOCIO , tblventas.status, tblventas.PayPalDatos , tbldetalleventa.IDPRODUCTO, tldproductos.Nombre , tbldetalleventa.CANTIDAD, tbldetalleventa.PRECIOUNITARIO FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID LEFT JOIN ctactes on tblventas.ID=ctactes.IDVENTA  where tblventas.SOCIO='$filtro' and ctactes.ver is NULL and (tblventas.Fecha BETWEEN date('$desde') AND date('$hasta')) ORDER by tblventas.Fecha desc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);

?>
 <?php $order=0;?>
<?php foreach($listaProductos as $producto) { ?>
  <tr>
<td width="10%" text-center ><?php $order=$order+1; echo ($order) ?></td> 
  <td><?php echo $producto['Fecha'] ?></td>
  <td  ><?php echo $producto['Observaciones'] ?></td>
 
  <td><?php echo $producto['Nombre'] ?></td>
  <td style="text-align:center ;"><?php echo $producto['CANTIDAD'] ?></td>
  <td style="text-align:center;">$<?php echo number_format($producto['PRECIOUNITARIO']*$producto['CANTIDAD'], 2, ',', ' ') ?>
  
  
  <?php $filtro2=$producto['IDCTA'] ?>
    <?php
            $sentencia=$pdo->prepare("SELECT ctactes.ID,ctactes.IDVENTA, SUM(tbldetalleventa.DESCARGADO) as CERRADO FROM `ctactes` INNER JOIN tbldetalleventa ON ctactes.IDVENTA=tbldetalleventa.IDVENTA  WHERE ctactes.ID='$filtro2' and ctactes.ver is null    GROUP BY ctactes.ID;");
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
