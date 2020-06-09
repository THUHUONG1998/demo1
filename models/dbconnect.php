<?php
class DBConnect
{
    private $dbh;
    private $stmt;
    function __construct() // auto run
    {
        try {
            $this->dbh = new PDO('mysql:dbname=shop-offline;host=127.0.0.1', 'root', '');
            $this->dbh->exec('SET NAMES utf8');// set utf8
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }
    function executeQuery($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
        $check = $this->stmt->execute(); 
        return $check; 
    }
    function getOneRow($sql)
    {
        $check = $this->executeQuery($sql);
        if ($check === true) return $this->stmt->fetch(PDO::FETCH_OBJ); 
        return false;
    }
    function getMoreRows($sql)
    {
        $check = $this->executeQuery($sql);
        if ($check === true) return $this->stmt->fetchAll(PDO::FETCH_OBJ); 
        return false;
    }
}
$d = new DBConnect;
// $sql = 'INSERT INTO product VALUES ( 2,"tập vở", 20000, "nội dung mặt hàng 2" ) ';
// $sql = 'DELETE FROM products WHERE ID="2"';
// $sql= 'SELECT * FROM products WHERE id= 1';

// $r = $d->getMoreRows($sql);
// print_r($r);
?>