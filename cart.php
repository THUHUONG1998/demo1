<?php 
require_once 'controllers/ShoppingCartController.php';
$a=new ShoppingCartController();
// print_r ($_POST['idProduct']); exit;

if(isset($_POST['idProduct'])){
    $a->addToCart();
}
else if(isset($_POST['idDelete'])){
    $a->deleteid();
}else {
    $a->shoppingCart();
} 


?>