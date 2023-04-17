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






<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">LISTADO DE MEDIOS DE PAGO</h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                        <tr>
                        <th scope="col"  width="20%">Codigo</th>
                        <th scope="col" width="20%" >Nombre</th>
                        <th scope="col" width="10%"></th>
                        <th scope="col" width="10%"></th>
                        <th scope="col" width="10%"></th> 
                        <th scope="col" width="10%"></th> 
                            
                            
                        </tr>
                      </thead>
                      <tbody>

                      <?php



$sentencia=$pdo->prepare('SELECT * FROM MediosDePago order by Medio asc');
$sentencia->execute();
$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos);


?>
 
<?php foreach($listaProductos as $producto) { ?>
  <tr>

  <td width="20%" text-center ><?php echo $producto['ID'] ?></td>
                         <td width="20%" class="buscar" text-center><?php echo $producto['Medio'] ?></td>
                         <td width="20%" class="buscar" text-center></td>
                         <td width="20%" class="buscar" text-center></td>

                            <td width="10%">
                         
                            <form action="" method="post">
                            <input type="hidden"
                            name="DNI" 
                            id="DNI" 
                            value="<?php echo ( $producto['ID']);?>">    
                            <button class="btn btn-danger"  type="submit" name="btnAccion" value="ModificarMedios">Modificar Datos</button> 
                            </form>
                            </td>
                            <td width="10%">
                         
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


                 <?php } ?>
                       


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
       


       <?php include 'templates/pie.php'; ?>



