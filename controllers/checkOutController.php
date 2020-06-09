<?php 
require_once 'BaseController.php';
class checkOutController extends BaseController{
    function checkOut(){
        $this->callView('checkout');
    }
}
?>