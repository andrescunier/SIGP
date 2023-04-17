<?php 


include 'segur.php';
include 'carrito.php';



header("Pragma: public");
header("Expires: 0");
$filename = "Compras.xls";
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
                        <th width="8%" text-right>Fecha </th>    
    

                        <th width="8%" text-right>Razon Social</th>
    <th width="8%" text-right>CUIT</th>
    <th width="8%" text-right>Tipo Comp</th>
    <th width="8%" text-right>Comprobante</th>
    <th width="8%" text-right>Imp. Neto Grabado</th>
    <th width="8%" text-right>Neto No Grabado</th>
   
    <th width="8%" text-right>IVA 10,5%</th>
    <th width="8%" text-right>IVA 21  %</th>
    <th width="8%" text-right>IVA 27  %</th>
    <th width="8%" text-right>PERC IVA</th>
    <th width="8%" text-right>PERC IIBB</th>
    <th width="8%" text-right>Imp. Total</th>
                            
                        </tr>
                      </thead>
                      <tbody>
       
                      <?php
            $sentencia=$pdo->prepare("SELECT `FechaRecibo` as Fecha ,`NOMBRE`,`CUIT`,`N°Comprobante`,`TOTAL`,`IVA21`,`IVA105`,`IVA27`,`PERCIIBB`,`PERCIVA`,`IVA21`/0.21+`IVA105`/0.105+`IVA27`/0.27 as NETO ,`TOTAL`*-1 -( `IVA21`/0.21+`IVA105`/0.105+`IVA27`/0.27 +`PERCIIBB`+`PERCIVA`+`IVA21`+`IVA105`+`IVA27`) as NOGRAB FROM `IVACOMPRAS1` WHERE  (FechaRecibo BETWEEN date('$desde') AND date('$hasta')) ORDER BY `FechaRecibo` desc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
  <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
  <tr>
  <td width="8%"><?php $date=date_create($producto['Fecha']) ; echo date_format($date,"Y/m/d") ?></td>
                      
                      <td width="8%" text-right><?php echo $producto['NOMBRE']  ?></td>
                      <td width="8%" text-right><?php echo $producto['CUIT']  ?></td>
                      <td width="8%" text-right>-------</td>
                      <td width="8%" text-right><?php echo $producto['N°Comprobante'] ?></td>
              
                      <td width="8%" text-right> <?php echo number_format($producto['NETO']*-1,2)  ?></td>
                      <td width="8%" text-right> <?php
                      IF($producto['NOGRAB']*-1<2){
                        echo "0";
                      }
                      else
                      {echo number_format($producto['NOGRAB']*-1,2); }
                      
                       ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['IVA105']*-1,2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['IVA21']*-1,2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['IVA27']*-1,2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['PERCIVA']*-1,2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['PERCIIBB']*-1,2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['TOTAL'],2)  ?></td>
                            
                     </tr>
                     


                 <?php } ?>
                       


                      </tbody>
                    </table>
 
