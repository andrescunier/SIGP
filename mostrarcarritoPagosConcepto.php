<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>

<?php $soc=$_SESSION['COBROS'];?>

   



<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
          <div class="container-fluid w-100">

<a href="PagarProveeConcepto.php" class="btn btn-success float-right mt-4 ms-2"><i class="ti-shopping-cart"></i>MENU ANTERIOR</a>
<a href="menu.php" class="btn btn-danger float-right mt-4"><i class="ti-back-left"></i>CANCELAR COBRO</a>
</div>
         





              <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid">
                             
<h3>Lista del Carrito</h3>
<?php if(!empty($_SESSION['COBROS'])) { ?>
<table class="table table-striped ">
    <tbody>
        <tr>
           <th width="40%">Descripcion</th>
           <th width="15%" text-center>Cantidad</th>
           <th width="20%" text-center>Precio</th>
           <th width="20%" text-center>Total</th>
           <th width="5%">-- </th>
        </tr>
        
        <?php $total=0; ?>
        <?php $SOCIO=0; ?>

        
        <?php foreach($_SESSION['CARRITOVENTA'] as $indice=>$producto) { ?>
        <tr>
           <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
           
           <td width="15%" text-center><?php echo $producto['CANTIDAD'] ?></td>
           <td width="20%" text-center><?php echo $producto['PRECIO'] ?></td>
           <td width="20%" text-center><?php echo number_format($producto['PRECIO'] *$producto['CANTIDAD'],2) ?></td>
           <td width="5%"> 
            <form action="" method="post">
            <input type="hidden"
            name="id" 
            id="id" 
            value="<?php echo openssl_encrypt( $producto['ID'],COD,KEY);?>">    
            </form>
            </td>
        </tr>
        <?php $total=$total+($producto['PRECIO'] *$producto['CANTIDAD']); ?>
        <?php $SOCIO=$producto['ID']; ?>
        
        <?php } ?>
      
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><head><?php echo number_format($total,2);?></head></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">
                <form class="form-style-5" action="egresos.php" method="post">
                <div class="form-style-5">

                <?php
                $clien=$soc[0]['DNI'];
                $sentencia=$pdo->prepare("SELECT `SOCIO`, `CALLE`,`Nº`,`PISO`,`LOCALIDAD`,`C.POSTAL` FROM `clientes` where `SOCIO`='$clien' ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

// print_r ($listaProductos);
            ?>
<?php foreach($listaProductos as $indice=>$producto) { ?>
                    <div class="form-group">
                    <label for="my-input">Fecha Comprobante</label>
                    <input id="fecha" class="form-control" type="date" name="fecha" placeholder="Por Favor poner Fecha de Compra" value="<?php echo date('Y-m-d')?>" required>
                    </div>
                    
 <div class="form-group" >
                    <label for="my-input">Cancha:</label>
<select class="form-control"  id="Cancha" name="Cancha">

                        <option value="uno">Uno</option>
                          <option value="dos">Dos</option>
                            <option value="tres">Tres</option>
                              <option value="cuatro">Cuatro</option>
                                <option value="F8">Futbol 8</option>
                       </select>
</div>


 <div class="form-group" >
                    <label for="my-input">Horario:</label>
<select class="form-control"  id="Horario" name="Horario">

                        <option value="9">9:00 a 10:00</option>
<option value="10">10:00 a 11:00</option>
<option value="11">11:00 a 12:00</option>
<option value="12">12:00 a 13:00</option>
<option value="13">13:00 a 14:00</option>
<option value="14">14:00 a 15:00</option>
<option value="15">15:00 a 16:00</option>
<option value="16">16:00 a 17:00</option>
<option value="17">17:00 a 18:00</option>
<option value="18">18:00 a 19:00</option>
<option value="19">19:00 a 20:00</option>
<option value="20">20:00 a 21:00</option>
<option value="21">21:00 a 22:00</option>
<option value="22">22:00 a 23:00</option>
<option value="23">23:00 a 24:00</option>
<option value="24">24:00 a 25:00</option>
                       </select>
</div>





                   



 <div class="form-group">
                    <label for="my-input">Observaciones:</label>
                    <input id="Comprobante" class="form-control" type="text" name="Comprobante" placeholder="Por Favor poner Observaciones" >
                    </div>
                    
 <div class="form-group" >
                    <label for="my-input">Seleccione Moneda:</label>
<select class="form-control"  id="Ovservaciones" name="Observaciones">

                        <option value="Pesos">Pesos</option>
                       </select>
</div>









                    
                    <small id="emailHelp" class="form-text text-muted">
                        Asegurese que es un cliente
                    </small>
                    <input id="Socio" class="form-control" type="hidden" name="Socio" placeholder="Por Favor poner numero de comprobante" value="<?php echo ($soc[0]['DNI']); ?>" required>
                         <input id="Complejo" class="form-control" type="hidden" name="Complejo" placeholder="Por Favor poner numero de comprobante" value="<?php echo (EMPRESA); ?>" required>
                    
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Proceder a Cargar>></button>
                </form>
               
            </td>
        </tr>
    </tbody>
</table>
<?php } ?>
<?php }else{ ?>
<div class="alert alert-success">
    <div class="alert alert-success" role="alert">
    No hay productos en el carrito...
    </div>
</div>
<?php } ?>


                          </div>
                        
                          </div>
                        
                          </div>
                        
                        </div>
<?php
include 'templates/pie.php';
?>
