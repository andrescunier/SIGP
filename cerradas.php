<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CAJAS CERRADAS</h4>
                  <p class="card-description">
                  <h3>Resumen de Ingresos</h3></p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Fecha de Cierre</th>
                          <th>Numero Cierre</th>
                          <th>Fecha Automatica</th>
                          <th>Fecha Manual</th>
                          <th>Observaciones</th>
                          <th>Borrar</th>
                          <th>Cambiar Fecha</th>
                          <th>Cambiar N°Caja</th>

                         
                        </tr>
                      </thead>
                      <tbody>

                      <?php

$sentencia=$pdo->prepare('SELECT cierresCaja.Numero AS CIERRE,cierresCaja.FechaCierre AS FECHAMANUAL, cierresCaja.Observaciones AS Observaciones, cierresCaja.Fecha AS FECHACIERRE,MAX(ctactes.FechaRecibo) AS FECHACAJA 
from ctactes
INNER JOIN tbldetallpagos ON tbldetallpagos.IDVENTA=ctactes.IDPAGO
LEFT JOIN cierresCaja ON cierresCaja.Numero=tbldetallpagos.DESCARGADO
GROUP BY tbldetallpagos.DESCARGADO order by CIERRE desc ');
$sentencia->execute();
$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos);

?>
 <?php $saldo=0 ?></td>
         <?php foreach($listaProductos as $producto) { ?>
         
                   
                   
                       <tr>
                       <td><?php $newDate = date("d/m/Y", strtotime($producto['FECHACAJA'])); echo $newDate?> </td>
                       <td><a href="cajaCerrada.php?id=<?php echo $producto['CIERRE']?>"><?php echo $producto['CIERRE']  ?></a></td>
                        <td ><?php echo $producto['FECHACIERRE'] ?></td>
                        <td ><?php echo $producto['FECHAMANUAL'] ?></td>
                        <td ><?php echo $producto['Observaciones'] ?></td>
                        <td ><a href="borracaja.php?idCierre=<?php echo $producto['CIERRE'] ?>"><button class="form-control" type="submit" >BORRAR</button></a></td>
                        <td>
                            <form action="cambiacaja.php" method="post">
                 <input type="hidden" class=""
                 name="idCierre" 
                 id="idCierre" 
                 value="<?php echo ( $producto['CIERRE']);?>">
                 <div class="form-group"><input type="date" class="form-control" name="fechaNueva" 
                 id="fechaNueva" >    </div>  
                       <div class="form-group">       <button class="form-control" type="submit" name="btnAccion" value="submit">CAMBIAR FECHA</button> 
                        </div>
                            
                 </form>
                 </td>
                  <td>
                            <form action="cambiacaja2.php" method="post">
                 <input type="hidden" 
                 name="idCierre" 
                 id="idCierre" 
                 value="<?php echo ( $producto['CIERRE']);?>"></div>
                 <div class="form-group"><input type="number" class="form-control" name="idNueva" 
                 id="idNueva" >  </div>
                             <div class="form-group"> <button class="form-control" type="submit" name="btnAccion" value="submit">CAMBIAR CIERRE</button> 
                        </div>    
                 </form>
                 </td>
                        
                        
                       

                       
                       </tr>
                        
                      <?php } ?>
                    </tbody>
                    </table>
                   

            
                  </div>
                </div>
              </div>
            
            </div>
     

                       


<?php

include 'templates/pie.php';
?>