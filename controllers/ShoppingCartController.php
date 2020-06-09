<?php 
require_once 'BaseController.php';
require_once 'models/ShoppingCartModel.php';
require_once 'helpers/Cart.php';
session_start();
    class ShoppingCartController extends BaseController{
        // thêm sản phẩm vào giỏ hàng
        function addToCart(){
             $id = $_POST['idProduct'];
             $a = new shoppingCartModel();
            $product = $a->getProduct($id);
            
            // kiểm tra sản phẩm nếu không thấy id hoặc id không hợp lệ thì thông báo lỗi
            // dùng để bắt lỗi
            if($product == false){
                $data = [
                    'error'=>true,
                    'mess' => 'Không tìm thấy sản phẩm!!'
                ];
                $json = json_encode($data);
                echo $json;
                return false;
            }
            $qty = 1;
            $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $qty);
            $_SESSION['cart'] = $cart;
            $data = [
                'error'=>false,
                'mess' => 'Thêm vào giỏ hàng thành công!'
            ];
            $json = json_encode($data);
            echo $json;

        }
        // load sản phâm trong giỏ hàng
        function shoppingCart(){
            $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
            $cart = new Cart($oldCart);
            $data = ['datacart'=> $cart];
            $this->callView('shoppingcart',$data);
        }
        // xóa sản phẩm trong giỏ hàng
        function deleteid(){
            $id = $_POST['idDelete'];
            $a= new shoppingCartModel();
            $product = $a->getProduct($id);
            $qty = 1;
            $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart']: null;
            $cart = new Cart($oldCart);
            $cart-> removeItem($id);
            $_SESSION['cart'] = $cart;
            $data = [
                'error'=>false,
                'mess'=>'Xóa sản phẩm ra khỏi giỏ hàng thàng công !! '
            ];
            $json = json_encode($data);
            echo $json;
        }
    }
?>