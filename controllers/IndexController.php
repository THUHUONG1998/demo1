<?php 
require_once 'BaseController.php';
require_once 'models/indexModel.php';
class IndexController extends  BaseController{

    function Home(){
        $a = new indexModel();
       $r = $a->getFeatureProduct();
       $s = $a->getdataSlide();
     // print_r ($r);
        $ts = $a->getdataTopSeller();
        $bs = $a->getdataBestSeller();
        $os= $a->getdataOnSeller();
    $data = ['featureProduct'=> $r, 'slide'=> $s, 'topseller'=> $ts, 'bestseller'=> $bs, 'onseller'=>$os];
    $this->callView('home', $data);// truyen cho $data bien $r
    }
}
// $x=new IndexController();
// $x->Home();
?>