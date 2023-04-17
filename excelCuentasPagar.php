<?php 


include 'segur.php';
include 'carrito.php';



header("Pragma: public");
header("Expires: 0");
$filename = "CuentasPagar.xls";
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
                            <th>Saldo</th>
                            <th>Proveedor</th>
                            
                        </tr>
                      </thead>
                      <tbody>

                      <?php



   $sentencia=$pdo->prepare("SELECT * FROM saldosCuentas where ESTADO='PROVE' and Saldo >10  order by Saldo desc");
   $sentencia->execute();
   $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   //print_r($listaProductos);
   $order=0;

?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>
  <td width="10%" text-center ><?php $order=$order+1; echo ($order) ?></td> 

  <td><?php echo $producto['Saldo'] ?></td>
   
  <td  ><?php echo $producto['NOMBRE'] ?></td>
 
 
   
                 
            
                 </tr>


                 <?php } ?>
                       


                      </tbody>
                    </table>