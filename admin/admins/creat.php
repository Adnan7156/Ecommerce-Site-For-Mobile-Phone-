<?php 
 include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php"); 
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creat</title>
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

            <h1 class="text-center mb-5">Add New</h1>
            <ul class="nav d-flex fs-4 fw-bold mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </li>
                </ul>

                
            <form method="post" action="store.php">

            <div class="mb-3 row">
         <label for="inputID" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control" 
                name="id"
                value=""
                id="inputID"
               >
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputTitle" class="col-sm-2 col-form-label">User Name</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="name"
                value=" "
                id="inputName"
               required>
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input
                type="email"
                class="form-control" 
                name="email"
                value=" "
                id="inputEmail"
               required>
            </div>
             </div>
             <div class="mb-3 row">
         <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="password"
                value=" "
                id="inputPassword"
               required >
            </div>
             </div>
             <div class="mb-3 row">
         <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="phone"
                value=" "
                id="inputPhone"
               >
            </div>
             </div>
            <button type="submit" class="btn btn-secondary mt-3">Submit</button>




            </form>


        </div>
    </div>
</div>

  <!-- Footer -->
  <?php 
  include_once("../element/footer.php")
  ?>
  
</section>  

  </body>
</html>