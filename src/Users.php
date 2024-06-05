<?php
namespace App;
use PDO;
// session_start();
if (!isset($_SESSION['is_authenticated'])) {
    header("location: ./../../front/php/public/login.php");
}
class Users{
    public $id=null;
    public $first_name=null;
    public $last_name=null;
    public $conn=null;

public function __construct()
{
$servername = "localhost";
$username = "root";
$password = "";
$this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }

    public function index(){


$query="SELECT * FROM `users`";
$stmt=$this->conn->prepare($query);
$stmt->execute();
$users=$stmt->fetchAll();
return $users;
    }
    public function store(){

        $_first_name = $_POST['first_name'];
        $_last_name = $_POST['last_name'];
        $_user_name = $_POST['user_name'];
        $_email = $_POST['email'];
        $_password = $_POST['password']; 
        $_number = $_POST['number'];
        $_address = $_POST['address'];
        
        
            
        
            
            $sql = "INSERT INTO `users`(`first_name`, `last_name`,`user_name`, `email`,`Password`, `number`, `address`)
            VALUES (:first_name, :last_name, :user_name, :email, :password, :number, :address)";
        
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':first_name', $_first_name);
        $stmt->bindParam(':last_name', $_last_name);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':number', $_number);
        $stmt->bindParam(':address', $_address);
        
        
         $stmt->execute();
         header("location:index.php");

    }
    public function edit(){
        $_id=$_GET['id'];

    
       
       
        $query="SELECT * FROM `users`WHERE id=:id";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id',$_id);
        $stmt->execute();
        $users=$stmt->fetch();
        return $users;

    }
    public function update(){

        
$_id= $_POST['id'];
$_first_name = $_POST['first_name'];
$_last_name = $_POST['last_name'];
$_user_name = $_POST['user_name'];
$_email = $_POST['email'];
$_password = $_POST['password']; 
$_number = $_POST['number'];
$_address = $_POST['address'];



$query = "UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name, `user_name` = :user_name, `email` = :email,`password` = :password,`number`=:number,`address`=:address
 WHERE `users`.`id` = :id";

 $stmt = $this->conn->prepare($query);
 
 $stmt->bindParam(':id', $_id);
 $stmt->bindParam(':first_name', $_first_name);
 $stmt->bindParam(':last_name', $_last_name);
 $stmt->bindParam(':user_name', $_user_name);
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':password', $_password);
 $stmt->bindParam(':number', $_number);
 $stmt->bindParam(':address', $_address);
 

 $result = $stmt->execute();
 header("location:index.php");
    }

    public function delete(){
        
$_id=$_GET['id'];


    
$query="DELETE FROM users WHERE `users`.`id` = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $_id); 
$stmt->execute();
header("location:index.php");
    }
    public function show (){

    
 
        $_id=$_GET['id'];
        
        
        $query="SELECT * FROM `users`WHERE id=:id";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id',$_id);
        $stmt->execute();
        $users=$stmt->fetch();
        return $users;
        
            }
    public function SignUp(){
        $webroot="http://localhost/ecommerce_project backup/";

        $_first_name = $_POST['first_name'];
        $_last_name = $_POST['last_name'];
        $_user_name = $_POST['user_name'];
        $_email = $_POST['email'];
        $_password = $_POST['password']; 
        $_number = $_POST['number'];
        $_address = $_POST['address'];
        
        
            
        
            
            $sql = "INSERT INTO `users`(`first_name`, `last_name`,`user_name`, `email`,`Password`, `number`, `address`)
            VALUES (:first_name, :last_name, :user_name, :email, :password, :number, :address)";
        
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':first_name', $_first_name);
        $stmt->bindParam(':last_name', $_last_name);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':number', $_number);
        $stmt->bindParam(':address', $_address);
        
        
         $stmt->execute();
         header("location:".$webroot."front/php/public/login.php");

    }
    public function login(){
        session_start();
        $webroot="http://localhost/ecommerce_project backup/";

        $_user_name = $_POST['user_name'];
        $_password = $_POST['password'];
        $admin = 'admin';
        $admin = "SELECT COUNT(*) AS total FROM users WHERE user_name LIKE :user_name AND is_admin = 'admin' AND password LIKE :password";

        $stmt_admin = $this->conn->prepare($admin);
        $stmt_admin->bindParam(':user_name', $_user_name);
        $stmt_admin->bindParam(':password', $_password);
        $stmt_admin->execute();
        $total_admin = $stmt_admin->fetch();
        if ($total_admin['total'] > 0) {
            header("location:" . $webroot . "admin/dashboard.php");
            return;
        }
        $query = "SELECT COUNT(*) AS total FROM users WHERE user_name LIKE :user_name AND password LIKE :password";
        $stmt = $this->conn->prepare($query);
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':password', $_password);
        $stmt->execute();
        $total_found = $stmt->fetch();
        if ($total_found['total'] > 0) {
            $_SESSION['is_authenticated'] = true;

            header("location:".$webroot."front/php/public/index.php");
        } else {
            $_SESSION['is_authenticated'] = false;

            header("location:" . $webroot . "404.php");
        }
    }
}

