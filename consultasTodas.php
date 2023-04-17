<?php

include 'carrito.php';
include 'templates/cabecera.php'
?>
<br>




    <h3>Consultas  </h3>
 



                
 
    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
    
  
         <?php
            
            $sentencia=$pdo->prepare("SELECT Fecha,EdadAlMomento,Peso,Talla,MotivoConsulta,Alimentacion,Observaciones,Vacunas,EstudiosPedidos,PC FROM consultas ORDER BY Fecha desc ");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);

    function calculaedad($fechanacimiento){
  list($ano,$mes,$dia) = explode("-",$fechanacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}
// Modo de uso

; // Imprimirá: 30
             ?>
         <?php foreach($listaProductos as $producto) { ?>
         
        
            <table class="table table-striped">
                <tbody colspan="5">
                     <tr>
                        
                        <th width="20%" text-center>Fecha</th>
                        <th width="5%" text-center>Edad</th>
                        <th width="5%" text-center>Talla</th>
                        <th width="5%" text-center>Peso</th>
                         <th width="5%" text-center>PC</th>
                        <th width="10%" text-center>MotivoConsulta</th>
                        <th width="10%" text-center>Alimentacion</th>
                        <th width="20%" text-center>Observaciones</th>
                        <th width="10%" text-center>Vacunas</th>
                        <th width="10%" text-center>EstudiosPedidos</th>
                       
                                                </tr>
                    
                        <tr>
                        <td width="20%" text-center ><?php echo $producto['Fecha'] ?></td>
                        <td width="5%" text-center><?php echo  $producto['EdadAlMomento']  ?></td>
                        <td width="5%"><?php echo $producto['Talla'] ?></td>
                        <td width="5%" text-center><?php echo $producto['Peso'] ?></td>
                         <td width="5%"><?php echo $producto['PC'] ?></td>
                        <td width="10%"><?php echo $producto['MotivoConsulta'] ?></td>
                        <td width="10%"><?php echo $producto['Alimentacion'] ?></td>
                        <td width="20%"><?php echo $producto['Observaciones'] ?></td>
                        <td width="10%"><?php echo $producto['Vacunas'] ?></td>
                        <td width="10%"><?php echo $producto['EstudiosPedidos'] ?></td>
                       
                            
                            </td>
                        </tr>
                        
                    
                </tbody>
                </table>      
                        <?php } ?>
                        




     
<?php
include 'templates/pie.php';
?>
