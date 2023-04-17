<?php


$mensaje="";


if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="Ok ID correcto".$ID;

            }else{
                $mensaje="Ups....ID incorrecto".$ID;break;

            }
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Ok Nombre correcto".$NOMBRE;

            }else{
                $mensaje.="Ups....Nombre incorrecto".$ID;break;
            
            }
            if(is_numeric($_POST['DNI'])){
                $SOCIO=$_POST['DNI'];
                $mensaje.="Ok Cantidad correcto".$SOCIO;

            }else{
                $mensaje.="Ups....Cantidad incorrecto".$ID;break;
            
            }

             if(is_numeric($_POST['cantidad'])){
                $CANTIDAD=$_POST['cantidad'];
                $mensaje.="Ok Cantidad correcto".$CANTIDAD;

            }else{
                $mensaje.="Ups....Cantidad incorrecto".$ID;break;
            
            }
           // if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
           //     $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
           //     $mensaje.="Ok Cantidad correcto".$CANTIDAD;
//
  //          }else{
    //            $mensaje.="Ups....Cantidad incorrecto".$ID;break;
      //      
        //    }
            if(is_numeric($_POST['precio'])){
                $PRECIO=$_POST['precio'];
                $mensaje.="Ok Precio correcto".$PRECIO;

            }else{
                $mensaje.="Ups....Precio incorrecto".$ID;break;
        
            }
                
            if(!isset($_SESSION['CARRITO']))
            {

            $producto=array(
                'ID'=>$ID,
                'NOMBRE'=>$NOMBRE,
                'CANTIDAD'=>$CANTIDAD,
                'PRECIO'=>$PRECIO,
                'SOCIO'=>$SOCIO
            );
            $_SESSION['CARRITO'][0]=$producto;
            $mensaje="Producto Agregado al Carrito";
            }        
            else
            {
                $idProductos=array_column($_SESSION['CARRITO'],"ID");
                if(in_array($ID,$idProductos)){
                    echo "<script> alert('El Producto ya ha sido seleccionado.');</script>";
                }
            else {        
            $NumeroProductos=count($_SESSION['CARRITO']);
            $producto=array(
                'ID'=>$ID,
                'NOMBRE'=>$NOMBRE,
                'CANTIDAD'=>$CANTIDAD,
                'PRECIO'=>$PRECIO,
                'SOCIO'=>$SOCIO
            );

            $_SESSION['CARRITO'][$NumeroProductos]=$producto;
            $mensaje="Producto Agregado al Carrito";
        }
        }
        $mensaje= print_r( $_SESSION,true); 
           
        break; 

        case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
            $ID=openssl_decrypt($_POST['id'],COD,KEY);
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if($producto['ID']==$ID)
                    {
                    unset($_SESSION['CARRITO'][$indice]);
                    echo " <script>alert('Elemento Borrado...');</script>";
                    }
                }

            }else{
                $mensaje="Ups....ID incorrecto".$ID;break;

        }
        break;   
    


    }
}
?>