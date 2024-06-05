<?php
namespace App;
use PDO;
class Contactus{
    public $id=null;
    public $_name=null;
    public $_email=null;
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
    public function index() {
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query="SELECT * FROM `contacts`WHERE is_deleted=0";
    $stmt=$this->conn->prepare($query);
    $stmt->execute();
    $contacts=$stmt->fetchAll();
    return $contacts;
    }
    public function store(){
$_name=$_POST['name'];       
$_email=$_POST['email'];       
$_subject=$_POST['subject'];       
$_comment=$_POST['comment'];       


       
$query= "INSERT INTO `contacts` (`name`,`email`,`subject`,`comment`) VALUES (:name, :email, :subject, :comment)";

$stmt=$this->conn->prepare($query);
$stmt->bindParam(':name',$_name); 
$stmt->bindParam(':email',$_email); 
$stmt->bindParam(':subject',$_subject); 
$stmt->bindParam(':comment',$_comment); 
$result=$stmt->execute();
header("location:index.php");
    }

    public function show(){
        $_id=$_GET['id'];
        $query="SELECT * FROM `contacts`WHERE id=:id";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(':id',$_id);
        $stmt->execute();
        $contacts=$stmt->fetch();
        return $contacts;

    }
    public function edit(){
     $_id=$_GET['id'];

    $query="SELECT * FROM `contacts`WHERE id=:id";
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':id',$_id);
    $stmt->execute();
    $contacts=$stmt->fetch();
    return $contacts;
    }


    public function update(){
 $_id=$_POST['id'];
$_name=$_POST['name'];       
$_email=$_POST['email'];       
$_subject=$_POST['subject'];       
$_comment=$_POST['comment'];     


$query= "UPDATE `contacts` SET `name` = :name,`email`=:email,`subject`=:subject,`comment`=:comment WHERE `contacts`.`id` = :id";

$stmt=$this->conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':name', $_name);
$stmt->bindParam(':email', $_email);
$stmt->bindParam(':subject', $_subject);
$stmt->bindParam(':comment', $_comment);

$result = $stmt->execute();

header("location:index.php");
    }

    public function trash(){

        $_id=$_GET['id'];
        $_is_deleted=1; 
        
        $query="UPDATE `contacts` SET `is_deleted`=:is_deleted WHERE `contacts`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id); 
        $stmt->bindParam(':is_deleted', $_is_deleted); 
        
        $stmt->execute();
        header("location:index.php");

    }
public function trash_index(){


$query="SELECT * FROM `contacts`WHERE is_deleted=1";
$stmt=$this->conn->prepare($query);
$stmt->execute();
$contacts=$stmt->fetchAll();
return $contacts;

}
public function restore(){

$_id=$_GET['id'];
$_is_deleted= 0;

$query="UPDATE `contacts` SET `is_deleted`=:is_deleted WHERE `contacts`.`id` = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $_id); 
$stmt->bindParam(':is_deleted', $_is_deleted); 
$stmt->execute();
header("location:index.php");
}
public function delete(){
    $_id=$_GET['id'];

$query="DELETE FROM contacts WHERE `contacts`.`id` = :id";
$stmt = $this->conn->prepare($query);
$stmt->bindParam(':id', $_id); 
$stmt->execute();
header("location:trash_index.php");
}

public function user_store(){
    $webroot="http://localhost/ecommerce_project backup/";
    $_name=$_POST['name'];       
    $_email=$_POST['email'];       
    $_subject=$_POST['subject'];       
    $_comment=$_POST['comment'];       
    
    
           
    $query= "INSERT INTO `contacts` (`name`,`email`,`subject`,`comment`) VALUES (:name, :email, :subject, :comment)";
    
    $stmt=$this->conn->prepare($query);
    $stmt->bindParam(':name',$_name); 
    $stmt->bindParam(':email',$_email); 
    $stmt->bindParam(':subject',$_subject); 
    $stmt->bindParam(':comment',$_comment); 
    $result=$stmt->execute();
    

        }

}