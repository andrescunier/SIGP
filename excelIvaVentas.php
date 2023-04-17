<?php 


include 'segur.php';
include 'carrito.php';



header("Pragma: public");
header("Expires: 0");
$filename = "IvaVentas.xls";
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
    

    <th width="8%" text-right>Numero</th>
    <th width="8%" text-right>Actividad</th>

    <th width="8%" text-right>Imp. Neto Grabado</th>
   
    <th width="8%" text-right>IVA</th>
    <th width="8%" text-right>Imp. Total</th>

                            
                        </tr>
                      </thead>
                      <tbody>
       
                      <?php
            $sentencia=$pdo->prepare("SELECT  tblventas.Fecha,clientes.NOMBRE,'CETA' as TipoCompro,ctactes.N°Comprobante ,sum((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21) as NETO, sum((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)-((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21)) AS IVA , sum(tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO) as TOTAL FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID  left join clientes ON tblventas.SOCIO=clientes.SOCIO LEFT JOIN ctactes on tblventas.ID=ctactes.IDVENTA   WHERE tblventas.SOCIO=12 AND (tblventas.Fecha BETWEEN date('$desde') AND date('$hasta')) AND tbldetalleventa.DESCARGADO >-1
            GROUP BY `Fecha`,clientes.NOMBRE,ctactes.N°Comprobante
            UNION
            SELECT  tblventas.Fecha,clientes.NOMBRE,comprobantes.descripcion as TipoCompro,ctactes.N°Comprobante ,sum((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21) as NETO, sum((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)-((tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO)/1.21)) AS IVA , sum(tbldetalleventa.CANTIDAD*tbldetalleventa.PRECIOUNITARIO) as TOTAL FROM tblventas LEFT JOIN tbldetalleventa on tblventas.ID=tbldetalleventa.IDVENTA LEFT JOIN tldproductos ON tbldetalleventa.IDPRODUCTO=tldproductos.ID  left join clientes ON tblventas.SOCIO=clientes.SOCIO LEFT JOIN ctactes on tblventas.ID=ctactes.IDVENTA LEFT JOIN comprobantes on ctactes.TIpoComp=comprobantes.cod   WHERE clientes.ESTADO<>'Prove' AND tblventas.SOCIO<>12 AND comprobantes.id in (1,3) AND(tblventas.Fecha BETWEEN date('$desde') AND date('$hasta')) AND tbldetalleventa.DESCARGADO >-1
            GROUP BY `Fecha`,clientes.NOMBRE,ctactes.N°Comprobante ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
  <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
  <tr>
  <td width="8%"><?php $date=date_create($producto['Fecha']) ; echo date_format($date,"d/m/Y") ?></td>
                      
                      <td width="8%" text-right>CIERRE ZETA</td>
                      <td width="8%" text-right><?php echo substr($producto['N°Comprobante'], -4) ?></td>
                      
              
                      <td width="8%" text-right> <?php echo number_format($producto['NETO'],2)  ?></td>
           
                      <td width="8%" text-right> <?php echo number_format($producto['IVA'],2)  ?></td>
                      <td width="8%" text-right> <?php echo number_format($producto['TOTAL'],2)  ?></td>
                            
                     </tr>
                     


                 <?php } ?>
                       


                      </tbody>
                    </table>
 
