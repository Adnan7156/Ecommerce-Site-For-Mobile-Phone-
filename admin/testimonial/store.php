
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



$_body=$_POST['body'];    
$_name=$_POST['name'];    
$_designation=$_POST['designation'];       
    

//conection to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
//insert query


$query= "INSERT INTO `testimonial` ( `is_active`,`picture`, `body`, `name`, `designation`) 
VALUES (:is_active,:picture,:body,:name,:designation)";

$stmt=$conn->prepare($query);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':picture',$_picture); 
$stmt->bindParam(':body',$_body); 
$stmt->bindParam(':name',$_name); 
$stmt->bindParam(':designation',$_designation);  
$result=$stmt->execute();

header("location:index.php");