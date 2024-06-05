<?php
    session_start();
    if(!isset($_SESSION['is_authenticated']))
    {
        header('location: ./../front/php/public/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  include_once("element/head.php");
  ?>

<body>

<?php
include_once("element/body.php");
include_once("element/footer.php");
?>
</body>
</html>
