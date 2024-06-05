<?php
$_id=$_POST['id'];
$_email=$_POST['email'];       
$_reason=$_POST['reason'];  
$_modified_at = date("Y-m-d h:i:s");      


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";



$query= "UPDATE `subscribers` SET `email` = :email,`reason` = :reason,`modified_at`=:modified_at WHERE `subscribers`.`id` = :id";

$stmt=$conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':email', $_email);
$stmt->bindParam(':reason', $_reason);
$stmt->bindParam(':modified_at', $_modified_at);


$result = $stmt->execute();
var_dump($result);

header("location:index.php");