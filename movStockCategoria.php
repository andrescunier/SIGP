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
              <h1 class="card-title">LISTADO DE MOVIMIENTO DE CATEGORIAS N°:

<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

  <?php echo $producto['DNI'].'-' ?> 
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?> 


<?php $filtro=$producto['DNI'] ?>

<?php $sentencia=$pdo->prepare("SELECT * from Categorias where ID='$filtro';");
            $sentencia->execute();
            $listaMediosP=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
foreach ($listaMediosP as $MediosP) {
  echo $MediosP['subCuenta'];
  $cuentaCont=$MediosP['Cuenta'];
//echo $cuentaCont;
}


//echo $origen;
?>

</h1>





              <div class="col-12">
              <form action="movStockCuenta.php" method="get" class="form-sample">
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
                      
      <?php $sentencia=$pdo->prepare("SELECT Cuenta,subCuenta from informectactes2     group by cuenta  ,subCuenta ORDER by Cuenta asc, subCuenta ASC;");
            $sentencia->execute();
            $listaOrigen=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <select class="form-control" name="origen" id="">



            <option value="TODOS" >-----TODOS-----</option>
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


<option value="Compra" >Compra</option>

<option value="Venta" >Venta</option>
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
                            <th>Movimiento/Compro</th>
                            <th>Entidad</th>
                            <th>Cuenta</th>
                            <th>Importe</th>
                            <th>Saldo</th>
                            
                            
                        </tr>
                      </thead>
                      <tbody>
       
 
 
                      <?php
            $sentencia=$pdo->prepare("SELECT * from informectactes2 where  cuenta='$cuentaCont' and  CASE WHEN '$origen'='TODOS' THEN informectactes2.Subcuenta=informectactes2.Subcuenta  ELSE informectactes2.Subcuenta='$origen' END and CASE WHEN '$movimiento'='TODOS' THEN informectactes2.TipoPago=informectactes2.TipoPago  ELSE informectactes2.TipoPago='$movimiento' END and (informectactes2.FechaRecibo < date('$desde') )  ORDER by informectactes2.FechaRecibo asc");
            $sentencia->execute();
            $SaldoInicial=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $Saldo=0;





    
  foreach($SaldoInicial as $salIni) { 
    $Saldo=$Saldo+($salIni['Importe']);
  //  echo $Saldo;
     }
  
    
         ?>
 
 
 
 
 
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
                  </div>


                </div>
              </div>
            </div>
         

          </div>
          <div style="align:right;"><a href="excelCuenta.php?desde=<?php echo $desde?>&hasta=<?php echo $hasta?>&filtro=<?php echo $filtro?>&Saldo=<?php echo $Saldo?>&origen=<?php echo $origen?>&movimiento=<?php echo $movimiento?>&cuentaCont=<?php echo $cuentaCont?>"><button type="button" class="btn btn-secondary">Exportar a Excel</button></a></div> 

        </div>
        </div>
        </div>
       


       <?php include 'templates/pie.php'; ?>




