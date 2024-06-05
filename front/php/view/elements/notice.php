<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Notice;
$_notice = new Notice();
$notices = $_notice->index();

$lastNotice = end($notices);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notice</title>
  <style>
    @keyframes moveLeftToRight {
      0% {
        transform: translateX(-100%);
      }
      100% {
        transform: translateX(100%);
      }
    }
    .notice-container {
      overflow: hidden;
      white-space: nowrap;
      justify-content: center;
    }
    .notice p {
      display:block; 
      animation: moveLeftToRight 18s linear infinite;
    }
  </style>
</head>
<body>
  <div class="container mt-2">
    <div class="notice-container">
      <div class="notice" role="alert">
        <?php
        if (isset($lastNotice['notice'])) {
          echo "<p>{$lastNotice['notice']}</p>";
        } else {
          echo "<p>No notice available.</p>";
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
