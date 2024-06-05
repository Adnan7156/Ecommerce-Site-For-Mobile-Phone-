<?php
$approot = $_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/"; 
// img
$file_name = "IMG".time()."_".$_FILES['picture']['name'];

$target = $_FILES['picture']['tmp_name'];

$destination = $approot.'uploads/'.$file_name;

$is_file_move = move_uploaded_file($target, $destination);

if($is_file_move){
    $_picture = $file_name;
}else{
    $_picture = null;
}


if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}

$_id = $_POST['id'];
$_body = $_POST['body'];    
$_name = $_POST['name'];    
$_designation = $_POST['designation'];   

$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";

$query = "UPDATE `testimonial` SET `is_active`=:is_active,`picture`=:picture,`body` = :body, `name` = :name, `designation` = :designation 
          WHERE `testimonial`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':body', $_body);
$stmt->bindParam(':name', $_name); 
$stmt->bindParam(':designation', $_designation); 
$result = $stmt->execute();
var_dump($result);

header("location:index.php");

