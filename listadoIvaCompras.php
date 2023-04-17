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
              <h1 class="card-title">LISTADO IVA COMPRAS

 </h1>
              <div class="row">


              <div class="form-group row">
                  <form action="listadoIvaCompras.php" method="get" class="form-sample" target="_blank">

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="fname">Desde:</label>
                          <div class="col-sm-9">
                          <input class="form-control" type="date" id="fname" name="desde" value="<?php echo $desde?>">
                          </div>
                    </div>
                    
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="lname">Hasta:</label>
                          <div class="col-sm-9">
                          <input class="form-control" type="date" id="lname"  name="hasta" value="<?php echo $hasta?>">
                          </div>
                    </div>      
                    <div class="form-group row">
                    <div class="col-sm-9">
                    <input type="submit" class="form-control" value="buscar"></div>
                  </form>
                </div>











                <div class="col-12">
                  <div class="table-responsive">
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
            $sentencia=$pdo->prepare("SELECT `FechaRecibo` as Fecha ,`NOMBRE`,`CUIT`,`N°Comprobante`,`TOTAL`,`IVA21`,`IVA105`,`IVA27`,`PERCIIBB`,`PERCIVA`,`IVA21`/0.21+`IVA105`/0.105+`IVA27`/0.27 as NETO ,`TOTAL`*-1 -( `IVA21`/0.21+`IVA105`/0.105+`IVA27`/0.27 +`PERCIIBB`+`PERCIVA`+`IVA21`+`IVA105`+`IVA27`) as NOGRAB FROM `IVACOMPRAS1` WHERE `IVA21`/0.21+`IVA105`/0.105+`IVA27`/0.27  <> 0 AND (FechaRecibo BETWEEN date('$desde') AND date('$hasta')) ORDER BY `FechaRecibo` desc");
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
                      <td width="8%" text-right>Factura A</td>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        




        <div class="content-wrapper">
       
       <div class="card">
           <div class="card-body">
            <a href="excelIvaCompras.php?desde=<?php echo $desde?>&hasta=<?php echo $hasta?>"><h1 class="card-title">ENVIAR INFORME A EXCEL

</h1></a>
             <div class="row">
        
             </div>
           </div>
         </div>
       </div>

       
       </div>
       </div>
      


        

       <?php include 'templates/pie.php'; ?>


