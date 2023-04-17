<?php 


include 'segur.php';
include 'carrito.php';



header("Pragma: public");
header("Expires: 0");
$filename = "CuentaCliente.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>




<?php 
if(isset($_GET['desde'])) {
$desde=$_GET['desde'];    // id index exists
$hasta=$_GET['hasta'];
$SaldoComienzo=$_GET['SaldoComienzo'];    // id index exists
$filtro=$_GET['filtro'];
    
}
else
{
$desde=date("Y-m")."-01";    
$hasta=date("Y-m-d");    


//echo $desde;
//echo $hasta;    
}




?>


<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   


 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>




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
                
  <tr>
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
                            <td style="text-align:center ;"><?php echo number_format($SaldoComienzo, 2, ',', ' ');?></td>
                            <td style="text-align:center ;"><?php echo number_format($SaldoComienzo, 2, ',', ' ');?></td>
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
  <td style="text-align:center ;"><?php echo $producto['MovCtaCte'] ?></td>
                   
  <td style="text-align:center;"><?php echo $SaldoUsar+$producto['MovCtaCte'] ?>  <?php  $SaldoUsar+=$producto['MovCtaCte'] ?>
                 
  <?php $filtro2=$producto['ID'] ?>













  
   
                          
                     </tr>
                     


                 <?php } ?>
                       


                      </tbody>
                    </table>
 
