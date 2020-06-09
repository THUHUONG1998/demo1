<?php 
require_once 'dbconnect.php';
class detailModel extends DBConnect {
    function getdataUrl($url){
        $sql = "SELECT products.*, page_url.id as `idurl`, page_url.url 
                FROM products, page_url
                WHERE page_url.id = products.id_url AND page_url.url = '$url'";
        return $this->getOneRow($sql);
    }
    function getdataRelatedProduct($url){
        $sql="SELECT products.*, page_url.url 
        FROM products, page_url 
        WHERE page_url.id = products.id_url AND products.id_type = (SELECT products.id_type 
                                                                    FROM products, page_url
                                                                 WHERE  page_url.id= products.id_url AND page_url.url = '$url' )";
         return $this->getMoreRows($sql) ;                                                     
    }
    

}
// $url= $_GET['url'];
// echo $url;
// $a = new detailModel;
// $r = $a->getdataUrl($url);
// print_r($r);


?>