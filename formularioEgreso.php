<?php


include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>
<br>


<?php if(!empty($_SESSION['CARRITO'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>   

    <h3>Ingreso de Gastos  </h3>
 
<?php } ?>
  
<?php }else{ ?>

<?php } ?>

<tr>
          

              <th> <form  class="form-style-5"  action="egresos.php" method="post"> </th>
                <div class="alert alert-success">
                    <div class="form-group">
                    <input id="SOCIO" class="form-control" type="hidden" name="SOCIO" placeholder="Por favor escribe aqui edad actual del Paciente" value="9999" required>
                    <label for="my-input">Fecha  de Gasto:</label>
                        <input id="FechaRecibo" class="form-control" type="date" name="FechaRecibo" placeholder="Fecha de Gasto" required>    
                    <label for="my-input">Observaciones:</label>
                        <input id="recibo" class="form-control" type="text" name="Recibo" placeholder="Numero de Comprobante Identificatorio" required>
                      
                   <div class="form-group" >
                    <label for="my-input">Seleccione Moneda:</label>
<select class="form-control"  id="Detalle" name="Detalle">
<option value="Dolar">Dolar</option>
                        <option value="Pesos">Pesos</option>
                       </select>
</div>  







                        <label for="my-input">Forma de Pago :</label>
                       
                       <select id="Pago" class="form-control" name="Pago">
                         <option value="caja">caja</option>
                         <option value="banco">banco</option>
                         
                       </select>
                        <label for="my-input">Importe</label>
                        <input id="Importe" class="form-control" type="money" name="Importe" placeholder="Importe de Gasto">
                         
                               
                     </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Egresar</button>
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
