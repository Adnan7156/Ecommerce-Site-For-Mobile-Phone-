<?php
$webroot="http://localhost/ecommerce_project backup/";
$_id=$_GET['id'];


$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ecommerce_project", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM `testimonial`WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(':id',$_id);
$stmt->execute();
$testimonial=$stmt->fetch();

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
            <form method="post" action="update.php" enctype="multipart/form-data">

            <div class="mb-3 row">
         <label for="inputID" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control" 
                name="id"
                value="<?= $testimonial['id'];?>"
                id="inputID"
               >
            </div>
             </div>

             <div class="mb-3 row form-check">

                        <div class="col-sm-6">

                            <?php
                            if($testimonial['is_active'] == 0){
                            ?>
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_active"
                                    value="1"
                                    id="inputIsActive">

                            <?php
                            }else{
                            ?>
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_active"
                                    value="1"
                                    checked
                                    id="inputIsActive">

                            <?php
                            }
                            ?>


                        </div>
                        <label for="inputIsActive" class="col-sm-6 form-check-label">Is Active</label>
                    </div>
             
             
             <div class="mb-3 row">
         <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
              <input
                type="file"
                class="form-control" 
                name="picture"
                value="<?= $testimonial['picture'];?>"
                id="inputPicture"
               >
               <img src="<?=$webroot?>uploads/<?= $testimonial['picture'] ?>" alt="banner" class="img-fluid">
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputBody" class="col-sm-2 col-form-label">Body</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="body"
                value="<?= $testimonial['body'];?> "
                id="inputBody"
               >
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="name"
                value="<?= $testimonial['name'];?> "
                id="inputName"
               >
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputDesignation" class="col-sm-2 col-form-label">Designation</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="designation"
                value="<?= $testimonial['designation'];?> "
                id="inputDesignation"
               >
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