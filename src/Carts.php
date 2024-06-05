<?php
namespace App;

use PDO;

 class Carts{
public $id=null;public $product_id=null;
public $conn = null;
public function __construct()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

    
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
 public function index(){
    

    $query="SELECT * FROM `carts`WHERE `is_ordered` = 0 ";
    $stmt=$this->conn->prepare($query);
    $stmt->execute();
    $carts=$stmt->fetchAll();
    return $carts;

 }
 public function store()
 {

     $_product_id = $_POST['product_id'];
     $_user_id = $_POST['user_id'];
     $_address = $_POST['address'];
     $_producttitle = $_POST['producttitle'];
     $_cost = $_POST['cost'];
     $_mrp = intval($_POST['mrp']);

    
     $_qty = intval($_POST['qty']);
     
     $_picture = $_POST['picture'];
     $_total_price = $_mrp * $_qty;
     $getCartProduct = $this->getCartProduct($_product_id, $_user_id);

     if ($getCartProduct) {
        
         $_id = $getCartProduct['id'];
         $_qty = $_POST['qty'];

         $updatedTotalPrice = $getCartProduct['total_price'] + $_total_price;
         $updatedQty = $getCartProduct['qty'] + $_qty;
         $query = "UPDATE `carts` SET `total_price` = :total_price, `qty` = :qty WHERE `carts`.`id` = :id";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':id', $_id);
         $stmt->bindParam(':total_price', $updatedTotalPrice);
         $stmt->bindParam(':qty', $updatedQty);
         $result = $stmt->execute();
     }else{
         $query = "INSERT INTO `carts` (`product_id`,`user_id`, `producttitle`, `mrp`,`total_price`,`qty`,`picture`,`address`,`cost`)
                                VALUES   (:product_id, :user_id, :producttitle,  :mrp, :total_price, :qty, :picture,:address,:cost)";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':product_id', $_product_id);
         $stmt->bindParam(':user_id', $_user_id);
         $stmt->bindParam(':producttitle', $_producttitle);
         $stmt->bindParam(':mrp', $_mrp);
         $stmt->bindParam(':total_price', $_total_price);
         $stmt->bindParam(':qty', $_qty);
         $stmt->bindParam(':address', $_address);
         $stmt->bindParam(':cost', $_cost);
         $stmt->bindParam(':picture', $_picture);
         $result = $stmt->execute();
     }




     header("location: http://localhost/ecommerce_project backup/front/php/public/shopping_cart.php");
 }
 public function getCartProduct($productId, $_user_id)
 {
     $query = "SELECT * FROM `carts` WHERE product_id = :productId AND user_id = :user_id AND is_ordered = 0";
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(':productId', $productId);
     $stmt->bindParam(':user_id', $_user_id);
     $stmt->execute();
     $cart = $stmt->fetch();
     return $cart;
 }

  public function show (){

    
    $webroot="http://localhost/ecommerce_project backup/";



$_id=$_GET['id'];

$query="SELECT * FROM `carts`WHERE id=:id";
$stmt=$this->conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$carts=$stmt->fetch();
return $carts;
  }
   public function edit (){
    $webroot="http://localhost/ecommerce_project backup/";  



    $_id=$_GET['id'];
    
    
    $query="SELECT * FROM `carts`WHERE id=:id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->execute();
    $carts=$stmt->fetch();
    return $carts;
    

   }
   public function update(){
    $approot = $_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/"; 

    // img
    if($_FILES['picture']['name'] !="")
    {
    $file_name = "IMG".time()."_".$_FILES['picture']['name'];
    
    $target = $_FILES['picture']['tmp_name'];
    
    $destination = $approot.'uploads/'.$file_name;
    
    $is_file_move = move_uploaded_file($target, $destination);
    
    if($is_file_move){
        $_picture = $file_name;
    }else{
        $_picture = null;
    }
    }
    else{
        $_picture = $_POST['old_picture'];
    }
    
    $_id=$_POST['id'];
    $_product_id=$_POST['product_id'];             
    $_producttitle=$_POST['producttitle'];  
    $_unit_price=$_POST['unit_price'];       
    $_qty=$_POST['qty'];       
    $_total_price=$_POST['total_price'];
    
   
    
    
    $query= "UPDATE `carts` SET `product_id`=:product_id,`producttitle` = :producttitle,`picture`=:picture, `unit_price`=:unit_price,`qty`=:qty,`total_price`=:total_price WHERE `carts`.`id` = :id";
    
    $stmt=$this->conn->prepare($query);
    
    $stmt->bindParam(':id', $_id);
    $stmt->bindParam(':product_id',$_product_id); 
    $stmt->bindParam(':producttitle',$_producttitle); 
    $stmt->bindParam(':unit_price',$_unit_price); 
    $stmt->bindParam(':qty',$_qty); 
    $stmt->bindParam(':total_price',$_total_price); 
    $stmt->bindParam(':picture',$_picture); 
    $result = $stmt->execute();
    header("location:index.php");

   }
   public function delete(){


    $_id = $_POST['cart_id'];

$query = "DELETE FROM carts WHERE `carts`.`id` = :id";

$stmt = $this->conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

header("location:http://localhost/ecommerce_project backup/front/php/public/shopping_cart.php");
    
  }
  
  // retrive cart product using user_id 
  public function getUserCartProducts($userId)
  {
      $query = "SELECT * FROM `carts` WHERE user_id = :userId AND is_ordered = 0";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':userId', $userId);
      $stmt->execute();
      return $stmt->fetchAll();
  }



 }