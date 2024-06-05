
<?php
$_email=$_POST['email'];       
$_reason=$_POST['reason'];   
$_created_at = date("Y-m-d h:i:s");    

//conection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
//insert query


$query= "INSERT INTO `subscribers` (`email`,`reason`,`created_at`) 
VALUES (:email,:reason,:created_at)";

$stmt=$conn->prepare($query);
$stmt->bindParam(':email',$_email); 
$stmt->bindParam(':reason',$_reason); 
$stmt->bindParam(':created_at', $_created_at);
$result=$stmt->execute();

header("location:index.php");