<?php
    
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

if (!empty($_SESSION['CARRITOCOMPRA'])) {

unset($_SESSION['CARRITOCOMPRA']);
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
<div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa palabra clave a  Buscar...">
      </div>
      
<br>
     <div class="table">
     <table >
            <thead>
                     <tr>
            <th scope="col" width="39%" text-left >Nombre y Apellido</th>
                        <th scope="col" width="1%" text-left   ></th>
                        <th scope="col" width="10%"> </th>
                         <th scope="col" width="10%"> </th>
                          <th scope="col" width="10%"> </th>
                        <th scope="col" width="10%"></th>
                        <th scope="col" width="10%">Acciones</th>
                        <th scope="col" width="10%"></th> 
         </tr>
         </thead>
</table>
<?php

 $fil=EMPRESA;
            $sentencia=$pdo->prepare("SELECT * FROM clientes where ESTADO='PROVE'  and Complejo='$fil' order by Apellido asc, SOCIO asc");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

         ?>
         <?php foreach($listaProductos as $producto) { ?>
            <table class="table-responsive">
           
                <tbody  class="buscar">
                     
   
                        <tr>
                        <td width="39%"text-center ><?php echo $producto['NOMBRE'] ?></td>
                  
                        <td width="1%"></td>
                                  <td scope="row" width="25%" text-center ></td>
                      <td scope="row" width="25%" text-center ></td>
                        <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Pagar">Pagar</button> 
                            </form>
                            </td>
                              <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="Comprar">Comprar</button> 
                            </form>
                            </td>



                            <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="VerVentas">Ver Compras</button> 
                            </form>
                            </td>
                            <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="AgregarP">Ver CtaCte</button> 
                            </form>
                            </td>
                            <td width="5%">
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['SOCIO']);?>">    
                            <button class="btn btn-primary"  type="submit" name="btnAccion" value="ModificarP">Modificar Datos</button> 
                            </form>
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