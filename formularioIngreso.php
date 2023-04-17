<?php


include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';
/*
print_r($_SESSION['CARRITOCOBRO']);
print_r($_SESSION['COBRO']);
*/


print_r($_POST);
?>

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
<div class="col-sm-12 " >
   
    <div class="col-sm-6 " role="alert">
    <h2 style="text-align: left;">Cobranza de  <?php echo $producto['NOMBRE'] ?><?php $SOCIO=$producto['SOCIO'] ?>  </h2>
    </div>  

    <div class="alert btn-primary col-sm-6 " role="alert">
     
    <a href="menu.php#" style="color:white;"   >CANCELAR COBRO</a>
    </div>

    <?php } ?>        
</div>

          



<?php 

 if (!empty($_POST))
  {
        $FechaRecibo=$_POST["FechaRecibo"];
        $Recibo=$_POST["Recibo"];
        
         }        






           
?>
<div class="col-sm-12 " >           

    <form  action="" method="post"> 
                
                <input id="Complejo" class="form-control" type="hidden" name="Complejo"  value="<?php echo (EMPRESA); ?>" required>
                <input id="SOCIO" class="form-control" type="hidden" name="SOCIO"  value="<?php echo $producto['SOCIO']; ?>" required>
    <div class="col-sm-6 " > <label for="my-input">Fecha Recibo:</label>
                <input id="FechaRecibo" class="form-control" type="date" name="FechaRecibo"  value="<?php  
 if (!empty($_POST))
  {
              echo $FechaRecibo;
 
         }        
 ?>" >    
    </div>
    <div class="col-sm-6 " >
                <label for="my-input">Observaciones:</label>
                    <input id="recibo" class="form-control" type="text" name="Recibo" value="<?php   
 
 if (!empty($_POST))
  {
             
        echo $Recibo;
        
         }        
       
 ?>" >
    </div>



    <div class="col-sm-12 " >

    <input id="Pago" class="form-control" type="hidden" name="Pago"  value="Cobro" >
   
    <input type="text" name="DNI" id="DNI" value="<?php echo  $SOCIO;?>">
    <input type="text" name="id" id="id" value="<?php echo $producto['ID'];?>">
 
    <input type="text"  name="cantidad" id="cantidad" value="1">
         
                          
                                <div class=" col-sm-4" >
                                <form class="" action="" method="post">
                                      <label for="my-input">Seleccione Medio de Pago:</label>
                                    <select class="form-control"  name="nombre"  id="nombre">
                                        <?php
                                         $sentencia=$pdo->prepare('SELECT * FROM MediosDePago order by Medio ');
                                        $sentencia->execute();
                                        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC); ?>
                                            <?php foreach($listaProductos as $producto) { ?>
                                    <option     value="<?php echo $producto['Medio'].'-'.$producto['ID'];?>"> <?php echo $producto['Medio'] ;?> </option>
                                     <?php } ?>
                                    </select>
                                </div>       


                                 <div class="col-sm-4" >
                                     <label for="my-input">Ingrese Importe:</label>
                                     <input type="float" class="form-control" name="precio" id="precio" value="0"></div>

                              <div class="col-sm-4" > </br> <button style="margin-botton:0px;" class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="AgregarItemCobro">Agregar</button>
                                </div>
                             </form>

    </div>

    <div class="col-sm-12 " >
    <label for="my-input">Seleccione Moneda:</label>
    <select class="form-control"  id="Detalle" name="Detalle">
    <option value="Dolar">Dolar</option>
    <option value="Pesos">Pesos</option>
    </select>

    </div>

<div class="col-sm-12 "> </br>         <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="IngresoCobro">Egresar</button>
          
            </form>
            
</div>    
     
</div>                
     





  <table class="table table-striped ">
    <thead>
        <tr>
           <th width="40%">Descripcion</th>
           <th width="15%" style="text-align: right;"></th>
           <th width="20%" style="text-align: right;">Importe</th>
           <th width="20%" style="text-align: right;"></th>
           
        </tr>
        </thead>    
<tbody>
    
<?php if (isset($_SESSION['CARRITOCOBRO'])) { ?>

        <?php $total=0; ?>
        <?php $SOCIO=0; ?>

        
        <?php foreach($_SESSION['CARRITOCOBRO'] as $indice=>$productos) { ?>
        
           <td width="50%"><?php echo $productos['NOMBRE'] ?></td>
           
           <td width="20%" style="text-align: right;"></td>
           <td width="20%" style="text-align: right;">$<?php echo number_format($productos['PRECIO'] *$productos['CANTIDAD'],2) ?></td>
           <td width="5%"> 
            <form action="" method="post">
            <input type="hidden"
            name="id" 
            id="id" 
            value="<?php echo openssl_encrypt( $productos['ID'],COD,KEY);?>">    
            <button class="btn btn-danger"  type="submit" name="btnAccion" value="EliminarCobro">Eliminar</button> 
            </form>
            </td>
        </tr>

        <?php $total=$total+($productos['PRECIO'] *$productos['CANTIDAD']); ?>
        <?php $SOCIO=$productos['ID']; ?>
        
        <?php } ?>
      
        <tr>
            <td align="right"></td>
             <td></td>
            <td colspan="3" align="right"><h3>Total $<?php echo number_format($total,2);?></h3></td>
              <input id="importe" class="form-control" type="hidden" name="Importe"  value="<?php echo ($total); ?>" >
          
           
        </tr>


</tbody>
</table>

         
                
                  </div>

    


<?php } 
else {
    // code...
}?>








    
</div>




<!-- print_r($_SESSION['VENTAS']); -->

   

<?php
include 'templates/pie.php';
?>