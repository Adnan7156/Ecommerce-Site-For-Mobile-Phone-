
<?php
$_name=$_POST['name'];       
$_link=$_POST['link']; 
$_created_at = date("Y-m-d h:i:s");

if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}

//conection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
//insert query


$query= "INSERT INTO `popular_tag` (`name`,`link`,`is_active`,`created_at`) 
VALUES (:name,:link,:is_active,:created_at)";

$stmt=$conn->prepare($query);
$stmt->bindParam(':name',$_name); 
$stmt->bindParam(':link',$_link); 
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':created_at', $_created_at);
$result=$stmt->execute();
header("location:index.php");

?>