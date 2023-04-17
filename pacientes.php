<?php
session_start();

$mensaje="";
$DNI="";


if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Grabar':

            
            
        $DNI=$_POST['DNI']; 
           
        $producto=array(
            'DNI'=>$DNI,
            'TEL'=>$DNI

            
        )    ;
        $_SESSION["PACIENTE"][0]=$producto;
        $mensaje= print_r( $_SESSION,true); 
        echo $mensaje;
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