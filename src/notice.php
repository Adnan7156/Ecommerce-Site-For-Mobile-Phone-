<?php
namespace App;

use PDO;

class Notice
{

    public $id = null;
    public $conn = null;

    public function __construct()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $this->conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }


    public function index()
    {
        $query = "SELECT * FROM notice ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $notices = $stmt->fetchAll();
        return $notices;

    }

    public function store()
    {

        $_notice = $_POST['notice'];
        $query = "INSERT INTO `notice` ( `notice`) VALUES ( :notice)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':notice', $_notice);
        $result = $stmt->execute();

    }


    public function show() {

        $_id = $_GET['id'];

        $query = "SELECT * FROM `notice`WHERE id=:id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $notice = $stmt->fetch();
        return $notice;



    }
    public function edit()
    {
        $_id = $_GET['id'];

        $query = "SELECT * FROM `notice`WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $notice = $stmt->fetch();
        return $notice;
    }


    public function update()
    {
        $_id = $_POST['id'];
        $_notice = $_POST['notice'];

        $query = "UPDATE `notice` SET `notice` = :notice WHERE `notice`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':notice', $_notice);

        $result = $stmt->execute();


    }

    public function delete()
    {
        $_id = $_GET['id'];
        $query = "DELETE FROM notice WHERE `notice`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();


    }
}

