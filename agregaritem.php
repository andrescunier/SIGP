
<?php
print_r($_POST);
/*
$juntas = explode("-", $_POST['nombre']);
$primeraId=$juntas[1];
$primeraNombre=$juntas[0];
$ID=$primeraId;

$NOMBRE=$primeraNombre;
$CANTIDAD=$_POST['cantidad'];
$PRECIO=$_POST['precio']; 
   


   
  
   
        
    if(!isset($_SESSION['CARRITOVENTA']))
    {
     $NumeroProductos=count($_SESSION['CARRITOVENTA']+1);  
    $producto=array(
        'ID'=>$ID,
        'NOMBRE'=>$NOMBRE,
        'CANTIDAD'=>$CANTIDAD,
        'PRECIO'=>$PRECIO
    );
    array_push($_SESSION['CARRITOVENTA'],$producto);
    $mensaje="Producto Agregado al Carrito";
    }        
    else
    {
        $idProductos=array_column($_SESSION['CARRITOVENTA'],"ID");
        if(in_array($ID,$idProductos)){
            echo "<script> alert('El Producto ya ha sido seleccionado.');</script>";
        }
    else {        
    
    $producto=array(
        'ID'=>$ID,
        'NOMBRE'=>$NOMBRE,
        'CANTIDAD'=>$CANTIDAD,
        'PRECIO'=>$PRECIO
    );

    array_push($_SESSION['CARRITOVENTA'],$producto);
    $mensaje="Producto Agregado al Carrito";
}


               
         */  

?>