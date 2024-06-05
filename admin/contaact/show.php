<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Contactus;
$_contactus=new Contactus();
$contacts=$_contactus->show();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="../element/style.css">
  </head>
  <body>
  <?php
  include_once("../element/body.php");
  ?>
  <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-3">Show</h1>
            
            <ul class="nav d-flex fs-4 fw-bold mb-2">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </li>
                </ul>

            <dl class="row">
             <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9"><?= $contacts['id'];?> </dd>
            </dl>
            <dl class="row">
             <dt class="col-sm-3">name:</dt>
                <dd class="col-sm-9"><?= $contacts['name'];?> </dd>
        
             <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9"><?= $contacts['email'];?> </dd>
            
             <dt class="col-sm-3">Subjecct:</dt>
                <dd class="col-sm-9"><?= $contacts['subject'];?> </dd>
            
             <dt class="col-sm-3">comment:</dt>
                <dd class="col-sm-9"><?= $contacts['comment'];?> </dd>
            </dl>

        </div>
    </div>
</div>
</section><br><br><br><br>

<?php
  include_once("../element/footer.php");
  ?> 

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>