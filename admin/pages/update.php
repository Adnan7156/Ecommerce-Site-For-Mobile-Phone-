<?php
$_id=$_POST['id'];
$_title=$_POST['title'];       
$_description=$_POST['description'];       
$_link=$_POST['link'];       


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";



$query= "UPDATE `pages` SET `title` =:title, `description` = :description, `link` = :link WHERE `pages`.`id` = :id";

$stmt=$conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':description', $_description);
$stmt->bindParam(':link', $_link);

$result = $stmt->execute();
var_dump($result);

header("location:index.php");