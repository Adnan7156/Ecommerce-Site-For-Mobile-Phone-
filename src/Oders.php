<?php
namespace App;
use PDO;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['is_authenticated'])) {
    $current_url = $_SERVER['REQUEST_URI'];
    header("location: ./../../front/php/public/login.php?previous_url=$current_url");
}


class Oders
{
    public $id = null;

    public $conn = null;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    public function index()
    {
        $query = "SELECT * FROM `orders`";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $orders = $stmt->fetchAll();
        return $orders;
    }
    public function store()
{

    $this->conn->beginTransaction();

    $getProducts = $this->getProductsFromCart($_SESSION['user_id']);
    if ($getProducts) {
        foreach ($getProducts as $getProduct) {
            if ($getProduct['is_ordered'] == 1) {
                
                continue;
            }

            $_product_id = $getProduct['product_id'];
            $_producttitle = $getProduct['producttitle'];
            $_qty = $getProduct['qty'];
            $_user_id = $getProduct['user_id'];
            $_address = $getProduct['address'];
            $_cost = $getProduct['cost'];
            $_total_price = $getProduct['total_price'];
            $_invoice_number = "INV" . $_user_id . date('d-m-y');

            $query = "INSERT INTO `orders` 
                      (`product_id`, `producttitle`, `qty`, `user_id`, `total_price`, `address`, `cost`,`invoice_number`) 
                      VALUES (:product_id, :producttitle, :qty, :user_id, :total_price, :address,:cost, :invoice_number)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':product_id', $_product_id);
            $stmt->bindParam(':producttitle', $_producttitle);
            $stmt->bindParam(':qty', $_qty);
            $stmt->bindParam(':user_id', $_user_id);
            $stmt->bindParam(':address', $_address);
            $stmt->bindParam(':cost', $_cost);
            $stmt->bindParam(':total_price', $_total_price);
            $stmt->bindParam(':invoice_number', $_invoice_number);
            $result = $stmt->execute();

            if ($result) {
                
                $query = "SELECT `stock` FROM `products` WHERE `id` = :product_id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':product_id', $_product_id);
                $stmt->execute();
                $current_stock = $stmt->fetchColumn();

        
                $new_stock = $current_stock - $_qty;

                $query = "UPDATE `products` SET `stock` = :new_stock WHERE `id` = :product_id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':new_stock', $new_stock);
                $stmt->bindParam(':product_id', $_product_id);
                $stmt->execute();

             
                $_id = $getProduct['id'];
                $query = "UPDATE `carts` SET `is_ordered` = 1 WHERE `id` = :id";;
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':id', $_id);
                $stmt->execute();
            }
        }
    } else {
        $_product_id = $_POST['product_id'];
        $_producttitle = $_POST['producttitle'];
        $_qty = $_POST['qty'];
        $_user_id = $_POST['user_id'];
        $_total_price = $_POST['grand_total'];
        $_invoice_number = "INV" . $_user_id . date('d-m-y');
        $_address = $_POST['address'];

        $query = "INSERT INTO `orders` 
                  (`product_id`, `producttitle`, `qty`, `user_id`, `total_price`, `address`, `invoice_number`) 
                  VALUES (:product_id, :producttitle, :qty, :user_id, :total_price, :address, :invoice_number)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $_product_id);
        $stmt->bindParam(':producttitle', $_producttitle);
        $stmt->bindParam(':qty', $_qty);
        $stmt->bindParam(':user_id', $_user_id);
        $stmt->bindParam(':total_price', $_total_price);
        $stmt->bindParam(':address', $_address);
        $stmt->bindParam(':invoice_number', $_invoice_number);
        $result = $stmt->execute();
    }

   
    $this->conn->commit();

    header("location: ./../../front/php/view/elements/thanks.php");
}

    public function getProductsFromCart($userId)
    {
        $query = "SELECT * FROM `carts` WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function show()
    {
        $_id = $_GET['id'];


        $query = "SELECT * FROM `orders`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $orders = $stmt->fetch();

        return $orders;

    }
    public function edit()
    {
        $_id = $_GET['id'];


        $query = "SELECT * FROM `orders`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $orders = $stmt->fetch();

        return $orders;
    }


    public function update()
    {
        $_id = $_POST['id'];
        $_product_id = $_POST['product_id'];
        $_qty = $_POST['qty'];

        $query = "UPDATE `orders` SET `product_id` = :product_id ,`qty`=:qty WHERE `orders`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':product_id', $_product_id);
        $stmt->bindParam(':qty', $_qty);

        $result = $stmt->execute();
        var_dump($result);

        header("location:index.php");
    }

    public function delete()
    {
        $_id = $_GET['id'];

        $query = "DELETE FROM orders WHERE `orders`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        header("location:index.php");

    }

}
