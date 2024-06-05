<?php
$webroot="http://localhost/ecommerce_project backup/";
$_id=$_GET['id'];


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM `labels`WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$labels=$stmt->fetch();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">Edit</h1>
            <form method="post" action="update.php">

            <div class="mb-3 row">
         <label for="inputID" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control" 
                name="id"
                value="<?= $labels['id'];?>"
                id="inputID"
               >
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="title"
                value="<?= $labels['title'];?>"
                id="inputTitle"
               >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
              <input
                type="file"
                class="form-control" 
                name="picture"
                value="<?=$labels['picture'];?> "
                id="inputPicture">
                <img src="<?=$webroot?>uploads/<?= $labels['picture'] ?>" alt="Picture" class="img-fluid">
                
                
                <input 
                                 type="hidden"
                                 name="old_picture"
                                value="<?= $labels['picture'];?>">
                            
                        </div>
                    </div>
            <button type="submit" class="btn btn-secondary mt-3">Submit</button>




            </form>


        </div>
    </div>
</div>

 </section>  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>