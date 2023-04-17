
<?php
include 'segur.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<?php
$_SESSION['LOGIN'][0]==4
?>

<script> 
window.setTimeout(function() {
    window.location.replace('index.php');
}, 1500);
   
</script>



<?php
include 'templates/pie.php';

?>