<?php 
require_once 'dbconnect.php';
class indexModel extends dbconnect {
    function getFeatureProduct(){
        $sql= 'SELECT products.*, page_url.url 
        FROM products, page_url
        WHERE page_url.id = products.id_url AND products.status = 1';
        return $this->getMoreRows($sql);
    }
    function getdataSlide(){
        $sql= 'SELECT * FROM slide WHERE status = 1';
        return $this->getMoreRows($sql);
    }
    function getdataTopSeller(){
        $sql=' SELECT products.*, bill_detail.id_product, SUM(bill_detail.quantity) AS soluong, page_url.url 
        FROM products, bill_detail, page_url
        WHERE products.id = bill_detail.id_product AND page_url.id = products.id_url
        GROUP BY bill_detail.id_product 
        ORDER BY soluong DESC'; 
        return $this->getMoreRows($sql);
    }
    function getdataBestSeller(){
        $sql= 'SELECT products.*, bill_detail.id_product, SUM(bill_detail.quantity) AS soluong,page_url.url
        FROM products, bill_detail, page_url
         WHERE products.id = bill_detail.id_product AND products.status = 1 AND page_url.id = products.id_url
         GROUP BY bill_detail.id_product
         ORDER BY soluong DESC';
         return $this->getMoreRows($sql);
    }
    function getdataOnSeller(){
        $sql ='SELECT products.*, page_url.url 
        FROM products, page_url 
        WHERE products.new = 1 AND page_url.id = products.id_url 
        LIMIT 3';
         return $this->getMoreRows($sql);
    }

}

    // $aa = new indexModel();
    // $r = $aa->getdataBestSeller();
    // print_r($r);

?>