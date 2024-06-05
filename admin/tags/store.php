
<?php
$_title=$_POST['title'];       

//conection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
//insert query


$query= "INSERT INTO `tags` (`title`) VALUES (:title)";

$stmt=$conn->prepare($query);
$stmt->bindParam(':title',$_title); 
$result=$stmt->execute();

