<?php
namespace App;

use PDO;


class Categories
{
    public $id = null;
    public $title = null;
    public $conn = null;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);

        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }


    public function index()
    {


        $query = "SELECT * FROM `categories`WHERE is_deleted=0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;



    }



    public function show()
    {
        $_id = $_GET['id'];

        $query = "SELECT * FROM `categories`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $categories = $stmt->fetch();
        return $categories;

    }

    public function edit()
    {
        $_id = $_GET['id'];

        $query = "SELECT * FROM `categories`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $categories = $stmt->fetch();
        return $categories;



    }


    public function update()
    {

        $_id = $_POST['id'];
        $_name = $_POST['name'];
        $_modified_at = date("Y-m-d h:i:s");



        $query = "UPDATE `categories` SET `name` = :name,`modified_at`=:modified_at WHERE `categories`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();
        

        header("location:index.php");


    }

    public function trash()
    {

        $_id = $_GET['id'];
        $_is_deleted = 1;


        $query = "UPDATE `categories` SET `is_deleted`=:is_deleted WHERE `categories`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);

        $stmt->execute();
        header("location:index.php");



    }

    public function trash_index()
    {


        $servername = "localhost";
        $query = "SELECT * FROM `categories`WHERE is_deleted=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }

    public function restore()
    {
        $_id = $_GET['id'];
        $_is_deleted = 0;

        $query = "UPDATE `categories` SET `is_deleted`=:is_deleted WHERE `categories`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $stmt->execute();
        header("location:index.php");


    }

    public function delete(){
        $_id=$_GET['id'];

        $query="DELETE FROM categories WHERE `categories`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id); 
        $stmt->execute();
        header("location:index.php");


    }


}
