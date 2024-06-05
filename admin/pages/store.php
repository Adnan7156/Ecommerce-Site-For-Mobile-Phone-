
<?php
$_title=$_POST['title'];       
$_description=$_POST['description'];       
$_link=$_POST['link'];       

//conection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
//insert query


$query= "INSERT INTO `pages` (`title`,`description`,`link`) VALUES (:title,:description,:link)"; 

$stmt=$conn->prepare($query);
$stmt->bindParam(':title',$_title); 
$stmt->bindParam(':description',$_description); 
$stmt->bindParam(':link',$_link); 
$result=$stmt->execute();

?>