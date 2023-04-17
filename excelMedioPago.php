<?php 


include 'segur.php';
include 'carrito.php';



header("Pragma: public");
header("Expires: 0");
$filename = "MedioPago.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>




<?php 
if(isset($_GET['desde'])) {
$desde=$_GET['desde'];    // id index exists
$hasta=$_GET['hasta'];
$Saldo=$_GET['Saldo'];    // id index exists
$filtro=$_GET['filtro'];
$movimiento=$_GET['movimiento'];
$origen=$_GET['origen'];



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
                            <th>Origen</th>
                            <th>Medio</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
       
 
 
                      <?php
            $sentencia=$pdo->prepare("SELECT tblctasctes.ID,tblctasctes.Fecha,tblctasctes.Correo ,clientes.APELLIDO,clientes.NOMBRE,tblctasctes.domicilio,tblctasctes.SOCIO ,tblctasctes.status,tblctasctes.PayPalDatos , tbldetallpagos.IDPRODUCTO, MediosDePago.Medio , tbldetallpagos.CANTIDAD, tbldetallpagos.PRECIOUNITARIO FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID  left join clientes ON tblctasctes.SOCIO=clientes.SOCIO  where  tbldetallpagos.IDPRODUCTO='$filtro' and CASE WHEN '$origen'='TODOS' THEN clientes.NOMBRE=clientes.NOMBRE  ELSE clientes.NOMBRE='$origen' END and CASE WHEN '$movimiento'='TODOS' THEN tblctasctes.status=tblctasctes.status  ELSE tblctasctes.status='$movimiento' END and (tblctasctes.Fecha <('$desde') ) and tbldetallpagos.DESCARGADO>-1 ORDER by tblctasctes.Fecha asc");
            $sentencia->execute();
            $SaldoInicial=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $Saldo=0;





    
  foreach($SaldoInicial as $salIni) { 
    $Saldo=$Saldo+($salIni['CANTIDAD']*$salIni['PRECIOUNITARIO']);
    
     }
  
    
         ?>
 
 
 
 
 
                      <td>0</td>

                      <td><?php echo $desde?></td>
                      <td>Saldo Inicial</td>
                      <td>Origen</td>
                      <td>Medio</td>
                      <td style="text-align:center ;"><?php echo "$".number_format($Saldo, 2, ',', ' ');?></td>
                            <td style="text-align:center ;"><?php echo "$".number_format($Saldo, 2, ',', ' ');?></td>

 
 
 
 
 
 
 
 
 
 
 
 
 <?php
            $sentencia=$pdo->prepare("SELECT tblctasctes.ID,tblctasctes.Fecha,tblctasctes.Correo ,clientes.APELLIDO,clientes.NOMBRE,tblctasctes.domicilio,tblctasctes.SOCIO ,tblctasctes.status,tblctasctes.PayPalDatos , tbldetallpagos.IDPRODUCTO, MediosDePago.Medio , tbldetallpagos.CANTIDAD, tbldetallpagos.PRECIOUNITARIO FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID  left join clientes ON tblctasctes.SOCIO=clientes.SOCIO  where  tbldetallpagos.IDPRODUCTO='$filtro' and CASE WHEN '$origen'='TODOS' THEN clientes.NOMBRE=clientes.NOMBRE  ELSE clientes.NOMBRE='$origen' END and CASE WHEN '$movimiento'='TODOS' THEN tblctasctes.status=tblctasctes.status  ELSE tblctasctes.status='$movimiento' END and (tblctasctes.Fecha BETWEEN date('$desde') AND date('$hasta')) and tbldetallpagos.DESCARGADO>-1 ORDER by tblctasctes.Fecha asc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $order=0;
         ?>
 







<?php foreach($listaProductos as $producto) { ?>
  <tr>
  <td width="10%" text-center ><?php $order=$order+1; echo ($order) ?></td> 
         
  <td width="10%" text-center ><?php echo date($producto['Fecha']) ?></td>
                     <td width="20%" text-center><?php echo $producto['status']." N° ".$producto['ID'] ?></td>
                     <td width="20%"><?php echo $producto['NOMBRE']." ".$producto['APELLIDO'] ?></td>
                     
                     <td width="20%"><?php echo $producto['Medio'] ?></td>
                     
                     <td width="15%">$<?php echo number_format($producto['CANTIDAD']*$producto['PRECIOUNITARIO'], 2, ',', ' ') ?></td>
                     <?php  $Saldo+=$producto['CANTIDAD']*$producto['PRECIOUNITARIO']?>
                     <td width="15%"><?php echo number_format($Saldo, 2, ',', ' ') ?></td>
                         
                         </td>
                     </tr>
                     


                 <?php } ?>
                       


                      </tbody>
                    </table> 
