<?php
$_id=$_POST['id'];
$_title=$_POST['title'];       


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";



$query= "UPDATE `banners` SET `title` = :title WHERE `banners`.`id` = :id";

$stmt=$conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':title', $_title);

$result = $stmt->execute();
var_dump($result);

header("location:index.php");