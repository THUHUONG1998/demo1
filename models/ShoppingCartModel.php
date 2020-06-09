<?php 
require_once 'dbconnect.php';
class shoppingCartModel extends DBconnect{
    // lấy thông tin sản phẩm
    function getProduct($id){
        $sql = "SELECT products.id, products.name, products.price, products.image, products.promotion_price
        FROM products 
        WHERE id = '$id'";
        return $this->getOneRow($sql);
    }
}

?>