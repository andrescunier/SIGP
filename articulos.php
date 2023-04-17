<?php

include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
 <?php if(!empty($_SESSION['SEGUR'])) { ?>
    <?php $total=0; ?>
        <?php foreach($_SESSION['SEGUR'] as $indice=>$producto) { ?>   

   
 
<?php } ?>
  
<?php }else{ ?>



<?php } ?>
<div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa palabra clave a  Buscar...">
      </div>
      
<br>
     <div class="table-responsive">
     <table class="table">
            <thead>
                     <tr>
                        <th scope="col"  width="20%">Codigo</th>
                        <th scope="col" width="20%" >Nombre</th>
                        <th scope="col" width="20%" style="text-align: right;" >Precio</th>
                        <th scope="col" width="10%" ><!--Imagen--></th>
                        <th scope="col" width="10%"></th>
                        <th scope="col" width="10%"></th>
                        <th scope="col" width="10%"></th> 
         </tr>
         </thead>
</table>
<?php
            $sentencia=$pdo->prepare('SELECT * FROM tldproductos order by Nombre asc');
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         <?php foreach($listaProductos as $producto) { ?>
            <table class="table">
           
                <tbody  class="buscar">
                     
   
                        <tr>
                        
                        <td width="20%" text-center ><?php echo $producto['ID'] ?></td>
                         <td width="20%" class="buscar" ><?php echo $producto['Nombre'] ?></td>
                        <td width="20%" style="text-align: right;">$<?php echo $producto['Precio'] ?></td>
                        <td width="10%"><!--<img src="<?php echo $producto['Imagen'] ?>" alt="" width="100" height="100">--></td>
                        
                            <td width="10%">
                         
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['ID']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="ModificarArticulos">Modificar Datos</button> 
                            </form>
                            </td>
                            <td width="10%">
                         <!--
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['ID']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="ModificarImagen">Modificar Imagen</button> 
                            </form>-->
                            </td>
                            <td width="10%">
                         
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['ID']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="VerMovStock">Ver Movimientos</button> 
                            </form>
                            </td>
                            <td width="10%">
                            
                            </td>
                        </tr>
                        
                    
                    </tbody>
                </table>     
                        <?php } ?>
                        
    </div>
</div>
    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
  
<?php

include 'templates/pie.php';
?>