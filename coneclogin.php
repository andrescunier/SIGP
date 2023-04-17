<?php 
$conexion=mysqli_connect("localhost","root","","contultorio");
if(!$conexion){
    echo 'Error al conectar la base de datos';
}
else {
    echo 'Conectado a la Base de Datos';
}