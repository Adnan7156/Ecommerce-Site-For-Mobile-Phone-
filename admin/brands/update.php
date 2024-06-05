<?php
$_id=$_POST['id'];
$_title=$_POST['title'];      
$_link=$_POST['link'];   
$_modified_at = date("Y-m-d h:i:s");

if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}   


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";



$query= "UPDATE `brands` SET `is_active`=:is_active,`title` = :title, `link` = :link,`modified_at`=:modified_at  WHERE `brands`.`id` = :id";

$stmt=$conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':modified_at', $_modified_at);

$result = $stmt->execute();
var_dump($result);

header("location:index.php");