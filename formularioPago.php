<?php


include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>
<br>
<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

<?php $filtro=$producto['DNI'] ?>
<?php
            $sentencia=$pdo->prepare("SELECT * FROM clientes where SOCIO='$filtro' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
    $saldo=0;
         ?>
<?php foreach($listaProductos as $producto) { ?>
    <h2 style="text-align: left;">Ingresar pago a  <?php echo $producto['NOMBRE'] ?>  </h2>
    <?php } ?>        



<tr>
          

              <th> <form class="form-style-5"  action="egresos.php" method="post"> </th>
              <div class="form-style-5">
                <input id="SOCIO" class="form-control" type="hidden" name="SOCIO" placeholder="Por favor escribe aqui edad actual del Paciente" value="<?php echo $producto['SOCIO'] ?>" required>
                <label for="my-input">Fecha Recibo:</label>
                    <input id="FechaRecibo" class="form-control" type="date" name="FechaRecibo" placeholder="Numero de Recibo" required>    
                <label for="my-input">Observaciones:</label>
                    <input id="recibo" class="form-control" type="text" name="Recibo" placeholder="Observaciones" required>



                   <div class="form-group" >
                    <label for="my-input">Seleccione Moneda:</label>
<select class="form-control"  id="Detalle" name="Detalle">
<option value="Dolar">Dolar</option>
                        <option value="Pesos">Pesos</option>
                       </select>
</div>
                   
                    <div class="form-group  col-sm-6">
<label for="my-input">Seleccione Forma de Pago:</label>
<select class="form-control"  id="Pago" name="Pago">
<option value="caja">CAJA</option>
                        <option value="banco">BANCO</option>
                       </select>
</div>
<div class="form-group  col-sm-6">
                    <label for="my-input">Importe</label>
                    <input id="Importe" class="form-control" type="money" name="Importe" placeholder="Importe a Cobrar">
                     
                           
                 </div>
                  </div>
                 <BR></BR>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Generar Recibo</button>
          
            </form>
               
            </td>
        </tr>
 
    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
    
    </br>
           

        
                        




     
<?php
include 'templates/pie.php';
?>
