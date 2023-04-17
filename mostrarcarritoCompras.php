<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>
<!-- /* <?php print_r ($_SESSION['COMPRAS']);?>
<?php print_r ($_SESSION['CARRITOCOMPRA']);?>*/-->
<?php $soc=$_SESSION['COMPRAS'];?>




<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
          <div class="container-fluid w-100">

<a href="compras.php" class="btn btn-success float-right mt-4 ms-2"><i class="ti-shopping-cart"></i>MENU ANTERIOR</a>
<a href="listadoProveedorCompra.php" class="btn btn-danger float-right mt-4"><i class="ti-back-left"></i>CANCELAR COMPRA</a>
</div>
         





              <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid">
                             
<h3>Lista del Carrito</h3>
<?php if(!empty($_SESSION['COMPRAS'])) { ?>
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

        
        <?php foreach($_SESSION['CARRITOCOMPRA'] as $indice=>$producto) { ?>
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
            <button class="btn btn-danger"  type="submit" name="btnAccion" value="Eliminar">Eliminar</button> 
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
                <form class="form-style-5" action="pagarCompras.php" method="post">
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
   

              <?php
              
                $sentencia=$pdo->prepare("SELECT * FROM `comprobantes` where tipo='Compra' ");
            $sentencia->execute();
            $listaComprobantes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

// print_r ($listaProductos);
            ?>



                   


                   
 <div class="form-group">
 <label for="my-input">Seleccione Comprobante:</label>

<select class="form-control"  id="TipoCompro" name="TipoCompro">

<?php foreach($listaComprobantes as $indice=>$compro) { ?>

                        <option  value="<?php echo $compro['cod']?>"><?php echo $compro['descripcion']?></option>
                      
                        <?php } ?>
                    </select>
                    </div>



 <div class="form-group">
                    <label for="my-input">Número de comprobante:</label>
                    <input id="Comprobante" class="form-control" type="text" name="Comprobante" placeholder="Por Favor poner número de comprobante" >
                    </div>
                    

 <div class="form-group">
                    <label for="my-input">Observaciones:</label>
                    <input id="Observaciones" class="form-control" type="text" name="Observaciones" placeholder="Por Favor poner las observaciones" >
                    </div>
                    
                    
                    
                    
                    <input id="Socio" class="form-control" type="hidden" name="Socio"  value="<?php echo ($soc[0]['DNI']); ?>" required>
                         <input id="Complejo" class="form-control" type="hidden" name="Complejo" value="<?php echo (EMPRESA); ?>" required>
                    
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="Proceder">Proceder a Cargar>></button>
                </form>
               
            </td>
        </tr>
    </tbody>
</table>

</div>
</div>
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


<?php
include 'templates/pie.php';
?>
