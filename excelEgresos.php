<?php 


include 'segur.php';
include 'carrito.php';



header("Pragma: public");
header("Expires: 0");
$filename = "Egresos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

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
       
                      <?php
            $sentencia=$pdo->prepare("SELECT tblctasctes.ID,tblctasctes.Fecha,ctactes.N°Comprobante,tblctasctes.Correo ,clientes.APELLIDO,clientes.NOMBRE,tblctasctes.domicilio,tblctasctes.SOCIO ,tblctasctes.status,tblctasctes.PayPalDatos , tbldetallpagos.IDPRODUCTO, MediosDePago.Medio , tbldetallpagos.CANTIDAD, tbldetallpagos.PRECIOUNITARIO FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID  left join clientes ON tblctasctes.SOCIO=clientes.SOCIO LEFT JOIN ctactes ON tblctasctes.ID=ctactes.IDPAGO  where  tblctasctes.status='Pago' AND tbldetallpagos.DESCARGADO>-1  AND (tblctasctes.Fecha BETWEEN date('$desde') AND date('$hasta'))  ORDER by tblctasctes.Fecha asc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
  <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
  <tr>
  <td width="10%" text-center ><?php echo date($producto['Fecha']) ?></td>
                     <td width="20%" text-center><?php echo $producto['NºCOMPROBANTE'] ?></td>
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
 
