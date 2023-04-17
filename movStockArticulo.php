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



<?php 
if(isset($_GET['desde'])) {
$desde=$_GET['desde'];    // id index exists
$hasta=$_GET['hasta'];
$movimiento=$_GET['movimiento'];
$origen=$_GET['origen'];

    
}
else
{
$desde=date("Y-m")."-01";    
$hasta=date("Y-m-d");    
$origen="Todos";
$movimiento="Todos";


//echo $desde;
//echo $hasta;    
}


?>














<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">LISTADO DE MOVIMIENTO DE MEDIO DE PAGO N°:

<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

  <?php echo $producto['DNI'].'-' ?> 
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?> 


<?php $filtro=$producto['DNI'] ?>

<?php $sentencia=$pdo->prepare("SELECT * from mediosdepago where ID='$filtro';");
            $sentencia->execute();
            $listaMediosP=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
foreach ($listaMediosP as $MediosP) {
  echo $MediosP['Medio'];
}



?>

</h1>






              <div class="col-12">
              <form action="movStockArticulo.php" method="get" class="form-sample">
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


                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Origen</label>
                          <div class="col-sm-9">
                      
      <?php $sentencia=$pdo->prepare("SELECT clientes.SOCIO AS ID, clientes.NOMBRE as Origen FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID  left join clientes ON tblctasctes.SOCIO=clientes.SOCIO  where  tbldetallpagos.IDPRODUCTO='$filtro' and tbldetallpagos.DESCARGADO>-1 GROUP  by clientes.NOMBRE asc;");
            $sentencia->execute();
            $listaOrigen=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <select class="form-control" name="origen" id="">



            <option value="<?php echo $origen ?>" ><?php      echo $origen;              ?></option>
            <option value="TODOS" >-----TODOS-----</option>

            <?php             foreach($listaOrigen as $origen1) { ?>



  <option value="<?php echo $origen1['Origen']; ?>"><?php      echo $origen1['Origen'];              ?></option>
<?php } ?>
</select>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Movimiento</label>
                          <div class="col-sm-9">
                          <select class="form-control" name="movimiento" id="">
                          <option value="<?php echo $movimiento; ?>"><?php      echo $movimiento;              ?></option>
<option value="Todos" >-----TODOS-----</option>

<option value="Pago" >Pago</option>

<option value="Cobro" >Cobro</option>
</select>                          </div>
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
            $sentencia=$pdo->prepare("SELECT tblctasctes.ID,tblctasctes.Fecha,tblctasctes.Correo ,clientes.APELLIDO,clientes.NOMBRE,tblctasctes.domicilio,tblctasctes.SOCIO ,tblctasctes.status,tblctasctes.PayPalDatos , tbldetallpagos.IDPRODUCTO, MediosDePago.Medio , tbldetallpagos.CANTIDAD, tbldetallpagos.PRECIOUNITARIO FROM tblctasctes LEFT JOIN tbldetallpagos on tblctasctes.ID=tbldetallpagos.IDVENTA LEFT JOIN MediosDePago ON tbldetallpagos.IDPRODUCTO=MediosDePago.ID  left join clientes ON tblctasctes.SOCIO=clientes.SOCIO  where  tbldetallpagos.IDPRODUCTO='$filtro' and  CASE WHEN '$origen'='TODOS' THEN clientes.NOMBRE=clientes.NOMBRE  ELSE clientes.NOMBRE='$origen' END and CASE WHEN '$movimiento'='TODOS' THEN tblctasctes.status=tblctasctes.status  ELSE tblctasctes.status='$movimiento' END and (tblctasctes.Fecha BETWEEN date('$desde') AND date('$hasta')) and tbldetallpagos.DESCARGADO>-1 ORDER by tblctasctes.Fecha asc");
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
                  </div>


                </div>
              </div>
            </div>
         

          </div>
          <div style="align:right;"><a href="excelMedioPago.php?desde=<?php echo $desde?>&hasta=<?php echo $hasta?>&filtro=<?php echo $filtro?>&Saldo=<?php echo $Saldo?>&origen=<?php echo $origen?>&movimiento=<?php echo $movimiento?>"><button type="button" class="btn btn-secondary">Exportar a Excel</button></a></div> 

        </div>
        </div>
        </div>
       


       <?php include 'templates/pie.php'; ?>




