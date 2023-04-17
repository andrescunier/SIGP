<?php 


include 'segur.php';
include 'carrito.php';



header("Pragma: public");
header("Expires: 0");
$filename = "Cuenta.xls";
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
$origen=$_GET['origen'];    // id index exists
$movimiento=$_GET['movimiento'];
$cuentaCont=$_GET['cuentaCont'];
$Saldo=$_GET['SaldoComienzo'];    // id index exists

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
                            <th>Movimiento/Compro</th>
                            <th>Entidad</th>
                            <th>Cuenta</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
       
 
 
   
 
 
 
 
                      <td>0</td>

                      <td><?php echo $desde?></td>
                      <td>Saldo Inicial</td>
                      <td></td>
                      <td></td>
                      <td style="text-align:center ;"><?php echo "$".number_format($Saldo, 2, ',', ' ');?></td>
                            <td style="text-align:center ;"><?php echo "$".number_format($Saldo, 2, ',', ' ');?></td>

 
 
 
 
 
 
 
 
 
 
 
 
 <?php
            $sentencia=$pdo->prepare("SELECT * from informectactes2 where  cuenta='$cuentaCont' and  CASE WHEN '$origen'='TODOS' THEN informectactes2.Subcuenta=informectactes2.Subcuenta  ELSE informectactes2.Subcuenta='$origen' END and CASE WHEN '$movimiento'='TODOS' THEN informectactes2.TipoPago=informectactes2.TipoPago  ELSE informectactes2.TipoPago='$movimiento' END and (informectactes2.FechaRecibo BETWEEN date('$desde') AND date('$hasta'))  ORDER by informectactes2.FechaRecibo asc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $order=0;
         ?>
 







<?php foreach($listaProductos as $producto) { ?>
  <tr>
  <td width="10%" text-center ><?php $order=$order+1; echo ($order) ?></td> 
         
  <td width="10%" text-center ><?php echo date($producto['FechaRecibo']) ?></td>
                     <td width="20%" text-center><?php echo $producto['TipoPago']." N° ".$producto['Comprobante'] ?></td>
                     <td width="20%"><?php echo $producto['NOMBRE'] ?></td>
                     
                     <td width="20%"><?php echo $producto['Cuenta']."/".$producto['subCuenta'] ?></td>
                     
                     <td width="15%">$<?php echo number_format($producto['Importe'], 2, ',', ' ') ?></td>
                     <?php  $Saldo+=$producto['Importe']?>
                     <td width="15%"><?php echo number_format($Saldo, 2, ',', ' ') ?></td>
                         
                         </td>
                     </tr>
                     


                 <?php } ?>
                       


                      </tbody>
                    </table>
