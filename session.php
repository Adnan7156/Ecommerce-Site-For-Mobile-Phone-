<?php

session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . "/ecommerce_project backup/config.php");
$_SESSION['is_authenticated'] = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $role = "";

    $conn = new PDO("mysql:host=$servername; dbname=ecommerce_project", $username, $password);
   

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

  
    
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $redirect = $_POST['redirect'];

    

    $sql = "SELECT id, user_name, email, password,address, role FROM users WHERE user_name=:user_name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->execute();
    $result = $stmt->fetch();
    $result_id = $result['id'] ?? null;
    $result_email = $result['email'] ?? null;
    $result_password = $result['password'] ?? null;
    $result_address = $result['address'] ?? null;
    $result_user_name = $result['user_name'] ?? null;
    $result_role_id = $result['role'] ?? null;
    if ($result_user_name == $user_name && $result_password === $password) {
       
        $_SESSION['user_id'] = $result_id;
        $_SESSION['username'] = $result_user_name;
        $_SESSION['email'] = $result_email;
        $_SESSION['address'] = $result_address;
        $_SESSION['role_id'] = $result_role_id;
        $_SESSION['is_authenticated'] = true;
        if ($_SESSION['role_id'] === "admin") {
            if ($redirect) {
                header("location:".$redirect);
            }else{
                header('location: ./admin/dashboard.php');
            }
        } else {
            if ($redirect) {
                header("location:".$redirect);
            }else{
                header('location: ./front/php/public/index.php');
            }
        }
        exit();
    } else {
        $_SESSION['is_authenticated'] = false;
        header("location:./front/php/public/login.php");
        // $error_msg = 'user name and Password is not matched';
        // header('location: signin.php?error=' . urlencode($error_msg));
    }
}
