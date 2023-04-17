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
<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   


 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

<?php 
     $filtro=$producto['SOCIO'];
   //  print_r($filtro); aca meto la variable de socio en el filtro ?>




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
              <h1 class="card-title">

<?php
            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$filtro' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>

<?php foreach($listaProductos as $producto) { ?>
      LISTADO DE CTACTE DE:   <?php echo $producto['NOMBRE'] ?>  
    <?php } ?>    
              
              

 </h1>
              <div class="col-12">
              <form action="ctacteP.php" method="get" class="form-sample">
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




<?php

$SaldoComienzo=0;
$sentencia=$pdo->prepare("SELECT MovCtaCte as SALDO FROM ctactes where SOCIO='$filtro' and  (ctactes.FechaRecibo < date('$desde'))and Observaciones='Pesos' and ver is NULL;");
$sentencia->execute();
$SaldoInicial=$sentencia->fetchAll(PDO::FETCH_ASSOC);


//print_r($SaldoInicial);

  foreach($SaldoInicial as $salIni) { 
  $SaldoComienzo=$SaldoComienzo+$salIni['SALDO'];
  
   }

  // echo ($SaldoComienzo); aca calculo el saldo inicial
?>











                <div class="col-12">
                  <div class="table-responsive">
                  <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>°</th>

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







   $sentencia=$pdo->prepare("SELECT * FROM ctactes where SOCIO='$filtro' and Observaciones='Pesos' and  (ctactes.FechaRecibo BETWEEN date('$desde') AND date('$hasta')) and ver is NULL order by FechaRecibo asc , TipoPago asc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);

?>
<tr>
<td>0</td>

                            <td><?php echo ($desde)?></td>
                            <td>Saldo Inicial</td>
                            <td></td>
                            <td style="text-align:center ;"><?php echo "$".number_format($SaldoComienzo, 2, ',', ' ');?></td>
                            <td style="text-align:center ;"><?php echo "$".number_format($SaldoComienzo, 2, ',', ' ');?></td>
       </tr>

<!-- Saco el saldo total -->
 <h1><?php  foreach($SaldoTotal as $Saldito) { 
$SaldoUsar=$Saldito['SALDO'];
$order=0;
$SaldoUsar=0;
 } ?></h1>
<?php 

$SaldoUsar=$SaldoComienzo;

foreach($listaProductos as $producto) { ?>
  <tr>
 <td width="10%" text-center ><?php $order=$order+1; echo ($order) ?></td> 
<td width="10%" text-center ><?php echo $producto['FechaRecibo'] ?></td>
 

  <td  ><?php  if ( $producto['TipoPago']=="caja") {
             echo "Pago";
                     } 
                     else {
                        echo $producto['TipoPago'];
                     }?></td>
  <td><?php echo $producto['N°Comprobante'] ?></td>
  <td style="text-align:center ;"><?php echo "$".number_format($producto['MovCtaCte'], 2, ',', ' ') ?></td>
                   
  <td style="text-align:center;"><?php echo "$".number_format($SaldoUsar+$producto['MovCtaCte'], 2, ',', ' ') ?>  <?php  $SaldoUsar+=$producto['MovCtaCte'] ?>
                 
  <?php $filtro2=$producto['ID'] ?>













  
    <?php
            $sentencia=$pdo->prepare("SELECT ctactes.ID,ctactes.IDPAGO, SUM(tbldetallpagos.DESCARGADO) as CERRADO FROM `ctactes` INNER JOIN tbldetallpagos ON ctactes.IDPAGO=tbldetallpagos.IDVENTA WHERE ctactes.ID='$filtro2'     GROUP BY ctactes.ID;");
            $sentencia->execute();
            $ctactes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          // print_r($ctactes);
           foreach($ctactes as $cta) {

if ( $cta['CERRADO']>-1) { ?><span>
              <form action="actualizaCtaCtes.php" method="post">
              <input type="hidden"
              name="IDPAGO" 
              id="IDPAGO" 
              value="<?php echo ( $cta['IDPAGO']);?>">    
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
            <div style="align:right;"><a href="excelCuentaProveedor.php?desde=<?php echo $desde?>&hasta=<?php echo $hasta?>&filtro=<?php echo $filtro?>&SaldoComienzo=<?php echo $SaldoComienzo?>"><button type="button" class="btn btn-secondary">Exportar a Excel</button></a></div> 

          </div>
 
        </div>


        </div>
                </div>
              </div>
            </div>
          </div>

        <?php include 'templates/pie.php'; ?>









