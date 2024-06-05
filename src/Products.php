<?php
namespace App;

use PDO;

class Products
{
    public $id = null;
    public $title = null;
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

        $query = "SELECT * FROM `products`where is_deleted=0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;

    }

    public function getActiveProducts()
    {
        $_startFrom = 0;
        $_total = 4;

        $query = "SELECT * FROM `products` WHERE is_Active= 1 LIMIT $_startFrom,$_total";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;

    }
    public function store()
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project backup/";
        
        //Working with image

        $file_name = "IMG" . time() . "_" . $_FILES['picture']['name'];

        $target = $_FILES['picture']['tmp_name'];

        $destination = $approot . 'uploads/' . $file_name;

        $is_file_move = move_uploaded_file($target, $destination);

        if ($is_file_move) {
            $_picture = $file_name;
        } else {
            $_picture = null;
        }


        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }
        
        if (array_key_exists('is_new', $_POST)) {
            $_is_new = $_POST['is_new'];
        } else {
            $_is_active = 0;
        }

        $_title = $_POST['title'];
        $_category_id = $_POST['category_id'];
        $_short_description = $_POST['short_description'];
        $_description = $_POST['description'];
        $_product_type = $_POST['product_type'];
      
        $_cost = $_POST['cost'];
        $_mrp = $_POST['mrp'];
        $_stock = $_POST['stock'];
        $_created_at = date("Y-m-d h:i:s");


        //insert query


        $query = "INSERT INTO `products` (`is_active`,`is_new`,`category_id`,`title`,`short_description`,`description`,`product_type`,`cost`,`mrp`,`picture`,`created_at`,`stock`)
                                    VALUES (:is_active,:is_new,:category_id,:title,:short_description,:description,:product_type,:cost,:mrp,:picture,:created_at,:stock)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_new', $_is_new);
        $stmt->bindParam(':category_id', $_category_id);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':short_description', $_short_description);
        $stmt->bindParam(':description', $_description);
        $stmt->bindParam(':product_type', $_product_type);

        $stmt->bindParam(':cost', $_cost);
        $stmt->bindParam(':mrp', $_mrp);
        $stmt->bindParam(':stock', $_stock);
        $stmt->bindParam(':created_at', $_created_at);
        $stmt->bindParam(':picture', $_picture);
        $result = $stmt->execute();

        header("location:index.php");

    }
    public function show()
    {
        $webroot="http://localhost/ecommerce_project backup/";

        $_id = $_GET['id'];

        $query = "SELECT * FROM `products`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $products = $stmt->fetch();
        return $products;
    }
    public function edit()
    {
        $webroot = "http://localhost/ecommerce_project backup/";

        $_id = $_GET['id'];


        $query = "SELECT * FROM `products`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $products = $stmt->fetch();
        return $products;

    }
    public function update()
    {
        $approot = $_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project backup/";

        // img
        if ($_FILES['picture']['name'] != "") {
            $file_name = "IMG" . time() . "_" . $_FILES['picture']['name'];

            $target = $_FILES['picture']['tmp_name'];

            $destination = $approot . 'uploads/' . $file_name;

            $is_file_move = move_uploaded_file($target, $destination);

            if ($is_file_move) {
                $_picture = $file_name;
            } else {
                $_picture = null;
            }
        } else {
            $_picture = $_POST['old_picture'];
        }

        

        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_new', $_POST)) {
            $_is_new = $_POST['is_new'];
        } else {
            $_is_new = 0;
        }


        $_id = $_POST['id'];
        $_title = $_POST['title'];
        $_short_description = $_POST['short_description'];
        $_description = $_POST['description'];
        $_product_type = $_POST['product_type'];
        $_total_sale = $_POST['total_sale'];
        $_cost = $_POST['cost'];
        $_mrp = $_POST['mrp'];
        $_stock = $_POST['stock'];

        $_modified_at = date("Y-m-d h:i:s");


        $query = "UPDATE `products` SET `is_active`=:is_active,`is_new`=:is_new,`title` = :title, `short_description` = :short_description, `description` = :description, `product_type` = :product_type, `total_sale` = :total_sale, `cost` = :cost, `mrp` =:mrp ,`picture`=:picture,`modified_at`=:modified_at,`stock`=:stock WHERE `products`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_new', $_is_new);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':short_description', $_short_description);
        $stmt->bindParam(':description', $_description);
        $stmt->bindParam(':product_type', $_product_type);
        $stmt->bindParam(':total_sale', $_total_sale);
        $stmt->bindParam(':cost', $_cost);
        $stmt->bindParam(':mrp', $_mrp);
        $stmt->bindParam(':stock', $_stock);
        $stmt->bindParam(':modified_at', $_modified_at);
        $stmt->bindParam(':picture', $_picture);
        $result = $stmt->execute();

        header("location:index.php");
    }

    public function delete()
    {
        $_id = $_GET['id'];

        $query = "DELETE FROM products WHERE `products`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        header("location:index.php");

    }
    public function restore()
    {
        $_id = $_GET['id'];
        $_is_deleted = 0;

        $query = "UPDATE `products` SET `is_deleted`=:is_deleted WHERE `products`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $stmt->execute();
        header("location:index.php");
    }
    public function trash()
    {
        $_id = $_GET['id'];
        $_is_deleted = 1;

        $query = "UPDATE `products` SET `is_deleted`=:is_deleted WHERE `products`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);

        $stmt->execute();
        header("location:index.php");

    }
    public function trash_index()
    {

        $query = "SELECT * FROM `products` WHERE is_deleted= 1 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }

    public function productdetail()
    {
        $webroot="http://localhost/ecommerce_project backup/";

        $_id = $_GET['id'];
        $query = "SELECT * FROM `products` WHERE id=:id";
        $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':id', $_id); 
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;


    }


    public function newproducts() {
        $_startFrom = 0;
        $_total = 4;
        
        $query = "SELECT * FROM `products` WHERE is_new = 1 LIMIT $_startFrom, $_total";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getProductsByCategoryId($id){

        $query="SELECT * FROM `products` WHERE is_deleted= 0 AND category_id = $id";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $products=$stmt->fetchAll();
        return  $products;
     
         }
         public function productSearch(){

            $keywords = $_POST['keywords'] ?? ''; 
            $searchTerm = "%{$keywords}%";
        
            $query = "SELECT * FROM `products` WHERE is_deleted = 0 AND title LIKE  :keywords ";
      
            $stmt = $this->conn->prepare($query);
        
            $stmt->bindParam(':keywords', $searchTerm);
            $stmt->execute();
            $products = $stmt->fetchAll();
           
           
            return $products;
        }
        public function getProduct($id){

            $query="SELECT * FROM `products` WHERE id = $id";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $product=$stmt->fetch();
            return  $product;
         
             }


    public function getProducts($category_id = null, $sort = 'asc')
    {

        $sort = strtoupper($sort) === 'DESC' ? 'DESC' : 'ASC';


        $query = "SELECT * FROM products WHERE is_deleted = 0";


        if ($category_id) {
            $query .= " AND category_id = :category_id";
        }


        $query .= " ORDER BY mrp $sort";


        $stmt = $this->conn->prepare($query);

        if ($category_id) {
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        }

        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
            
    }
        


