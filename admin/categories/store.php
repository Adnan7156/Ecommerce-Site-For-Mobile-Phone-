
<?php
$_name=$_POST['name'];       
$_created_at = date("Y-m-d h:i:s");      


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query= "INSERT INTO `categories` (`name`,`created_at`)
 VALUES (:name, :created_at)"; 

$stmt=$conn->prepare($query);
$stmt->bindParam(':name',$_name); 
$stmt->bindParam(':created_at',$_created_at);
$result=$stmt->execute();

header("Location: index.php");
