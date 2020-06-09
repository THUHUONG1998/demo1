<?php 
require_once 'BaseController.php';
require_once 'models/detailModel.php';
class detailController extends BaseController{
    function Home1(){
        $a = new detailModel;
        $url= $_GET['url'];
        $urlproduct = $a->getdataUrl($url);
        $relatedproduct= $a->getdataRelatedProduct($url);
        $data = ['urlproduct' => $urlproduct , 'relatedproduct'=>$relatedproduct ];
        // print_r($data['urlproduct']);
      return  $this->callView('detail', $data);       
    }
}


?>