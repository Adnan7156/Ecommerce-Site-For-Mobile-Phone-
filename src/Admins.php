<?php
namespace App;

use PDO;

class Admins
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

        $query = "SELECT * FROM `admin` WHERE is_deleted= 0 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $admins = $stmt->fetchAll();
        return $admins;
    }

    public function store()
    {


        $_name = $_POST['name'];
        $_email = $_POST['email'];
        $_password = $_POST['password'];
        $_phone = $_POST['phone'];
        $_created_at = date("Y-m-d h:i:s");



        $query = "INSERT INTO `admin` (`name`,`email`,`password`,`phone`,`created_at`) 
        VALUES (:name,:email,:password,:phone,:created_at)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':phone', $_phone);
        $stmt->bindParam(':created_at', $_created_at);

        $result = $stmt->execute();

        header("location:index.php");


    }
    public function show()
    {
        $_id = $_GET['id'];
        $query = "SELECT * FROM `admin`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $admin = $stmt->fetch();
        return $admin;


    }


    public function edit()
    {

        $_id = $_GET['id'];
        $query = "SELECT * FROM `admin`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $admins = $stmt->fetch();
        return $admins;
    }


    public  function update(){

        $_id=$_POST['id'];
        $_name=$_POST['name'];       
        $_email=$_POST['email'];       
        $_password=$_POST['password'];       
        $_phone=$_POST['phone']; 
        $_modified_at = date("Y-m-d h:i:s");      
        
        
        $query= "UPDATE `admin` SET `name` = :name,`email`=:email,`password`=:password,`phone`=:phone,`modified_at`=:modified_at WHERE `admin`.`id` = :id";
        
        $stmt=$this->conn->prepare($query);
        
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':email', $_email); 
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':phone', $_phone);
        $stmt->bindParam(':modified_at', $_modified_at);  
        $result = $stmt->execute();
        
        header("location:index.php");


    }


    public function trash_index(){

$query="SELECT * FROM `admin` WHERE is_deleted= 1 ";
$stmt=$this->conn->prepare($query);
$stmt->execute();
$admins=$stmt->fetchAll();
return $admins;
    }


    public function trash (){

        $_id=$_GET['id'];
        $_is_deleted=1; 
        
        $query="UPDATE `admin` SET `is_deleted`=:is_deleted WHERE `admin`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id); 
        $stmt->bindParam(':is_deleted', $_is_deleted); 
        
        $stmt->execute();
        header("location:index.php");

    }
    public function restore(){
        $_id=$_GET['id'];
        $_is_deleted= 0;
        
        $query="UPDATE `admin` SET `is_deleted`=:is_deleted WHERE `admin`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id); 
        $stmt->bindParam(':is_deleted', $_is_deleted); 
        $stmt->execute();
        header("location:index.php");



    }
    public function delete(){

        $_id=$_GET['id'];
        $query="DELETE FROM admin WHERE `admin`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id); 
        $stmt->execute();
        header("location:trash_index.php");

    }


    public function login(){
        session_start();
        $webroot="http://localhost/ecommerce_project backup/";
       
        $_name = $_POST['user_name'];
        $_password = $_POST['password'];

        $query = "SELECT COUNT(*) AS total FROM `admin` WHERE  name=:user_name AND password = :password";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':password', $_password);

        $stmt->execute();
        $total_found = $stmt->fetch();


        if($total_found['total'] > 0){
            $_SESSION['is_authenticated'] = true;

            header("location:".$webroot."admin/dashboard.php");
        }else{
            $_SESSION['is_authenticated'] = false;

            header("location:".$webroot."404.php");

        }





    }
    

}